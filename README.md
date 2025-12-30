# 🎯 Sistema de Gestão de RH

Sistema completo e moderno para gerenciamento de candidatos e empresas desenvolvido em PHP, HTML, CSS e JavaScript.

![PHP](https://img.shields.io/badge/PHP-7.4%2B-777BB4?style=flat&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-5.7%2B-4479A1?style=flat&logo=mysql&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=flat&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=flat&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=flat&logo=javascript&logoColor=black)

## 📋 Funcionalidades

### ✨ Funcionalidades Principais

- ✅ **CRUD Completo**
  - Cadastro de Candidatos
  - Cadastro de Empresas
  - Edição de registros
  - Exclusão de registros
  - Visualização detalhada

- 🔍 **Sistema de Busca**
  - Busca em tempo real
  - Filtro por nome, e-mail, cargo (candidatos)
  - Filtro por nome, CNPJ, e-mail (empresas)
  - Contador de resultados

- 📊 **Dashboard e Estatísticas**
  - Estatísticas em tempo real
  - Contador de candidatos e empresas
  - Interface moderna e intuitiva

- 🔒 **Validações e Segurança**
  - Validação de formulários
  - Proteção contra SQL Injection (PDO)
  - Sanitização de dados de saída
  - Validação de e-mail único
  - Máscaras de entrada (telefone, CNPJ)

## 🚀 Como Usar

### Pré-requisitos

- **PHP** 7.4 ou superior
- **MySQL/MariaDB** 5.7 ou superior
- Servidor web (Apache/Nginx) ou PHP built-in server
- Extensão **PDO MySQL** habilitada

### Instalação Rápida

1. **Clone ou baixe o projeto**

2. **Configure o banco de dados** no arquivo `conexao.php`:
   ```php
   $host = "localhost";
   $dbname = "sistema_rh";
   $username = "root";      // Seu usuário MySQL
   $password = "";          // Sua senha MySQL
   ```

3. **Execute o servidor PHP:**
   ```bash
   php -S localhost:8000
   ```
   
   Ou use o arquivo `start_server.bat` (Windows) - apenas dê dois cliques!

4. **Acesse no navegador:**
   ```
   http://localhost:8000
   ```

> **Nota:** O sistema cria automaticamente o banco de dados e as tabelas na primeira execução!

### Instalação com XAMPP/WAMP

1. **Copie a pasta do projeto para:**
   - XAMPP: `C:\xampp\htdocs\Carol`
   - WAMP: `C:\wamp\www\Carol`

2. **Inicie o Apache e MySQL no XAMPP/WAMP**

3. **Acesse no navegador:**
   ```
   http://localhost/Carol
   ```

## 📁 Estrutura do Projeto

```
SistemaRH/
├── index.html
├── candidato.php
├── empresa.php
├── dashboard.php
├── dashboard2.php
├── ver_candidato.php
├── ver_empresa.php
├── cadastro.php
├── cadastro2.php
├── editar_candidato.php
├── editar_empresa.php
├── deletar.php
├── deletar2.php
├── conexao.php
├── api_stats.php
├── style.css
├── script.js
├── teste_conexao.php
├── start_server.bat
├── INSTRUCOES.md
└── README.md
```

## 🔒 Segurança

- ✅ Proteção contra SQL Injection (usando PDO Prepared Statements)
- ✅ Sanitização de dados de saída (htmlspecialchars)
- ✅ Validação de tipos de dados
- ✅ Validação de e-mail único
- ✅ Confirmação antes de excluir registros


