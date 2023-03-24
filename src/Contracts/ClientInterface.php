<?php

declare(strict_types=1);
/*
 * This file is auto generated using the drewlabs code generator package (v2.4)
 *
 * (c) Sidoine Azandrew <contact@liksoft.tg>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
*/

namespace Drewlabs\MiaccSdk\Contracts;

use Drewlabs\MiaccSdk\Contracts\RequestBodyBuilder;
use Closure;

interface ClientInterface
{

	/**
	 * Send the request to resource server
	 * 
	 * @param RequestBodyBuilder|Closure(mixed $response):mixed $body
	 * @param Closure(mixed $response):mixed $callback
	 *
	 * @return mixed
	 */
	public function sendRequest($body = null, Closure $callback = null);

}