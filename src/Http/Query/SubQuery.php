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

namespace Drewlabs\MiaccSdk\Http\Query;


class SubQuery
{

	/**
	 * 
	 * @var string
	 */
	private $method;

	/**
	 * 
	 * @var array|mixed
	 */
	private $params;

	/**
	 * Creates class instance
	 * 
	 * @param string $method
	 * @param array $params
	 */
	public function __construct(string $method,  array $params)
	{
		# code...
		$this->method = $method;
		$this->params = $params;
	}

	/**
	 * Method applied in the subquery
	 * 
	 * @param string $name
	 * 
	 * @return self
	 */
	public function method(string $name)
	{
		# code...
		$this->method = $name;
		return $this;
	}

	/**
	 * Parameters to apply in the subquery
	 * 
	 * @param array|int|float|string $params
	 * 
	 * @return self
	 */
	public function setParameters($params)
	{
		# code...
		$this->params = $params;
		return $this;
	}

	/**
	 * Reurns a JSON serializable object implementation
	 * 
	 *
	 * @return array|mixed
	 */
	public function json()
	{
		# code...
		return [
			'method' => $this->method,
			'params' => $this->params
		];
	}
}
