# Cronograma de Migração para Laravel e Docker

## 1. Configuração do Ambiente Docker
- **Status**: ✅ Concluído
- **Descrição**: Configurar o ambiente Docker para o projeto.
- **Tarefas**:
  1. ✅ Criar Dockerfile para o projeto Laravel.
  2. ✅ Criar docker-compose.yml com serviços para PHP, Nginx, e MySQL.
  3. ✅ Configurar volumes para persistência de dados.
  4. ✅ Criar arquivo .dockerignore.

## 2. Inicialização do Projeto
- **Status**: ✅ Concluído
- **Descrição**: Configurar o repositório e estrutura inicial do projeto.
- **Tarefas**:
  1. ✅ Criar um novo repositório no GitHub
  2. ✅ Inicializar o repositório local com git init
  3. ✅ Criar .gitignore para Laravel e Alpine
  4. ✅ Fazer o primeiro commit e push para o GitHub

## 3. Instalação e Configuração do Backend (Laravel)
- **Status**: ✅ Concluído
- **Descrição**: Instalar e configurar o projeto Laravel no ambiente Docker.
- **Tarefas**:
  1. ✅ Criar projeto Laravel usando Composer dentro do container
  2. ✅ Configurar o arquivo .env para uso com Docker
  3. ✅ Gerar chave de aplicação Laravel
  4. ✅ Configurar conexão com o banco de dados MySQL
  5. ✅ Configurar conexão com Redis para cache e sessões

## 4. Otimização do Ambiente Docker
- **Status**: ✅ Concluído
- **Descrição**: Otimizar a configuração Docker para melhor desempenho e segurança.
- **Tarefas**:
  1. ✅ Otimizar Dockerfile para reduzir o tamanho da imagem
  2. ✅ Configurar multi-stage build no Dockerfile
  3. ✅ Implementar health checks para os containers
  4. ✅ Configurar volumes nomeados para persistência de dados
  5. ✅ Implementar secrets para gerenciamento seguro de credenciais

## 5. Instalação de Pacotes e Ferramentas Adicionais
- **Status**: ✅ Concluído
- **Descrição**: Instalar e configurar pacotes adicionais necessários para o projeto.
- **Tarefas**:
  1. ✅ Instalar Laravel Sanctum para autenticação API
  2. ✅ Instalar Laravel Telescope para debugging e monitoramento
  3. ✅ Configurar Laravel Sanctum
  4. ✅ Configurar Laravel Telescope

## 6. Configuração do Banco de Dados Remoto
- **Status**: ✅ Concluído
- **Descrição**: Configurar a aplicação Laravel para usar um banco de dados MySQL hospedado remotamente no cPanel.
- **Tarefas**:
  1. ✅ Obter informações de conexão do banco de dados remoto
  2. ✅ Atualizar o arquivo .env com as informações do banco remoto
  3. ✅ Ajustar a configuração no arquivo config/database.php
  4. ✅ Remover a configuração do banco de dados local do docker-compose.yml
  5. ✅ Testar a conexão com o banco de dados remoto
  6. ✅ Executar migrações no banco de dados remoto

## 7. Modelagem do Banco de Dados
- **Status**: ✅ Concluído
- **Descrição**: Sincronizar a estrutura do banco de dados existente com o Laravel.
- **Tarefas**:
  1. ✅ Exportar estrutura do banco de dados remoto
  2. ✅ Criar migrações para tabelas existentes:
     - ✅ Criar migração para tabela 'empresas'
     - ✅ Criar migração para tabela 'equipamentos'
     - ✅ Criar migração para tabela 'filiais'
     - ✅ Criar migração para tabela 'manutencoes'
     - ✅ Criar migração para tabela 'usuarios'
  3. ✅ Preencher migrações com estrutura existente:
     - ✅ Preencher migração 'empresas'
     - ✅ Preencher migração 'equipamentos'
     - ✅ Preencher migração 'filiais'
     - ✅ Preencher migração 'manutencoes'
     - ✅ Preencher migração 'usuarios'
  4. ✅ Criar modelos Eloquent:
     - ✅ Criar modelo Empresa
     - ✅ Criar modelo Equipamento
     - ✅ Criar modelo Filial
     - ✅ Criar modelo Manutencao
     - ✅ Criar modelo Usuario
  5. ✅ Configurar modelos Eloquent:
     - ✅ Configurar modelo Empresa
     - ✅ Configurar modelo Equipamento
     - ✅ Configurar modelo Filial
     - ✅ Configurar modelo Manutencao
     - ✅ Configurar modelo Usuario
  6. ✅ Marcar migrações como executadas:
     - ✅ Instalar tabela de migrações
     - ✅ Inserir registros para cada migração na tabela 'migrations'
  7. ✅ Verificar status das migrações
  8. ✅ Testar conexão e consultas básicas com o banco de dados remoto

