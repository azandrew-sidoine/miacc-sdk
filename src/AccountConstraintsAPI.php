<?php


namespace Drewlabs\MiaccSdk;

use Drewlabs\MiaccSdk\Http\Query\RESTQueryBuilder;
use Drewlabs\MiaccSdk\Http\Response;

/**
 * The Account constraint API class provides developper to check if a given account
 * can perform a given action such a provision/fund an account or perform a specific
 * operation
 * 
 * @package Drewlabs\MiaccSdk
 */
class AccountConstraintsAPI
{
    /**
     * 
     * @var string|int
     */
    private $account;

    /**
     * 
     * @var string
     */
    private $token;

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
     * @return AccountConstraintsAPI 
     */
    public static function new(string $account)
    {
        return new self($account);
    }

    /**
     * Set a bearer token that will be used in sending HTTP request
     * 
     * @param string $token 
     * @return $this 
     */
    public function bearerToken(string $token)
    {
        $this->token = $token;
        return $this;
    }

    /**
     * Check if the account is provisionnable by the source account
     * 
     * @param string $account 
     * @return bool 
     */
    public function canProvision(string $account)
    {
        return Client::new()
            ->accounts()
            ->withBearerToken($this->token)
            ->get()
            ->sendRequest(RESTQueryBuilder::new()->in('account_number', [$this->account, $account]), function (Response $response) {
                $account0 = $response->get('data.0');
                $account1 = $response->get('data.1');
                // Case any of the accounts does not exists, we return false
                if ((null === $account0) || (null === $account1)) {
                    return false;
                }
                $account0 = (object)($account0);
                $account1 = (object)($account1);
                $srcaccount = strval($account0->accountNumber) === strval($this->account) ? $account0 : $account1;
                $dstaccount = strval($account0->accountNumber) === strval($this->account) ? $account1 : $account0;
                return Client::new()
                    ->typeProvisions()
                    ->withBearerToken($this->token)
                    ->get()
                    ->sendRequest(
                        RESTQueryBuilder::new()
                            ->where('account_type_id', '=', $dstaccount->accountTypeId)
                            ->where('p_account_type_id', '=', $srcaccount->accountTypeId),
                        function (Response $response) use ($dstaccount, $srcaccount) {
                            return count(array_filter($response->get('data') ?? [], function ($item)  use ($dstaccount, $srcaccount) {
                                return ((object)($item))->accountTypeId === $dstaccount->accountTypeId &&  ((object)($item))->pAccountTypeId === $srcaccount->accountTypeId;
                            })) > 0;
                        }
                    );
            });
    }

    /**
     * Check if a given account can do a given operation type
     * 
     * @param int $type 
     * @param string $position 
     * @return bool 
     */
    public function doesOperation($type, $position = 'D')
    {
        return Client::new()
            ->accounts()
            ->withBearerToken($this->token)
            ->get()
            ->sendRequest(
                RESTQueryBuilder::new()->where('account_number', $this->account),
                function (Response $response) use ($type, $position) {
                    $account = $response->get('data.0');
                    // Case the queried account is null, return false
                    if (null === $account) {
                        return false;
                    }
                    $account = (object)$account;
                    // Case the queried account is not set, return false
                    if (!isset($account->id)) {
                        return false;
                    }
                    return Client::new()
                        ->accountOperationTypes()
                        ->withBearerToken($this->token)
                        ->get()
                        ->sendRequest(
                            RESTQueryBuilder::new()
                                ->where('account_id', '=', $account->id)
                                ->where('operation_type_id', '=', $type)
                                ->where('position', $position),
                            function (Response $response) use ($account, $type, $position) {
                                return count(array_filter($response->get('data') ?? [], function ($item)  use ($account, $type, $position) {
                                    $item = (object)$item;
                                    return strval($item->accountId) === strval($account->id) &&  strval($item->operationTypeId) === strval($type) && strval($item->position) === strval($position);
                                })) > 0;
                            }
                        );
                }
            );
    }
}
