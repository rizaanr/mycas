<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_m extends CI_Model {

    public function get($id = null)
    {
        $this->db->select('p_item.*, p_category.name as category_name, p_unit.name as unit_name');
        $this->db->from('p_item');
        $this->db->join('p_category', 'p_category.category_id = p_item.category_id');
        $this->db->join('p_unit', 'p_unit.unit_id = p_item.unit_id');
        if($id != null) {
            $this->db->where('item_id', $id);
        }
        $this->db->order_by('barcode', 'asc');
        $query = $this->db->get();
        return $query;
    }
    
    public function edit($post)
    {
        $params = [
            'name' => $post['product-name'],
            'barcode' => $post['barcode'],
            'price' => $post['price'],
            'category_id' => $post['category'],
            'unit_id' => $post['unit'],
            'updated' => date('Y-m-d H:i:s')
        ];
        if ($post['image'] != null) {
            $params['images'] = $post['image'];
        }
        $this->db->where('item_id', $post['id']);
        $this->db->update('p_item', $params);
    }

    public function del($id)
	{
        $this->db->where('item_id', $id);
        $this->db->delete('p_item');
    }

    public function add($post)
    {
        $params = [
            'name' => $post['product-name'],
            'barcode' => $post['barcode'],
            'price' => $post['price'],
            'category_id' => $post['category'],
            'unit_id' => $post['unit'],
            'images' => $post['image'],
        ];
        $this->db->insert('p_item', $params);
    }

    public function check_barcode($code, $id = null)
    {
        $this->db->from('p_item');
        $this->db->where('barcode', $code);
        if ($id != null) {
            $this->db->where('item_id !=', $id);
        }
        $query = $this->db->get();
        return $query;

    }
}