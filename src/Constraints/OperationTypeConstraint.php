<?php

namespace Drewlabs\MiaccSdk\Constraints;

use Drewlabs\MiaccSdk\Client;
use Drewlabs\MiaccSdk\Constraints\Concerns\HasBearerToken;
use Drewlabs\MiaccSdk\Contracts\ConstraintInterface;
use Drewlabs\MiaccSdk\Http\Query\RESTQueryBuilder;
use Drewlabs\MiaccSdk\Http\Response;

class OperationTypeConstraint implements ConstraintInterface
{
    use HasBearerToken;

    /**
     * Holds operation type value
     * 
     * @var string|int
     */
    private $type;

    /**
     * The position of the account during the operation
     * 
     * @var string
     */
    private $position;

    /**
     * Creates constraint instance
     * 
     * @param string|int $type 
     * @return void 
     */
    private function __construct($type, string $position)
    {
        $this->type = $type;
        $this->position = $position;
    }

    /**
     * Creates constraint instance
     * 
     * @param string|int $type
     * @param string $position
     * 
     * @return self 
     */
    public static function new($type, string $position = 'D')
    {
        return new self($type, $position ?? 'D');
    }

    public function call($argument)
    {
        // Validate the request required parameters
        $this->validateBearerToken(__METHOD__);
        return Client::new()
            ->accounts()
            ->withBearerToken($this->bearerToken)
            ->get()
            ->sendRequest(
                RESTQueryBuilder::new()->where('account_number', $argument),
                function (Response $response) {
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
                        ->withBearerToken($this->bearerToken)
                        ->get()
                        ->sendRequest(
                            RESTQueryBuilder::new()
                                ->where('account_id', '=', $account->id)
                                ->where('operation_type_id', '=', $this->type)
                                ->where('position', $this->position),
                            function (Response $response) use ($account) {
                                return count(array_filter($response->get('data') ?? [], function ($item)  use ($account) {
                                    $item = (object)$item;
                                    return strval($item->accountId) === strval($account->id) &&
                                        strval($item->operationTypeId) === strval($this->type) &&
                                        strval($item->position) === strval($this->position);
                                })) > 0;
                            }
                        );
                }
            );
    }
}
