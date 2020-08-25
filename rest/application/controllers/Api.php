<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Api extends RestController {

    function __construct() {
        parent::__construct();
        $this->load->model('cliente_model');   
    }

    public function clientes_post() {   
        $cliente = [
            'id' => 0,
            'nome' => $this->post('nome'),
            'email' => $this->post('email'),
            'telefone' => $this->post('telefone')
        ];
        $resp = $this->cliente_model->insertCliente($cliente);
        if($resp === true){
            $this->set_response("Cliente criado com sucesso", 200);
        }else{
            $this->set_response("Erro ao criar cliente", 400);
        }
    } 

    public function clientes_put() {   
        $id = $this->uri->segment(3);
        $data = array(
            'nome' => $this->input->get('nome'),
            'email' => $this->input->get('email'),
            'telefone' => $this->input->get('telefone')
        );
        $resp = $this->cliente_model->updateCliente($id, $data);
        if($resp === true) {
            $this->response("Cliente alterado com sucesso", 200 );
        }else {
            $this->response([
                'status' => false,
                'message' => 'Erro ao alterar cliente'
            ], 400);
        }
    }

    public function clientes_delete() {   
        $id = $this->uri->segment(3);
        if($id <= 0) {
            $this->response(null, 400);
        }

        $resp = $this->cliente_model->deleteByIdCliente($id);
        if($resp === true){
            $this->response("Cliente deletado com sucesso", 204);
        }else{
            $this->response([
                'status' => false,
                'message' => 'Erro ao deletar cliente'
            ], 400);
        }
    } 

    public function clientes_get() {
        $clientes = $this->cliente_model->getAllClientes();
        $id = $this->uri->segment(3);
        if ($id === null) {
            if ($clientes) {
                $this->response($clientes, 200);
            }
            else {
                $this->response([
                    'status' => false,
                    'message' => 'Sem clientes para listar'
                ], 404 );
            }
        } else {
            $lista = $this->cliente_model->getByIdCliente($id);
            if($lista != []) {
                $this->response($lista, 200);   
            }else {
                $this->response([
                    'status'=>false,
                    'message'=>'Cliente não existe'
                ],404);
            }
        }
    }
}