## 8. Criação de Rotas e API
- **Status**: ✅ Concluído
- **Descrição**: Definir rotas Laravel e endpoints de API.
- **Tarefas**:
  1. ✅ Configurar rotas web para páginas existentes.
  2. ✅ Criar rotas de API para funcionalidades existentes.
  3. ✅ Implementar controladores de API.

## 9. Criação de Views e Controladores
- **Status**: ✅ Concluído
- **Descrição**: Criar views e controladores do zero seguindo as melhores práticas do Laravel.
- **Tarefas**:
  1. ✅ Criar views:
     - ✅ Criar `resources/views/auth/login.blade.php`
     - ✅ Criar `resources/views/admin/dashboard.blade.php`
     - ✅ Criar `resources/views/tecnico/dashboard.blade.php`
     - ✅ Criar `resources/views/admin/relatorios.blade.php`
     - ✅ Criar `resources/views/admin/usuarios.blade.php`
     - ✅ Criar `resources/views/auth/reset-password.blade.php`
  2. ✅ Criar controladores:
     - ✅ Criar `app/Http/Controllers/Auth/LoginController.php`
     - ✅ Criar `app/Http/Controllers/Admin/DashboardController.php`
     - ✅ Criar `app/Http/Controllers/Tecnico/DashboardController.php`
     - ✅ Criar `app/Http/Controllers/Admin/RelatoriosController.php`
     - ✅ Criar `app/Http/Controllers/Admin/UserController.php`
     - ✅ Criar `app/Http/Controllers/Auth/ResetPasswordController.php`
  3. ✅ Implementar lógica básica nos controladores.
  4. ✅ Implementar templates Blade nas views.

## 10. Implementação de Sistema de Notificações
- **Status**: ✅ Concluído
- **Descrição**: Implementar sistema de notificações para alertar sobre manutenções próximas ou atrasadas.
- **Tarefas**:
  1. ✅ Criar modelo e migração para notificações.
  2. ✅ Implementar lógica de geração de notificações.
  3. ✅ Criar interface para exibição de notificações.
  4. ✅ Implementar notificações em tempo real (opcional, usando websockets).

## 11. Implementação do Dashboard do Administrador
- **Status**: ✅ Concluído
- **Descrição**: Desenvolver e implementar o dashboard principal para o perfil de administrador, integrando as funcionalidades já implementadas.
- **Tarefas**:
  1. ✅ Criar layout base para o dashboard do administrador.
  2. ✅ Implementar sidebar com menu de navegação.
  3. ✅ Criar componentes reutilizáveis para elementos comuns do dashboard.
  4. ✅ Integrar sistema de notificações ao dashboard.
  5. ✅ Implementar visão geral de manutenções (agendadas, em andamento, concluídas).
  6. ✅ Criar seção de relatórios rápidos.
  7. ✅ Implementar funcionalidade de gerenciamento de usuários.
  8. ✅ Adicionar visualização de métricas básicas (KPIs).
  9. ✅ Testar e otimizar a performance do dashboard.

