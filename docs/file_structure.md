# Estrutura de Arquivos do Projeto SIM (Pacote de Implantação)

Atualizado em: 03/11/2024 16:46:06

Total: 34 pastas e 135 arquivos

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
        │   │   │   ├── 🟨 Admin
        │   │   │   │   ├── 🔵 DashboardController.php
        │   │   │   │   ├── 🔵 EquipamentoController.php
        │   │   │   │   ├── 🔵 ManutencaoController.php
        │   │   │   │   ├── 🔵 RelatoriosController.php
        │   │   │   │   └── 🔵 UsuarioController.php
        │   │   │   ├── 🟨 Arquiteto
        │   │   │   │   └── 🔵 DashboardController.php
        │   │   │   ├── 🟨 Auth
        │   │   │   │   ├── 🔵 LoginController.php
        │   │   │   │   └── 🔵 ResetPasswordController.php
        │   │   │   ├── 🟨 Coordenador
        │   │   │   │   └── 🔵 DashboardController.php
        │   │   │   ├── 🟨 Dashboard
        │   │   │   │   ├── 🔵 AdminDashboardController.php
        │   │   │   │   ├── 🔵 ArquitetoDashboardController.php
        │   │   │   │   ├── 🔵 CoordenadorDashboardController.php
        │   │   │   │   ├── 🔵 DashboardController.php
        │   │   │   │   └── 🔵 TecnicoDashboardController.php
        │   │   │   ├── 🟨 Tecnico
        │   │   │   │   └── 🔵 DashboardController.php
        │   │   │   ├── 🔵 Controller.php
        │   │   │   └── 🔵 NotificationController.php
        │   │   ├── 🟨 Middleware
        │   │   │   ├── 🔵 Authenticate.php
        │   │   │   ├── 🔵 CheckPermission.php
        │   │   │   ├── 🔵 CheckUserRole.php
        │   │   │   ├── 🔵 EncryptCookies.php
        │   │   │   ├── 🔵 PreventRequestsDuringMaintenance.php
        │   │   │   ├── 🔵 RedirectIfAuthenticated.php
        │   │   │   ├── 🔵 TrimStrings.php
        │   │   │   ├── 🔵 TrustHosts.php
        │   │   │   ├── 🔵 TrustProxies.php
        │   │   │   ├── 🔵 ValidateSignature.php
        │   │   │   └── 🔵 VerifyCsrfToken.php
        │   │   └── 🔵 Kernel.php
        │   ├── 🟨 Jobs
        │   │   ├── 🔵 ExampleJob.php
        │   │   └── 🔵 TestRedisJob.php
        │   ├── 🟨 Models
        │   │   ├── 🔵 Empresa.php
        │   │   ├── 🔵 Equipamento.php
        │   │   ├── 🔵 Filial.php
        │   │   ├── 🔵 Manutencao.php
        │   │   ├── 🔵 Notification.php
        │   │   └── 🔵 Usuario.php
        │   ├── 🟨 Notifications
        │   │   └── 🔵 TesteNotification.php
        │   ├── 🟨 Providers
        │   │   ├── 🔵 AppServiceProvider.php
        │   │   ├── 🔵 AuthServiceProvider.php
        │   │   ├── 🔵 BroadcastServiceProvider.php
        │   │   ├── 🔵 EventServiceProvider.php
        │   │   ├── 🔵 RouteServiceProvider.php
        │   │   └── 🔵 TelescopeServiceProvider.php
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
        │   ├── 🟨 admin
        │   │   ├── 🟨 equipamentos
        │   │   │   ├── 🔵 create.blade.php
        │   │   │   ├── 🔵 edit.blade.php
        │   │   │   └── 🔵 index.blade.php
        │   │   ├── 🟨 manutencoes
        │   │   │   ├── 🔵 create.blade.php
        │   │   │   ├── 🔵 edit.blade.php
        │   │   │   ├── 🔵 index.blade.php
        │   │   │   └── 🔵 show.blade.php
        │   │   ├── 🔵 dashboard.blade.php
        │   │   ├── 🔵 relatorios.blade.php
        │   │   └── 🔵 usuarios.blade.php
        │   ├── 🔵 arquiteto
        │   ├── 🟨 auth
        │   │   ├── 🔵 login.blade.php
        │   │   └── 🔵 reset-password.blade.php
        │   ├── 🟨 components
        │   │   └── 🔵 flash-messages.blade.php
        │   ├── 🔵 coordenador
        │   ├── 🟨 layouts
        │   │   └── 🔵 app.blade.php
        │   ├── 🟨 notifications
        │   │   └── 🔵 index.blade.php
        │   └── 🟨 tecnico
        │       └── 🔵 dashboard.blade.php
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
        │   ├── 🔵 2014_10_12_000000_create_users_table.php
        │   ├── 🔵 2014_10_12_100000_create_password_reset_tokens_table.php
        │   ├── 🔵 2018_08_08_100000_create_telescope_entries_table.php
        │   ├── 🔵 2019_08_19_000000_create_failed_jobs_table.php
        │   ├── 🔵 2019_12_14_000001_create_personal_access_tokens_table.php
        │   ├── 🔵 2024_10_04_225508_rename_tables_to_pt_br.php
        │   ├── 🔵 2024_10_06_153345_create_notifications_table.php
        │   ├── 🔵 2024_10_06_215254_add_data_programada_to_manutencoes_table.php
        │   ├── 🔵 2024_10_06_221646_add_data_realizada_to_manutencoes_table.php
        │   ├── 🔵 2024_10_07_070830_add_status_to_manutencoes_table.php
        │   ├── 🔵 2024_10_07_075104_update_notifications_table_structure.php
        │   ├── 🔵 2024_10_07_082047_update_notifications_table.php
        │   ├── 🔵 2024_10_07_082319_update_notifications_id_column.php
        │   ├── 🔵 2024_10_07_185538_update_manutencoes_table.php
        │   ├── 🔵 2024_10_08_073001_create_contratos_pmoc_table.php
        │   ├── 🔵 2024_10_08_073435_create_ciclos_manutencao_table.php
        │   ├── 🔵 2024_10_08_073608_create_itens_verificacao_table.php
        │   ├── 🔵 2024_10_08_074211_add_data_preferencial_to_filiais_table.php
        │   ├── 🔵 2024_11_01_012255_create_permission_tables.php
        │   └── 🔵 2024_11_01_013211_ajustar_campos_tabela_equipamentos_v3.php
        ├── 🟨 sim/docs
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
