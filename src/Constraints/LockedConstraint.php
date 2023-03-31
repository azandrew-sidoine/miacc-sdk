<?php

namespace Drewlabs\MiaccSdk\Constraints;

use Drewlabs\MiaccSdk\Constraints\Concerns\HasBearerToken;
use Drewlabs\MiaccSdk\Constraints\Concerns\ProvidesAccountQuery;
use Drewlabs\MiaccSdk\Contracts\ConstraintInterface;

class LockedConstraint implements ConstraintInterface
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

    /**
     * Creates a function that check if the account is not locked
     * 
     * @return \Closure(mixed $account): bool 
     */
    public static function factory()
    {
        return function($account) {
            // Check if the accountStatus variable is defined
            if (null === ($status = $account->accountStatus)) {
                return false;
            }
            // Evaluate the locked state of the account
            return false === boolval($status->locked);
        };
    }

    public function call($argument)
    {
        // Validate the request required parameters
        $this->validateBearerToken(__METHOD__);
        if (null === ($account = $this->select($argument, $this->bearerToken))) {
            return true;
        }
        return self::factory()($account);
    }
}
