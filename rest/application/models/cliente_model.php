<?php 
class Cliente_model extends CI_Model{

    function getAllClientes() {
        $query = $this->db->query("SELECT * FROM `clientes` ORDER BY `nome` ASC");
        return $query->result_array();
    }

    function insertCliente($cliente) {
        $this->db->insert('clientes', $cliente);
        if($this->db->affected_rows() > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    function getByIdCliente($id) {
        $this->db->where('id', $id);
        $data = $this->db->get('clientes');
        return $data->result_array();
    }

    function updateCliente($id, $data) {
        $this->db->where('id', $id);
        $buscarCliente = $this->db->get('clientes');
        if($buscarCliente->result_array() != []){
            $this->nome = $data['nome'];
            $this->email  = $data['email'];
            $this->telefone = $data['telefone'];
            $this->db->update('clientes',$this,array('id' => $id));
            return true;
        }else{
            return false;
        }
        
    }
    
    function deleteByIdCliente($id) {
        $this->db->where('id', $id);
        $this->db->delete('clientes');
        if($this->db->affected_rows() > 0) {
            return true;
        }
        else {
            return false;
        }
    }
}