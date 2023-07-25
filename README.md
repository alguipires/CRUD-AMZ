# Crud AMZ
## A aplicação é um CRUD de Usuário, onde pode cadastrar usuários, editar, excluir, fazer login e logout. 
Foi feita utilizando:
- Framework Codeigniter 4, php 7.4, 
- Filtro de autenticação
- Grupo de autenticação
- Herança de template
- Templates Bootstrap
- Docker
- Mysql
- Api de busca de cep [VIACEP](https://viacep.com.br/)

## Requisitos para iniciar a aplicação 
Ter as seguintes ferramentas instaladas em seu computador:

- [Docker e Docker compose](https://docs.docker.com/desktop/install/linux-install/)
- [Php](https://www.php.net/) 
- [Composer](https://getcomposer.org/download/)
- (opcional) [Uma ferramenta de manipulação do banco ex. Dbeaver](https://dbeaver.io/download/)

## Passos para iniciar a aplicação
Na raiz do projeto encontrará o arquivo `env` (contém as configurações do projeto), renomeie para `.env` e insira as configurações a seguir...

```
CI_ENVIRONMENT = development
app.baseURL = 'http://localhost:8000/'
database.default.hostname = (IP CONTAINER DB)
database.default.database = crud
database.default.username = root
database.default.password = abc123
database.default.DBDriver = MySQLi
database.default.port = 3306
```

## Entrar na pasta raiz do projeto via terminal para rodar comandos de inicialização das migrates, seeders, dependências e contêineres.
Comandos para inicialização.
- `php composer install`
- `docker build --build-arg USER_ID=$(id -u) --build-arg GROUP_ID+$(id -g) .`
- `docker compose up -d`
- `php spark migrate`
- `php spark db:seed User`

## Pronto para iniciar em `http://localhost:8000/`
Para o login, usuário `admin@admin.com` e senha `admin`

## Trabalhos futuros
- Autenticação com codeigniter shield
- Responsividade
- Paginação