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

class AccountTypeRequestBuilder implements RequestBodyBuilder
{

	/**
	 * @var string
	 */
	private $label;

	/**
	 * @var bool
	 */
	private $status;

	/**
	 * @var float|int
	 */
	private $min_amount;

	/**
	 * @var float|int
	 */
	private $maintenance_fees;

	/**
	 * @var float|int
	 */
	private $interest_rate;

	/**
	 * @var bool
	 */
	private $can_loan;

	/**
	 * @var bool
	 */
	private $management;

	/**
	 * @var bool
	 */
	private $balance_adjustable;

	/**
	 * @var AccountTypeOperationTypeRequestBuilder[]
	 */
	private $operationTypes;

	/**
	 * @var array
	 */
	private $code;

	/**
	 * @param string $label
	 * @param bool $status
	 * @param float|int $min_amount
	 * @param float|int $maintenance_fees
	 * @param float|int $interest_rate
	 * @param bool $can_loan
	 */
	public function __construct(string $label = null, bool $status = null, float|int $min_amount = null, float|int $maintenance_fees = null, float|int $interest_rate = null, bool $can_loan = null)
	{
		# code...
		$this->label = $label;
		$this->status = $status;
		$this->min_amount = $min_amount;
		$this->maintenance_fees = $maintenance_fees;
		$this->interest_rate = $interest_rate;
		$this->can_loan = $can_loan;
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
			array_merge([
				'label' => $this->getLabel(),
				'status' => $this->getStatus(),
				'min_amount' => $this->getMinAmount(),
				'maintenance_fees' => $this->getMaintenanceFees(),
				'interest_rate' => $this->getInterestRate(),
				'can_loan' => $this->getCanLoan(),
				'balance_adjustable' => $this->getBalanceAdjustable(),
				'management' => $this->getManagement(),
				'code' => $this->getCode(),
			], !empty($types = $this->getOperationTypes()) ? [
				'operationTypes' => array_map(function ($iterator) {
					return $iterator->json();
				}, $types)
			] : []),
			function ($value) {
				return null !== $value;
			}
		);
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
	 * Set min_amount property value
	 * 
	 * @param float|int $value
	 *
	 * @return self
	 */
	public function setMinAmount(float|int $value)
	{
		# code...
		$this->min_amount = $value;

		return $this;
	}

	/**
	 * Set maintenance_fees property value
	 * 
	 * @param float|int $value
	 *
	 * @return self
	 */
	public function setMaintenanceFees(float|int $value)
	{
		# code...
		$this->maintenance_fees = $value;

		return $this;
	}

	/**
	 * Set interest_rate property value
	 * 
	 * @param float|int $value
	 *
	 * @return self
	 */
	public function setInterestRate(float|int $value)
	{
		# code...
		$this->interest_rate = $value;

		return $this;
	}

	/**
	 * Set can_loan property value
	 * 
	 * @param bool $value
	 *
	 * @return self
	 */
	public function setCanLoan(bool $value)
	{
		# code...
		$this->can_loan = $value;

		return $this;
	}

	/**
	 * Set management property value
	 * 
	 * @param bool $value
	 *
	 * @return self
	 */
	public function setManagement(bool $value)
	{
		# code...
		$this->management = $value;

		return $this;
	}

	/**
	 * Set balance_adjustable property value
	 * 
	 * @param bool $value
	 *
	 * @return self
	 */
	public function setBalanceAdjustable(bool $value)
	{
		# code...
		$this->balance_adjustable = $value;

		return $this;
	}

	/**
	 * Set operationTypes property value
	 * 
	 * @param array $value
	 *
	 * @return self
	 */
	public function setOperationTypes(array $value)
	{
		# code...
		$this->operationTypes = $value;

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

	/**
	 * Get min_amount property value
	 * 
	 *
	 * @return float|int
	 */
	public function getMinAmount()
	{
		# code...
		return $this->min_amount;
	}

	/**
	 * Get maintenance_fees property value
	 * 
	 *
	 * @return float|int
	 */
	public function getMaintenanceFees()
	{
		# code...
		return $this->maintenance_fees;
	}

	/**
	 * Get interest_rate property value
	 * 
	 *
	 * @return float|int
	 */
	public function getInterestRate()
	{
		# code...
		return $this->interest_rate;
	}

	/**
	 * Get can_loan property value
	 * 
	 *
	 * @return bool
	 */
	public function getCanLoan()
	{
		# code...
		return $this->can_loan;
	}

	/**
	 * Get management property value
	 * 
	 *
	 * @return bool
	 */
	public function getManagement()
	{
		# code...
		return $this->management;
	}

	/**
	 * Get balance_adjustable property value
	 * 
	 *
	 * @return bool
	 */
	public function getBalanceAdjustable()
	{
		# code...
		return $this->balance_adjustable;
	}

	/**
	 * Get operationTypes property value
	 * 
	 *
	 * @return AccountTypeOperationTypeRequestBuilder[]
	 */
	public function getOperationTypes()
	{
		# code...
		return $this->operationTypes ?? [];
	}

	/**
	 * Get operationTypes property value
	 * 
	 *
	 * @return string
	 */
	public function getCode()
	{
		# code...
		return $this->code;
	}
}
