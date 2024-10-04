# ARCHITECTURE.md

## Visão Geral do Sistema

Este documento descreve a arquitetura e estrutura do sistema de gerenciamento de manutenções, detalhando os componentes principais, suas funções e responsabilidades.





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

  Página principal do sistema após o login para administradores. Este arquivo PHP:
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
  Este arquivo é crucial para os técnicos realizarem e acompanharem as manutenções nas filiais, oferecendo uma visão clara das tarefas pendentes e concluídas.


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





### Diretorio PHP Raiz

- .htaccess
  Arquivo de configuração do Apache que aumenta a segurança e controla o comportamento do servidor web:
  - Define `index.php` e `index.html` como arquivos de índice padrão, nessa ordem de prioridade.
  - Desativa a listagem automática de diretórios (`Options -Indexes`), prevenindo a exposição da estrutura de arquivos do site.
  Essas configurações são cruciais para a segurança do sistema SIM, garantindo que os usuários sejam direcionados corretamente e não possam explorar a estrutura de diretórios.

Contém os arquivos PHP principais do sistema.
Descrição técnica: Ponto de entrada do aplicativo, inclui scripts de inicialização e páginas principais.



### Diretório /actions

Contém scripts PHP para ações específicas do sistema.
Descrição técnica: Implementa a lógica de negócios para operações CRUD e processamento de formulários.

1. **editar_manutencao.php**
   - Função: Processa a edição de registros de manutenção.
   - Responsabilidades: Validação de dados, atualização no banco de dados.

2. **finalizar_ciclo.php**
   - Função: Finaliza o ciclo de manutenções do mês.
   - Responsabilidades: Verificação de manutenções pendentes, atualização de status.

3. **listar_manutencoes_realizadas.php**
   - Função: Retorna a lista de manutenções realizadas.
   - Responsabilidades: Consulta ao banco de dados, formatação de dados para exibição.

4. **logout.php**
   - Função: Processa o logout do usuário.
   - Responsabilidades: Destruição de sessão, redirecionamento.

5. **obter_filiais.php**
   - Função: Retorna a lista de filiais.
   - Responsabilidades: Consulta ao banco de dados, formatação de resposta JSON.

6. **obter_registros.php**
   - Função: Obtém registros de manutenção.
   - Responsabilidades: Consulta ao banco de dados, paginação, formatação de resposta.

7. **registrar_manutencao.php**
   - Função: Registra uma nova manutenção.
   - Responsabilidades: Validação de dados, inserção no banco de dados.

8. **verificarciclo.php**
   - Função: Verifica o status do ciclo de manutenções atual.
   - Responsabilidades: Consulta ao banco de dados, cálculo de estatísticas.


### Diretório /admin

Contém scripts PHP relacionados às funcionalidades de administração.
Descrição técnica: Implementa interfaces e lógica para gerenciamento de usuários e configurações do sistema.

1. **alterar_senha.php**
   - Função: Permite ao administrador alterar sua própria senha.
   - Responsabilidades: Validação de senha atual, atualização de nova senha.

2. **redefinir_senha.php**
   - Função: Permite ao administrador redefinir a senha de um usuário.
   - Responsabilidades: Geração de nova senha, envio de e-mail ao usuário.

3. **update_admin_password.php**
   - Função: Processa a atualização da senha do administrador.
   - Responsabilidades: Validação de dados, atualização no banco de dados.

### Diretório /api

Contém endpoints da API do sistema.
Descrição técnica: Fornece interfaces RESTful para comunicação com clientes front-end e integração com outros sistemas.

1. **adicionar_usuario.php**
   - Função: Endpoint para adicionar novo usuário.
   - Responsabilidades: Validação de dados, inserção no banco de dados.

2. **editar_usuario.php**
   - Função: Endpoint para editar informações de usuário existente.
   - Responsabilidades: Validação de dados, atualização no banco de dados.

3. **excluir_usuario.php**
   - Função: Endpoint para excluir um usuário.
   - Responsabilidades: Verificação de permissões, remoção do banco de dados.

4. **gerar_relatorio.php**
   - Função: Endpoint para geração de relatórios.
   - Responsabilidades: Processamento de parâmetros, consulta ao banco de dados, formatação de relatório.

5. **gerenciar_usuarios.php**
   - Função: Endpoint para gerenciamento geral de usuários.
   - Responsabilidades: Listagem, adição, edição e exclusão de usuários.

6. **listar_usuarios.php**
   - Função: Endpoint para listar todos os usuários.
   - Responsabilidades: Consulta ao banco de dados, paginação, formatação de resposta.

### Diretório /includes

Contém arquivos PHP de configuração e funções utilitárias.
Descrição técnica: Armazena bibliotecas compartilhadas, funções auxiliares e configurações globais do sistema.

1. **auth.php**
   - Função: Gerencia a autenticação e autorização de usuários.
   - Responsabilidades: Verificação de sessão, controle de acesso.

