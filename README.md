# API Teste - Laravel + Swagger

## Descrição

Esta é uma API RESTful desenvolvida em Laravel para gerenciar usuários e endpoints auxiliares.  
A documentação da API está disponível via Swagger (OpenAPI), permitindo fácil visualização e testes interativos.

---

## Funcionalidades

- Listar usuários  
- Criar novo usuário  
- Consultar usuário por ID  
- Atualizar usuário  
- Remover usuário  
- Endpoints auxiliares para health check e dados externos

---

## Tecnologias

- PHP 8.x  
- Laravel Framework  
- Swagger OpenAPI (via [L5-Swagger](https://github.com/DarkaOnLine/L5-Swagger))  
- MySQL  
- Docker

---

## Como usar

1. Clone o repositório.
2. Duplicar o arquivo ".env.examplo" dentro do projeto "api" e renomear para ".env". Em seguida, adicionar as informações de banco de dados. No Docker compose, apenas para testes, foi feita uma imagem do mysql com as seguintes credenciais:
```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=secret
NODE_MICROSERVICE_URL=http://localhost:3000
```
4. Certifique-se de que o Docker está instalado em sua máquina.  
5. Execute o comando abaixo para subir o ambiente:  

   ```bash
   docker compose up -d --build
6. Após o build e os containers estarem rodando, acesse a documentação Swagger em: (http://localhost:8000/api/documentation)
