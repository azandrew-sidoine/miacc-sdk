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

use Drewlabs\MiaccSdk\Exceptions\ClientException;
use Drewlabs\MiaccSdk\Exceptions\RequestException;
use Drewlabs\MiaccSdk\Exceptions\ValidationException;
use Drewlabs\MiaccSdk\Contracts\RequestBodyBuilder;
use Closure;

trait HTTPRequestClient
{
	use RestClient;

	/**
	 * @var array
	 */
	private $__HEADERS__ = [];

	/**
	 * @var array
	 */
	private $__COOKIES__ = [];

	/**
	 * @var array
	 */
	private $__QUERIES__ = [];

	/**
	 * {@inheritDoc}
	 * 
	 * @param RequestBodyBuilder|Closure(Response $response):mixed $body
	 * @param Closure(Response $response):mixed $callback
	 *
	 * @return Response|mixed
	 */
	public function sendRequest($body = null, Closure $callback = null)
	{
		list($body, $callback) = isset($body) && $body instanceof \Closure ? [null, $body] : [$body, $callback];
		# code...
		$this->curl->setOption(\CURLOPT_RETURNTRANSFER, true);
		$this->curl->setProtocolVersion('1.1');
		// #region Send the request to the external server
		$this->curl->send($this->method, $this->appendQuery($this->path), array_merge([
			'headers' => $this->mergeRequestHeaders(),
			'cookies' => $this->getCookies()
		], $body ? ['body' => $body->json()] : []));
		// #endregion Send request to the external server

		// #region Handle request response
		$response = $this->curl->getResponse();
		if (!empty(trim($errorMessage = $this->curl->getErrorMessage()) || (0 !== $this->curl->getError()))) {
			throw new ClientException('Client request Error: ' . ($errorMessage ?? 'Unkkown error'));
		}
		// # Get the request response status code to evaluate for bad response
		$statusCode = intval($this->curl->getStatusCode());
		$responseHeaders = $this->parseResponseHeaders($this->curl->getResponseHeaders());
		if ($statusCode === 422 || $statusCode === 400) {
			throw new ValidationException($this->decodeRequestResponse($response, $responseHeaders));
		}

		// Case the request ins not between 200 and 299, throw a request exception
		if (!(200 >= $statusCode &&  $statusCode <= 299)) {
			throw new RequestException(empty(trim($errorMessage)) ? ReasonPhrase::getPrase($statusCode) : $errorMessage, $statusCode);
		}

		// TODO : return the response to caller
		$callback = $callback ?? function ($value) {
			return $value;
		};
		// Decode response before sending it to the client
		$decoded = $this->decodeRequestResponse($response, $responseHeaders);
		// #endregion Handle request response

		// Call the provided callback at the end of the execution stack
		return $callback(new Response($decoded, $statusCode, $responseHeaders));
	}

	/**
	 * Set request header value
	 * 
	 * @param string $name
	 * @param string $value
	 *
	 * @return self
	 */
	public function setHeader(string $name, string $value)
	{
		# code...
		$this->__HEADERS__[$name] = $value;
		return $this;
	}

	/**
	 * Set request cookie value
	 * 
	 * @param string $name
	 * @param string $value
	 *
	 * @return self
	 */
	public function setCookie(string $name, string $value)
	{
		# code...
		$this->__COOKIES__[$name] = $value;
		return $this;
	}

	/**
	 * Add bearer token authorization header to request
	 * 
	 * @param string $token
	 *
	 * @return self
	 */
	public function withBearerToken(string $token)
	{
		# code...
		$self = clone $this;
		return $self->setHeader("Authorization", "Bearer $token");
	}

	/**
	 * Add Basic authorization header to request
	 * 
	 * @param string $user
	 * @param string $password
	 *
	 * @return self
	 */
	public function withBasicAuth(string $user, string $password)
	{
		# code...
		$self = clone $this;
		return $self->setHeader("Authorization", "Basic " . base64_encode(sprintf("%s:%s", $user, $password)));
	}

	/**
	 * Add request query
	 * 
	 * @param array $query
	 *
	 * @return self
	 */
	public function setQuery(array $query)
	{
		# code...
		$this->__QUERIES__ = $query;
		return $this;
	}

	/**
	 * Returns request headers
	 * 
	 *
	 * @return array
	 */
	public function getHeaders()
	{
		# code...
		return $this->__HEADERS__ ?? [];
	}

	/**
	 * Returns request cookies
	 * 
	 *
	 * @return array
	 */
	public function getCookies()
	{
		# code...
		return $this->__COOKIES__ ?? [];
	}

	/**
	 * Returns request query
	 * 
	 *
	 * @return array
	 */
	public function getQuery()
	{
		# code...
		return $this->__QUERIES__ ?? [];
	}

	/**
	 * Prepare request uri appending request url encoded query parameters
	 * 
	 * @param string $path 
	 * @return string 
	 */
	private function appendQuery(string $path)
	{
		$query = $this->getQuery();
		return sprintf("%s%s", $path, implode('&', array_map(function ($key, $value) {
			return urlencode(strval($key)) . '=' . urlencode(strval($value));
		}, array_keys((array)$query), array_values((array)$query))));
	}

	/**
	 * Merge request header with default json headers
	 * 
	 * @return string[] 
	 */
	private function mergeRequestHeaders()
	{
		$defaultHeaders = ['Content-Type' => 'application/json', 'Accept' => '*/*'];
		return array_merge($defaultHeaders, $this->getHeaders());
	}
}
