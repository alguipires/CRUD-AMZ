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
- Lib [FaKerPHP](https://fakerphp.github.io/)

## Requisitos para iniciar a aplicação 
Ter as seguintes ferramentas instaladas em seu computador:

- [Docker e Docker compose](https://docs.docker.com/desktop/install/linux-install/)
- [Php](https://www.php.net/) 
- [Composer](https://getcomposer.org/download/)
- (opcional) [Uma ferramenta de manipulação do banco ex. Dbeaver](https://dbeaver.io/download/)

# Passos para iniciar a aplicação

## Entrar na pasta raiz do projeto via terminal para rodar comandos de inicialização das migrates, seeders, dependências e contêineres.
Comandos para inicialização...

- `composer install`
- `docker build --build-arg USER_ID=$(id -u) --build-arg GROUP_ID+$(id -g) .`
- `docker compose up -d`
- Necessário inspecionar o container "db" para pegar o ip local, rode o comando `docker container inspect db`, repare no resultado gerado no terminal, pegue endereço ip como ex: `"IPAddress": "172.20.0.2"`
- Na raiz do projeto encontrará o arquivo `env` (contém as configurações do projeto), renomeie para `.env` e insira as configurações a seguir...

```
CI_ENVIRONMENT = development
app.baseURL = 'http://localhost:8000/'
database.default.hostname = (172.20.0.2 - EX: IP CONTAINER DB)
database.default.database = crud
database.default.username = root
database.default.password = abc123
database.default.DBDriver = MySQLi
database.default.port = 3306
```

- `php spark migrate`
- `php spark db:seed User`

## Pronto para iniciar em `http://localhost:8000/`
Para o login, usuário `admin@admin.com` e senha `admin`

(Opcional)
Para inspecionar os contêineres..
acessar container bd 
`docker container exec -it db mysql -u root -p`
acessar bash web
`docker container exec -it web bash`

## Trabalhos futuros
- Autenticação com codeigniter shield
- Responsividade
- Paginação
- Testes e container teste Selenium