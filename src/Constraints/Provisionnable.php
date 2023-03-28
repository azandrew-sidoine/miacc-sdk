<?php

namespace Drewlabs\MiaccSdk\Constraints;

use Drewlabs\MiaccSdk\Client;
use Drewlabs\MiaccSdk\Constraints\Concerns\HasBearerToken;
use Drewlabs\MiaccSdk\Contracts\ConstraintInterface;
use Drewlabs\MiaccSdk\Http\Query\RESTQueryBuilder;
use Drewlabs\MiaccSdk\Http\Response;

class Provisionnable implements ConstraintInterface
{
    use HasBearerToken;

    /**
     * @var string
     */
    private $account;

    /**
     * Creates constraint instance
     * 
     * @param string $account 
     * @return void 
     */
    private function __construct(string $account)
    {
        $this->account = $account;
    }

    /**
     * Creates constraint instance
     * 
     * @param string $account 
     * @return self 
     */
    public static function new(string $account)
    {
        return new self($account);
    }

    public function call($argument)
    {
        // Validate the request required parameters
        $this->validateBearerToken(__METHOD__);
        return Client::new()
            ->accounts()
            ->withBearerToken($this->bearerToken)
            ->get()
            ->sendRequest(RESTQueryBuilder::new()->in('account_number', [$this->account, $argument]), function (Response $response) {
                $account0 = $response->get('data.0');
                $account1 = $response->get('data.1');
                // Case any of the accounts does not exists, we return false
                if ((null === $account0) || (null === $account1)) {
                    return false;
                }
                $account0 = (object)($account0);
                $account1 = (object)($account1);

                // Next we select the account and the provisionnable account
                $by = strval($account0->accountNumber) === strval($this->account) ? $account1 : $account0;
                $account = strval($account0->accountNumber) === strval($this->account) ? $account0 : $account1;

                // Then we send a request to query for the the provision relation withing both accounts
                return Client::new()
                    ->typeProvisions()
                    ->withBearerToken($this->bearerToken)
                    ->get()
                    ->sendRequest(
                        RESTQueryBuilder::new()
                            ->where('account_type_id', '=', $account->accountTypeId)
                            ->where('p_account_type_id', '=', $by->accountTypeId),
                        // Finally we check if result contains values and if values matches the accounts propvided
                        function (Response $response) use ($account, $by) {
                            return count(array_filter($response->get('data') ?? [], function ($item)  use ($account, $by) {
                                return ((object)($item))->accountTypeId === $account->accountTypeId &&  ((object)($item))->pAccountTypeId === $by->accountTypeId;
                            })) > 0;
                        }
                    );
            });
    }
}
