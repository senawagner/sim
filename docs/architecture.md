# Arquitetura do Sistema SIM (Integrated Maintenance Services)

## 1. Visão Geral

O sistema SIM é uma aplicação web baseada em Laravel projetada para o Gerenciamento de manutenções de equipamentos de refrigeração e AR-CONDICIONADO.

## 1.1. Ferramentas e Tecnologias Utilizadas

### Backend
- PHP 8.1
- Laravel 10.x
- MySQL 8.0
- Redis (Cache, Queue e Session)
- Nginx

### Frontend
- Alpine.js 3.x
- TailwindCSS 3.x
- Bootstrap 5.x
- Font Awesome 5.15
- DataTables 1.11
- SweetAlert2 11.x

### Ambiente de Desenvolvimento
- Docker & Docker Compose
- Laravel Sail
- Laravel Telescope (Debugging)
- Predis (Cliente Redis para PHP)

### Ferramentas de Teste e Qualidade
- PHPUnit
- Laravel Telescope
- Laravel Horizon

## 1.2. Lógica do Sistema





Narrativa do fluxo do sistema:






1. **Autenticação**: 
   - Quando acessa http://localhost, o Laravel procura a rota '/' em routes/web.php e redireciona para a rota de login.
   - Essa rota carrega a view welcome.blade.php
   - Os usuários acessam o sistema através da página de login (`/login`).
   - Após a autenticação bem-sucedida, são redirecionados para o dashboard apropriado com base em seu perfil (admin, técnico, coordenador ou arquiteto).

2. **Dashboards**:
   - **Técnico**: Pode registrar manutenções e visualizar lista com manutenções realizadas e as Filiais pendentes.
   - **Gestor**: Além das funcionalidades do técnico, pode editar manutenções e encerrar ciclos mensais.
   - **Administrador**: Tem acesso completo ao sistema, incluindo gerenciamento de usuários, relatórios e todas as funcionalidades de manutenção.
   - **Arquiteto**: Tem acesso total ao sistema, incluindo todas as funcionalidades administrativas e de análise.

3. **Registro de Manutenções**:
   - Todos os perfis podem registrar novas manutenções, selecionando a filial e a data.
   - Os Coordenadores podem alterar a data programada para manutenção herdada da tabela filiais do campo dt_padrao, no máximo 8 horas antes da data programada, para que os técnicos sejam notificados da alteração. essa alteração fica registrada para consulta futura disponível para os perfis Administradores e Arquitetos.
   - Coordenadores podem registrar, editar e excluir manutenções (apenas mensais) realizadas a qualquer momento, porém deve informar o motivo, obrigatoriamente e as alterações ficam registradas para consulta futura disponível para os perfis Administradores e Arquitetos.
   - Administradores podem registrar, editar e excluir manutenções a qualquer momento, ficando também registradas para consulta. Ao ser notificado de uma data padrão alterada pelo coordenador, o administrador recebe uma notificação com três opções:
      - Confirmar a alteração, o que irá sobrescrever a data padrão herdada da filial.
      - Manter a data herdada, o que irá sobrescrever a data alterada pelo coordenador.
      - Definir a data solicitada como nova data padrão, que irá sobrescrever a data herdada da filial. 
      * Todas as operações são obrigatoriamente registradas com a data e hora exata da alteração, disponíveis para consulta futura.
   - O formulário de registro de manutenções inclui validação no lado do cliente para melhorar a experiência do usuário e reduzir erros de entrada.
   - Após o registro bem-sucedido de uma manutenção, uma mensagem flash é exibida para confirmar a ação.

4. **Visualização e Edição**:
   - Técnicos podem ver todas as manutenções realizadas e pendentes.
   - Coordenadores podem ver e editar todas as manutenções, com algumas restrições de tempo.
   - Administradores e Arquitetos têm acesso irrestrito para visualização e edição.

5. **Relatórios**:
   - Administradores podem gerar diversos tipos de relatórios, incluindo manutenções por período, por filial e por técnico.
   - Arquitetos tem acesso a todos os relatórios administrativos e poderá ter acesso a funcionalidades específicas de análise e planejamento (a ser implementado).

6. **Gerenciamento de Usuários**:
   - Administradores e Arquitetos podem criar, editar e excluir contas de usuário através da interface de gerenciamento de usuários.

7. **Redefinição de Senha**:
   - Os usuários podem solicitar redefinição de senha através de um processo seguro.

8. **Notificações**:
   - O sistema gera notificações automáticas para manutenções próximas ou atrasadas.
   - Os usuários podem visualizar suas notificações através de uma interface dedicada.
   - As notificações são exibidas em tempo real no dashboard do usuário.

