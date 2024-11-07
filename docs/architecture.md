# Arquitetura do Sistema SIM (Sistema Integrado de Manutenção)

######################## 1. Visão Geral ########################

O SIM é uma aplicação web empresarial desenvolvida em Laravel, focada no gerenciamento completo de manutenções de equipamentos de refrigeração e ar-condicionado. O sistema oferece uma solução integrada para:

- Gestão de manutenções preventivas e corretivas
- Controle detalhado de equipamentos e suas especificações
- Gerenciamento de filiais e setores
- Sistema de notificações para manutenções programadas
- Relatórios gerenciais e análises estatísticas
- Controle de acesso baseado em perfis (Arquiteto, Administrador, Coordenador, Técnico)
- Dashboard personalizado por perfil de usuário
- Exportação de dados em múltiplos formatos
- Monitoramento em tempo real do status das manutenções

######################## 1.1. Ferramentas e Tecnologias Utilizadas

Backend

PHP 8.1
PHP (Hypertext Preprocessor) é uma linguagem de script de código aberto amplamente utilizada para o desenvolvimento web. A versão 8.1 traz várias melhorias e novos recursos, incluindo:

Fibers: Introduzidos para facilitar a programação assíncrona, proporcionando um melhor controle sobre o fluxo de execução.
Enums: Permitem definir um conjunto de valores constantes e nomeados, facilitando a criação de código mais legível e menos propenso a erros.
Performance Improvements: Melhorias significativas de desempenho em relação a versões anteriores.
Readonly Properties: Permitem definir propriedades de classe que só podem ser escritas uma vez, aumentando a segurança do código.
Laravel 10.x
Laravel é um framework PHP popular que facilita o desenvolvimento de aplicações web robustas e escaláveis. A versão 10.x continua a tradição de fornecer uma arquitetura expressiva e elegante. Alguns de seus recursos principais incluem:

Eloquent ORM: Um ORM (Object-Relational Mapping) que simplifica a interação com bancos de dados.
Blade Templating Engine: Um motor de templates que permite criar layouts dinâmicos e reutilizáveis.
Routing: Sistema de roteamento simples e flexível para definir URLs amigáveis.
Middleware: Facilita a filtragem de requisições HTTP.
Task Scheduling: Permite agendar tarefas periodicamente usando a sintaxe fluente do Laravel.
MySQL 8.0
MySQL é um dos sistemas de gerenciamento de banco de dados relacional mais populares do mundo. A versão 8.0 oferece várias melhorias em relação às versões anteriores, como:

JSON Support: Suporte aprimorado para manipulação de dados JSON.
Window Functions: Permitem realizar operações complexas em conjuntos de dados.
CTEs (Common Table Expressions): Facilitam a criação de consultas complexas.
Improved Security: Melhorias em segurança, incluindo autenticação baseada em plugin.
Redis (Cache, Queue e Session)
Redis é um armazenamento de estrutura de dados em memória, usado como banco de dados, cache e broker de mensagens. É conhecido por sua alta performance e flexibilidade. No contexto de backend, Redis é frequentemente utilizado para:

Cache: Armazenamento temporário de dados para acelerar o acesso a informações frequentemente solicitadas.
Queue: Gerenciamento de filas de tarefas para processamento assíncrono.
Session Management: Armazenamento de sessões de usuário para melhorar a escalabilidade e a performance de aplicações web.
Nginx
Nginx é um servidor web de código aberto conhecido por sua alta performance, estabilidade e baixo consumo de recursos. Além de servir conteúdo estático, ele é frequentemente usado como:

Reverse Proxy: Encaminhamento de requisições para servidores de aplicação.
Load Balancer: Distribuição de carga entre múltiplos servidores para otimizar recursos e aumentar a disponibilidade.
HTTP Cache: Armazenamento de respostas HTTP para melhorar a velocidade de entrega de conteúdo.



