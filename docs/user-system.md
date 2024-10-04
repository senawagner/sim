# Guia de Instalação do SIM - Sistema de Manutenção de Filiais

Este guia fornecerá instruções passo a passo para instalar e configurar o SIM em um ambiente de servidor web.

## Pré-requisitos

Antes de começar, certifique-se de que seu servidor atende aos seguintes requisitos:

- PHP 7.4 ou superior
- MySQL 5.7 ou superior
- Servidor web (Apache ou Nginx)
- Extensão PDO PHP habilitada

## Passos para Instalação

1. **Clone o Repositório**
   ```
   git clone https://github.com/seu-usuario/sim.git
   cd sim
   ```

2. **Configure o Banco de Dados**
   - Crie um novo banco de dados MySQL para o SIM
   - Importe o arquivo `database.sql` para criar as tabelas necessárias:
     ```
     mysql -u seu_usuario -p nome_do_banco < database.sql
     ```

3. **Configure as Credenciais do Banco de Dados**
   - Abra o arquivo `includes/db_credentials.php`
   - Edite as seguintes linhas com suas credenciais de banco de dados:
     ```php
     define('DB_HOST', 'localhost');
     define('DB_NAME', 'nome_do_banco');
     define('DB_USER', 'seu_usuario');
     define('DB_PASS', 'sua_senha');
     ```

4. **Configure o Servidor Web**
   - Configure seu servidor web (Apache ou Nginx) para apontar para o diretório raiz do SIM
   - Certifique-se de que o módulo de reescrita (mod_rewrite para Apache) está habilitado

5. **Defina as Permissões de Arquivo**
   - Certifique-se de que o servidor web tem permissões de leitura para todos os arquivos
   - O diretório `logs/` (se existir) deve ter permissões de escrita

6. **Crie o Primeiro Usuário Administrador**
   - Execute o script `create_admin.php` para criar o primeiro usuário administrador:
     ```
     php create_admin.php
     ```
   - Siga as instruções para definir o nome de usuário e senha do administrador

7. **Teste a Instalação**
   - Acesse o SIM através do navegador (por exemplo, `http://seu-dominio.com/sim`)
   - Faça login com as credenciais de administrador criadas no passo anterior








   

## Solução de Problemas

Se encontrar problemas durante a instalação, verifique o seguinte:

- Logs de erro do PHP e do servidor web
- Permissões de arquivo e diretório
- Configurações do banco de dados

Para suporte adicional, entre em contato com a equipe de desenvolvimento.

## Próximos Passos

Após a instalação bem-sucedida, consulte o `manual_do_usuario.md` para aprender como usar o SIM - Sistema de Manutenção de Filiais.
