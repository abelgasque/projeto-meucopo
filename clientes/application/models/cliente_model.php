<?php 
class Cliente_model extends CI_Model{

    function getAll() {
        $this->db->order_by('nome', 'ASC');
        $query = $this->db->get('clientes');
        if($query->num_rows() > 0){
            return $query->result();
        }    
    }

    function adicionarCliente($cliente) {
        $this->db->insert('clientes', $cliente);
        if($this->db->affected_rows() > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    function getByIdCliente($id) {
        if($id != null) {
            $this->db->where('id', $id);
            $this->db->limit(1);
            $query = $this->db->get('clientes');
            return $query->row();
        }
    }

    function editarCliente($cliente, $id){
        if($cliente != null && $id != null){
            $validarCliente = $this->getByIdCliente($id);
            if($validarCliente != null){
                $this->db->update('clientes',$cliente,array('id'=>$id));  
            }  
        } 
    }
    
    function deleteByIdCliente($id) {
        if($id != null){
            $validarCliente = $this->getByIdCliente($id);
            if($validarCliente != null){
                $this->db->where('id', $id);
                $this->db->delete('clientes');
            }
        }
    }
}