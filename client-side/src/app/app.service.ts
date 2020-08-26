import { Injectable } from '@angular/core';
import { HttpClient, HttpParams, HttpHeaders } from '@angular/common/http';
import { Cliente } from './app.component';

@Injectable({
  providedIn: 'root'
})
export class AppService {

  constructor(private http: HttpClient) {}

  adicionarCliente(entidade: Cliente): Promise<any>{
    return this.http.post<any>(`/chamada`, entidade)
    .toPromise()
    .then(response => {
      return response;
    })
    .catch(erro => {
      return Promise.reject(erro);
    });
  }

  editarCliente(id: number, entidade: Cliente): Promise<any>{
    return this.http.put<any>(`/chamada/${id}/?nome=${entidade.nome}&email=${entidade.email}&telefone=${entidade.telefone}`, entidade)
    .toPromise()
    .then(response => {
      return response;
    })
    .catch(erro => {
      return Promise.reject(erro);
    });
  }

  deletarClienteById(id: number): Promise<any>{
    return this.http.delete(`/chamada/${id}`)
    .toPromise()
    .then(response => null);
  }

  getAllClients(): Promise<any> {
    return this.http.get<any>(`/chamada`)
    .toPromise()
    .then(response => response);
  }

  getClientById(id: number): Promise<any> {
    return this.http.get<any>(`/chamada/${id}`)
    .toPromise()
    .then(response => response);
  }
}
