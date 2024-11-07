
Comandos POWERSHELL:


#Listar estrutura de arquivos (Simplificado)

$date = Get-Date -Format "dd/MM/yyyy HH:mm:ss"
"Estrutura de arquivos projeto SIM`nAtualizado em $date`n" | Out-File -FilePath C:\Projetos\sim\docs\file_structure.md -Encoding utf8
tree C:\Projetos\sim /f /a | Out-File -FilePath C:\Projetos\sim\docs\file_structure.md -Append -Encoding utf8





#Atualizar arquivo de estrutura de arquivos (Completo)

php artisan docs:update-file-structure

#Atualizar arquivo de estrutura de banco de dados   

php artisan db:update-structure




#Para testar a conexão remota, usando o Artisan Tinker. 

docker-compose exec app php artisan tinker

    >>> DB::connection()->getPdo();




php artisan tinker
    DB::select('DESCRIBE equipamentos');




Para executar um Seeder
    # Opção 1: Executar apenas o seeder especifico
php artisan db:seed --class=FiliaisTableSeeder

# Opção 2: Executar todos os seeders
php artisan db:seed
