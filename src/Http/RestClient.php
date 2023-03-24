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

namespace Drewlabs\MiaccSdk\Http;

use Drewlabs\MiaccSdk\Contracts\ClientInterface;

trait RestClient
{
	use RequestClientBase;
	/**
	 * {@inheritDoc}
	 * 
	 *
	 * @return self&ClientInterface
	 */
	public function post()
	{
		# code...
		return $this->setMethod('POST');
	}

	/**
	 * {@inheritDoc}
	 *
	 * @param string|int $id
	 * 
	 * @return self&ClientInterface
	 */
	public function put($id = null)
	{
		# code...
		return $id ? $this->setMethod('PUT')->setRequestPath(sprintf("%s/%s", $this->path, $id)) : $this->setMethod('PUT');
	}

	/**
	 * {@inheritDoc}
	 * 
	 * @param string|int $id
	 *
	 * @return self&ClientInterface
	 */
	public function get($id = null)
	{
		# code...
		return $id ? $this->setMethod('GET')->setRequestPath(sprintf("%s/%s", $this->path, $id)) : $this->setMethod('GET');
	}

	/**
	 * {@inheritDoc}
	 *
	 * @param string|int $id
	 * 
	 * @return self&ClientInterface
	 */
	public function delete($id = null)
	{
		# code...
		return $id ? $this->setMethod('DELETE')->setRequestPath(sprintf("%s/%s", $this->path, $id)) : $this->setMethod('DELETE');
	}
		
	/**
	 * {@inheritDoc}
	 * 
	 * @param string|int $id
	 *
	 * @return self&ClientInterface
	 */
	public function patch($id = null)
	{
		return $id ? $this->setMethod('PATCH')->setRequestPath(sprintf("%s/%s", $this->path, $id)) : $this->setMethod('PATCH');
	}

}