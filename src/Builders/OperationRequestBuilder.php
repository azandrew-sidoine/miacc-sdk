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

class OperationRequestBuilder implements RequestBodyBuilder
{

	/**
	 * @var int
	 */
	private $type;

	/**
	 * @var int
	 */
	private $currency;

	/**
	 * @var string
	 */
	private $ref;

	/**
	 * @var bool
	 */
	private $status;

	/**
	 * @var DateTimeInterface
	 */
	private $date;

	/**
	 * @var OperationMovementBuilder[]
	 */
	private $movements = [];

	/**
	 * @param int $type
	 * @param int $currency
	 * @param DateTimeInterface|string $date
	 * @param string $ref
	 */
	public function __construct(int $type = null, int $currency = null, $date = null, string $ref = null)
	{
		# code...
		$this->type = $type;
		$this->currency = $currency;
		$this->date = $date;
		$this->ref = $ref;
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
		// operationDetails
		return array_filter(
			array_merge(
				[
					'ref' => $this->getRef(),
					'operation_type_id' => $this->getType(),
					'currency_id' => $this->getCurrency(),
					'date' => $this->getDate(),
					'status' => $this->getStatus(),

				],
				// We only append the movement attribue if it's defined
				!empty($movements = $this->getMovements()) ? [
					'operationDetails' => array_map(function ($movement) {
						return $movement->json();
					}, $movements)
				]  : [],
				// We only add the operation details relation if the movent is defined
				!empty($this->getMovements()) ? [
					"_query" => [
						"relations" => [
							"operationDetails"
						]
					]
				] : []
			),
			function ($value) {
				return null !== $value;
			}
		);
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
	 * Set currency property value
	 * 
	 * @param int $value
	 *
	 * @return self
	 */
	public function setCurrency(int $value)
	{
		# code...
		$this->currency = $value;

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
	 * Set date property value
	 * 
	 * @param DateTimeInterface|string $value
	 *
	 * @return self
	 */
	public function setDate($value)
	{
		# code...
		$this->date = $value;

		return $this;
	}

	/**
	 * Set movements property value
	 * 
	 * @param array $value
	 *
	 * @return self
	 */
	public function setMovements(array $value)
	{
		# code...
		$this->movements = $value;

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
	 * Get currency property value
	 * 
	 *
	 * @return int
	 */
	public function getCurrency()
	{
		# code...
		return $this->currency;
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
	 * Get date property value
	 * 
	 *
	 * @return DateTimeInterface
	 */
	public function getDate()
	{
		# code...
		return $this->date;
	}

	/**
	 * Get movements property value
	 * 
	 *
	 * @return OperationMovementBuilder[]
	 */
	public function getMovements()
	{
		# code...
		return $this->movements;
	}
}
