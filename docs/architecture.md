# ARCHITECTURE.md

## Visão Geral do Sistema

Este documento descreve a arquitetura e estrutura do sistema de gerenciamento de manutenções, detalhando os componentes principais, suas funções e responsabilidades.

## Lógica do Sistema



1. **index.php**
   - Função: Página inicial do sistema.
   - Responsabilidades: Autenticação de usuários, redirecionamento para dashboard apropriado.

  Página principal de login e processamento de autenticação. Este arquivo PHP:
  - Processa login via AJAX e formulário tradicional.
  - Implementa logging personalizado para rastrear tentativas de login.
  - Conecta-se ao banco de dados para autenticação de usuários.
  - Gerencia sessões de usuário após login bem-sucedido.
  - Renderiza o formulário HTML de login para requisições não-AJAX.
  - Implementa medidas de segurança como sanitização de entrada e uso de prepared statements.
  - Utiliza password_verify() para verificação segura de senhas.
  - Redireciona para dashboard.php ou tecnico_dashboard.php após login bem-sucedido, dependendo do perfil do usuário.
  - Trata erros e fornece feedback ao usuário em caso de falha no login.
  - Suporta limpeza automática de logs antigos.
  Este arquivo é crucial para a segurança e controle de acesso do sistema, garantindo que apenas usuários autenticados possam acessar as funcionalidades internas.


2. **dashboard.php**
   - Função: Painel principal para usuários autenticados.
   - Responsabilidades: Exibição de resumo de atividades, acesso a funcionalidades principais.

  Página principal do sistema após o login de usuários com perfil de Administrador. Este arquivo PHP:
  - Inicia a sessão e verifica a autenticação do usuário.
  - Configura logs personalizados para rastreamento de atividades.
  - Conecta-se ao banco de dados e obtém informações sobre filiais, técnicos e estatísticas.
  - Gera uma interface HTML com várias seções:
    - Estatísticas gerais do sistema.
    - Filtros para visualização de manutenções específicas.
    - Formulário para registrar novas manutenções.
    - Exibição de registros de manutenção existentes.
    - Status atual das filiais.
    - Opção para finalizar o ciclo de manutenções.
  - Inclui funcionalidades de logout e links para gerenciamento de usuários e relatórios.
  - Utiliza JavaScript (admin_script.js) para interatividade e funcionalidades dinâmicas.
  Este arquivo é crucial para a funcionalidade central do sistema, fornecendo uma visão geral completa e controle das operações de manutenção para administradores.


3. **tecnico_dashboard.php**
   - Função: Painel específico para técnicos.
   - Responsabilidades: Visualização de tarefas pendentes, registro de manutenções.

  Dashboard específico para usuários com perfil de técnico. Este arquivo PHP:
  - Inicia a sessão e verifica se o usuário está logado e tem o perfil de técnico.
  - Implementa logging personalizado para rastrear acessos e ações no dashboard.
  - Conecta-se ao banco de dados para obter a lista de filiais.
  - Gera uma interface HTML com duas seções principais:
    1. Formulário para registrar novas manutenções, permitindo selecionar a filial e a data.
    2. Exibição dos registros de manutenção do mês atual, incluindo:
       - Lista de manutenções já realizadas.
       - Lista de filiais pendentes de manutenção.
  - Utiliza JavaScript (tecnico_script.js) para funcionalidades dinâmicas como submissão de formulário e atualização de listas.
  - Inclui verificações de segurança e tratamento de erros.
  - Fornece opção de logout.
  - Identifica o usuário logado como técnico responsável pelo registro de manutenção
  Este arquivo é crucial para os técnicos realizarem e acompanharem as manutenções nas filiais, oferecendo uma visão clara das tarefas pendentes e concluídas.


  - Função: Painel específico para técnicos com perfil Coordenador.
  - Responsabilidades: Visualização de tarefas pendentes, registro e edição de manutenções.
  - O usuário com esse perfil pode ver as manutenções de todas as filiais, podendo também editar o status de uma manutenção, excluir ou registrar uma nova manutenção.
  - Opção para finalizar o ciclo de manutenções.


4. **relatorios.php**
   - Função: Geração e exibição de relatórios.
   - Responsabilidades: Seleção de parâmetros, geração de relatórios diversos.

  Página para geração e visualização de relatórios avançados do sistema. Este arquivo PHP:
  - Verifica a autenticação do usuário e restringe o acesso apenas a administradores usando Auth::requireAdmin().
  - Implementa logging personalizado para registrar acessos à página de relatórios.
  - Gera uma interface HTML com um formulário para seleção de diferentes tipos de relatórios:
    - Manutenções por Período
    - Manutenções por Filial
    - Manutenções por Técnico
  - Inclui campos para seleção de intervalo de datas para os relatórios.
  - Utiliza JavaScript (relatorios.js) para processamento e exibição dinâmica dos relatórios.
  - Fornece navegação de volta para o dashboard e opção de logout.
  Este arquivo é essencial para a análise e acompanhamento das atividades de manutenção, permitindo aos administradores obter insights valiosos sobre o desempenho do sistema e das equipes de manutenção.


5. **gerenciar_usuarios.php**
  Interface de administração para gerenciamento de usuários. Este arquivo PHP:
  - Inicia a sessão e verifica se o usuário tem permissões de administrador usando Auth::requireAdmin().
  - Conecta-se ao banco de dados e obtém a lista de todos os usuários.
  - Implementa uma função de logging personalizada para registrar acessos à página.
  - Gera uma interface HTML com duas seções principais:
    1. Formulário para adicionar novos usuários com campos para username, senha, nome completo, e-mail e perfil.
    2. Tabela listando todos os usuários existentes com opções para editar e excluir cada usuário.
  - Utiliza JavaScript (gerenciar_usuarios.js) para manipulação dinâmica dos dados de usuários.
  - Inclui medidas de segurança como escape de saída HTML para prevenir XSS.
  - Fornece navegação de volta para o dashboard e opção de logout.
  Este arquivo é essencial para a administração do sistema, permitindo o controle completo sobre as contas de usuário.

6. **redefinir_senha.php**
   - Função: Permite aos usuários redefinir suas senhas.
   - Responsabilidades: Validação de token, atualização de senha no banco de dados.


## Banco de Dados

