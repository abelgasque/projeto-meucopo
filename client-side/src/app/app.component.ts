import { Component, OnInit } from '@angular/core';
import { AppService } from './app.service';
import { MessageService, ConfirmationService } from 'primeng/api';
import { NgForm } from '@angular/forms';

export class Cliente{
  id: number = 0;
  nome: string;
  email: string;
  telefone: string;
}

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit{
  
  title = 'Clientes';
  cliente = new Cliente();
  clientes: any[];
  display: boolean = false;
  titleDisplay: string;

  constructor(
    private appService: AppService,
    private messageService: MessageService,
    private confirmationService: ConfirmationService,
    ){}

  ngOnInit(): void {
    this.getAll();
  }

  novo(f: NgForm){
    this.cliente = new Cliente();
    f.resetForm();
    this.titleDisplay = "Adicionar";
    this.display = true;
  }
  
  getAll(){
    this.clientes = [];
    this.appService.getAllClients()
    .then(response =>{
      this.clientes = response;
    })
    .catch(error =>{
      console.log(error);
      this.showError("Problema ao listar cliente");
    });
  }

  getClientById(id: number){
    this.cliente = new Cliente();
    this.appService.getClientById(id)
    .then(response =>{
      if(response != null || response != []){
        this.titleDisplay = "Editar";
        this.cliente = response[0];
        this.display = true;
      }
    })
    .catch(error =>{
      console.log(error);
      this.showError("Problema ao buscar cliente");
    });
  }

  editarCliente(){
    this.appService.editarCliente(this.cliente.id, this.cliente)
    .then(response => {
      this.getAll();
      this.display = false;
      this.showSuccess("Cliente editado");
      console.log(response);
    })
    .catch(error => {
      console.log(error);
      this.showError("Problema ao editar cliente");
    });
  }

  adicionarCliente(){
    this.appService.adicionarCliente(this.cliente)
    .then(response => {
      this.getAll();
      this.display = false;
      this.showSuccess("Cliente adicionado");
      console.log(response);
    })
    .catch(error => {
      console.log(error);
      this.showError("Problema ao adicionar cliente");
    });
  }

  gerenciarPersistencia(){
    let aux = this.validarCliente(this.cliente);
    if(aux == 0){
      if(this.cliente.id > 0){
        this.editarCliente();
      }else{
        this.adicionarCliente();
      }
    }
  }

  validarCliente(cliente: Cliente){
    let aux: number = 0;
    if(cliente.nome == null || cliente.nome == undefined || cliente.nome == ''){
      this.showWarn("Campo nome é obrigatório");
      aux++;
    }
    if(cliente.email == null || cliente.email == undefined || cliente.email == ''){
      this.showWarn("Campo email é obrigatório");
      aux++;
    }
    if(cliente.telefone == null || cliente.telefone == undefined || cliente.telefone == ''){
      this.showWarn("Campo telefone é obrigatório");
      aux++;
    }
    return aux;
  }

  confirmarExclusao(id: number){
    this.confirmationService.confirm({message: 'Tem certeza que deseja excluir cliente?',
    accept: ()=>{
      this.deletarClienteById(id);
    }});
  }

  deletarClienteById(id: number){
    this.appService.deletarClienteById(id)
    .then(response => {
      this.showSuccess("Cliente deletado");
      this.getAll();
    })
    .catch(error =>{
      console.log(error);
      this.showError("Problema ao deletar cliente");
    });
  }

  showSuccess(msg: string) {
    this.messageService.add({severity:'success', summary: 'Sucesso', detail: msg });
  }

  showWarn(msg: string) {
    this.messageService.add({severity:'warn', summary: 'Aviso', detail: msg });
  }

  showError(msg: string) {
    this.messageService.add({severity:'error', summary: 'Erro', detail: msg });
  }
}
