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

namespace Drewlabs\MiaccSdk\Exceptions;

use Exception;

class ValidationException extends Exception
{

	/**
	 * Validation errors
	 * 
	 * @var string[]
	 */
	private $errors = null;

	/**
	 * Create exception instance
	 * 
	 * @param array $errors
	 */
	public function __construct(array $errors = [])
	{
		# code...
		$this->errors = $errors ?? [];
		parent::__construct("Bad request", 422);
	}

	/**
	 * Returns validation errrors
	 * 
	 *
	 * @return array
	 */
	public function getErrors()
	{
		# code...
		return $this->errors;
	}
}
