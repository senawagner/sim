# Estrutura do Banco de Dados

## Tabela: ciclos_manutencao

| Coluna | Tipo | Nulo | Chave | Padrão | Extra |
|--------|------|------|-------|--------|-------|
| id | bigint(20) unsigned | NO | PRI |  | auto_increment |
| created_at | timestamp | YES |  |  |  |
| updated_at | timestamp | YES |  |  |  |

## Tabela: contratos_pmoc

| Coluna | Tipo | Nulo | Chave | Padrão | Extra |
|--------|------|------|-------|--------|-------|
| id | bigint(20) unsigned | NO | PRI |  | auto_increment |
| created_at | timestamp | YES |  |  |  |
| updated_at | timestamp | YES |  |  |  |

## Tabela: empresas

| Coluna | Tipo | Nulo | Chave | Padrão | Extra |
|--------|------|------|-------|--------|-------|
| id | bigint(20) unsigned | NO | PRI |  | auto_increment |
| nome | varchar(191) | NO |  |  |  |
| cnpj | varchar(14) | NO | UNI |  |  |
| endereco | varchar(191) | YES |  |  |  |
| telefone | varchar(15) | YES |  |  |  |
| email | varchar(191) | YES |  |  |  |
| site | varchar(191) | YES |  |  |  |
| criado_em | timestamp | NO |  | current_timestamp() |  |
| atualizado_em | timestamp | NO |  | current_timestamp() | on update current_timestamp() |

## Tabela: equipamentos

| Coluna | Tipo | Nulo | Chave | Padrão | Extra |
|--------|------|------|-------|--------|-------|
| equipamento_id | bigint(20) unsigned | NO | PRI |  | auto_increment |
| fabricante | varchar(100) | YES |  |  |  |
| tipo | enum('Split','ACJ') | YES |  |  |  |
| capacidade | varchar(50) | YES |  |  |  |
| numero_patrimonio | varchar(50) | YES |  |  |  |
| modelo_evaporadora | varchar(50) | YES |  |  |  |
| modelo_condensadora | varchar(50) | YES |  |  |  |
| caracteristicas | set('High Wall','Piso Teto','Inverter','Frio','Frio/Quente','110.Mono','220/Mono','220/Trifasico','380/Trifasico') | YES |  |  |  |
| filial_id | bigint(20) unsigned | YES | MUL |  |  |
| localizacao | varchar(100) | YES |  |  |  |
| andar | varchar(10) | YES |  |  |  |
| observacoes | text | YES |  |  |  |
| criado_em | timestamp | NO |  | current_timestamp() |  |
| atualizado_em | timestamp | NO |  | current_timestamp() | on update current_timestamp() |

## Tabela: failed_jobs

| Coluna | Tipo | Nulo | Chave | Padrão | Extra |
|--------|------|------|-------|--------|-------|
| id | bigint(20) unsigned | NO | PRI |  | auto_increment |
| uuid | varchar(191) | NO | UNI |  |  |
| connection | text | NO |  |  |  |
| queue | text | NO |  |  |  |
| payload | longtext | NO |  |  |  |
| exception | longtext | NO |  |  |  |
| failed_at | timestamp | NO |  | current_timestamp() |  |

## Tabela: filiais

| Coluna | Tipo | Nulo | Chave | Padrão | Extra |
|--------|------|------|-------|--------|-------|
| id | bigint(20) unsigned | NO | PRI |  | auto_increment |
| nome | varchar(100) | YES |  |  |  |
| endereco | varchar(255) | YES |  |  |  |
| cidade | varchar(100) | YES |  |  |  |
| estado | varchar(2) | YES |  |  |  |
| cnpj | varchar(18) | YES |  |  |  |
| observacoes | text | YES |  |  |  |
| dt_padrao | date | YES |  |  |  |
| criado_em | timestamp | NO |  | current_timestamp() |  |
| atualizado_em | timestamp | NO |  | current_timestamp() | on update current_timestamp() |

## Tabela: itens_verificacao

| Coluna | Tipo | Nulo | Chave | Padrão | Extra |
|--------|------|------|-------|--------|-------|
| id | bigint(20) unsigned | NO | PRI |  | auto_increment |
| created_at | timestamp | YES |  |  |  |
| updated_at | timestamp | YES |  |  |  |

## Tabela: manutencoes

| Coluna | Tipo | Nulo | Chave | Padrão | Extra |
|--------|------|------|-------|--------|-------|
| id | bigint(20) unsigned | NO | PRI |  | auto_increment |
| tipo | varchar(191) | YES |  |  |  |
| periodicidade | varchar(191) | YES |  |  |  |
| equipamento_id | bigint(20) unsigned | YES | MUL |  |  |
| usuario_id | bigint(20) unsigned | YES | MUL |  |  |
| filial_id | bigint(20) unsigned | YES | MUL |  |  |
| observacoes | text | YES |  |  |  |
| data_programada | date | YES |  |  |  |
| data_realizada | date | YES |  |  |  |
| status | varchar(191) | NO |  | pendente |  |
| created_at | timestamp | YES |  |  |  |
| updated_at | timestamp | YES |  |  |  |

## Tabela: migrations

| Coluna | Tipo | Nulo | Chave | Padrão | Extra |
|--------|------|------|-------|--------|-------|
| id | int(10) unsigned | NO | PRI |  | auto_increment |
| migration | varchar(191) | NO |  |  |  |
| batch | int(11) | NO |  |  |  |

## Tabela: model_has_permissions

