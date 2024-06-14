#### Dependências

Verifique se você tem instalado:

-   Git
-   Docker
-   NodeJs e NPM atualizados
-   Composer atualizado

#### Portas

Verifique se as portas 80 e 3306 estão livres. Caso contrário, o docker n poderá fazer bind dessas portas e o acesso á aplicação será inviabilizado.

### Clone o projeto:

```
git clone https://github.com/Alysson-Rodrigues/softsul-technical-test.git
```

Entre na raiz do projeto rodando `cd softsul-technical-test`

### Copie o arquivo .env

```
cp .env.example .env
```

### Instale as dependências do projeto

```
composer install && npm i
```

#### Rode o script de inicialização

```
npm run deploy
```

Isso deverá inicializar os containers da aplicação e do banco de dados com as credenciais localizadas no .env, além de rodar as migrações e iniciar o servidor de desenvolvimento.

##### Atenção!

O comando npm run deploy não deve ser usado pra posteriores inicializações usando esse mesmo banco de dados. Para iniciar os containers depois, use `npm run dev`

#### Pronto!

Basta abrir o navegador no [localhost](http://localhost/)
