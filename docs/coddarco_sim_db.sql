-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 05/10/2024 às 00:19
-- Versão do servidor: 10.6.19-MariaDB-cll-lve
-- Versão do PHP: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `coddarco_sim_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresas`
--

CREATE TABLE `empresas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(191) NOT NULL,
  `cnpj` varchar(14) NOT NULL,
  `endereco` varchar(191) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `site` varchar(191) DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipamentos`
--

CREATE TABLE `equipamentos` (
  `equipamento_id` bigint(20) UNSIGNED NOT NULL,
  `fabricante` varchar(100) DEFAULT NULL,
  `tipo` enum('Split','ACJ') DEFAULT NULL,
  `capacidade` varchar(50) DEFAULT NULL,
  `numero_patrimonio` varchar(50) DEFAULT NULL,
  `modelo_evaporadora` varchar(50) DEFAULT NULL,
  `modelo_condensadora` varchar(50) DEFAULT NULL,
  `caracteristicas` set('High Wall','Piso Teto','Inverter','Frio','Frio/Quente','110.Mono','220/Mono','220/Trifasico','380/Trifasico') DEFAULT NULL,
  `filial_id` bigint(20) UNSIGNED DEFAULT NULL,
  `localizacao` varchar(100) DEFAULT NULL,
  `andar` varchar(10) DEFAULT NULL,
  `observacoes` text DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `filiais`
--

CREATE TABLE `filiais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `cnpj` varchar(18) DEFAULT NULL,
  `observacoes` text DEFAULT NULL,
  `dt_padrao` date DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Despejando dados para a tabela `filiais`
--

INSERT INTO `filiais` (`id`, `nome`, `endereco`, `cidade`, `estado`, `cnpj`, `observacoes`, `dt_padrao`, `criado_em`, `atualizado_em`) VALUES
(1, 'Sede Ana Costa', 'Av. Ana Costa, 402', 'Santos', 'SP', '44.974.822/0001-49', NULL, NULL, '2024-10-05 03:06:58', '2024-10-05 03:06:58'),
(2, 'Conselheiro Nébias', 'Av. Conselheiro Nébias, 518', 'Santos', 'SP', '44.974.822/0008-15', NULL, NULL, '2024-10-05 03:06:58', '2024-10-05 03:06:58'),
(3, 'Medicina Ocupacional', 'Av. Conselheiro Nébias, 518', 'Santos', 'SP', '44.974.822/0008-15', NULL, NULL, '2024-10-05 03:06:58', '2024-10-05 03:06:58'),
(4, 'Azevedo Sodré', 'Av. Conselheiro Nébias, 738', 'Santos', 'SP', '44.974.822/0009-04', NULL, NULL, '2024-10-05 03:06:58', '2024-10-05 03:06:58'),
(5, 'Ponta da Praia', 'Av. Epitácio Pessoa, 660', 'Santos', 'SP', '44.974.822/0013-82', NULL, NULL, '2024-10-05 03:06:58', '2024-10-05 03:06:58'),
(6, 'Vila Belmiro', 'Av. Bernadino de Campos, 4', 'Santos', 'SP', '44.974.822/0015-44', NULL, NULL, '2024-10-05 03:06:58', '2024-10-05 03:06:58'),
(7, 'Senador Dantas', 'Rua Liberdade, 159', 'Santos', 'SP', '44.974.822/0017-06', NULL, NULL, '2024-10-05 03:06:58', '2024-10-05 03:06:58'),
(8, 'XV de Novembro', 'Rua XV de Novembro, 313', 'São Vicente', 'SP', '44.974.822/0003-00', NULL, NULL, '2024-10-05 03:06:58', '2024-10-05 03:06:58'),
(9, 'Presidente Wilson', 'Av. Presidente Wilson, 456', 'São Vicente', 'SP', '44.974.822/0002-20', NULL, NULL, '2024-10-05 03:06:58', '2024-10-05 03:06:58'),
(10, 'Praia Grande', 'Rua Rio de Janeiro, 259', 'Praia Grande', 'SP', '44.974.822/0004-91', NULL, NULL, '2024-10-05 03:06:58', '2024-10-05 03:06:58'),
(11, 'Cidade Ocian', 'Av. Presidente Kennedy, 7765', 'Praia Grande', 'SP', '44.974.822/0016-25', NULL, NULL, '2024-10-05 03:06:58', '2024-10-05 03:06:58'),
(12, 'Princesa Isabel', 'Pç Princesa Isabel, 26', 'Cubatão', 'SP', '44.974.822/0011-10', NULL, NULL, '2024-10-05 03:06:58', '2024-10-05 03:06:58'),
(13, 'Guarujá', 'Av. Puglisi, 483', 'Guarujá', 'SP', '44.974.822/0006-53', NULL, NULL, '2024-10-05 03:06:58', '2024-10-05 03:06:58'),
(14, 'Itanhaém', 'Av. Condessa de Vimieiros, 494', 'Itanhaém', 'SP', '44.974.822/0014-63', NULL, NULL, '2024-10-05 03:06:58', '2024-10-05 03:06:58');

-- --------------------------------------------------------

--
-- Estrutura para tabela `manutencoes`
--

CREATE TABLE `manutencoes` (
  `manutencao_id` bigint(20) UNSIGNED NOT NULL,
  `tipo` enum('preventiva','corretiva') DEFAULT NULL,
  `periodicidade` enum('mensal','trimestral','semestral','avulsa') DEFAULT NULL,
  `itens_verificacao` text DEFAULT NULL,
  `equipamento_id` bigint(20) UNSIGNED DEFAULT NULL,
  `usuario_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filial_id` bigint(20) UNSIGNED DEFAULT NULL,
  `data_manutencao` date DEFAULT NULL,
  `observacoes` text DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_10_04_212543_create_companies_table', 2),
(6, '2024_10_04_212804_create_branches_table', 2),
(7, '2024_10_04_212820_create_equipments_table', 2),
(8, '2024_10_04_212830_create_maintenances_table', 2),
(9, '2024_10_04_212839_create_technicians_table', 2),
(10, '2024_10_04_225508_rename_tables_to_pt_br', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `perfil` enum('administrador','tecnico','coordenador') DEFAULT NULL,
  `email_verificado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `senha` varchar(255) DEFAULT NULL,
  `token_lembrete` varchar(100) DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nome_usuario` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `perfil`, `email_verificado_em`, `senha`, `token_lembrete`, `criado_em`, `atualizado_em`, `nome_usuario`) VALUES
(1, 'Administrador', 'adm@arcgel.com.br', 'administrador', '2024-10-05 03:03:59', '$2y$10$4VX1ojDfmMjliuj8eDPbneWtlyxsq8lvwWm/Q8cVF12UHtMcdqldq', NULL, '2024-10-05 03:03:59', '2024-10-05 03:03:59', 'wagner'),
(2, 'Administrador', 'adm@arcgel.com.br', 'administrador', '2024-10-05 03:03:59', '$2y$10$4VX1ojDfmMjliuj8eDPbneWtlyxsq8lvwWm/Q8cVF12UHtMcdqldq', NULL, '2024-10-05 03:03:59', '2024-10-05 03:03:59', 'saulo'),
(3, 'Jorge', 'adm@arcgel.com.br', 'tecnico', '2024-10-05 03:03:59', '$2y$10$4VX1ojDfmMjliuj8eDPbneWtlyxsq8lvwWm/Q8cVF12UHtMcdqldq', NULL, '2024-10-05 03:03:59', '2024-10-05 03:03:59', 'jorge'),
(4, 'Guilherme', 'adm@arcgel.com.br', 'tecnico', '2024-10-05 03:03:59', '$2y$10$4VX1ojDfmMjliuj8eDPbneWtlyxsq8lvwWm/Q8cVF12UHtMcdqldq', NULL, '2024-10-05 03:03:59', '2024-10-05 03:03:59', 'guilherme'),
(5, 'Batista', 'adm@arcgel.com.br', 'tecnico', '2024-10-05 03:03:59', '$2y$10$4VX1ojDfmMjliuj8eDPbneWtlyxsq8lvwWm/Q8cVF12UHtMcdqldq', NULL, '2024-10-05 03:03:59', '2024-10-05 03:03:59', 'batista'),
(6, 'Felipe', 'adm@arcgel.com.br', 'coordenador', '2024-10-05 03:03:59', '$2y$10$4VX1ojDfmMjliuj8eDPbneWtlyxsq8lvwWm/Q8cVF12UHtMcdqldq', NULL, '2024-10-05 03:03:59', '2024-10-05 03:03:59', 'felipe');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cnpj` (`cnpj`);

--
-- Índices de tabela `equipamentos`
--
ALTER TABLE `equipamentos`
  ADD PRIMARY KEY (`equipamento_id`),
  ADD KEY `filial_id` (`filial_id`);

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices de tabela `filiais`
--
ALTER TABLE `filiais`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `manutencoes`
--
ALTER TABLE `manutencoes`
  ADD PRIMARY KEY (`manutencao_id`),
  ADD KEY `equipamento_id` (`equipamento_id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `filial_id` (`filial_id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_index` (`tokenable_type`),
  ADD KEY `personal_access_tokens_tokenable_id_index` (`tokenable_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `equipamentos`
--
ALTER TABLE `equipamentos`
  MODIFY `equipamento_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `filiais`
--
ALTER TABLE `filiais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `manutencoes`
--
ALTER TABLE `manutencoes`
  MODIFY `manutencao_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
