<?php

namespace Drewlabs\MiaccSdk\Constraints;

use Drewlabs\MiaccSdk\Constraints\Concerns\HasBearerToken;
use Drewlabs\MiaccSdk\Constraints\Concerns\ProvidesAccountQuery;
use Drewlabs\MiaccSdk\Contracts\ConstraintInterface;

class BalanceConstraint implements ConstraintInterface
{
    /**
     * 
     * @var float
     */
    private $amount;

    use ProvidesAccountQuery;
    use HasBearerToken;

    /**
     * Creates constraint instance
     * 
     * @param float $amount 
     * @return void 
     */
    private function __construct(float $amount)
    {
        $this->amount = $amount;
    }

    /**
     * Create class instance
     * 
     * @param mixed $amount 
     * @return self 
     */
    public static function new($amount)
    {
        return new self(floatval($amount));
    }

    public function call($argument)
    {
        // Validate the request required parameters
        $this->validateBearerToken(__METHOD__);
        if (null === ($account = $this->select($argument, $this->bearerToken))) {
            return true;
        }
        return floatval($account->balance ?? 0) >= (floatval($account->min_amount ?? $account->minAmount ?? 0) + floatval($this->amount));
    }
}
