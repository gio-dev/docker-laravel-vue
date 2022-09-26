# Docker - Laravel - Vue

Um projeto simples de Crud feito com Docker, Laravel 8 e VueJs.

## Ports

Ports used in the project:
| Software | Port | 

|-------------- | -------------- |

| **nginx** | 8080 |

| **phpmyadmin** | 8081 | 

| **mysql** | 3306 |

| **php** | 9000 |

## Modo de instalar

Para iniciar, tenha tanto o [Docker instalado](https://docs.docker.com/) quanto [Docker Compose](https://docs.docker.com/compose/install/) instalado em seu sistema e depois inicie os passos abaixo.

1. Clonar este projeto do Github:

   ```sh
   git clone https://github.com/gio-dev/docker-laravel-vue.git
   ```

2. Dentro da pasta `docker-laravel-vue` gere o seu `.env` para adicionar os necessários do projeto pelo docker compose:

   ```sh
   cd source 
   cp .env.example .env
   ```

3. Verifique e os dados de configurações do banco de dados no `docker-compose.yml` modificando caso necessário e adicione as informações no `.env` gerado no passo acima

 - docker-compose.yml
   ```sh
   MYSQL_DATABASE: admin
   MYSQL_USER: user
   MYSQL_PASSWORD: root
   MYSQL_ROOT_PASSWORD: secret
   ```
- .env
   ```sh
   DB_HOST=mysql
   DB_DATABASE=admin
   DB_USERNAME=user
   DB_PASSWORD=root
   ```

4. Banco configurado, o projeto já está pronto para iniciar o docker, executando o comando abaixo:

   ```sh
   docker-compose up --build
   ```

5. Após o docker subir, instale o composer e o NPM executando os comandos abaixo:

   ```sh
   docker-compose run --rm composer install
   docker-compose run --rm npm install
   ```

6. Composer e NPM instalados, agora é hora de executar o migrate e o seed com o comando abaixo:

   ```sh
   docker-compose run --rm artisan migrate --seed
   ```

7. Para finalizar com o Laravel, rode o comando para gerar a chave:

   ```sh
   docker-compose run --rm artisan key:generate
   ```
   
8. Por fim, rode o comando para criar a build do Vue:

   ```sh
   docker-compose run --rm npm run prod
   ```

9. Desfrute do teste rodando a URL [`localhost:8080`](http://localhost:8080)

---

## Lembre-se

A configuração do banco de dados **tem que ser a mesma que do docker-compose** .

```dotenv
# source/.env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=admin
DB_USERNAME=user
DB_PASSWORD=root
DB_ROOT_PASSWORD=secret
```

---

## Casos especiais

- Pode ocorrer um erro no MySQL ao rodar o `docker-compose up --build` caso você esteja com outro MySQL rodando na porta 3306 em seu sistema,
com isso desabilite no sistema ou a porta de entrada no arquivo `docker-compose.yml`, mais específicamente nas portas, onde mostra
`3306:3306`, trocando o primeiro número para outro, exemplo `33060:3306` 

- Para derrubar e remover os volumes dos container, rode o comando:

   ```sh
   docker-compose down -v
   ```

- Comandos do compoer sempre iniciam como abaixo:

   ```sh
   docker-compose run --rm composer [seu comando aqui]
   ```

- Comandos do NPM (Node) se iniciam com prefixo abaixo:

   ```sh
   docker-compose run --rm npm [seu comando aqui]
   ```

- Comandos do Artisan do Laravel se inicial om o prefixo abaixo:

   ```sh
   docker-compose run --rm artisan [seu comando aqui]
   ```
