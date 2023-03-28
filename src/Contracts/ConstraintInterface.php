<?php

namespace Drewlabs\MiaccSdk\Contracts;

interface ConstraintInterface
{
    /**
     * Call the constraints on the provided argument
     * 
     * @param string|int $argument 
     * @return bool 
     */
    public function call($argument);
}