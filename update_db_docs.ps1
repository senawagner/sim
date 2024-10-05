# update_db_docs.ps1

# Função para executar comandos do Laravel no container Docker
function Invoke-Laravel {
    param (
        [string]$command
    )
    docker-compose exec -T app php artisan $command
}

# Obter informações gerais do banco de dados
$dbInfo = Invoke-Laravel "db:table"

# Iniciar o conteúdo do arquivo Markdown
$markdown = @"
# Documentação do Banco de Dados

## Informações Gerais

$dbInfo

## Estrutura das Tabelas

"@

# Lista de tabelas para documentar
$tables = @("usuarios", "empresas", "filiais", "equipamentos", "manutencoes", "tecnicos", "migrations", "password_reset_tokens", "failed_jobs", "personal_access_tokens")

# Adicionar estrutura detalhada de cada tabela
foreach ($table in $tables) {
    $tableInfo = Invoke-Laravel "db:table $table"
    $markdown += "`n### Tabela: $table`n`n``````"
    $markdown += $tableInfo
    $markdown += "``````"
    $markdown += "`n"
}

# Caminho completo para o arquivo database.md
$filePath = "C:\Projetos\sim\docs\database.md"

# Salvar o arquivo com codificação UTF-8 sem BOM
$utf8NoBomEncoding = New-Object System.Text.UTF8Encoding $false
[System.IO.File]::WriteAllText($filePath, $markdown, $utf8NoBomEncoding)

Write-Host "Documentação do banco de dados atualizada em $filePath"