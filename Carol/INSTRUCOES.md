# 🔧 INSTRUÇÕES PARA EXECUTAR O PROJETO

## ⚠️ IMPORTANTE: Você PRECISA usar um servidor web!

**NÃO ABRA OS ARQUIVOS DIRETAMENTE NO NAVEGADOR!** (não use file:///)

## 📋 Como executar o projeto:

### Opção 1: Usando PHP Built-in Server (Recomendado)

1. **Abra o PowerShell ou Terminal** na pasta do projeto:
   ```
   cd C:\Users\SSTI\Desktop\Carol
   ```

2. **Execute o servidor PHP:**
   ```
   php -S localhost:8000
   ```

3. **Acesse no navegador:**
   ```
   http://localhost:8000
   ```

### Opção 2: Usando XAMPP/WAMP

1. **Copie a pasta do projeto para:**
   - XAMPP: `C:\xampp\htdocs\Carol`
   - WAMP: `C:\wamp\www\Carol`

2. **Inicie o Apache e MySQL no XAMPP/WAMP**

3. **Acesse no navegador:**
   ```
   http://localhost/Carol
   ```

### Opção 3: Usar Visual Studio Code com Extensão

1. **Instale a extensão "PHP Server" no VS Code**

2. **Clique com botão direito no arquivo `index.html`**

3. **Selecione "PHP Server: Serve project"**

## ✅ Verificar se está funcionando:

1. Acesse: `http://localhost:8000/teste_conexao.php`
   - Este arquivo mostra se o PHP e a conexão com banco estão funcionando

2. Se aparecer erros, verifique:
   - MySQL/MariaDB está instalado e rodando?
   - As credenciais em `conexao.php` estão corretas?
   - O PHP está instalado e no PATH?

## 🐛 Problemas comuns:

### "Página em branco"
- Você está usando file:/// no navegador? Use http://localhost:8000
- O servidor PHP está rodando?

### "Erro de conexão com banco"
- MySQL está rodando?
- Credenciais corretas em conexao.php?

### "PHP não encontrado"
- Instale o PHP: https://www.php.net/downloads.php
- Ou use XAMPP que já vem com PHP

