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


final class OperationMovementBuilder
{

	/**
	 * @var string
	 */
	public $operation = null;

	/**
	 * Debit account
	 * 
	 * @var string
	 */
	public $debit = null;

	/**
	 * Credit account
	 * 
	 * @var string
	 */
	public $credit = null;

	/**
	 * Movement amount
	 * 
	 * @var float
	 */
	public $amount = null;

	/**
	 * Movement reference
	 * 
	 * @var string
	 */
	public $ref = null;

	/**
	 * Movement date time
	 * 
	 * @var string
	 */
	public $date = null;

	/**
	 * Creates class instance
	 * 
	 * @param string $operation
	 * @param string $debit
	 * @param string $credit
	 * @param float $amount
	 * @param string $date
	 */
	public function __construct(string $operation = null, string $debit = null, string $credit = null, float $amount = null, string $date = null)
	{
		# code...
		$this->operation = $operation;
		$this->debit = $debit;
		$this->credit = $credit;
		$this->amount = $amount;
		$this->date = $date;
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
	 * {@inheritDoc}
	 * 
	 */
	public function json()
	{
		# code...
		return array_filter([
			'operation_id' => $this->getOperation(),
			'debit_account' => $this->getDebit(),
			'credit_account' => $this->getCredit(),
			'amount' => $this->getAmount(),
			'date' => $this->getDate(),
			'ref' => $this->getRef()
		], function ($iterator) {
			return null !== $iterator;
		});
	}

	/**
	 * Get operation property value
	 * 
	 *
	 * @return string
	 */
	public function getOperation()
	{
		# code...
		return $this->operation;
	}

	/**
	 * Get debit property value
	 * 
	 *
	 * @return string
	 */
	public function getDebit()
	{
		# code...
		return $this->debit;
	}

	/**
	 * Get credit property value
	 * 
	 *
	 * @return string
	 */
	public function getCredit()
	{
		# code...
		return $this->credit;
	}

	/**
	 * Get amount property value
	 * 
	 *
	 * @return float
	 */
	public function getAmount()
	{
		# code...
		return $this->amount;
	}

	/**
	 * Get ref property value
	 * 
	 *
	 * @return string
	 */
	public function getRef()
	{
		# code...
		return $this->ref;
	}

	/**
	 * Get date property value
	 * 
	 *
	 * @return string
	 */
	public function getDate()
	{
		# code...
		return $this->date ?? date('Y-m-d H:i:s', time());
	}

	// # Setters


	/**
	 * Set operation property value
	 *
	 * @param string $value 
	 *
	 * @return self
	 */
	public function setOperation(string $value)
	{
		# code...
		$this->operation= $value;
		return $this;
	}

	/**
	 * Set debit property value
	 * 
	 * @param string $value
	 *
	 * @return self
	 */
	public function setDebit(string $value)
	{
		# code...
		$this->debit = $value;
		return $this;
	}

	/**
	 * Set credit property value
	 * 
	 * @param string $value
	 *
	 * @return self
	 */
	public function setCredit(string $value)
	{
		# code...
		$this->credit= $value;
		return $this;
	}

	/**
	 * Set amount property value
	 * 
	 * @param float $value
	 *
	 * @return self
	 */
	public function setAmount(float $value)
	{
		# code...
		$this->amount= $value;
		return $this;
	}

	/**
	 * Set ref property value
	 *
	 * @param string $value
	 * 
	 * @return self
	 */
	public function setRef(string $value)
	{
		# code...
		$this->ref = $value;
		return $this;
	}

	/**
	 * Set date property value
	 * 
	 * @param string $value
	 * 
	 * @return self
	 */
	public function setDate(string $value)
	{
		# code...
		$this->date = $value;
		return $this;
	}
}