9. **Feedback do Sistema**:
   - Mensagens flash são utilizadas para fornecer feedback imediato ao usuário após ações importantes, como registro de manutenções, edições ou exclusões.

10. **Validação de Dados**:
    - A validação de dados ocorre tanto no lado do cliente (usando JavaScript) quanto no lado do servidor (usando as funcionalidades de validação do Laravel).
    - Erros de validação são exibidos de forma clara e específica para cada campo do formulário.






## Detalhes dos Componentes Principais

1. **LoginController** (`app/Http/Controllers/Auth/LoginController.php`)
   - Responsável pela autenticação de usuários.
   - Gerencia o processo de login e logout.
   - Redireciona para o dashboard apropriado após o login bem-sucedido.

2. **DashboardController** (`app/Http/Controllers/Admin/DashboardController.php` e `app/Http/Controllers/Tecnico/DashboardController.php`)
   - Gerencia a exibição dos dashboards para administradores e técnicos.
   - Fornece dados resumidos e estatísticas relevantes para cada perfil.

3. **RelatoriosController** (`app/Http/Controllers/Admin/RelatoriosController.php`)
   - Gera relatórios diversos baseados nos parâmetros selecionados.
   - Processa e formata dados para exibição em diferentes tipos de relatórios.

4. **UserController** (`app/Http/Controllers/Admin/UserController.php`)
   - Gerencia operações relacionadas a usuários (CRUD).
   - Implementa lógica para criação, edição e exclusão de contas de usuário.

5. **ResetPasswordController** (`app/Http/Controllers/Auth/ResetPasswordController.php`)
   - Gerencia o processo de redefinição de senha.
   - Implementa a lógica para envio de e-mails de redefinição e atualização de senhas.

6. **Modelos** (`app/Models/`)
   - `Empresa.php`, `Equipamento.php`, `Filial.php`, `Manutencao.php`, `User.php`
   - Definem a estrutura e relações dos dados no sistema.
   - Implementam lógica de negócios específica para cada entidade.

7. **Views** (`resources/views/`)
   - Implementam a interface do usuário usando Blade templates.
   - Organizadas por funcionalidade (auth, admin, tecnico).

8. **Rotas** (`routes/web.php` e `routes/api.php`)
   - Definem as rotas da aplicação, mapeando URLs para controladores.
   - Implementam middleware para controle de acesso.

9. **NotificationController** (`app/Http/Controllers/NotificationController.php`)
   - Gerencia a exibição e interação com notificações do usuário.
   - Implementa lógica para marcar notificações como lidas.
   - Fornece uma interface para geração manual de notificações (para fins de teste/admin).

10. **NotificationService** (`app/Services/NotificationService.php`)
   - Implementa a lógica de negócios para geração de notificações.
   - Cria notificações para manutenções próximas ou atrasadas.
   - Oferece métodos para marcar notificações como lidas.

11. **Notification Model** (`app/Models/Notification.php`)
   - Define a estrutura e relações das notificações no sistema.
   - Implementa scopes para filtrar notificações não lidas.

12. **GenerateMaintenanceNotifications Command** (`app/Console/Commands/GenerateMaintenanceNotifications.php`)
    - Comando Artisan para gerar notificações de manutenção.
    - Pode ser agendado para execução automática.

13. **Kernel** (`app/Console/Kernel.php`)
    - Configura o agendamento para a geração automática de notificações de manutenção.
   - Define a frequência de execução do comando de geração de notificações.





## Resumo das Páginas Principais

1. **Página de Login** (`resources/views/auth/login.blade.php`)
   - Formulário de login para autenticação de usuários.
   - Campos para e-mail e senha.
   - Link para redefinição de senha.

2. **Dashboard do Administrador** (`resources/views/admin/dashboard.blade.php`)
   - Visão geral das estatísticas do sistema.
   - Resumo de manutenções pendentes e concluídas.
   - Links rápidos para funções administrativas principais.

3. **Dashboard do Técnico** (`resources/views/tecnico/dashboard.blade.php`)
   - Lista de manutenções atribuídas ao técnico.
   - Estatísticas pessoais de manutenções realizadas.
   - Formulário rápido para registro de nova manutenção.

4. **Página de Relatórios** (`resources/views/admin/relatorios.blade.php`)
   - Interface para geração de diferentes tipos de relatórios.
   - Filtros por período, filial, técnico, etc.
   - Visualizaão e opção de exportação de relatórios.

5. **Gerenciamento de Usuários** (`resources/views/admin/usuarios.blade.php`)
   - Lista de todos os usuários do sistema.
   - Funcionalidades para adicionar, editar e remover usuários.
   - Atribuição de perfis de acesso.

6. **Redefinição de Senha** (`resources/views/auth/reset-password.blade.php`)
   - Formulário para redefinição de senha.
   - Campos para e-mail, nova senha e confirmação de senha.

