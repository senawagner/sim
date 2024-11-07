# Estrutura de Arquivos do Projeto SIM (Pacote de Implantação)

Atualizado em: 06/11/2024 13:51:07

Total: 45 pastas e 183 arquivos

Legenda:
🟨 representa pastas
🔵 representa arquivos

---

└── 🟨 C:
    └── 🟨 Projetos
        ├── 🟨 sim/app
        │   ├── 🟨 Console
        │   │   ├── 🟨 Commands
        │   │   │   ├── 🔵 GenerateMaintenanceNotifications.php
        │   │   │   ├── 🔵 UpdateDbStructure.php
        │   │   │   └── 🔵 UpdateFileStructure.php
        │   │   └── 🔵 Kernel.php
        │   ├── 🟨 Exceptions
        │   │   └── 🔵 Handler.php
        │   ├── 🟨 Http
        │   │   ├── 🟨 Controllers
        │   │   │   ├── 🟨 Administrador
        │   │   │   │   ├── 🔵 DashboardController.php
        │   │   │   │   ├── 🔵 EquipamentoController.php
        │   │   │   │   ├── 🔵 ManutencaoController.php
        │   │   │   │   ├── 🔵 RelatoriosController.php
        │   │   │   │   └── 🔵 UsuarioController.php
        │   │   │   ├── 🟨 Arquiteto
        │   │   │   │   ├── 🔵 DashboardController.php
        │   │   │   │   ├── 🔵 EquipamentoController.php
        │   │   │   │   └── 🔵 ManutencaoController.php
        │   │   │   ├── 🟨 Auth
        │   │   │   │   ├── 🔵 ConfirmPasswordController.php
        │   │   │   │   ├── 🔵 ForgotPasswordController.php
        │   │   │   │   ├── 🔵 LoginController.php
        │   │   │   │   ├── 🔵 RegisterController.php
        │   │   │   │   ├── 🔵 ResetPasswordController.php
        │   │   │   │   └── 🔵 VerificationController.php
        │   │   │   ├── 🟨 Coordenador
        │   │   │   │   ├── 🔵 DashboardController.php
        │   │   │   │   ├── 🔵 EquipamentoController.php
        │   │   │   │   └── 🔵 ManutencaoController.php
        │   │   │   ├── 🟨 Tecnico
        │   │   │   │   ├── 🔵 DashboardController.php
        │   │   │   │   ├── 🔵 EquipamentoController.php
        │   │   │   │   └── 🔵 ManutencaoController.php
        │   │   │   ├── 🔵 Controller.php
        │   │   │   ├── 🔵 HomeController.php
        │   │   │   └── 🔵 NotificationController.php
        │   │   ├── 🟨 Middleware
        │   │   │   ├── 🔵 Authenticate.php
        │   │   │   ├── 🔵 CheckPermission.php
        │   │   │   ├── 🔵 CheckProfile.php
        │   │   │   ├── 🔵 CheckUserRole.php
        │   │   │   ├── 🔵 EncryptCookies.php
        │   │   │   ├── 🔵 PreventRequestsDuringMaintenance.php
        │   │   │   ├── 🔵 RedirectIfAuthenticated.php
        │   │   │   ├── 🔵 TrimStrings.php
        │   │   │   ├── 🔵 TrustHosts.php
        │   │   │   ├── 🔵 TrustProxies.php
        │   │   │   ├── 🔵 ValidateSignature.php
        │   │   │   └── 🔵 VerifyCsrfToken.php
        │   │   ├── 🟨 Requests
        │   │   │   └── 🔵 EquipamentoRequest.php
        │   │   └── 🔵 Kernel.php
        │   ├── 🟨 Jobs
        │   │   ├── 🔵 ExampleJob.php
        │   │   └── 🔵 TestRedisJob.php
        │   ├── 🟨 Models
        │   │   ├── 🔵 Capacidade.php
        │   │   ├── 🔵 Empresa.php
        │   │   ├── 🔵 Equipamento.php
        │   │   ├── 🔵 Fabricante.php
        │   │   ├── 🔵 Filial.php
        │   │   ├── 🔵 Localizacao.php
        │   │   ├── 🔵 Manutencao.php
        │   │   ├── 🔵 Modelo.php
        │   │   ├── 🔵 Notification.php
        │   │   ├── 🔵 Setor.php
        │   │   └── 🔵 Usuario.php
        │   ├── 🟨 Notifications
        │   │   └── 🔵 TesteNotification.php
        │   ├── 🟨 Providers
        │   │   ├── 🔵 AppServiceProvider.php
        │   │   ├── 🔵 AuthServiceProvider.php
        │   │   ├── 🔵 BroadcastServiceProvider.php
        │   │   ├── 🔵 EquipamentoServiceProvider.php
        │   │   ├── 🔵 EventServiceProvider.php
        │   │   ├── 🔵 RouteServiceProvider.php
        │   │   └── 🔵 TelescopeServiceProvider.php
        │   ├── 🟨 Repositories
        │   │   ├── 🟨 Interfaces
        │   │   │   └── 🔵 EquipamentoRepositoryInterface.php
        │   │   └── 🔵 EquipamentoRepository.php
        │   └── 🟨 Services
        │       └── 🔵 NotificationService.php
        ├── 🟨 sim/bootstrap
        │   ├── 🟨 cache
        │   │   ├── 🔵 pac881F.tmp
        │   │   ├── 🔵 packages.php
        │   │   └── 🔵 services.php
        │   └── 🔵 app.php
        ├── 🟨 sim/nginx
        │   ├── 🔵 conf.d
        │   └── 🔵 default.conf
        ├── 🟨 sim/public
        │   ├── 🟨 css
        │   │   └── 🔵 app.css
        │   ├── 🟨 js
        │   │   ├── 🔵 app.js
        │   │   ├── 🔵 manutencao-equipamentos.js
        │   │   └── 🔵 manutencao-form-validation.js
        │   ├── 🟨 vendor
        │   │   └── 🟨 telescope
        │   │       ├── 🔵 app-dark.css
        │   │       ├── 🔵 app.css
        │   │       ├── 🔵 app.js
        │   │       ├── 🔵 favicon.ico
        │   │       └── 🔵 mix-manifest.json
        │   ├── 🔵 favicon.ico
        │   ├── 🔵 index.php
        │   └── 🔵 robots.txt
        ├── 🟨 sim/resources/views
        │   ├── 🟨 administrador
        │   │   ├── 🟨 equipamentos
        │   │   │   ├── 🔵 create.blade.php
        │   │   │   ├── 🔵 edit.blade.php
        │   │   │   ├── 🔵 index.blade.php
        │   │   │   └── 🔵 show.blade.php
        │   │   ├── 🟨 manutencoes
        │   │   │   ├── 🔵 create.blade.php
        │   │   │   ├── 🔵 edit.blade.php
        │   │   │   ├── 🔵 index.blade.php
        │   │   │   └── 🔵 show.blade.php
        │   │   ├── 🟨 relatorios
        │   │   │   └── 🔵 index.blade.php
        │   │   ├── 🟨 usuarios
        │   │   │   ├── 🔵 create.blade.php
        │   │   │   ├── 🔵 edit.blade.php
        │   │   │   ├── 🔵 index.blade.php
        │   │   │   └── 🔵 show.blade.php
        │   │   └── 🔵 dashboard.blade.php
        │   ├── 🟨 arquiteto
        │   │   ├── 🟨 equipamentos
        │   │   │   ├── 🔵 create.blade.php
        │   │   │   ├── 🔵 edit.blade.php
        │   │   │   ├── 🔵 index.blade.php
        │   │   │   └── 🔵 show.blade.php
        │   │   ├── 🟨 manutencoes
        │   │   │   ├── 🔵 create.blade.php
        │   │   │   ├── 🔵 edit.blade.php
        │   │   │   ├── 🔵 index.blade.php
        │   │   │   └── 🔵 show.blade.php
        │   │   └── 🔵 dashboard.blade.php
        │   ├── 🟨 auth
        │   │   ├── 🟨 passwords
        │   │   │   ├── 🔵 confirm.blade.php
        │   │   │   ├── 🔵 email.blade.php
        │   │   │   └── 🔵 reset.blade.php
        │   │   ├── 🔵 login.blade.php
        │   │   ├── 🔵 register.blade.php
        │   │   ├── 🔵 reset-password.blade.php
        │   │   └── 🔵 verify.blade.php
        │   ├── 🟨 components
        │   │   └── 🔵 flash-messages.blade.php
        │   ├── 🟨 coordenador
        │   │   ├── 🟨 equipamentos
        │   │   │   ├── 🔵 create.blade.php
        │   │   │   ├── 🔵 edit.blade.php
        │   │   │   └── 🔵 index.blade.php
        │   │   ├── 🟨 manutencoes
        │   │   │   ├── 🔵 create.blade.php
        │   │   │   ├── 🔵 edit.blade.php
        │   │   │   ├── 🔵 index.blade.php
        │   │   │   └── 🔵 show.blade.php
        │   │   └── 🔵 dashboard.blade.php
        │   ├── 🟨 layouts
        │   │   └── 🔵 app.blade.php
        │   ├── 🟨 notifications
        │   │   └── 🔵 index.blade.php
        │   ├── 🟨 tecnico
        │   │   ├── 🟨 equipamentos
        │   │   │   ├── 🔵 create.blade.php
        │   │   │   ├── 🔵 edit.blade.php
        │   │   │   └── 🔵 index.blade.php
        │   │   ├── 🟨 manutencoes
        │   │   │   ├── 🔵 create.blade.php
        │   │   │   ├── 🔵 edit.blade.php
        │   │   │   ├── 🔵 index.blade.php
        │   │   │   └── 🔵 show.blade.php
        │   │   └── 🔵 dashboard.blade.php
        │   └── 🔵 home.blade.php
        ├── 🟨 sim/storage/app
        │   └── 🔵 public
        ├── 🟨 sim/config
        │   ├── 🔵 app.php
        │   ├── 🔵 auth.php
        │   ├── 🔵 broadcasting.php
        │   ├── 🔵 cache.php
        │   ├── 🔵 cors.php
        │   ├── 🔵 database.php
        │   ├── 🔵 filesystems.php
        │   ├── 🔵 hashing.php
        │   ├── 🔵 logging.php
        │   ├── 🔵 mail.php
        │   ├── 🔵 permission.php
        │   ├── 🔵 queue.php
        │   ├── 🔵 sanctum.php
        │   ├── 🔵 services.php
        │   ├── 🔵 session.php
        │   ├── 🔵 telescope.php
        │   └── 🔵 view.php
        ├── 🟨 sim/database/migrations
        │   ├── 🔵 2014_10_12_100000_create_password_reset_tokens_table.php
        │   ├── 🔵 2014_10_12_100000_create_password_resets_table.php
        │   ├── 🔵 2018_08_08_100000_create_telescope_entries_table.php
        │   ├── 🔵 2019_08_19_000000_create_failed_jobs_table.php
        │   ├── 🔵 2019_12_14_000001_create_personal_access_tokens_table.php
        │   ├── 🔵 2024_03_21_000001_create_fabricantes_table.php
        │   ├── 🔵 2024_03_21_000002_create_capacidades_table.php
        │   ├── 🔵 2024_03_21_000003_create_modelos_table.php
        │   ├── 🔵 2024_03_21_000004_create_localizacao_table.php
        │   ├── 🔵 2024_03_21_000005_create_setor_table.php
        │   ├── 🔵 2024_03_21_000006_modify_equipamentos_change_andar_to_setor.php
        │   ├── 🔵 2024_10_04_225508_rename_tables_to_pt_br.php
        │   ├── 🔵 2024_10_05_000000_create_filiais_table.php
        │   ├── 🔵 2024_10_05_000001_create_equipamentos_table.php
        │   ├── 🔵 2024_10_06_000000_create_manutencoes_table.php
        │   ├── 🔵 2024_10_06_153345_create_notifications_table.php
        │   └── 🔵 2024_11_01_012255_create_permission_tables.php
        ├── 🟨 sim/docs
        │   ├── 🔵 architecture.html
        │   ├── 🔵 architecture.md
        │   ├── 🔵 coddarco_sim_db.sql
        │   ├── 🔵 commands.md
        │   ├── 🔵 cronogram.md
        │   ├── 🔵 database.md
        │   ├── 🔵 db_structure.md
        │   ├── 🔵 faq.md
        │   ├── 🔵 file_structure.md
        │   ├── 🔵 testes.md
        │   ├── 🔵 user-guide.md
        │   └── 🔵 user-system.md
        └── 🟨 sim/routes
            ├── 🔵 api.php
            ├── 🔵 channels.php
            ├── 🔵 console.php
            └── 🔵 web.php
