<?php

namespace Drewlabs\MiaccSdk\Constraints;

use Drewlabs\MiaccSdk\Constraints\Concerns\HasBearerToken;
use Drewlabs\MiaccSdk\Constraints\Concerns\ProvidesAccountQuery;
use Drewlabs\MiaccSdk\Contracts\ConstraintInterface;


/**
 * The composed constraint takes a list of constraints that an account must have
 * to pass the constraint call. If the account fails to a pass a constraint in the list
 * the contraint fails
 * 
 * @package Drewlabs\MiaccSdk\Constraints
 */
class ComposedAccountConstraint implements ConstraintInterface
{
    use ProvidesAccountQuery;
    use HasBearerToken;

    /**
     * @var array
     */
    private $contraints = [];


    /**
     * Creates constraint instance
     * 
     * @param \Closure[] $predicates 
     * @return void 
     */
    private function __construct($contraints)
    {
        $this->contraints = array_filter($contraints, function ($predicate) {
            return is_callable($predicate);
        });
    }

    /**
     * Create class instance
     * 
     * @param \Closure ...$contraints 
     * @return self 
     */
    public static function new(...$contraints)
    {
        return new self($contraints);
    }

    public function call($argument)
    {
        // Validate the request required parameters
        $this->validateBearerToken(__METHOD__);
        if (null === ($account = $this->select($argument, $this->bearerToken))) {
            return true;
        }
        foreach ($this->contraints as $predicate) {
            if (false === $predicate($account)) {
                return false;
            }
        }
        return true;
    }
}