2. **db_config.php**
   - Função: Configuração da conexão com o banco de dados.
   - Responsabilidades: Definição de constantes de conexão.

3. **db_credentials.php**
   - Função: Armazena as credenciais do banco de dados.
   - Responsabilidades: Definição segura de usuário e senha do banco.

4. **email_config.php**
   - Função: Configuração para envio de e-mails.
   - Responsabilidades: Definição de servidor SMTP, credenciais.

5. **functions.php**
   - Função: Contém funções utilitárias usadas em todo o sistema.
   - Responsabilidades: Funções de formatação, validação, etc.

6. **logging.php**
   - Função: Gerencia o sistema de logging.
   - Responsabilidades: Registro de eventos, erros e atividades do sistema.

### Diretório /js

Contém scripts JavaScript do cliente.
Descrição técnica: Implementa a lógica do lado do cliente para interatividade e manipulação dinâmica do DOM.

1. **admin_script.js**
   - Função: Gerencia as funcionalidades da interface do administrador.
   - Responsabilidades: Controle de usuários, visualização de logs, configurações do sistema.

2. **editar_manutencao.js**
   - Função: Controla a edição de registros de manutenção.
   - Responsabilidades: Atualização de datas, status e detalhes das manutenções realizadas.

3. **gerenciar_usuarios.js**
   - Função: Gerencia as operações relacionadas aos usuários do sistema.
   - Responsabilidades: Adicionar, editar, excluir e listar usuários.

4. **login.js**
   - Função: Controla o processo de autenticação dos usuários.
   - Responsabilidades: Validação de credenciais, gerenciamento de sessão.

5. **relatorios.js**
   - Função: Gera e exibe relatórios sobre as manutenções.
   - Responsabilidades: Filtrar dados, criar gráficos, exportar relatórios.

6. **script.js**
   - Função: Script principal que controla as funcionalidades gerais do sistema.
   - Responsabilidades: Inicialização de componentes, gerenciamento de estado global, roteamento.

7. **tecnico_script.js**
   - Função: Gerencia as funcionalidades específicas para os técnicos.
   - Responsabilidades: Registro de manutenções, visualização de tarefas pendentes, atualização de status.


### Diretório assets/

Este diretório serve como repositório para recursos estáticos utilizados no sistema, principalmente imagens.

- images/
  Subdiretório que armazena as imagens utilizadas no projeto:
  - background.jpg: Imagem de fundo utilizada no sistema.

A estrutura do diretório é a seguinte:
\sim\assets\images\background.jpg

Este diretório é essencial para armazenar e organizar os recursos visuais do sistema, facilitando a manutenção e a referência a esses arquivos em todo o projeto.




### Diretório css/
- styles.css
  Arquivo de estilos gerais do sistema:
  - Define variáveis CSS para cores principais do tema.
  - Estabelece estilos base para o corpo da página e container principal.
  - Define estilos para cabeçalhos, formulários, botões e elementos de feedback.
  - Inclui estilos responsivos para telas menores.
  - Contém estilos específicos para a tela de login.
  - Utiliza flexbox para centralização e organização de elementos.
  - Implementa transições suaves para interações com botões.

- login-styles.css
  Estilos específicos para a página de login:
  - Utiliza as mesmas variáveis de cor definidas em styles.css para manter consistência.
  - Centraliza o formulário de login na página.
  - Define estilos para o container de login, incluindo sombras e arredondamento de bordas.
  - Estiliza campos de entrada, botões e mensagens de erro.
  - Inclui estilos para link de "Esqueceu a senha".


  

### /tools
Contém scripts úteis para manutenção, teste e resolução de problemas.
Descrição técnica: Fornece utilitários para diagnóstico, testes de integração e tarefas de manutenção do sistema.









## Padrões de Desenvolvimento

1. Implementação correta de funções assíncronas em JavaScript
2. Garantir que todas as respostas do servidor sejam JSON válido
3. Implementar tratamento de erros adequado em chamadas AJAX
4. Usar cabeçalhos apropriados para prevenir cache indesejado
5. Implementar verificações de tipo de resposta antes de tentar analisar JSON
6. Melhorar a sanitização de dados de entrada
7. Adicionar comentários para melhorar a documentação
8. Implementar função de logging consistente
9. Melhorar a estrutura do código para maior legibilidade e manutenibilidade
10. Implementar escape de HTML para prevenir XSS
11. Utilizar constantes para URLs e outros valores fixos
12. Implementar validação de formulários no lado do cliente
13. Utilizar programação funcional e métodos de array modernos
14. Implementar debounce para eventos frequentes (como digitação)
15. Utilizar template literals para strings multilinhas
16. Implementar lazy loading para melhorar performance
17. Utilizar módulos ES6 para melhor organização do código
18. Implementar tratamento de erros específicos para diferentes tipos de falhas
19. Utilizar Promises e async/await de forma consistente
20. Implementar cache de dados no lado do cliente quando apropriado
21. Utilizar padrões de design como Módulo e Observador


