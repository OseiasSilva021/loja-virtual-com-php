# 🛍️ Loja Virtual com PHP 🌐

## 📝 Descrição do Projeto

Este é um projeto de uma loja virtual simples desenvolvida em PHP, utilizando Docker para criar um ambiente de desenvolvimento isolado com Apache, PHP e MySQL. 🚀 O objetivo do projeto é simular o funcionamento de uma loja online, com funcionalidades essenciais para uma experiência de compra completa! 🛒

## 🗂️ Estrutura do Projeto

```
loja-virtual-com-php/
│
├── docker-compose.yml     # 🐳 Configuração do Docker Compose
├── Dockerfile             # 🐋 Configuração do Docker para container PHP
└── novo_projeto/          # 🌐 Diretório do projeto web
    ├── css/               # 🎨 Arquivos de estilo CSS
    ├── includes/          # 📁 Arquivos PHP de inclusão
    ├── adicionar_carrinho.php    # 🛒 Adicionar produtos ao carrinho
    ├── autenticacao.php          # 🔐 Lógica de autenticação
    ├── carrinho.php              # 🛍️ Página do carrinho
    ├── conexao.php               # 💾 Conexão com banco de dados
    ├── index.php                 # 🏠 Página principal
    ├── login.php                 # 🔑 Página de login
    ├── logout.php                # 🚪 Página de logout
    ├── produtos.php              # 📦 Exibição de produtos
    ├── README.md                 # 📄 Documentação do projeto
    ├── registrar.php             # 📝 Registro de usuários
    ├── remover_carrinho.php      # ❌ Remover produtos do carrinho
    └── user.php                  # 👤 Gestão de usuário
```

## 🛠️ Tecnologias Utilizadas

- **PHP** 🐘: Linguagem de programação para o backend
- **MySQL** 🗄️: Banco de dados para armazenar informações
- **Docker** 🐳: Criação de containers de desenvolvimento
- **Apache** 🌐: Servidor web para aplicação PHP
- **CSS** 🎨: Estilização da interface

## 🚀 Como Rodar o Projeto

### 📋 Pré-requisitos

- Docker 🐳
- Docker Compose 🐋

### 1️⃣ Clonar o Repositório

```bash
git clone <URL-do-repositório>
cd loja-virtual-com-php
```

### 2️⃣ Iniciar Containers

```bash
docker-compose up -d
```

### 3️⃣ Acessar o Projeto

🌐 Abra seu navegador em: `http://localhost:8000`

## ✨ Funcionalidades

- 🔐 **Login e Cadastro**
- 🛒 **Carrinho de Compras**
- 📦 **Visualização de Produtos**

## 💾 Banco de Dados

### 🔑 Credenciais

- **Usuário**: `root`
- **Senha**: `1234`
- **Banco de Dados**: `lojaphp`

### 🏗️ Criação do Banco de Dados

```bash
docker exec -it mysql_container_new mysql -u root -p
```

```sql
CREATE DATABASE lojaphp;
```

## 🤝 Contribuições

Adoraríamos suas contribuições! 🌟
- Abra issues
- Envie pull requests

## 📄 Licença

📋 Licenciado sob a MIT License. 

---

🚀 **Divirta-se construindo e explorando sua loja virtual!** 🛍️👨‍💻👩‍💻