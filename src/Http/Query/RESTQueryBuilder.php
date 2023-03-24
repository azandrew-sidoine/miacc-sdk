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

namespace Drewlabs\MiaccSdk\Http\Query;

use Drewlabs\MiaccSdk\Contracts\RequestBodyBuilder;

final class RESTQueryBuilder implements RequestBodyBuilder
{

	/**
	 * REST query value
	 * 
	 * @var array
	 */
	private $__QUERY__ = [];

	/**
	 * List of column to include in the query result
	 * 
	 * @var array
	 */
	private $__COLUMNS__ = [];

	/**
	 * List of column to exclude from the query result
	 * 
	 * @var array
	 */
	private $__EXCLUDES__ = [];


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
	 * Add a where query filter to the builder
	 * 
	 * @param string|SubQuery $column
	 * @param string|null $operatorOrValue
	 * @param mixed|null $value
	 *
	 * @return self
	 */
	public function where($column, $operatorOrValue = null, string $value = null)
	{
		# code...
		$this->setWhereQuery('where', $column, $operatorOrValue, $value);
		return $this;
	}

	/**
	 * Add an or query filter to the builder
	 * 
	 * @param string|SubQuery $column
	 * @param string|null $operatorOrValue
	 * @param mixed|null $value
	 *
	 * @return self
	 */
	public function or($column, $operatorOrValue = null, $value = null)
	{
		# code...
		$this->setWhereQuery('orwhere', $column, $operatorOrValue, $value);
		return $this;
	}

	/**
	 * Add a not query filter to the builder
	 * 
	 * @param string $column
	 * @param string $value
	 *
	 * @return self
	 */
	public function not(string $column, string $value = null)
	{
		# code...
		return $this->where($column, '<>', $value);
	}

	/**
	 * Add an `in` query filter to the builder
	 * 
	 * @param string $column
	 * @param array $values
	 * @param bool $not
	 *
	 * @return self
	 */
	public function in(string $column, array $values, bool $not = false)
	{
		# code...
		$method = $not ? 'notin' : 'in';
		if (isset($this->__QUERY__[$method])) {
			$this->__QUERY__[$method][] = [$column, $values];
		}
		$this->__QUERY__[$method] = [[$column, $values]];
		return $this;
	}

	/**
	 * Add an `in` query filter to the builder
	 * 
	 * @param string $column
	 * @param string|SubQuery $values
	 *
	 * @return self
	 */
	public function has(string $column, $query = null)
	{
		# code...
		// Case the quey is a subquery object we returns the json representation of the query
		$query = $query instanceof SubQuery ? ['column' => $column, 'match' => $query->json()] : (null === $query ? $column : [$column, $query]);
		if (isset($this->__QUERY__['has'])) {
			$this->__QUERY__['has'][] = [$query];
		}
		$this->__QUERY__['has'] = [$query];
		return $this;
	}

	/**
	 * Set the list of columns to include in the rest query result
	 * 
	 * @param mixed $columns
	 *
	 * @return self
	 */
	public function select(...$columns)
	{
		# code...
		$this->__COLUMNS__ = array_unique(array_merge($this->__COLUMNS__ ?? [], $this->flatten($columns)));
		return $this;
	}

	/**
	 * Set the list of columns to exclude from the rest query result
	 * 
	 * @param string[] $columns
	 *
	 * @return self
	 */
	public function excludes(...$columns)
	{
		# code...
		$this->__EXCLUDES__ = array_unique(array_merge($this->__EXCLUDES__ ?? [], $this->flatten($columns)));
		return $this;
	}

	/**
	 * {@inheritDoc}
	 * 
	 *
	 * @return array|mixed
	 */
	public function json()
	{
		# code...
		return [
			'_query' => @json_encode($this->getQuery()),
			'_hidden' => $this->getExcludes(),
			'_columns' => empty($columns = $this->getColumns()) ? ['*'] : $columns
		];
	}

	/**
	 * Get __QUERY__ property value
	 * 
	 *
	 * @return array
	 */
	public function getQuery()
	{
		# code...
		return $this->__QUERY__ ?? [];
	}

	/**
	 * Get __COLUMNS__ property value
	 * 
	 *
	 * @return array
	 */
	public function getColumns()
	{
		# code...
		return $this->__COLUMNS__ ?? [];
	}

	/**
	 * Get __EXCLUDES__ property value
	 * 
	 *
	 * @return array
	 */
	public function getExcludes()
	{
		# code...
		return $this->__EXCLUDES__ ?? [];
	}

	private function setWhereQuery(string $method, $column, $operatorOrValue = null, $value = null)
	{
		$this->__QUERY__ = $this->__QUERY__ ?? [];
		$query = (!isset($operatorOrValue) && !isset($value))  ? ($column instanceof SubQuery ? $column->json() : $column) : (isset($operatorOrValue) && !isset($value) ? [$column, '=', $operatorOrValue] : [$column, $operatorOrValue, $value]);
		if (isset($this->__QUERY__[$method])) {
			$this->__QUERY__[$method][] = $query;
		}
		$this->__QUERY__[$method] = [$query];
	}

	private function flatten(array $values)
	{
		$generator = function ($values, &$output) use (&$generator) {
			foreach ($values as $value) {
				if (is_iterable($value)) {
					$generator($value, $output);
					continue;
				}
				$output[] = $value;
			}
		};
		$out = [];
		$generator($values, $out);
		return $out;
	}
}
