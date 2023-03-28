<?php

namespace Drewlabs\MiaccSdk\Constraints;

use Drewlabs\MiaccSdk\Constraints\Concerns\HasBearerToken;
use Drewlabs\MiaccSdk\Constraints\Concerns\ProvidesAccountQuery;
use Drewlabs\MiaccSdk\Contracts\ConstraintInterface;

class FrozenConstraint implements ConstraintInterface
{
    use HasBearerToken;
    use ProvidesAccountQuery;
    
    /**
     * Creates constraint instance
     * 
     * @return void 
     */
    private function __construct()
    {
    }

    /**
     * Creates constraint instance
     * 
     * @return self 
     */
    public static function new()
    {
        return new self();
    }

    public function call($argument)
    {
        // Validate the request required parameters
        $this->validateBearerToken(__METHOD__);
        if (null === ($account = $this->select($argument, $this->bearerToken))) {
            return true;
        }
        // Check if the accoun tStatus variable is defined
        if (null === ($status = $account->accountStatus)) {
            return false;
        }
        // Evaluate the frozen state of the account
        return true === boolval($status->frozen);
    }
}