| Coluna | Tipo | Nulo | Chave | Padrão | Extra |
|--------|------|------|-------|--------|-------|
| permission_id | bigint(20) unsigned | NO | PRI |  |  |
| model_type | varchar(191) | NO | PRI |  |  |
| model_id | bigint(20) unsigned | NO | PRI |  |  |

## Tabela: model_has_roles

| Coluna | Tipo | Nulo | Chave | Padrão | Extra |
|--------|------|------|-------|--------|-------|
| role_id | bigint(20) unsigned | NO | PRI |  |  |
| model_type | varchar(191) | NO | PRI |  |  |
| model_id | bigint(20) unsigned | NO | PRI |  |  |

## Tabela: notifications

| Coluna | Tipo | Nulo | Chave | Padrão | Extra |
|--------|------|------|-------|--------|-------|
| id | char(36) | NO | PRI |  |  |
| type | varchar(191) | NO |  |  |  |
| data | text | NO |  |  |  |
| created_at | timestamp | YES |  |  |  |
| updated_at | timestamp | YES |  |  |  |
| notifiable_type | varchar(191) | NO |  |  |  |
| notifiable_id | bigint(20) unsigned | NO |  |  |  |
| read_at | timestamp | YES |  |  |  |

## Tabela: password_reset_tokens

| Coluna | Tipo | Nulo | Chave | Padrão | Extra |
|--------|------|------|-------|--------|-------|
| email | varchar(191) | NO | PRI |  |  |
| token | varchar(191) | NO |  |  |  |
| created_at | timestamp | YES |  |  |  |

## Tabela: permissions

| Coluna | Tipo | Nulo | Chave | Padrão | Extra |
|--------|------|------|-------|--------|-------|
| id | bigint(20) unsigned | NO | PRI |  | auto_increment |
| name | varchar(191) | NO | MUL |  |  |
| guard_name | varchar(191) | NO |  |  |  |
| created_at | timestamp | YES |  |  |  |
| updated_at | timestamp | YES |  |  |  |

## Tabela: personal_access_tokens

| Coluna | Tipo | Nulo | Chave | Padrão | Extra |
|--------|------|------|-------|--------|-------|
| id | bigint(20) unsigned | NO | PRI |  | auto_increment |
| tokenable_type | varchar(191) | NO | MUL |  |  |
| tokenable_id | bigint(20) unsigned | NO | MUL |  |  |
| name | varchar(191) | NO |  |  |  |
| token | varchar(64) | NO | UNI |  |  |
| abilities | text | YES |  |  |  |
| last_used_at | timestamp | YES |  |  |  |
| expires_at | timestamp | YES |  |  |  |
| created_at | timestamp | YES |  |  |  |
| updated_at | timestamp | YES |  |  |  |

## Tabela: role_has_permissions

| Coluna | Tipo | Nulo | Chave | Padrão | Extra |
|--------|------|------|-------|--------|-------|
| permission_id | bigint(20) unsigned | NO | PRI |  |  |
| role_id | bigint(20) unsigned | NO | PRI |  |  |

## Tabela: roles

| Coluna | Tipo | Nulo | Chave | Padrão | Extra |
|--------|------|------|-------|--------|-------|
| id | bigint(20) unsigned | NO | PRI |  | auto_increment |
| name | varchar(191) | NO | MUL |  |  |
| guard_name | varchar(191) | NO |  |  |  |
| created_at | timestamp | YES |  |  |  |
| updated_at | timestamp | YES |  |  |  |

## Tabela: telescope_entries

| Coluna | Tipo | Nulo | Chave | Padrão | Extra |
|--------|------|------|-------|--------|-------|
| sequence | bigint(20) unsigned | NO | PRI |  | auto_increment |
| uuid | char(36) | NO | UNI |  |  |
| batch_id | char(36) | NO | MUL |  |  |
| family_hash | varchar(191) | YES | MUL |  |  |
| should_display_on_index | tinyint(1) | NO |  | 1 |  |
| type | varchar(20) | NO | MUL |  |  |
| content | longtext | NO |  |  |  |
| created_at | datetime | YES | MUL |  |  |

## Tabela: telescope_entries_tags

| Coluna | Tipo | Nulo | Chave | Padrão | Extra |
|--------|------|------|-------|--------|-------|
| entry_uuid | char(36) | NO | PRI |  |  |
| tag | varchar(191) | NO | PRI |  |  |

## Tabela: telescope_monitoring

| Coluna | Tipo | Nulo | Chave | Padrão | Extra |
|--------|------|------|-------|--------|-------|
| tag | varchar(191) | NO | PRI |  |  |

## Tabela: usuarios

| Coluna | Tipo | Nulo | Chave | Padrão | Extra |
|--------|------|------|-------|--------|-------|
| id | bigint(20) unsigned | NO | PRI |  | auto_increment |
| nome | varchar(255) | YES |  |  |  |
| email | varchar(191) | NO |  |  |  |
| perfil | enum('arquiteto','administrador','tecnico','coordenador') | YES |  | tecnico |  |
| email_verificado_em | timestamp | NO |  | current_timestamp() | on update current_timestamp() |
| senha | varchar(255) | YES |  |  |  |
| token_lembrete | varchar(100) | YES |  |  |  |
| criado_em | timestamp | NO |  | current_timestamp() |  |
| atualizado_em | timestamp | NO |  | current_timestamp() | on update current_timestamp() |
| nome_usuario | varchar(255) | YES |  |  |  |

