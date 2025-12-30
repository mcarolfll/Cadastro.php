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

- 🎨 **Interface Moderna**
  - Design responsivo (mobile-first)
  - Gradientes e animações suaves
  - Ícones Font Awesome
  - Feedback visual em todas as ações
  - Mensagens de sucesso/erro

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
Carol/
├── index.html              # Página inicial
├── candidato.php           # Formulário de cadastro de candidatos
├── empresa.php             # Formulário de cadastro de empresas
├── dashboard.php           # Lista e busca de candidatos
├── dashboard2.php          # Lista e busca de empresas
├── ver_candidato.php       # Visualização detalhada do candidato
├── ver_empresa.php         # Visualização detalhada da empresa
├── cadastro.php            # Processa cadastro de candidatos
├── cadastro2.php           # Processa cadastro de empresas
├── editar_candidato.php    # Edição de candidatos
├── editar_empresa.php      # Edição de empresas
├── deletar.php             # Exclusão de candidatos
├── deletar2.php            # Exclusão de empresas
├── conexao.php             # Configuração do banco de dados
├── api_stats.php           # API para estatísticas (JSON)
├── style.css               # Estilos do sistema
├── script.js               # Scripts JavaScript
├── teste_conexao.php       # Teste de conexão e diagnóstico
├── start_server.bat        # Script para iniciar servidor (Windows)
├── INSTRUCOES.md           # Instruções detalhadas
└── README.md               # Este arquivo
```

## 🎨 Recursos Visuais

- **Design Moderno**: Gradientes, sombras e efeitos visuais
- **Responsivo**: Funciona perfeitamente em desktop, tablet e mobile
- **Ícones**: Font Awesome para uma experiência visual rica
- **Animações**: Transições suaves e animações ao scroll
- **Cores**: Paleta de cores profissional e harmoniosa
- **Tipografia**: Fonte Poppins para melhor legibilidade

## 💡 Funcionalidades Detalhadas

### Cadastro de Candidatos
- Nome completo (obrigatório)
- E-mail (obrigatório, único)
- Telefone com máscara automática
- Cargo desejado (obrigatório)
- Experiência profissional (texto livre)
- Habilidades e competências (texto livre)
- Data de cadastro automática

### Cadastro de Empresas
- Nome da empresa (obrigatório)
- CNPJ com máscara automática (único)
- E-mail (obrigatório)
- Telefone com máscara automática
- Endereço completo
- Descrição da empresa
- Data de cadastro automática

### Sistema de Busca
- Busca instantânea em múltiplos campos
- Resultados filtrados em tempo real
- Contador de resultados
- Botão para limpar busca

### Visualização Detalhada
- Página completa com todas as informações
- Layout organizado em seções
- Links de ação rápida (editar, excluir)
- Formatação adequada de textos longos

## 🔧 Configurações

### Banco de Dados

O sistema cria automaticamente:
- Banco de dados: `sistema_rh`
- Tabela: `candidatos`
- Tabela: `empresas`

Se preferir criar manualmente:

```sql
CREATE DATABASE sistema_rh CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### Personalização

**Cores:** Edite as variáveis CSS em `style.css`:
```css
:root {
    --primary-color: #6366f1;
    --secondary-color: #8b5cf6;
    /* ... */
}
```

## 🐛 Solução de Problemas

### Erro: "Página em branco"
- ✅ Certifique-se de estar usando `http://localhost:8000` (não `file:///`)
- ✅ Verifique se o servidor PHP está rodando
- ✅ Acesse `teste_conexao.php` para diagnóstico

### Erro: "Erro na conexão com banco de dados"
- ✅ Verifique se o MySQL/MariaDB está rodando
- ✅ Confirme as credenciais em `conexao.php`
- ✅ Verifique se a extensão PDO MySQL está habilitada

### Erro: "PHP não encontrado"
- ✅ Instale o PHP: https://www.php.net/downloads.php
- ✅ Adicione o PHP ao PATH do sistema
- ✅ Ou use XAMPP que já vem com PHP

### Erro: "Extensão PDO não encontrada"
- ✅ No PHP.ini, descomente: `extension=pdo_mysql`
- ✅ Reinicie o servidor web

## 📊 Estatísticas e API

O sistema possui uma API simples para estatísticas:

**Endpoint:** `api_stats.php`

**Resposta JSON:**
```json
{
    "candidatos": 10,
    "empresas": 5
}
```

## 🔒 Segurança

- ✅ Proteção contra SQL Injection (usando PDO Prepared Statements)
- ✅ Sanitização de dados de saída (htmlspecialchars)
- ✅ Validação de tipos de dados
- ✅ Validação de e-mail único
- ✅ Confirmação antes de excluir registros

## 🚀 Próximas Melhorias Sugeridas

- [ ] Sistema de autenticação e login
- [ ] Exportação de dados (CSV, PDF)
- [ ] Gráficos e relatórios avançados
- [ ] Paginação nas listagens
- [ ] Upload de fotos de perfil
- [ ] Sistema de tags/categorias
- [ ] Histórico de alterações
- [ ] Notificações por e-mail
- [ ] API REST completa
- [ ] Modo escuro (dark mode)

## 📝 Licença

Este projeto é de código aberto e está disponível para uso pessoal e educacional.

## 👨‍💻 Desenvolvido com

- PHP 7.4+
- MySQL/MariaDB
- HTML5
- CSS3 (Grid, Flexbox, Custom Properties)
- JavaScript (Vanilla)
- Font Awesome Icons
- Google Fonts (Poppins)

## 📞 Suporte

Para dúvidas ou problemas:
1. Consulte o arquivo `INSTRUCOES.md`
2. Execute `teste_conexao.php` para diagnóstico
3. Verifique os logs de erro do PHP

---

**⭐ Se este projeto foi útil, considere dar uma estrela!**
