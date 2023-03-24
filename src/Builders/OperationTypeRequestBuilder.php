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

namespace Drewlabs\MiaccSdk\Builders;

use Drewlabs\MiaccSdk\Contracts\RequestBodyBuilder;

class OperationTypeRequestBuilder implements RequestBodyBuilder
{

	/**
	 * @var string
	 */
	private $category;

	/**
	 * @var string
	 */
	private $label;

	/**
	 * @var float|int
	 */
	private $max_amount;

	/**
	 * @var float
	 */
	private $min_amount;

	/**
	 * @var string
	 */
	private $module_code;

	/**
	 * @var string
	 */
	private $code;

	/**
	 * @var bool
	 */
	private $status;

	/**
	 * @param string $label
	 * @param string $module_code
	 * @param string $code
	 * @param float $min_amount
	 */
	public function __construct(string $label = null, string $module_code = null, string $code = null, float $min_amount = 0)
	{
		# code...
		$this->label = $label;
		$this->module_code = $module_code;
		$this->code = $code;
		$this->min_amount = $min_amount;
	}

	/**
	 * Class instance factory method
	 * 
	 * @return self 
	 */
	public static function new()
	{
		return new self;
	}

	/**
	 * Rerturns the json representation of the builder instance
	 * 
	 *
	 * @return array|mixed
	 */
	public function json()
	{
		# code...
		return array_filter(
			[
				'category' => $this->getCategory(),
				'label' => $this->getLabel(),
				'max_amount' => $this->getMaxAmount(),
				'min_amount' => $this->getMinAmount(),
				'module_code' => $this->getModuleCode(),
				'code' => $this->getCode(),
				'status' => $this->getStatus(),
			],
			function ($value) {
				return null !== $value;
			}
		);
	}

	/**
	 * Set category property value
	 * 
	 * @param string $value
	 *
	 * @return self
	 */
	public function setCategory(string $value)
	{
		# code...
		$this->category = $value;

		return $this;
	}

	/**
	 * Set label property value
	 * 
	 * @param string $value
	 *
	 * @return self
	 */
	public function setLabel(string $value)
	{
		# code...
		$this->label = $value;

		return $this;
	}

	/**
	 * Set max_amount property value
	 * 
	 * @param float|int $value
	 *
	 * @return self
	 */
	public function setMaxAmount(float|int $value)
	{
		# code...
		$this->max_amount = $value;

		return $this;
	}

	/**
	 * Set min_amount property value
	 * 
	 * @param float $value
	 *
	 * @return self
	 */
	public function setMinAmount(float $value)
	{
		# code...
		$this->min_amount = $value;

		return $this;
	}

	/**
	 * Set module_code property value
	 * 
	 * @param string $value
	 *
	 * @return self
	 */
	public function setModuleCode(string $value)
	{
		# code...
		$this->module_code = $value;

		return $this;
	}

	/**
	 * Set code property value
	 * 
	 * @param string $value
	 *
	 * @return self
	 */
	public function setCode(string $value)
	{
		# code...
		$this->code = $value;

		return $this;
	}

	/**
	 * Set status property value
	 * 
	 * @param bool $value
	 *
	 * @return self
	 */
	public function setStatus(bool $value)
	{
		# code...
		$this->status = $value;

		return $this;
	}

	/**
	 * Get category property value
	 * 
	 *
	 * @return string
	 */
	public function getCategory()
	{
		# code...
		return $this->category;
	}

	/**
	 * Get label property value
	 * 
	 *
	 * @return string
	 */
	public function getLabel()
	{
		# code...
		return $this->label;
	}

	/**
	 * Get max_amount property value
	 * 
	 *
	 * @return float|int
	 */
	public function getMaxAmount()
	{
		# code...
		return $this->max_amount;
	}

	/**
	 * Get min_amount property value
	 * 
	 *
	 * @return float
	 */
	public function getMinAmount()
	{
		# code...
		return $this->min_amount;
	}

	/**
	 * Get module_code property value
	 * 
	 *
	 * @return string
	 */
	public function getModuleCode()
	{
		# code...
		return $this->module_code;
	}

	/**
	 * Get code property value
	 * 
	 *
	 * @return string
	 */
	public function getCode()
	{
		# code...
		return $this->code;
	}

	/**
	 * Get status property value
	 * 
	 *
	 * @return bool
	 */
	public function getStatus()
	{
		# code...
		return $this->status;
	}
}
