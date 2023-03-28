<?php

namespace Drewlabs\MiaccSdk\Constraints\Concerns;

use BadMethodCallException;

trait HasBearerToken
{
    /**
     * 
     * @var string
     */
    private $bearerToken;

    /**
     * Set a bearer token that will be used in sending HTTP request
     * 
     * @param string $token 
     * @return $this 
     */
    public function bearerToken(string $token)
    {
        $this->bearerToken = $token;
        return $this;
    }

    /**
     * Validate required bearer token parameters
     * 
     * @param string $method 
     * @return void 
     * @throws BadMethodCallException 
     */
    private function validateBearerToken(string $method)
    {
        if (null === $this->bearerToken) {
            throw new BadMethodCallException('Please make sure the bearer token authorization header is set before calling ' . $method);
        }
    }
}
