
Instruções para utilizar o projeto
-------------
1.  Clone o Repositório do Projeto

1.  Vá até o diretorio da aplicação utilizando o cmd ou terminal e digite :
```
composer install
```
1.  Copie o arquivo .env.example para o .env, se estiver usando o prompt do Windows pode utilizar o comando:

```
copy .env.example .env
```
Caso esteja utilizando um terminal linux :

```
cp .env.example .env
```

Abre o arquivo .env e troque o nome do banco de dados `DB_DATABASE` para algum que você tenha criado, o `DB_USERNAME`  e também o `DB_PASSWORD`  também correspondem à sua configuração.

Após isso, no terminal digite :

```
php artisan key:generate
```
Depois :
```
php artisan migrate:refresh --seed
```

Após isso rodar o comando para iniciar o servidor da aplicação :
```
php artisan serve
```

Após os seed subirem dois usuários padrões serão gerados:

`Email : visualizador@example.com, Senha : Secret` 

`Email : manager@example.com, Senha : Secret` 