7. **Layout Base** (`resources/views/layouts/app.blade.php`)
   - Template base usado por todas as outras views.
   - Inclui a estrutura HTML comum, cabeçalho, rodapé e menu de navegação.
   - Gerencia a inclusão de assets CSS e JavaScript.

8. **Página de Notificações** (`resources/views/notifications/index.blade.php`)
   - Lista todas as notificações do usuário.
   - Permite marcar notificações como lidas.
   - Exibe detalhes de cada notificação, incluindo tipo e data de criaão.

9. **Componente de Notificações** (a ser implementado no layout principal)
   - Exibe um ícone ou link para acessar notificações.
   - Mostra o número de notificações não lidas.

Cada uma dessas páginas é renderizada pelos controladores correspondentes e utiliza o layout base para manter uma aparência consistente em todo o sistema. As views são construídas usando o sistema de templates Blade do Laravel, permitindo uma separação clara entre a lógica de apresentação e a lógica de negócios.



## Fluxo de Dados

1. O usuário faz uma requisição através do navegador.
2. A requisição é roteada para o controlador apropriado.
3. O controlador interage com os modelos para buscar ou manipular dados.
4. Os dados são passados para as views para renderização.
5. A resposta HTML é enviada de volta ao navegador do usuário.

## Segurança

- Autenticação gerenciada pelo Laravel Sanctum.
- Autorização baseada em perfis de usuário.
- Validação de entrada em todas as requisições.
- Uso de CSRF tokens para prevenir ataques cross-site request forgery.
- Senhas armazenadas com hash seguro.

## Banco de Dados

- Utiliza MySQL hospedado remotamente no cPanel.
- Migrações Laravel para versionamento do esquema do banco de dados.
- Modelos Eloquent para interação com o banco de dados.




Para notificações, o sistema periodicamente verifica manutenções próximas ou atrasadas e gera notificações apropriadas.

## Segurança

- Autenticação gerenciada pelo Laravel Sanctum.
- Autorização baseada em perfis de usuário.
- Validação de entrada em todas as requisições.
- Uso de CSRF tokens para prevenir ataques cross-site request forgery.
- Senhas armazenadas com hash seguro.

## Banco de Dados

   -Veja C:\Projetos\sim\docs\database.md




## Agendamento de Tarefas


Esta arquitetura atualizada incorpora o novo sistema de notificações, proporcionando uma maneira eficiente de alertar os usuários sobre manutenções próximas ou atrasadas. O sistema continua mantendo uma base sólida e escalável, permitindo fácil manutenção e expansão futura.




## Sistema de Permissões e Papéis

### Sistema Atual (Temporário)
1. **Gerenciamento Baseado em Perfil**
   - Utiliza o campo `perfil` da tabela `usuarios`
   - Perfis disponíveis:
     - arquiteto: Acesso total ao sistema
     - administrador: Acesso administrativo ao sistema
     - coordenador: Acesso intermediário para gestão
     - tecnico: Acesso às funcionalidades de manutenção
     

2. **Implementação**
   - Middleware personalizado `CheckUserRole`
   - Verificação simples baseada no campo `perfil`
   - Proteção de rotas através do middleware

3. **Estrutura**
   ```php
   // Exemplo de proteção de rota
   Route::middleware(['auth', 'check.role:administrador'])->group(function () {
       // Rotas protegidas
   });
   ```

### Implementação Futura (Pós-desenvolvimento)
1. **Pacote Spatie/Laravel-Permission**
   - Será implementado após a conclusão das funcionalidades principais
   - Permitirá controle granular de permissões
   - Suportará múltiplos papéis por usuário
   - Implementação prevista antes do deploy em produção

## 1.3. Configurações do Sistema

### Arquivo de Configuração Principal (config/app.php)
- **Propósito**: Arquivo central de configuração do Laravel que define comportamentos fundamentais do sistema
- **Características**:
  - Usa o método moderno de carregamento de providers via `ServiceProvider::defaultProviders()`
  - Configurado para o timezone 'America/Sao_Paulo'
  - Locale definido como 'pt_BR'
  - Integração com providers essenciais do sistema

### Service Providers
O sistema utiliza os seguintes providers principais:
1. **Core Providers**:
   - AppServiceProvider: Serviços base da aplicação
   - AuthServiceProvider: Autenticação e autorização
   - EventServiceProvider: Gerenciamento de eventos
   - RouteServiceProvider: Configuração de rotas
   - TelescopeServiceProvider: Debugging e monitoramento

2. **Package Providers**:
   - PermissionServiceProvider: Gerenciamento de permissões (spatie/laravel-permission)
   - Outros providers são carregados automaticamente via descoberta de pacotes



