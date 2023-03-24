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

use Drewlabs\Curl\Client as CurlClient;

class Client
{

	/**
	 * @var CurlClient
	 */
	private $client = null;

	/**
	 * Creates class instance
	 * 
	 * @param CurlClient $client
	 */
	public function __construct(CurlClient $client)
	{
		# code...
		$this->client = $client;
	}

	/**
	 * Creates class instance
	 * 
	 * @param array $options
	 */
	public static function new(array $options = [])
	{
		# code...
		$curl = new CURLClient($options ?? []);
		return new self($curl);
	}


	/**
	 * Creates accounts REST client instance
	 * 
	 * @param string|null $host 
	 * @param string|null $path 
	 * @return AccountsClient 
	 */
	public function accounts(string $host = null, string $path = null)
	{
		# code...
		$client = new AccountsClient($this->client, $host);
		return $path ? $client->setRequestPath($path) : $client;
	}

	/**
	 * Creates accounts types REST client instance
	 * 
	 * @param string|null $host 
	 * @param string|null $path 
	 * @return AccountTypesClient 
	 */
	public function types(string $host = null, string $path = null)
	{
		# code...
		$client = new AccountTypesClient($this->client, $host);
		return $path ? $client->setRequestPath($path) : $client;
	}

	/**
	 * Creates operations REST client instance
	 * 
	 * @param string|null $host 
	 * @param string|null $path 
	 * @return OperationsClient 
	 */
	public function operations(string $host = null, string $path = null)
	{
		# code...
		$client = new OperationsClient($this->client, $host);
		return $path ? $client->setRequestPath($path) : $client;
	}


	/**
	 * Creates transactions REST client instance
	 * 
	 * @param string|null $host 
	 * @param string|null $path 
	 * @return TransactionsClient 
	 */
	public function transactions(string $host = null, string $path = null)
	{
		# code...
		$client = new TransactionsClient($this->client, $host);
		return $path ? $client->setRequestPath($path) : $client;
	}

	/**
	 * Creates transactions REST client instance
	 * 
	 * @param string|null $host 
	 * @param string|null $path 
	 * @return OperationTypesClient 
	 */
	public function operationTypes(string $host = null, string $path = null)
	{
		# code...
		$client = new OperationTypesClient($this->client, $host);
		return $path ? $client->setRequestPath($path) : $client;
	}

	/**
	 * Creates account types provision type REST client instance
	 * 
	 * @param string|null $host 
	 * @param string|null $path 
	 * @return ProvisionnableTypesClient 
	 */
	public function typeProvisions(string $host = null, string $path = null)
	{
		# code...
		$client = new ProvisionnableTypesClient($this->client, $host);
		return $path ? $client->setRequestPath($path) : $client;
	}

	/**
	 * Creates account types provision type REST client instance
	 * 
	 * @param string|null $host 
	 * @param string|null $path 
	 * @return AccountTypeOperationTypesClient 
	 */
	public function typeOperationTypes(string $host = null, string $path = null)
	{
		# code...
		$client = new AccountTypeOperationTypesClient($this->client, $host);
		return $path ? $client->setRequestPath($path) : $client;
	}
}
