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

namespace Drewlabs\MiaccSdk\Http;

use Drewlabs\Curl\Client as CurlClient;
use Drewlabs\Curl\Converters\JSONDecoder;

trait RequestClientBase
{
	/**
	 * @var string
	 */
	private $path = null;


	/**
	 * @var string
	 */
	private $method = 'GET';

	/**
	 * 
	 * @var CurlClient
	 */
	private $curl;

	/**
	 * @param string $method
	 *
	 * @return self
	 */
	public function setMethod(string $method)
	{
		# code...
		$this->method = $method;
		return $this;
	}

	/**
	 * @param string $uri
	 *
	 * @return self
	 */
	public function setBaseUri(string $uri)
	{
		# code...
		$this->curl->setBaseUri($uri);
		return $this;
	}

	/**
	 * @param string $path
	 *
	 * @return self
	 */
	public function setRequestPath(string $path)
	{
		# code...
		$this->path = $path;
		return $this;
	}

	/**
	 * Provides a proxy interface to the internal curl client
	 * 
	 * @param string $method
	 * @param mixed $parameters
	 *
	 * @return mixed
	 */
	public function __call(string $method, $parameters)
	{
		# code...
		return call_user_func([$this->curl, $method], ...$parameters);
	}

	/**
	 * Decode request response
	 * 
	 * @param string $response 
	 * @param array $headers 
	 * @return array
	 * 
	 * @throws JsonException 
	 */
	private function decodeRequestResponse(string $response, array $headers = [])
	{
		$result = null;
		if (false !== preg_match('/^(?:application|text)\/(?:[a-z]+(?:[\.-][0-9a-z]+){0,}[\+\.]|x-)?json(?:-[a-z]+)?/i', $this->getHeader($headers, 'content-type'))) {
			$result = (new JSONDecoder)->decode($response);
		}
		// If the Content-Type header is not present in the response headers, we apply the try catch clause
		// To insure no error is thrown when decoding.
		if (null === $result) {
			try {
				$result = (new JSONDecoder)->decode($response) ?? [];
			} catch (\Throwable $e) {
				$result = [];
			}
		}
		return (array)($result ?? []);
	}

	/**
	 * Parse request string headers
	 * 
	 * @param mixed $list 
	 * 
	 * @return array 
	 */
	private function parseResponseHeaders($list)
	{
		$list = preg_split('/\r\n/', (string) ($list ?? ''), -1, PREG_SPLIT_NO_EMPTY);
		$httpHeaders = [];
		$httpHeaders['Request-Line'] = reset($list) ?? '';
		for ($i = 1; $i < count($list); $i++) {
			if (strpos($list[$i], ':') !== false) {
				list($key, $value) = array_map(function ($item) {
					return $item ? trim($item) : null;
				}, explode(':', $list[$i], 2));
				$httpHeaders[$key] = $value;
			}
		}
		return $httpHeaders;
	}

	/**
	 * Get request header caseless
	 * 
	 * @param array $headers 
	 * @param string $name 
	 * @return string
	 */
	private function getHeader(array $headers, string $name)
	{
		if (empty($headers)) {
			return null;
		}
		$normalized = strtolower($name);
		foreach ($headers as $key => $header) {
			if (strtolower($key) === $normalized) {
				return implode(',', is_array($header) ? $header : [$header]);
			}
		}
		return null;
	}
}
