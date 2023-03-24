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

namespace Drewlabs\MiaccSdk\Contracts;


interface RestClientInterface extends ClientInterface
{

	/**
	 * Prepares a post request instance
	 * 
	 *
	 * @return self
	 */
	public function post();

	/**
	 * Prepares a put request instance
	 * 
	 * @param string|int $id
	 * @return self
	 */
	public function put($id = null);

	/**
	 * Prepares a get request instance
	 * 
	 * @param string|int $id
	 * @return self
	 */
	public function get($id = null);

	/**
	 * Prepares a delete request instance
	 * 
	 * @param string|int $id
	 * @return self
	 */
	public function delete($id = null);

	/**
	 * Prepares a delete request instance
	 * 
	 * @param string|int $id
	 * @return self
	 */
	public function patch($id = null);

}