## 12. Implementação da Funcionalidade de Registrar Manutenções
- **Status**: ✅ Concluído
- **Descrição**: Desenvolver a funcionalidade para registrar novas manutenções no sistema.
- **Tarefas**:
  1. ✅ Criar ManutencaoController com métodos create e store.
  2. ✅ Criar ManutencaoRequest para validação dos dados.
  3. ✅ Atualizar o modelo Manutencao com relações e métodos necessários.
  4. ✅ Criar view para o formulário de registro de manutenção.
  5. ✅ Implementar lógica JavaScript para carregamento dinâmico de equipamentos.
  6. ✅ Adicionar rota para criação de manutenções no arquivo web.php.
  7. ✅ Integrar a funcionalidade de registro de manutenções ao dashboard do administrador.
  8. ✅ Implementar feedback visual após o registro bem-sucedido de uma manutenção.
  9. ✅ Testar a funcionalidade de registro de manutenções.

## 13. Reestruturação do Dashboard do Administrador e Implementação de Funcionalidades Adicionais
- **Status**: 🔵 Em Andamento
- **Descrição**: Redesenhar e implementar um novo dashboard administrativo focado em métricas e visão geral do sistema, além de implementar funcionalidades adicionais.
- **Tarefas**:
  1. ✅ Remover campos de registro de manutenção do dashboard principal do administrador.
  2. ✅ Criar componentes para exibição de métricas (Total de Usuários, Manutenções pendentes, Total de Equipamentos, etc.).
  3. ✅ Implementar gráficos e visualizações de dados usando uma biblioteca como Chart.js.
  4. ✅ Adicionar seção de relatórios rápidos.
  5. ✅ Criar componente para exibição de ciclos de manutenção ativos.
  6. ✅ Implementar layout responsivo similar ao modelo fornecido.
  7. ✅ Integrar dados reais do sistema nas métricas e gráficos.
  8. 🔵 Verificar menu Manutenções e suas funcionalidades:
     - Listar manutenções
     - Criar nova manutenção
     - Editar manutenção existente
     - Excluir manutenção
     - Filtrar manutenções por status, data, equipamento, etc.
  9. 🔵 Verificar menu Relatórios e suas funcionalidades:
     - Relatório de manutenções por período
     - Relatório de equipamentos por filial
     - Relatório de desempenho de técnicos
     - Exportação de relatórios em diferentes formatos (PDF, Excel)
  10. 🔵 Implementar cadastro de usuários e suas funcionalidades:
      - Listar usuários
      - Criar novo usuário
      - Editar usuário existente
      - Desativar/reativar usuário
      - Gerenciar permissões de usuário
  11. 🔵 Criar os outros cadastros de acordo com as tabelas do banco de dados:
      - Implementar CRUD para Filiais:
        - Listar filiais
        - Criar nova filial
        - Editar filial existente
        - Desativar/reativar filial
      - Implementar CRUD para Equipamentos:
        - Listar equipamentos
        - Criar novo equipamento
        - Editar equipamento existente
        - Desativar/reativar equipamento
      - Implementar CRUD para Empresas (se aplicável):
        - Listar empresas
        - Criar nova empresa
        - Editar empresa existente
        - Desativar/reativar empresa
  12. 🔵 Implementar relacionamentos entre os modelos:
      - Associar equipamentos a filiais
      - Associar manutenções a equipamentos e técnicos
      - Associar usuários a empresas ou filiais (se aplicável)
  13. 🔵 Implementar validações e regras de negócio para todos os cadastros
  14. 🔵 Criar testes automatizados para as novas funcionalidades
  15. 🔵 Otimizar consultas ao banco de dados para melhorar a performance
  16. 🔵 Implementar sistema de logs para ações importantes no sistema

## 14. Implementação do Sistema de Permissões e Papéis
- **Status**: ✅ Em Implementação
- **Descrição**: Sistema dividido em duas fases: temporária e definitiva.

### Fase 1 - Sistema Temporário (Durante Desenvolvimento)
- **Status**: ✅ Implementado
- **Tarefas**:
  1. ✅ Implementar middleware CheckUserRole com os seguintes perfis:
     - Arquiteto (acesso total)
     - Administrador
     - Coordenador
     - Técnico
  2. ✅ Configurar verificação baseada no campo perfil
  3. ✅ Atualizar rotas para usar novo middleware
  4. ✅ Testar funcionalidades básicas de controle de acesso

