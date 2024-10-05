# DocumentaÃ§Ã£o do Banco de Dados

## InformaÃ§Ãµes Gerais

    Laravel\Prompts\Exceptions\NonInteractiveValidationException     Required.    at vendor/laravel/prompts/src/Concerns/Interactivity.php:32      28Ôûò       29Ôûò         $this->validate($default);      30Ôûò       31Ôûò         if ($this->state === 'error') {   Ô×£  32Ôûò             throw new NonInteractiveValidationException($this->error);      33Ôûò         }      34Ôûò       35Ôûò         return $default;      36Ôûò     }        [2m+15 vendor frames [22m    16  artisan:37       Illuminate\Foundation\Console\Kernel::handle(Object(Symfony\Component\Console\Input\ArgvInput), Object(Symfony\Component\Console\Output\ConsoleOutput)) 

## Estrutura das Tabelas

### Tabela: usuarios

```    ERROR  Command "db:table usuarios" is not defined. Did you mean one of these?      Ôçé db     Ôçé db:monitor     Ôçé db:seed     Ôçé db:show     Ôçé db:table     Ôçé db:wipe   ```

### Tabela: empresas

```    ERROR  Command "db:table empresas" is not defined. Did you mean one of these?      Ôçé db     Ôçé db:monitor     Ôçé db:seed     Ôçé db:show     Ôçé db:table     Ôçé db:wipe   ```

### Tabela: filiais

```    ERROR  Command "db:table filiais" is not defined. Did you mean one of these?      Ôçé db     Ôçé db:monitor     Ôçé db:seed     Ôçé db:show     Ôçé db:table     Ôçé db:wipe   ```

### Tabela: equipamentos

```    ERROR  Command "db:table equipamentos" is not defined. Did you mean one of these?      Ôçé db     Ôçé db:monitor     Ôçé db:seed     Ôçé db:show     Ôçé db:table     Ôçé db:wipe   ```

### Tabela: manutencoes

```    ERROR  Command "db:table manutencoes" is not defined. Did you mean one of these?      Ôçé db     Ôçé db:monitor     Ôçé db:seed     Ôçé db:show     Ôçé db:table     Ôçé db:wipe   ```

### Tabela: tecnicos

```    ERROR  Command "db:table tecnicos" is not defined. Did you mean one of these?      Ôçé db     Ôçé db:monitor     Ôçé db:seed     Ôçé db:show     Ôçé db:table     Ôçé db:wipe   ```

### Tabela: migrations

```    ERROR  Command "db:table migrations" is not defined. Did you mean one of these?      Ôçé db     Ôçé db:monitor     Ôçé db:seed     Ôçé db:show     Ôçé db:table     Ôçé db:wipe   ```

### Tabela: password_reset_tokens

```    ERROR  Command "db:table password_reset_tokens" is not defined. Did you mean one of these?      Ôçé db     Ôçé db:monitor     Ôçé db:seed     Ôçé db:show     Ôçé db:table     Ôçé db:wipe   ```

### Tabela: failed_jobs

```    ERROR  Command "db:table failed_jobs" is not defined. Did you mean one of these?      Ôçé db     Ôçé db:monitor     Ôçé db:seed     Ôçé db:show     Ôçé db:table     Ôçé db:wipe   ```

### Tabela: personal_access_tokens

```    ERROR  Command "db:table personal_access_tokens" is not defined. Did you mean one of these?      Ôçé db     Ôçé db:monitor     Ôçé db:seed     Ôçé db:show     Ôçé db:table     Ôçé db:wipe   ```