Frontend
Alpine.js 3.x:
Alpine.js é uma biblioteca JavaScript leve para adicionar interatividade a páginas web. É uma alternativa mais simples e minimalista a frameworks maiores como Vue.js ou React. Alpine.js permite que você adicione comportamento dinâmico a seus elementos HTML usando atributos específicos, tornando-o ideal para projetos onde a simplicidade e a leveza são prioridades.
TailwindCSS 3.x:
TailwindCSS é um framework CSS utilitário que permite construir interfaces de usuário personalizadas sem sair do seu HTML. Ao contrário de frameworks CSS tradicionais que fornecem componentes pré-estilizados, Tailwind fornece classes utilitárias que podem ser combinadas para criar estilos personalizados de forma rápida e eficiente, promovendo um design consistente e responsivo.
Bootstrap 5.x:
Bootstrap é um dos frameworks CSS mais populares para desenvolvimento web responsivo e mobile-first. Ele fornece uma coleção de componentes CSS e JavaScript pré-estilizados, como botões, formulários, e barras de navegação, além de um sistema de grid flexível que facilita o layout de páginas web. A versão 5 trouxe melhorias como a remoção da dependência do jQuery e novos componentes.
Font Awesome 5.15:
Font Awesome é uma biblioteca de ícones amplamente utilizada que oferece uma vasta gama de ícones vetoriais escaláveis que podem ser facilmente personalizados com CSS. Esses ícones podem ser usados em sites e aplicações para melhorar a interface do usuário com gráficos atraentes e intuitivos.
DataTables 1.11:
DataTables é um plugin jQuery que adiciona funcionalidades avançadas a tabelas HTML, como paginação, busca, ordenação e filtragem. É especialmente útil para lidar com grandes conjuntos de dados e melhorar a usabilidade e a interatividade das tabelas em aplicações web.
SweetAlert2 11.x:
SweetAlert2 é uma biblioteca JavaScript para criar alertas e diálogos modais bonitos e personalizáveis. Ele substitui os alertas nativos do navegador com caixas de diálogo mais atraentes e interativas, que podem incluir botões, ícones, e animações, melhorando a experiência do usuário em aplicações web.

### Ambiente de Desenvolvimento
Docker
Docker é uma plataforma que permite criar, implantar e executar aplicações em contêineres. Contêineres são ambientes isolados que incluem tudo o que uma aplicação precisa para funcionar, desde o sistema operacional até as bibliotecas e dependências. As principais vantagens do Docker incluem:

Portabilidade: Contêineres podem ser executados em qualquer máquina que tenha o Docker instalado, independentemente do sistema operacional subjacente.
Consistência: Garante que o software funcione da mesma forma em desenvolvimento, teste e produção.
Eficiência: Contêineres compartilham o kernel do sistema operacional, tornando-os mais leves e rápidos do que máquinas virtuais tradicionais.
Docker Compose
Docker Compose é uma ferramenta para definir e executar aplicações multi-contêiner. Com um arquivo YAML, você pode configurar todos os serviços da sua aplicação, como bancos de dados, servidores web, etc. Suas características principais incluem:

Facilidade de Uso: Simplifica a orquestração de múltiplos contêineres com comandos simples.
Configuração Centralizada: Todas as configurações de serviço são definidas em um único arquivo, facilitando a manutenção e a replicação de ambientes.
Escalabilidade: Permite escalar serviços facilmente com comandos de linha de comando.
Laravel Sail
Laravel Sail é um ambiente de desenvolvimento leve para Laravel que utiliza Docker. Ele fornece uma interface de linha de comando para interagir com o Docker, tornando mais fácil configurar um ambiente de desenvolvimento Laravel sem a necessidade de instalar diretamente serviços como PHP, MySQL, Redis, etc., no sistema operacional do desenvolvedor. Seus benefícios incluem:

Configuração Simplificada: Configura automaticamente um ambiente de desenvolvimento Laravel com um único comando.
Integração com Docker: Aproveita o poder do Docker para criar ambientes consistentes e isolados.
Flexibilidade: Permite personalizar a configuração do ambiente conforme necessário.
Laravel Telescope (Debugging)
Laravel Telescope é uma ferramenta de depuração e monitoramento para aplicações Laravel. Ele proporciona uma visão detalhada sobre a execução da aplicação, permitindo aos desenvolvedores identificar e resolver problemas rapidamente. Funcionalidades principais incluem:

