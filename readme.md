### Overview

O Projeto desenvolvido fornece ao usuário uma interface onde o mesmo conseguirá gerenciar o conteúdo da sua aplicação, tendo total controle do que foi inserido, criações, edições, exclusões e etc. Além de uma HomePage para a consulta do conteúdo .
Existem alguns Painéis administrativos para utilização em Laravel, porém, acredito que não fosse o intuito dessa aplicação utilizar algo já pronto, fiz a utilização do pacote  jeroennoten/laravel-adminlte que apenas forneceram assets ( CSS, JS) para ficar com um visual mais conhecido já que o AdminLTE é um painel bastante utilizado.


### Features

- **Acesso ao Painel** :
	Ao realizar o Login usuários do tipo 'Manager' já serão redirecionados automaticamentes ao painel, porém, através da HomePage também consegue-se ter acesso ao mesmo :
![](https://i.ibb.co/njJHZ46/painel-acesso.png)


- **Painel Administrativo** : Para o funcionamento do Painel, priorizei duas coisas, uma delas o isolamento deste painel sobre a HomePage para isso foram utilizados dois middlewares no laravel :

<pre>
Route::group(['prefix' => 'admin',  'middleware' => ['role.verify', 'auth']], function () {

    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');

    Route::resource('authors', 'AuthorsController');

    Route::resource('books', 'BooksController');

    Route::resource('publishingcompany', 'PublishingCompanyController');

    Route::resource('users-roles', 'UsersRolesController');

    Route::resource('banners', 'BannersController');

});
</pre>

O middleware de autentição nativa devido à necessidade de possibilitar apenas à usuarios logados fazerem a utilização do Painel e também um middleware que eu criei 'RoleVerify' visando a necessidade de permitir à apenas usuários
gerenciadores do sistema fazerem a utilização do mesmo.

<pre>
	 public function handle($request, Closure $next)
    {
      
        if(Auth::user()->authorizeRoles(['manager'])){
            return $next($request);
        }
        
    }
</pre>

O seu código é bem simples apenas faz a utilização do Model User para verificar se o usuário que requisitou à pagina é pertencente à algum grupo de gerenciadores.

![](https://i.ibb.co/3cgM5BJ/modulos.png)
**Image do Painel de Livros Cadastrados, e os módulos à  Esquerda.**



Das requisições feitas para esta aplicação separei o projeto em Módulos, onde o usuário poderia adicionar os Livros, Autores e Editoras.

Além de poder Gerenciar as Permissões de usuários já existentes com o intuito de fornecer ou não acesso à esse Painel

E o gerenciamento de Banners é apenas uma feature a mais para adicionar banners na visualização da home Page.

-**Requisições de Formulários** :
Visando a proteção das aplicações todas as requisições que necessitavam de INSERT/UPDATE no banco de dados utilizaram as requests para fazer a validação do conteúdo da mesma, sendo assim, trazendo mais autenticidade e não permitindo a inserção de quaisquer itens.

<pre>
	    public function rules()
    {
        return [
            'book_name' => 'required|string',
            'page_count' => 'required|integer|min:1',
            'authors' => 'required|array|min:1|exists:author,id',
            'publishing_company' => ['required', 'string', 'exists:publishing_company,id'],
            'book_img' => 'sometimes|image|max:2048'
            //
        ];
    }
</pre>

A imgem acima demonstra a validação utilizada para o cadastro de Livros.

 **Modelos** :  
 A aplicação foi baseada na utilização de modelos do ELOQUENT ORM, garantindo uma estrutura orientada à objetos a um banco de dados relacional, que no caso foi o MySQL.

<pre>
	    public function authors()
    {       
        return $this->belongsToMany('App\Authors', 'books_has_authors', 'book_id', 'author_id')->withTimestamps();
    }
</pre>

O trecho acima é a demonstração do relacionamento muitos para muitos, utilizandos para relacionar Livros x Autores que o Eloquent nos permite fazer.

 **Imagens**:  

Fiz a utilização de um pacote chamado 'intervention/image' para a manipulação das imagens tanto na seção de Livros, quanto na sessão de Banners, onde se fazia necessàrio o redimensionamento dos itens fornecidos pelo usuário

**HomePage:**

A HomePage teve como principal motivação o desenvolvimento de um layout responsivo que permitisse o usuário fazer à utilização do mesmo em qualquer dispositivo, utilizei o sistem de GRID do Bootsrap para realizar essas ações :

![Visualização Mobile da HomePage](https://i.ibb.co/5jYjr6Z/mob-view.png "Visualização Mobile da HomePage")


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
