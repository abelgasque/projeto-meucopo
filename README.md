Back-end:
O server-side foi feito com codeigniter com ajuda do framework composer
restserver para poder construir uma API REST com php.

Observação: Se tiver problemas com as chamadas vericar se BASE_URL está no dominio correto.

Documentação: https://github.com/chriskacerguis/codeigniter-restserver

Tabela criada no phpmyadmin:

CREATE TABLE clientes(
	id int AUTO_INCREMENT PRIMARY KEY, 
	nome VARCHAR(128) NOT NULL, 
	telefone VARCHAR(64) NOT NULL, 
	email VARCHAR(18) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

Front-end:

Na aplicação client-side foi contruida com Angular 10 para rodar localmente
e configurar proxy do nosso back-end precisará ter o Node.js e Angular CLI 
instalado global em sua maquina, após instalar os programas temos que entrar
no projeto client-side atravez prompt de instalar gerenciador de pacotes com
o seguinte comando "npm install" e em seguidas podemos rodar a aplicação 
localmente e configar proxy com o comando "npm run start". Aplicação esta 
rodando na seguinte url "http://localhost:4200";

Observações: 
Como o backend vai estar em um servidor temos que mudar o 
caminho da api com diretorio raiz do angular no arquivo "proxy.config.js"

De:


const PROXY_CONFIG = [
    {
        context: ['/chamada'],
        target : `http://localhost/rest/api/clientes`,
        secure: true,
        loglevel: 'debug',
        pathRewrite: { '^/chamada' : '' }

    }
];
module.exports = PROXY_CONFIG;

para:


const PROXY_CONFIG = [
    {
        context: ['/chamada'],
        target : `http://"Dominio do servidor"/rest/api/clientes`,
        secure: true,
        loglevel: 'debug',
        pathRewrite: { '^/chamada' : '' }

    }
];
module.exports = PROXY_CONFIG;
