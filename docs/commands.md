
Comandos POWERSHELL:


#Listar estrutura de arquivos

$date = Get-Date -Format "dd/MM/yyyy HH:mm:ss"
"Estrutura de arquivos projeto SIM`nAtualizado em $date`n" | Out-File -FilePath C:\Projetos\sim\docs\structure.md -Encoding utf8
tree C:\Projetos\sim /f /a | Out-File -FilePath C:\Projetos\sim\docs\structure.md -Append -Encoding utf8