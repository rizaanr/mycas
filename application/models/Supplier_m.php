<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_m extends CI_Model {

    public function get($id = null)
    {
        $this->db->from('supplier');
        if($id != null) {
            $this->db->where('supplier_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    
    public function edit($post)
    {
        $params = [
            'name' => $post['supp_name'],
            'address' => $post['address'],
            'telp' => $post['telp'],
            'desk' => empty($post['desk']) ? null : $post['desk'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('supplier_id', $post['id']);
        $this->db->update('supplier', $params);
    }

    public function del($id)
	{
        $this->db->where('supplier_id', $id);
        $this->db->delete('supplier');
    }

    public function add($post)
    {
        $params = [
            'name' => $post['supp_name'],
            'address' => $post['address'],
            'telp' => $post['telp'],
            'desk' => empty($post['desk']) ? null : $post['desk'],
        ];
        $this->db->insert('supplier', $params);
    }
}