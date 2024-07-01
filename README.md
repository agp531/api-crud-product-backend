<p><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

Projeto realizado com: PHP 8.2 + Laravel 10

Projeto CRUD de Produtos via API

Para testar: Tenha certeza de ter o docker instalado. o meu está na versão = Docker version 24.0.5

```@1``` Para começar, clone o repositorio: ```git@github.com:agp531/api-crud-product-backend.git```

```@2``` entre na pasta do projeto e execute o comando: ```docker-compose up -d ``` (Isso fará com que monte todas os containers necessarios para sua aplicação! talvez demore um tempinho)

```@3``` Após finalizar o dockerfile, ainda na sua pasta raiz do projeto, execute o script com o comando: ```sudo chmod +x script.sh && ./script.sh``` (Esse comando ira copiar sua .env.example para .env, colocara as keys do mysql correta e executara os comandos basicos para rodar a aplicação)

```@4``` Talvez sejá necessario clicar em Yes para criar seu banco automaticamente. em seguida ira migrar as tabelas e seedia-las.

```@5``` Após isso o projeto está pronto para ser consumido via API.

```@6``` Vá para o repositorio do FRONTEND e siga as instruções de instalação: https://github.com/agp531/api-crud-product-frontend


```#ROTAS DECLARADAS COM API RESOURCE.```

* GET 127.0.0.1/api/products -> (Index) Will list data on all the products in the database;
* GET 127.0.0.1/api/products/{id} -> (Show) Will list the data for a specific product;
* POST 127.0.0.1/api/products/ -> (Store) Create a product in the database with the values from the body;
* PUT 127.0.0.1/api/products/{id} -> (Update) Updates the data of a specific product;
* DELETE 127.0.0.1/api/products/{id} -> (Destroy) Deletes the product with the specific id from the database;

* POST 127.0.0.1/api/uploadFile/{id} -> (Store) After create a product, get id of product and store the image of that product.
Campos para testar via POSTMAN
```
{
    "name": "Allan",
    "description": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
        scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into ",
    "stock": 25,
    "price": 27.99,
    "photo": ""
}
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
# api-crud-product-backend
