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

namespace Drewlabs\MiaccSdk;

use Drewlabs\MiaccSdk\Http\RestClient;
use Drewlabs\MiaccSdk\Contracts\RestClientInterface;
use Drewlabs\MiaccSdk\Http\HTTPRequestClient;
use Drewlabs\Curl\Client;

class AccountTypeOperationTypesClient implements RestClientInterface
{
	use RestClient;
	use HTTPRequestClient;

	/**
	 * Account server host url
	 */
	private const __SERVER_HOST__ = 'https://coopecaccounts.lik.tg';
	
	/**
	 * Creates class instance
	 * 
	 * @param Client $client 
	 * @param strirng|null $host
	 * @param string $path 
	 * @return void 
	 */
	public function __construct(Client $client, string $host = null, string $path = null)
	{
		# code...
		// #region Set defauls
		$this->curl = $client;
		$this->path = $path ?? 'api/account-type-operation-types';
		$this->setBaseUri($host ?? self::__SERVER_HOST__);
		// #endregion Set defailt
	}

}