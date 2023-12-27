<?php
//defined('BASEPATH') or exit('No direct script access allowed');

use CodeIgniter\Model;

class Productos_model extends Model
{
	protected $table = 'productos';

	public function getProductos($where = array(), $select = '')
	{
		$productos = $this->builder();

		$select = trim($select);
		if (!empty($where)) {
			$productos->where($where);
		} else {
			$productos->where("eliminado", false);
		}
		return $productos->get()->getResultObject();
	}
	public function getProductosJoin($where = array(), $select = '')
	{
		$productos = $this->builder('productos p');

		$select = trim($select);
		$productos->select('p.*, c.nombre as nombre_categoria');
		if (!empty($where)) {
			$productos->where($where);
		} else {
			$productos->where("c.eliminado", false);
		}
		$productos->join("categorias c", 'p.categoria_id = c.id', 'left');
		return $productos->get()->getResultObject();
	}
	public function getProductosPaginate($where = [], $perPage = 10, $currentPage = 1)
	{
		// Crea la instancia del constructor de consultas
		$productos = $this->builder();

		// Aplica condiciones de filtro si se proporcionan, de lo contrario, filtra por eliminado = false
		// $this->applyWhereConditions($productos, $where);
		// $productos->where($where);

		// Obtiene el total de productos para calcular el número total de páginas
		$total_productos = $this->getTotalPaginasProductos($where);

		// Calcula el offset y obtiene los resultados paginados
		$offset = ($currentPage - 1) * $perPage;
		$data = [
			'data'           => $productos->where($where)->get($perPage, $offset)->getResultObject(),
			'total_productos' => $total_productos->total_productos,
			'total_paginas'   => (int) ceil($total_productos->total_productos / $perPage),
		];

		return $data;
	}

	protected function getTotalPaginasProductos($where = [])
	{
		// Crea la instancia del constructor de consultas
		$productos = $this->builder();

		// Configura la consulta para obtener el total de productos
		$productos->select('count(*) as total_productos');
		$this->applyWhereConditions($productos, $where);

		// Obtiene el resultado como objeto
		return $productos->get()->getRowObject();
	}

	// Método para aplicar condiciones WHERE comunes
	protected function applyWhereConditions($builder, $conditions)
	{
		if (!empty($conditions)) {
			$builder->where($conditions);
		} else {
			$builder->where('eliminado', false);
		}
	}



	public function getProductoWhere($where, $select = '')
	{ #select con where
		$producto = $this->db->table('productos');
		$select = trim($select);
		if (!empty($select)) {
			$producto->select($select);
		}
		if (!empty($where)) {
			$producto->where($where);
		}
		return $producto->get()->getRowObject();
	}
	public function updateProducto($data, $id)
	{
		$producto = $this->db->table('productos');
		$producto->set($data);
		$producto->where("id", $id);
		return $producto->update();
	}
	public function getProducto($id)
	{
		$producto = $this->db->table('productos');
		$producto->where("id", $id);
		return $producto->get()->getRowObject();
	}

	public function insertProducto($data)
	{
		$producto = $this->db->table('productos');
		$insert = $producto->insert($data);
		if ($insert) {
			return $insert;
		} else {
			return false;
		}
	}
	public function deleteProducto($data, $id)
	{
		$producto = $this->db->table('productos');
		$producto->set($data);
		$producto->where("id", $id);
		return $producto->update();
	}
}
