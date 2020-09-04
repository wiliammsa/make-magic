# Faça a magia - Desafio de backend

## Setup

* Instalar o docker conforme o sistema operacional: `https://docs.docker.com/engine/install`
* Instalar o docker-compose: `https://docs.docker.com/compose/install`
* Após as instalações acima e clonar o repositório, acesse a pasta do projeto e execute:
```
docker-compose up -d
```
* Instale as dependências com o seguinte comando:
```
docker exec make_magic_backend sh -c 'composer install'
```
* Gere a APP_KEY 
```
docker exec make_magic_backend sh -c 'php artisan key:generate'
```