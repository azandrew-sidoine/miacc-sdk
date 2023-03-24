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

class AcountTypeProvisionRequestBuilder implements RequestBodyBuilder
{

	/**
	 * @var int
	 */
	private $type = null;

	/**
	 * @var int
	 */
	private $provisioningType = null;

	/**
	 * @param int $type
	 * @param int $provisioningType
	 */
	public function __construct(int $type = null, int $provisioningType = null)
	{
		# code...
		$this->type = $type;
		$this->provisioningType = $provisioningType;
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
			'account_type_id' => $this->getType(),
			'p_account_type_id' => $this->getProvisioningType()
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
	 * Set provisioningType property value
	 * 
	 * @param int $value
	 *
	 * @return self
	 */
	public function setProvisioningType(int $value)
	{
		# code...
		$this->provisioningType = $value;

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
	 * Get provisioningType property value
	 * 
	 *
	 * @return int
	 */
	public function getProvisioningType()
	{
		# code...
		return $this->provisioningType;
	}
}
