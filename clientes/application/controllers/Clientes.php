<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {
	
	public function index() {
		$this->carregar();
	}

	public function carregar(){
		$this->load->model('cliente_model','clientes');
		$data['clientes'] = $this->clientes->getAll();
		$this->load->view('lista_cliente_view', $data);
	}

	public function add(){
		$this->load->model('cliente_model', 'clientes');
		$this->load->view('adicionar_cliente_view');
	}

	public function salvar($id){
		$this->load->model('cliente_model','clientes');
		$data['nome'] = $this->input->post('nome');
		$data['email'] = $this->input->post('email');
		$data['telefone'] = $this->input->post('telefone');
		
		if($this->input->post('id') != null){
			$resp = $this->clientes->editarCliente($data);
		}else{
			$resp = $this->clientes->adicionarCliente($data);
		}
		redirect("/");
	}

	public function editar($id){
		if($id!=null){
			$this->load->model('cliente_model','clientes');
			$query = $this->clientes->getByIdCliente($id);
			if($query!=null){
				$data['cliente'] = $query;
				$this->load->view('editar_cliente_view', $data);
			}
		}
	}
	
	public function deletar($id){
		if($id!=null){
			$this->load->model('cliente_model','clientes');
			$this->clientes->deleteByIdCliente($id);
			redirect("/");
		}
	}
}?>