Monitoramento de Requisições: Exibe informações detalhadas sobre cada requisição HTTP.
Execução de Comandos Artisan: Registra e exibe todos os comandos Artisan executados.
Consultas de Banco de Dados: Mostra todas as consultas SQL executadas, junto com o tempo de execução.
Exceções e Erros: Captura e exibe exceções e erros ocorridos na aplicação.
Jobs e Filas: Monitora a execução de jobs e filas, exibindo detalhes sobre cada tarefa.
Predis (Cliente Redis para PHP)
Predis é uma biblioteca PHP que fornece uma interface para interagir com o Redis, um banco de dados em memória amplamente utilizado para cache, filas e armazenamento de sessões. Predis é conhecido por sua simplicidade e flexibilidade, oferecendo:

Compatibilidade: Suporte à maioria dos comandos do Redis, permitindo a execução de operações complexas.
Conexões Persistentes e de Cluster: Suporte para conexões persistentes e configuração de clusters Redis.
Fácil Integração: Integra-se facilmente com frameworks PHP, como Laravel, para gerenciar sessões, filas e cache.
Extensibilidade: Permite a criação de comandos personalizados para estender a funcionalidade padrão do Redis.

### Ferramentas de Teste e Qualidade
PHPUnit
PHPUnit é um framework de testes unitários para PHP. Ele é amplamente utilizado para garantir que o código funcione como esperado, ajudando a identificar e corrigir bugs antes que o software seja implantado. As principais características do PHPUnit incluem:

Testes Unitários: Permite a criação de testes que verificam o comportamento de unidades individuais de código, como funções e métodos.
Assertions: Oferece uma ampla gama de asserções que permitem verificar se o código está produzindo os resultados esperados.
Test Doubles: Suporte para mocks, stubs e outros tipos de objetos de teste que ajudam a isolar o código em testes.
Relatórios de Cobertura de Código: Gera relatórios que mostram quais partes do código foram cobertas por testes, ajudando a identificar áreas que precisam de mais testes.
Execução Automatizada: Integra-se facilmente com sistemas de integração contínua para executar testes automaticamente.
Laravel Telescope
Laravel Telescope é uma ferramenta de depuração e monitoramento para aplicações Laravel. Ele oferece uma visão abrangente sobre a atividade da aplicação, facilitando a identificação e resolução de problemas. Entre suas funcionalidades, destacam-se:

Monitoramento de Requisições: Permite visualizar detalhes sobre cada requisição HTTP, incluindo cabeçalhos, tempo de execução e resposta.
Consultas de Banco de Dados: Registra todas as consultas SQL executadas, junto com o tempo de execução, ajudando a identificar gargalos de desempenho.
Exceções e Erros: Captura e exibe exceções e erros, facilitando a depuração.
Eventos e Logs: Monitora eventos do sistema e logs de aplicação.
Jobs e Filas: Exibe detalhes sobre a execução de jobs e filas, incluindo falhas e tempos de execução.
Laravel Horizon
Laravel Horizon é um painel de controle para gerenciar filas no Laravel. Ele fornece uma interface rica para monitorar, configurar e gerenciar filas de jobs que são processados em segundo plano. Seus principais recursos incluem:

Dashboard em Tempo Real: Oferece uma visão em tempo real das filas, mostrando jobs ativos, concluídos e falhos.
Configuração de Filas: Permite configurar filas e balancear a carga de trabalho entre diferentes workers.
Monitoramento de Desempenho: Exibe estatísticas detalhadas sobre o tempo de execução de jobs, tempos de espera e outras métricas de desempenho.
Alertas e Notificações: Configura alertas para situações como falhas de jobs ou tempos de execução excessivos.
Suporte a Redis: Integra-se diretamente com Redis, aproveitando seu desempenho para gerenciar filas de forma eficiente.




### 1.2. Lógica do Sistema
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

Existem dois arquivos Kernel.php no sistema, porém, cumprem papéis diferentes no Laravel:

app/Http/Kernel.php:
Gerencia middlewares HTTP
Lida com requisições web
Define middlewares globais, grupos e aliases
Responsável pelo ciclo de vida das requisições HTTP

app/Console/Kernel.php:
Gerencia comandos do Artisan
Lida com tarefas agendadas (scheduling)
Define o agendamento de comandos
Responsável por tarefas em background e CLI





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



