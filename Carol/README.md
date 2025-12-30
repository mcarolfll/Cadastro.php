# Sistema de Gestão de RH

Sistema completo para gerenciamento de candidatos e empresas desenvolvido em PHP, HTML, CSS e JavaScript.

## 📋 Funcionalidades

- ✅ Cadastro de Candidatos
- ✅ Cadastro de Empresas
- ✅ Visualização de dados (Dashboard)
- ✅ Edição de registros
- ✅ Exclusão de registros
- ✅ Interface moderna e responsiva
- ✅ Estatísticas em tempo real

## 🚀 Como usar

### Pré-requisitos

- PHP 7.4 ou superior
- MySQL/MariaDB
- Servidor web (Apache/Nginx) ou PHP built-in server

### Instalação

1. Configure o banco de dados no arquivo `conexao.php`:
   ```php
   $host = "localhost";
   $dbname = "sistema_rh";
   $username = "root";
   $password = "";
   ```

2. Crie o banco de dados (opcional - será criado automaticamente):
   ```sql
   CREATE DATABASE sistema_rh;
   ```

3. Execute o projeto:
   ```bash
   php -S localhost:8000
   ```

4. Acesse no navegador:
   ```
   http://localhost:8000
   ```

## 📁 Estrutura do Projeto

- `index.html` - Página inicial
- `candidato.html` - Formulário de cadastro de candidatos
- `empresa.html` - Formulário de cadastro de empresas
- `dashboard.php` - Lista de candidatos
- `dashboard2.php` - Lista de empresas
- `cadastro.php` - Processa cadastro de candidatos
- `cadastro2.php` - Processa cadastro de empresas
- `editar_candidato.php` - Edição de candidatos
- `editar_empresa.php` - Edição de empresas
- `deletar.php` - Exclusão de candidatos
- `deletar2.php` - Exclusão de empresas
- `conexao.php` - Configuração do banco de dados
- `style.css` - Estilos do sistema
- `script.js` - Scripts JavaScript

## 🎨 Recursos Visuais

- Design moderno com gradientes
- Interface responsiva
- Ícones Font Awesome
- Animações suaves
- Cores vibrantes e profissionais

## 📝 Notas

O sistema cria automaticamente as tabelas necessárias no banco de dados na primeira execução.

