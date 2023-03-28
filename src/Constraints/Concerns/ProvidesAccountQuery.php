<?php

namespace Drewlabs\MiaccSdk\Constraints\Concerns;

use Drewlabs\MiaccSdk\Client;
use Drewlabs\MiaccSdk\Http\Query\RESTQueryBuilder;
use Drewlabs\MiaccSdk\Http\Response;

trait ProvidesAccountQuery
{

    /**
     * Select account using account number attribute
     * 
     * @param string $account 
     * @param string $bearerToken
     * 
     * @return object 
     */
    private function select($account, string $bearerToken)
    {
        return Client::new()
            ->accounts()
            ->withBearerToken($bearerToken)
            ->get()
            ->sendRequest(
                RESTQueryBuilder::new()
                    ->where('account_number', $account)
                    ->select('id', 'label', 'account_number', 'accountStatus'),
                function (Response $response) {
                    return null !== ($result = $response->get('data.0')) ? json_decode(json_encode($result), false) : $result;
                }
            );
    }
}
