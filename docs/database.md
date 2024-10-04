# Documentação do Banco de Dados

## Tabela: usuarios

### Estrutura




sql
CREATE TABLE usuarios (
id int(11) NOT NULL AUTO_INCREMENT,
username varchar(50) NOT NULL,
password varchar(255) NOT NULL,
nome varchar(100) NOT NULL,
email varchar(100) NOT NULL,
perfil enum('admin','usuario') NOT NULL DEFAULT 'usuario',
is_admin tinyint(1) NOT NULL DEFAULT 0,
created_at timestamp NOT NULL DEFAULT current_timestamp(),
PRIMARY KEY (id),
UNIQUE KEY username (username),
UNIQUE KEY email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci




### Colunas
| Coluna     | Tipo                    | Nulo | Chave | Padrão            | Extra          |
|------------|-------------------------|------|-------|-------------------|----------------|
| id         | int(11)                 | NO   | PRI   | NULL              | auto_increment |
| username   | varchar(50)             | NO   | UNI   | NULL              |                |
| password   | varchar(255)            | NO   |       | NULL              |                |
| nome       | varchar(100)            | NO   |       | NULL              |                |
| email      | varchar(100)            | NO   | UNI   | NULL              |                |
| perfil     | enum('admin','usuario') | NO   |       | 'usuario'         |                |
| is_admin   | tinyint(1)              | NO   |       | 0                 |                |
| created_at | timestamp               | NO   |       | current_timestamp |                |

### Chaves Estrangeiras
Nenhuma chave estrangeira nesta tabela.

## Tabela: filiais

### Estrutura



### Colunas
| Coluna     | Tipo                    | Nulo | Chave | Padrão            | Extra          |
|------------|-------------------------|------|-------|-------------------|----------------|
| id         | int(11)                 | NO   | PRI   | NULL              | auto_increment |
| username   | varchar(50)             | NO   | UNI   | NULL              |                |
| password   | varchar(255)            | NO   |       | NULL              |                |
| nome       | varchar(100)            | NO   |       | NULL              |                |
| email      | varchar(100)            | NO   | UNI   | NULL              |                |
| perfil     | enum('admin','usuario') | NO   |       | 'usuario'         |                |
| is_admin   | tinyint(1)              | NO   |       | 0                 |                |
| created_at | timestamp               | NO   |       | current_timestamp |                |

### Chaves Estrangeiras
Nenhuma chave estrangeira nesta tabela.

## Tabela: filiais

### Estrutura













