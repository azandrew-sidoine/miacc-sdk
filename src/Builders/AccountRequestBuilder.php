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
use DateTimeInterface;

class AccountRequestBuilder implements RequestBodyBuilder
{

	/**
	 * 
	 * @var bool
	 */
	private $can_loan;

	/**
	 * @var int
	 */
	private $type;

	/**
	 * @var int
	 */
	private $status;

	/**
	 * @var int
	 */
	private $agency;

	/**
	 * @var string
	 */
	private $accounting_number;

	/**
	 * @var string
	 */
	private $bban;

	/**
	 * @var DateTimeInterface
	 */
	private $opened_at;

	/**
	 * @var bool
	 */
	private $management;

	/**
	 * @var bool
	 */
	private $balance_adjustable;

	/**
	 * 
	 * @var float
	 */
	private $balance;

	/**
	 * 
	 * @var string
	 */
	private $title;

	/**
	 * Creates class instance
	 * 
	 * @param int $type
	 * @param int $status
	 * @param int $agency
	 */
	public function __contruct(int $type = null, int $status = null, int $agency = null)
	{
		# code...
		$this->type = $type;
		$this->status = $status;
		$this->agency = $agency;
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
			'account_type_id' =>  $this->getType(),
			'account_status_id' => $this->getStatus(),
			'agency_id' => $this->getAgency(),
			'accounting_number' => $this->getAccountingNumber(),
			'balance_adjustable' => $this->getBalanceAdjustable(),
			'bban' => $this->getBban(),
			'can_loan' => $this->getCanLoan(),
			'opened_at' => $this->getOpenedAt(),
			'balance' => $this->getBalance(),
			'account_title' => $this->getAccountTitle(),
			'management' => $this->getManagement(),
		], function ($value) {
			return null !== $value;
		});
	}

	/**
	 * Set type property value
	 * 
	 * @param int $value
	 *
	 * @return self
	 */
	public function setType(int $value)
	{
		# code...
		$this->type = $value;

		return $this;
	}

	/**
	 * Set status property value
	 * 
	 * @param int $value
	 *
	 * @return self
	 */
	public function setStatus(int $value)
	{
		# code...
		$this->status = $value;

		return $this;
	}

	/**
	 * Set agency property value
	 * 
	 * @param int $value
	 *
	 * @return self
	 */
	public function setAgency(int $value)
	{
		# code...
		$this->agency = $value;

		return $this;
	}

	/**
	 * Set accounting_number property value
	 * 
	 * @param string $value
	 *
	 * @return self
	 */
	public function setAccountingNumber(string $value)
	{
		# code...
		$this->accounting_number = $value;

		return $this;
	}

	/**
	 * Set bban property value
	 * 
	 * @param string $value
	 *
	 * @return self
	 */
	public function setBban(string $value)
	{
		# code...
		$this->bban = $value;

		return $this;
	}

	/**
	 * Set opened_at property value
	 * 
	 * @param DateTimeInterface $value
	 *
	 * @return self
	 */
	public function setOpenedAt(DateTimeInterface $value)
	{
		# code...
		$this->opened_at = $value;

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
	 * Set balance property value
	 * 
	 * @param float $value
	 *
	 * @return self
	 */
	public function setBalance(float $value = 0)
	{
		# code...
		$this->balance = $value;

		return $this;
	}

	/**
	 * Set account title property
	 * 
	 * @param string $value 
	 * @return self 
	 */
	public function setAccountTitle(string $value)
	{
		$this->title = $value;
		return $this;
	}

	/**
	 * Get type property value
	 * 
	 *
	 * @return int
	 */
	public function getType()
	{
		# code...
		return $this->type;
	}

	/**
	 * Get status property value
	 * 
	 *
	 * @return int
	 */
	public function getStatus()
	{
		# code...
		return $this->status;
	}

	/**
	 * Get agency property value
	 * 
	 *
	 * @return int
	 */
	public function getAgency()
	{
		# code...
		return $this->agency;
	}

	/**
	 * Get accounting_number property value
	 * 
	 *
	 * @return string
	 */
	public function getAccountingNumber()
	{
		# code...
		return $this->accounting_number;
	}

	/**
	 * Get bban property value
	 * 
	 *
	 * @return string
	 */
	public function getBban()
	{
		# code...
		return $this->bban;
	}

	/**
	 * Get opened_at property value
	 * 
	 *
	 * @return DateTimeInterface
	 */
	public function getOpenedAt()
	{
		# code...
		return $this->opened_at;
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
	 * Get balance property value
	 * 
	 *
	 * @return self
	 */
	public function getBalance()
	{
		# code...
		return $this->balance;
	}

	/**
	 * Set account title property
	 * 
	 * @return self 
	 */
	public function getAccountTitle()
	{
		return $this->title;
	}
}
