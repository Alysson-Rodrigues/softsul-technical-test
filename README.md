## Dependências

Verifique se você tem instalado:

-   Git
-   Docker
-   NodeJs e NPM atualizados
-   Composer atualizado

## Portas

Verifique se as portas 80 e 3306 estão livres. Caso contrário, o docker n poderá fazer bind dessas portas e o acesso á aplicação será inviabilizado.

## Clone o projeto:

```
git clone https://github.com/Alysson-Rodrigues/softsul-technical-test.git
```

Entre na raiz do projeto rodando `cd softsul-technical-test`

## Copie o arquivo .env

```
cp .env.example .env
```

## Instale as dependências do projeto

```
composer install && npm i
```

## Rode o script de inicialização

```
npm run deploy
```

Isso deverá inicializar os containers da aplicação e do banco de dados com as credenciais localizadas no .env, além de rodar as migrações e iniciar o servidor de desenvolvimento.

##### Atenção!

O comando npm run deploy não deve ser usado pra posteriores inicializações usando esse mesmo banco de dados. Para iniciar os containers depois, use `npm run dev`

## Pronto!

Basta abrir o navegador no [localhost](http://localhost/)

# Endpoints da API:

## 1. Listar Todos os Pedidos (`index`)

-   **Método**: GET
-   **URL**: `/api/orders`
-   **Resposta Esperada**: Lista de todos os pedidos.
-   **Status de Sucesso**: 200 OK

## 2. Criar Novo Pedido (`store`)

-   **Método**: POST
-   **URL**: `/api/orders`
-   **Corpo da Requisição (JSON)**:
    ```json
    {
        "customer_name": "Nome do Cliente", // Obrigatório
        "delivery_date": "2023-06-14", // Opcional
        "status": 1 // Opcional, padrão: 0
    }
    ```
-   **Resposta Esperada**: Detalhes do pedido criado.
-   **Status de Sucesso**: 201 Created
-   **Erros Possíveis**:
    -   400 Bad Request: Se `customer_name` estiver ausente.
    -   500 Internal Server Error: Em caso de falha no salvamento do pedido.

## 3. Atualizar Pedido Existente (`update`)

-   **Método**: PATCH
-   **URL**: `/api/orders/{id}`
-   **Corpo da Requisição (JSON)**:
    ```json
    {
        "customer_name": "Nome do Cliente", // Opcional
        "delivery_date": "2023-06-20", // Opcional
        "status": 1 // Opcional
    }
    ```
-   **Resposta Esperada**: Detalhes do pedido atualizado.
-   **Status de Sucesso**: 202 Accepted
-   **Erros Possíveis**:
    -   404 Not Found: Se o pedido não for encontrado.
    -   500 Internal Server Error: Em caso de falha na atualização do pedido.

## 4. Deletar Pedido (`destroy`)

-   **Método**: DELETE
-   **URL**: `/api/orders/{id}`
-   **Resposta Esperada**: Mensagem de sucesso na deleção.
-   **Status de Sucesso**: 200 OK
-   **Erros Possíveis**:
    -   404 Not Found: Se o pedido não for encontrado.
    -   500 Internal Server Error: Em caso de falha na deleção do pedido.