### Fase 2 - Sistema Definitivo (Pré-Produção)
- **Status**: 🔴 Planejado
- **Tarefas**:
  1. Instalar e configurar spatie/laravel-permission
  2. Migrar do sistema temporário para o Spatie
  3. Implementar controle granular de permissões
  4. Criar interface de gerenciamento de papéis
  5. Realizar testes completos
  6. Documentar novo sistema

## 15. Implementação de Ciclos de Manutenção Automáticos
- **Status**: 🔵 Em Andamento
- **Descrição**: Desenvolver um sistema de ciclos de manutenção automáticos baseado nos contratos PMOC.
- **Tarefas**:
  1. 🔵 Modelagem de Dados:
     - ✅ Criar tabela para armazenar contratos PMOC (data início, data fim, cliente).
     - ✅ Criar tabela para armazenar ciclos de manutenção (mensal, trimestral, semestral).
     - ✅ Criar tabela para itens de verificação de cada ciclo.
     - ✅ Atualizar modelo de Filial para incluir data preferencial de manutenção.
  2. 🔵 Criação e Edição de Migrações:
     - ✅ Criar migração `create_contratos_pmoc_table`
     - ✅ Criar migração `create_ciclos_manutencao_table`
     - ✅ Criar migração `create_itens_verificacao_table`
     - ✅ Criar migração `add_data_preferencial_to_filiais_table`
     - 🔵 Editar migração `create_contratos_pmoc_table`:
       ```php
       public function up()
       {
           Schema::create('contratos_pmoc', function (Blueprint $table) {
               $table->id();
               $table->foreignId('empresa_id')->constrained('empresas');
               $table->date('data_inicio');
               $table->date('data_fim');
               $table->timestamps();
           });
       }
       ```
     - 🔴 Editar migração `create_ciclos_manutencao_table`
     - 🔴 Editar migração `create_itens_verificacao_table`
     - 🔴 Editar migração `add_data_preferencial_to_filiais_table`
  3. 🔴 Lógica de Geração de Ciclos:
     - Implementar função para gerar ciclos mensais automaticamente.
     - Implementar função para gerar ciclos trimestrais automaticamente.
     - Implementar função para gerar ciclos semestrais automaticamente.
     - Criar job para executar a geração de ciclos periodicamente.
  4. 🔴 Interface de Administração de Contratos:
     - Criar interface para cadastro e gerenciamento de contratos PMOC.
     - Implementar funcionalidade para iniciar ciclos manualmente, se necessário.
  5. 🔴 Atualização da View de Manutenção:
     - Adicionar cards para exibir status dos ciclos (Mensal, Trimestral, Semestral).
     - Implementar lógica para exibir informações específicas de cada ciclo.
     - Tornar campo de periodicidade não editável para ciclos automáticos.
     - Adicionar campo para exibir técnico responsável (usuário logado).
  6. 🔴 Implementação de Checklist de Manutenção:
     - Criar interface de checklist para itens de verificação de cada ciclo.
     - Implementar lógica de marcação de itens verificados.
     - Desenvolver sistema de baixa automática de equipamentos ao completar checklist.
     - Implementar lógica para concluir manutenção da filial quando todos equipamentos forem verificados.
  7. 🔴 Sistema de Notificações:
     - Implementar notificações para administradores sobre conclusão de manutenções.
     - Criar alertas para manutenções próximas ou atrasadas.
  8. 🔴 Relatórios e Dashboards:
     - Atualizar dashboard do administrador para incluir visão geral dos ciclos de manutenção.
     - Criar relatórios específicos para acompanhamento de ciclos de manutenção.
  9. 🔴 Testes e Otimização:
     - Desenvolver testes unitários e de integração para a nova funcionalidade.
     - Realizar testes de carga para garantir performance com múltiplos contratos e ciclos.
     - Otimizar queries e lógica de geração de ciclos conforme necessário.
  10. 🔴 Documentação e Treinamento:
     - Atualizar documentação do sistema para incluir novas funcionalidades.
     - Criar guia de uso para administradores sobre gerenciamento de ciclos de manutenção.
     - Preparar material de treinamento para técnicos sobre o novo processo de registro de manutenções.
  11. 🔴 Implementação de Permissões:
      - Atualizar sistema de permissões para controlar acesso às novas funcionalidades.
      - Definir níveis de acesso para visualização e edição de ciclos de manutenção.

