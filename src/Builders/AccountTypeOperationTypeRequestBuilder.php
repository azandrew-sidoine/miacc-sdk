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

class AccountTypeOperationTypeRequestBuilder implements RequestBodyBuilder
{

	/**
	 * @var int
	 */
	private $accountType;

	/**
	 * @var int
	 */
	private $operationType;

	/**
	 * 
	 * @var string
	 */
	private $position;

	/**
	 * Creates class instance
	 * 
	 * @param int $accountType
	 * @param int $operationType
	 * @param string $position
	 */
	public function __construct(int $accountType = null, int $operationType = null, string $position = null)
	{
		$this->operationType = $operationType;
		$this->accountType = $accountType;
		$this->position = $position;
		# code...
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
		return array_filter([
			'operation_type_id' => $this->getOperationType(),
			'account_type_id' => $this->getAccountType(),
			'position' => $this->getPosition()
		]);
	}

	/**
	 * Set accountType property value
	 * 
	 * @param int $value
	 *
	 * @return self
	 */
	public function setAccountType(int $value)
	{
		# code...
		$this->accountType = $value;

		return $this;
	}

	/**
	 * Set operationType property value
	 * 
	 * @param int $value
	 *
	 * @return self
	 */
	public function setOperationType(int $value)
	{
		# code...
		$this->operationType = $value;

		return $this;
	}

	/**
	 * Set position property value
	 * 
	 * @param string $value
	 *
	 * @return self
	 */
	public function setPosition(string $value)
	{
		# code...
		$this->position = $value;

		return $this;
	}

	/**
	 * Get accountType property value
	 * 
	 *
	 * @return int
	 */
	public function getAccountType()
	{
		# code...
		return $this->accountType;
	}

	/**
	 * Get operationType property value
	 * 
	 *
	 * @return int
	 */
	public function getOperationType()
	{
		# code...
		return $this->operationType;
	}

	/**
	 * Get position property value
	 * 
	 * @return string
	 */
	public function getPosition()
	{
		# code...
		return $this->position;
	}
}
