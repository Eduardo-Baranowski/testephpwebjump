# [Intrução Para Utilização do Backend]

> Features:

- Criação de categorias
- Criação de produtos
- Logs e upload de imagens
- Listagem de produtos e categorias
- Associação de 1 ou muitas categorias por produto
- Versão 8.0 do PHP

# How to use it

```bash
$ # Get the code
$ git clone https://bitbucket.org/Baranowski25/assessment-backend-xp/src/master/
$
$ # Create BD
$ Para rodar o projeto pode ser utilizado o arquivo sql no diretório repositories para criar o banco.
$
$
$
$ # Start the application (development mode)
$ Alterar os dados do banco no arquivo conexao.php.
$ Após a criação do banco basta rodar em um servidor php qualquer para conferir as funcionalidades de cadastro de categoria e produto. Os arquivos addProduct.html e addCategory.html foram aproveitos. O arquivo addProduct.html foi renomeado para addProduct.php.
$
```



## Code-base structure

The project is coded using a simple and intuitive structure presented bellow:

```bash
< PROJECT ROOT >
   |
   |-- ASSESSMENT-BACKEND-XP/             # Arquivos da API
   |    |-- assets/                       # Iclusão dos arquivos do bd de produtos e categorias
   |         |                    
   |         |-- services/                # Serviços. Por exemplo, deleção e inserção.
   |    |-- repositories/                 # Arquivos de conexão ao banco.
   |    |-- database/                     # Arquivos sql para configuração do banco.
   |-- ************************************************************************
```

