# E-Commerce PHP Project 🛒💻

Este é o meu **primeiro projeto real** de E-Commerce, desenvolvido enquanto eu estava aprendendo PHP, MySQL, HTML/CSS e JavaScript. Durante o desenvolvimento, fui adquirindo mais conhecimentos e aplicando-os para criar um sistema funcional de vendas online. Este projeto é **open source**, então todos têm a liberdade de criticar, comentar e aprimorar o que eu criei. Desde já, agradeço muito a todos que contribuírem ou darem feedback!

## Funcionalidades 🚀

### 1. **Registro de Usuário** 📝
   - Os usuários podem se registrar com um **email** e **senha**.
   - A senha é criptografada utilizando **password_hash** para garantir maior segurança.
   - O sistema verifica se o **email** já está registrado para evitar duplicidades.

### 2. **Login de Usuário** 🔑
   - Após o registro, o usuário pode fazer login com seu **email** e **senha**.
   - A senha é verificada com **password_verify** para autenticação segura.
   - Se as credenciais estiverem corretas, o usuário é redirecionado para a página do usuário (**user.php**).

### 3. **Carrinho de Compras** 🛍️
   - O usuário pode adicionar produtos ao **carrinho** diretamente da página de exibição de produtos (**user.php**).
   - A quantidade de produtos no carrinho é mantida enquanto o usuário estiver logado.
   - Funcionalidade de **remover itens do carrinho**.
   - Mesmo que o usuário saia, os produtos permanecem no carrinho até o login novamente.

### 4. **Exibição de Produtos** 🏷️
   - Os produtos são recuperados de um banco de dados **MySQL** e exibidos na página do usuário.
   - Cada produto tem um **nome**, **preço**, **descrição**, **imagem** e **tipo de imagem**.
   - Os usuários podem visualizar a lista de produtos cadastrados e adicioná-los ao carrinho.

### 5. **Página de Admin** 👨‍💻
   - O **administrador** pode acessar uma página dedicada de administração onde pode **registrar novos produtos** para a loja.
   - O admin pode inserir **nome**, **descrição**, **preço**, **imagem** e **tipo de imagem** dos produtos.
   - Os produtos registrados são automaticamente **salvos no banco de dados** e **renderizados dinamicamente** na página do usuário logado (**user.php**).
   - Essa página oferece ao admin total controle sobre os produtos disponíveis na loja, garantindo que o catálogo esteja sempre atualizado.

### 6. **Banco de Dados** 💾
   - A plataforma utiliza um banco de dados **MySQL** com tabelas para usuários, produtos e carrinho de compras.
   - Relacionamento entre produtos e usuários para garantir que cada carrinho seja associado ao usuário correto.

## Como Rodar o Projeto ⚙️

### 1. **Requisitos** 🔧
   - **PHP** versão 7 ou superior
   - **MySQL**
   - **Apache** (ou servidor web compatível)
   - **XAMPP** ou **MAMP** recomendado para ambiente local

### 2. **Instalação** 🛠️
   - Clone o repositório:
     ```bash
     git clone https://github.com/seu-repositorio/loja-virtual-com-php.git
     ```
   - Coloque o projeto na pasta `htdocs` (se estiver usando XAMPP) ou na pasta equivalente de seu servidor web.
   - Importe o banco de dados **bancodedadosdoecommerce** no MySQL.
   - Configure as credenciais de conexão com o banco de dados no arquivo de conexão.

### 3. **Uso** 📱
   - Acesse o **login.php** para fazer login ou se registrar.
   - Após o login, o usuário será redirecionado para **user.php** onde poderá adicionar produtos ao carrinho.
   - O carrinho pode ser acessado a qualquer momento através do link na página do usuário.
   - O usuário pode adicionar, visualizar e remover itens do carrinho.

### 4. **Administração de Produtos** 🔧
   - O administrador pode acessar a página **produtos.php** para adicionar novos produtos à loja.
   - Na página do admin, é possível registrar novos produtos com nome, preço, descrição e imagem.
   - Os produtos cadastrados pelo admin são exibidos automaticamente na página do usuário **user.php** após o login.

## Estrutura do Banco de Dados 🗄️

- **Tabela `usuarios`**:
  - `id` (int)
  - `nome` (varchar)
  - `email` (varchar, único)
  - `senha` (varchar)

- **Tabela `produtos`**:
  - `id` (int)
  - `nome` (varchar)
  - `descricao` (text)
  - `preco` (float)
  - `imagem` (longblob)
  - `tipo_imagem` (varchar)

- **Tabela `carrinho`**:
  - `id` (int)
  - `usuario_id` (int, foreign key para `usuarios`)
  - `produto_id` (int, foreign key para `produtos`)
  - `quantidade` (int)

## Tecnologias Utilizadas 💻

- **PHP**: Backend e lógica do sistema
- **MySQL**: Banco de dados para armazenar usuários, produtos e carrinho
- **HTML/CSS**: Estrutura e estilo das páginas
- **Bootstrap**: Framework de front-end para facilitar o design responsivo

## Possíveis Melhorias Futuras 🚧

- Implementação de **checkout** e **pagamento** 💳.
- Aumento de funcionalidades como **categorias de produtos** e **filtros** 🔍.
- Adição de **comentários e avaliações de produtos** pelos usuários ⭐.

## Contribuições 🤝

Sinta-se à vontade para contribuir com melhorias! Abra um **pull request** ou envie uma **issue** para discutir novas funcionalidades ou correções de bugs.

## Licença 📜

Este projeto é de código aberto e está licenciado sob a licença **MIT**.