## 16. Reorganização da Navegação e Menu
- **Status**: 🔴 Não Iniciado
- **Descrição**: Reestruturar o menu de navegação para melhor organização das funcionalidades.
- **Tarefas**:
  1. Criar item de menu separado para "Manutenções".
  2. Implementar submenu para Manutenções (Registrar, Listar, Editar).
  3. Adicionar item de menu para "Equipamentos".
  4. Criar páginas e rotas para gerenciamento de equipamentos.
  5. Atualizar item de menu "Usuários" com submenu (Listar, Criar, Editar).
  6. Implementar lógica de exibição de menu baseada no perfil do usuário.

## 17. Implementação de Páginas Específicas
- **Status**: 🔴 Não Iniciado
- **Descrição**: Criar páginas dedicadas para cada funcionalidade principal.
- **Tarefas**:
  1. Criar página de listagem de manutenções.
  2. Implementar página de registro de nova manutenção.
  3. Desenvolver página de edição de manutenção existente.
  4. Criar página de listagem de equipamentos.
  5. Implementar página de cadastro/edição de equipamentos.
  6. Desenvolver página de listagem de usuários.
  7. Criar página de cadastro/edição de usuários.

## 18. Implementação de Jobs e Filas
- **Status**: 🔴 Não Iniciado
- **Descrição**: Migrar tarefas pesadas para jobs em background.
- **Tarefas**:
  1. Identificar operações que podem se beneficiar de processamento em background.
  2. Criar jobs Laravel para essas operações.
  3. Configurar e testar sistema de filas.

## 19. Configuração de Logging e Error Handling
- **Status**: 🔴 Não Iniciado
- **Descrição**: Migrar sistema de logging existente para o sistema de logging do Laravel.
- **Tarefas**:
  1. Configurar canais de log do Laravel.
  2. Implementar error handling e reporting personalizado.
  3. Integrar com serviços de monitoramento, se necessário.

## 20. Testes e Qualidade de Código
- **Status**: 🔴 Não Iniciado
- **Descrição**: Implementar testes automatizados e ferramentas de qualidade de código.
- **Tarefas**:
  1. Escrever testes unitários para modelos e serviços.
  2. Implementar testes de integração para fluxos principais.
  3. Configurar ferramentas de análise estática de código (ex: Laravel Pint).

## 21. Aprimoramento da Experiência do Usuário
- **Status**: 🔴 Não Iniciado
- **Descrição**: Melhorar a interface e experiência do usuário em todo o sistema.
- **Tarefas**:
  1. Implementar feedback visual para ações do usuário (toasts, alertas).
  2. Adicionar animações sutis para transições entre páginas.
  3. Melhorar a responsividade para dispositivos móveis.
  4. Implementar temas claro/escuro (opcional).
  5. Otimizar tempos de carregamento e performance geral.

## 22. Implementação de Funcionalidades Avançadas
- **Status**: 🔴 Não Iniciado
- **Descrição**: Adicionar funcionalidades avançadas para melhorar a utilidade do sistema.
- **Tarefas**:
  1. Implementar sistema de busca avançada para manutenções e equipamentos.
  2. Criar funcionalidade de exportação de dados (PDF, Excel).
  3. Desenvolver sistema de alertas personalizáveis.
  4. Implementar dashboard personalizado por usuário (widgets configuráveis).

## 23. Testes e Otimização
- **Status**: 🔴 Não Iniciado
- **Descrição**: Realizar testes abrangentes e otimizar o desempenho do sistema.
- **Tarefas**:
  1. Executar testes de usabilidade com usuários reais.
  2. Realizar testes de carga e estresse.
  3. Otimizar consultas ao banco de dados.
  4. Implementar cache onde apropriado.
  5. Realizar auditoria de segurança.

