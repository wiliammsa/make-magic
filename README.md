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
* Gere a APP_KEY:
```
docker exec make_magic_backend sh -c 'php artisan key:generate'
```
* Rode as migrations com o comando:
```
docker exec make_magic_backend sh -c 'php artisan migrate'
```
* Acesse o site: `https://www.potterapi.com/`, clique em `Get a Key`, faça a inscrição, copie a chave gerada e atribua(cole) a variável de ambiente (no arquivo .env) POTTERAPI_ACCESS_KEY
* E enfim, os endpoints estarão acessíveis na url http://localhost:8080/api/v1 conforme a lista abaixo:
   * [GET] /characters
   * [GET] /characters/{id}
   * [POST] /characters
   * [PUT] /characters/{id}
   * [DELETE] /characters/{id}

## Teste
* Há somente o teste unitário de criação de personagem, para rodá-lo, basta executar o seguinte comando:
```
docker exec make_magic_backend sh -c './vendor/bin/phpunit tests/Feature/Http/Controllers/Api/v1/CharactersControllerTest.php'
```

## Pontos a melhorar
* Cobrir com testes todas as classes
* Implementar outras asserções no teste CharactersControllerTest, como por exemplo, alteração, deleção e consulta
* Abstrair os métodos do controller (De forma similar ao que foi feito com a abstração do repositório e a injeção de dependência)
* Configurar a documentar a api usando o Swagger
