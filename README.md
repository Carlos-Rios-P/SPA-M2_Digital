## Desafio M2 Digital
- Montar uma api RESTful com laravel para alimentar uma SPA com as seguintes funções:
    - Cadastrar/Editar/Listar/Excluir cidades;
    - Cadastrar/Editar/Listar/Excluir grupo de cidades;
    - Cadastrar/Editar/Listar/Excluir campanhas para o grupo de cidades onde cada grupo possui somente uma campanha ativa;
    - Cadastrar/Editar/Listar/Excluir desconto para os produtos da campanha;
    - Cadastrar/Editar/Listar/Excluir produtos;
- As tabelas de relacionamento estão a cargo do candidato;
- Cada cidade possui somente um grupo;

## Desenvolvimento

Após a configuração do .env será necessário rodar no terminal:
```http
php artisan migrate
```
E logo após
```http
php artisan serve
```
## GROUP - grupo de cidades
- Routes:
    - [<b>GET</b>] api/group        -> Lista todos grupos de cidades.
    - [<b>POST</b>] api/group       -> Salva no banco de dados um novo cadastro de grupo de cidades.
    - [<b>GET</b>] api/group/{id}   -> Lista os dados de um determinado grupo de cidades cujo id foi passado na rota.
    - [<b>PUT</b>] api/group/{id}   -> Altera os dados de um determinado grupo de cidades cujo id foi passado na rota.
    - [<b>DELETE</b>] api/group/{id}-> Exclui todos os dados de um determinado grupo de cidades cujo id foi passado na rota.

## CITY - cidades
- Routes:
    - [<b>GET</b>] api/city        -> Lista todas cidades.
    - [<b>POST</b>] api/group/{group_id}/city   -> Salva no banco de dados um novo cadastro de cidade com a chave estrangeira 'group_id' passado como paramento na rota.
    - [<b>GET</b>] api/city/{id}   -> Lista os dados de uma determinada cidades cujo id foi passado na rota.
    - [<b>PUT</b>] api/city/{id}   -> Altera os dados de uma cidade cujo id foi passado na rota.
    - [<b>DELETE</b>] api/city/{id}-> Exclui todos os dados de uma cidades cujo id foi passado na rota.

## CAMPAIGN - campanha
- Routes:
    - [<b>GET</b>] api/campaign        -> Lista todas campanhas.
    - [<b>POST</b>] api/group/{group_id}/campaign   -> Salva no banco de dados um novo cadastro de camapanha com a chave estrangeira 'group_id' passado como paramento na rota.
    - [<b>GET</b>] api/campaign/{id}   -> Lista os dados de uma determinada campanha cujo id foi passado na rota.
    - [<b>PUT</b>] api/campaign/{id}   -> Altera os dados de uma campanha cujo id foi passado na rota.
    - [<b>DELETE</b>] api/campaign/{id}-> Exclui todos os dados de uma campanha cujo id foi passado na rota.

## PRODUCT - produto
- Routes:
    - [<b>GET</b>] api/product        -> Lista todos produtos.
    - [<b>POST</b>] api/campaign/{campaign_id}/product   -> Salva no banco de dados um novo cadastro de produto com a chave estrangeira 'campaign_id' passado como paramento na rota.
    - [<b>GET</b>] api/product/{id}   -> Lista os dados de um determinado produto cujo id foi passado na rota.
    - [<b>PUT</b>] api/product/{id}   -> Altera os dados de um produto cujo id foi passado na rota.
    - [<b>DELETE</b>] api/product/{id}-> Exclui todos os dados de um produto cujo id foi passado na rota.

## DISCOUNT - desconto
- Routes:
    - [<b>GET</b>] api/discount        -> Lista todos descontos.
    - [<b>POST</b>] api/product/{product_id}/discount   -> Salva no banco de dados um novo cadastro de desconto com a chave estrangeira 'product_id' passado como paramento na rota.
    - [<b>GET</b>] api/discount/{id}   -> Lista os dados de um desconto produto cujo id foi passado na rota.
    - [<b>PUT</b>] api/discount/{id}   -> Altera os dados de um desconto cujo id foi passado na rota.
    - [<b>DELETE</b>] api/discount/{id}-> Exclui todos os dados de um desconto cujo id foi passado na rota.