## 24. Documentação e Treinamento
- **Status**: 🔴 Não Iniciado
- **Descrição**: Preparar documentação e materiais de treinamento para usuários finais.
- **Tarefas**:
  1. Criar manual do usuário detalhado.
  2. Desenvolver guias rápidos para funcionalidades principais.
  3. Preparar material de treinamento para diferentes perfis de usuário.
  4. Criar vídeos tutoriais para funcionalidades complexas.

## 25. Lançamento e Monitoramento
- **Status**: 🔴 Não Iniciado
- **Descrição**: Preparar o sistema para lançamento e implementar monitoramento contínuo.
- **Tarefas**:
  1. Realizar migração final de dados.
  2. Configurar ambiente de produção.
  3. Implementar sistema de monitoramento e alertas.
  4. Estabelecer processo de backup e recuperação.
  5. Planejar e executar lançamento faseado.
  6. Coletar e analisar feedback dos usuários pós-lançamento.

Melhorias Programadas
- **Status**: 🔵 Em Andamento
- **Descrição**: Implementar melhorias adicionais para aprimorar a funcionalidade e a experiência do usuário.
- **Tarefas**:
  - ✅ Implementar validação de formulários no lado do cliente:
    - ✅ Criar arquivo JavaScript para validação de formulários (`public/js/manutencao-form-validation.js`).
    - ✅ Implementar lógica de validação para cada campo do formulário.
    - ✅ Adicionar feedback visual para campos inválidos.
    - ✅ Integrar validação do cliente com o formulário de manutenção.
  - ✅ Melhorar e padronizar as mensagens flash:
    - ✅ Criar componente Blade para exibição de mensagens flash (`resources/views/components/flash-messages.blade.php`).
    - ✅ Atualizar o layout principal para incluir o novo componente.
    - ✅ Modificar os controladores para usar mensagens flash consistentes.
  - 🔵 Adicionar máscaras de entrada para campos específicos:
    - ✅ Escolher e instalar uma biblioteca de máscaras de entrada (por exemplo, Inputmask).
    - ✅ Criar arquivo JavaScript para aplicar máscaras (`public/js/input-masks.js`).
    - 🔵 Implementar máscaras para campos relevantes (por exemplo, data, códigos de equipamento).
    - 🔵 Integrar máscaras com o formulário de manutenção.
  - 🔴 Otimizar a estrutura de arquivos JavaScript:
    - Revisar e organizar os arquivos JavaScript existentes.
    - Mover scripts de desenvolvimento para `resources/js/`.
    - Configurar processo de compilação para gerar arquivos otimizados em `public/js/`.
    - Atualizar referências nos templates Blade para usar os arquivos compilados.
  - 🔵 Implementar funcionalidade de edição de manutenções:
    - ✅ Criar rota para edição de manutenções.
    - ✅ Implementar método de edição no ManutencaoController.
    - ✅ Criar view para o formulário de edição de manutenção.
    - 🔵 Implementar lógica de atualização no backend.
    - 🔵 Adicionar validação para o formulário de edição.
    - 🔵 Implementar feedback visual após edição bem-sucedida.
  - 🔵 Melhorar a listagem de manutenções:
    - ✅ Implementar paginação na listagem de manutenções.
    - 🔵 Adicionar filtros para a listagem (por status, data, equipamento, etc.).
    - 🔵 Implementar ordenação das colunas na listagem.
    - 🔵 Adicionar busca rápida na listagem de manutenções.
  - 🔴 Implementar sistema de permissões mais granular:
    - Definir níveis de permissão para diferentes ações no sistema.
    - Criar middleware para verificação de permissões.
    - Atualizar controladores e views para respeitar as novas permissões.
    - Criar interface de administração para gerenciar permissões de usuários.





    Middleware CheckUserRole com os seguintes perfis:
     - Arquiteto (acesso total)
     - Administrador
     - Coordenador
     - Tecnico