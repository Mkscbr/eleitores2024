-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31/05/2023 às 12:19
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `eleicao`
--
CREATE DATABASE IF NOT EXISTS `eleicao` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `eleicao`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `agendamento`
--

DROP TABLE IF EXISTS `agendamento`;
CREATE TABLE `agendamento` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `agenda` varchar(255) NOT NULL,
  `contato` varchar(255) NOT NULL,
  `data_ini` date NOT NULL,
  `hora_ini` time NOT NULL,
  `data_fim` date NOT NULL,
  `hora_fim` time NOT NULL,
  `observacao` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `agendamento`
--

INSERT INTO `agendamento` (`id`, `usuario`, `agenda`, `contato`, `data_ini`, `hora_ini`, `data_fim`, `hora_fim`, `observacao`) VALUES
(1, '', '', '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', ''),
(2, 'mayck', 'teste', 'ccascasc', '2023-05-17', '08:00:00', '2023-05-17', '09:00:00', ''),
(3, 'mayck', 'teste', 'ccascasc', '2023-05-17', '08:00:00', '2023-05-17', '09:00:00', ''),
(4, 'mayck', 'teste', 'ccascasc', '2023-05-17', '08:00:00', '2023-05-17', '09:00:00', 'obs'),
(5, 'mayck', 'teste', 'ccascasc', '2023-05-17', '08:00:00', '2023-05-17', '09:00:00', 'obs'),
(6, 'mayck', 'teste', 'ccascasc', '2023-05-17', '08:00:00', '2023-05-17', '09:00:00', 'obs');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro`
--

DROP TABLE IF EXISTS `cadastro`;
CREATE TABLE `cadastro` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `data_nascimento` date NOT NULL,
  `estado_civil` varchar(20) NOT NULL,
  `naturalidade` varchar(50) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `municipio` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `telefone_residencial` varchar(20) DEFAULT NULL,
  `telefone_contato` varchar(20) DEFAULT NULL,
  `telefone_celular` varchar(20) DEFAULT NULL,
  `whatsapp` varchar(20) DEFAULT NULL,
  `vinculo` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `cadastro`
--

INSERT INTO `cadastro` (`id`, `nome`, `data_nascimento`, `estado_civil`, `naturalidade`, `cep`, `endereco`, `municipio`, `estado`, `telefone_residencial`, `telefone_contato`, `telefone_celular`, `whatsapp`, `vinculo`) VALUES
(1, 'mayck soares', '1989-04-03', 'casado', 'Duque ', '25585 450', 'Rua Cravinas, Parque Araruama', 'São João de Meriti', 'AC', '1111111111', '2222222222', '33333333333', 'Não, é whatsapp', 'vinculo'),
(2, 'eloa', '1989-09-08', 'casado', 'Rio de Janeiro', '25585 450', 'Rua Cravinas, Parque Araruama', 'São João de Meriti', 'RJ', '213652-0396', '(21) 9889-8989', '0', '2', '45454'),
(3, 'maria', '2154-03-29', 'solteiro', 'nilopolis', '25585 470', 'Rua Miosótis, Parque Araruama', 'São João de Meriti', 'RJ', '2136528989', '2158747854', '2147483647', '2', 'mayck'),
(4, 'mari', '2154-03-29', 'solteiro', 'nilopolis', '25585 470', 'Rua Miosótis, Parque Araruama', 'São João de Meriti', 'RJ', '2136528989', '2158747854', '2147483647', 'Prefiro não Informar', 'vinculo'),
(5, 'maria', '2154-03-29', 'solteiro', 'nilopolis', '25585 470', 'Rua Miosótis, Parque Araruama', 'São João de Meriti', 'RJ', '2136528989', '2158747854', '2147483647', 'Prefiro não Informar', ''),
(6, 'maria', '2154-03-29', 'solteiro', 'nilopolis', '25585 470', 'Rua Miosótis, Parque Araruama', 'São João de Meriti', 'RJ', '2136528989', '2158747854', '2147483647', 'Prefiro não Informar', ''),
(7, 'mari', '2154-03-29', 'solteiro', 'nilopolis', '25585 470', 'Rua Miosótis, Parque Araruama', 'São João de Meriti', 'RJ', '2136528989', '2158747854', '2147483647', 'Prefiro não Informar', ''),
(8, 'mayck', '1989-04-03', 'casado', 'Rio de Janeiro', '25585 410', 'Rua Agostinho Mendes da Cruz, Parque Araruama', 'São João de Meriti', 'RJ', '7777777777', '7777777777', '77777777777', 'Não, é whatsapp', 'vinculooooooooo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `contato`
--

DROP TABLE IF EXISTS `contato`;
CREATE TABLE `contato` (
  `id` int(11) NOT NULL,
  `eleitor` varchar(200) NOT NULL,
  `data` date NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `solicitacao` text NOT NULL,
  `solucao` text NOT NULL,
  `situacao` varchar(50) NOT NULL,
  `encaminhado` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `contato`
--

INSERT INTO `contato` (`id`, `eleitor`, `data`, `tipo`, `solicitacao`, `solucao`, `situacao`, `encaminhado`) VALUES
(1, 'augusto  de Maria Silva Da Silva Morais Gomes', '2023-05-31', 'elogio', 'solicitaaco ', 'solucao', 'value=', 'eu mesmo'),
(3, 'Meire Da Silva Morais Gomes', '2023-05-08', 'iluminação', '123 ', '123', 'value=', '123'),
(4, 'Eliana de Maria Silva Da Silva Morais Gomes', '2023-01-01', 'iluminação', 'as', 'as', 'Aberta', 'sr resp');

-- --------------------------------------------------------

--
-- Estrutura para tabela `eventos`
--

DROP TABLE IF EXISTS `eventos`;
CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `cor` text NOT NULL,
  `inicio` datetime NOT NULL,
  `fim` datetime NOT NULL,
  `contato` text NOT NULL,
  `obs` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `eventos`
--

INSERT INTO `eventos` (`id`, `titulo`, `cor`, `inicio`, `fim`, `contato`, `obs`) VALUES
(81, '', '', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '', ''),
(80, '', '', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '', ''),
(77, 'cor1', '#FFD700', '2023-05-01 00:00:00', '2023-05-02 00:00:00', '', ''),
(78, 'cor1', '#FFD700', '2023-05-02 00:00:00', '2023-05-03 00:00:00', '', ''),
(6, '', '#0071c5', '2023-05-20 00:00:00', '2023-05-21 00:05:00', '', ''),
(7, '', '#0071c5', '2023-05-20 00:00:00', '2023-05-21 00:05:00', '', ''),
(8, 'ddd', '#436EEE', '2023-05-20 00:00:00', '2023-05-22 01:01:00', '', ''),
(9, 'ddd', '#436EEE', '2023-05-20 00:00:00', '2023-05-22 01:01:00', '', ''),
(10, '', '', '2023-05-19 05:55:00', '2023-05-19 06:00:00', '', ''),
(11, 'eee', '#0071c5', '2023-05-23 01:01:00', '2023-05-23 04:00:00', '', ''),
(12, 'titulo', '#8B4513', '2023-05-19 08:57:00', '2023-05-19 08:57:00', '', ''),
(13, 'teste', '#FFD700', '2023-05-19 07:59:00', '2023-05-19 09:00:00', '', ''),
(14, 'titulo', '#FFD700', '2023-05-24 03:30:00', '2023-05-24 04:00:00', 'resr', 'obs'),
(15, 'titulo', '#8B0000', '2023-05-23 05:00:00', '2023-05-24 08:30:00', 'respoinsavel', 'mk'),
(89, 'titulo w', '#8B0000', '2023-06-01 00:30:00', '2023-06-01 01:00:00', '', ''),
(76, '', '', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '', ''),
(79, 'teste', '#8B0000', '2023-06-06 00:00:00', '2023-06-08 00:00:00', 'contato', 'teste'),
(3, 'titulo', '#FF4500', '2023-05-19 00:00:00', '2023-05-20 10:00:00', '', ''),
(4, 'titulo', '#FF4500', '2023-05-19 00:00:00', '2023-05-20 00:00:00', '', ''),
(5, 'titulo', '#FF4500', '2023-05-19 00:00:00', '2023-05-20 00:00:00', '', ''),
(85, 'rere', '#0071c5', '2023-06-01 03:30:00', '2023-06-01 04:00:00', '', ''),
(86, 'teste', '#FFD700', '2023-05-31 00:00:00', '2023-05-31 00:30:00', 's', 's'),
(87, 'teste02', '#FF4500', '2023-06-01 05:30:00', '2023-06-01 06:00:00', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
CREATE TABLE `pessoa` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `data_nascimento` date NOT NULL,
  `idade` int(11) NOT NULL,
  `estado_civil` varchar(50) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `naturalidade` varchar(50) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `complemento` varchar(200) NOT NULL,
  `numero` int(11) NOT NULL,
  `municipio` varchar(200) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `telefone_residencial` varchar(20) DEFAULT NULL,
  `telefone_celular` varchar(20) NOT NULL,
  `whatsapp` varchar(12) NOT NULL,
  `telefone_contato` varchar(20) DEFAULT NULL,
  `indicacao` varchar(200) NOT NULL,
  `nivel_relacionamento` varchar(50) NOT NULL,
  `voto` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `data_nascimento`, `idade`, `estado_civil`, `sexo`, `naturalidade`, `cep`, `endereco`, `complemento`, `numero`, `municipio`, `estado`, `telefone_residencial`, `telefone_celular`, `whatsapp`, `telefone_contato`, `indicacao`, `nivel_relacionamento`, `voto`) VALUES
(1, 'Marcelo campos melo', '1988-05-06', 35, 'divorciado', 'Masculino', 'São Paulo', '22041011', 'Rua Santa Clara, Copacabana', 'Ap 450', 1001, 'Rio de Janeiro', 'RJ', '2126565656', '11999998547', '11999998547', '2125425445', 'André da Silva', 'Amigo(a)', 'Em aberto'),
(2, 'Josefa campos melo', '1984-05-06', 39, 'casado', 'Feminino', 'São Paulo', '22050002', 'Avenida Nossa Senhora de Copacabana, Copacabana', 'Ap 801', 2055, 'Rio de Janeiro', 'RJ', '2126858584', '21985521551', 'Não é whatsa', '2198878789', 'André da Silva', 'Familiar', 'Certo'),
(3, 'Marcela da Silva campos ', '1991-05-06', 32, 'solteiro', 'Prefiro não informar', 'Rio de Janeiro', '21351050', 'Estrada do Portela, Madureira', 'sem complemento', 1005, 'Rio de Janeiro', 'RJ', '2122222222', '99999999999', 'Não Informar', '3333333333', 'Luiz Campos', 'Professor(a)', 'Não'),
(4, 'andré da Silva campos mello', '1968-05-09', 55, 'viuvo', 'Masculino', 'Rio de Janeiro', '21351050', 'Estrada do Portela, Madureira', 'sem complemento', 2500, 'Rio de Janeiro', 'RJ', '2121212121', '98989898989', '98989898989', '3232323232', 'Luiz Campos', 'Amigo(a)', 'Incerto'),
(5, 'José Maria Antonio ', '1978-02-01', 45, 'casado', 'Masculino', 'Rio de Janeiro', '22270000', 'Rua Voluntários da Pátria, Botafogo', 'casa 2 ', 1010, 'Rio de Janeiro', 'RJ', '1111111111', '33333333333', '33333333333', '2222222222', '', 'Prefiro não informar', 'Certo'),
(6, 'Maria Da Silva Morais', '1981-03-03', 42, 'divorciado', 'Feminino', 'Rio de Janeiro', '21060070', 'Rua Uranos, Manguinhos', 'Casa 5 Fundos', 101, 'Rio de Janeiro', 'RJ', '9989887787', '98168465132', '98168465132', '9845448949', '', 'Prefiro não informar', 'Certo'),
(7, 'Eloá Da Silva Morais Gomes', '1989-03-03', 34, 'casado', 'Feminino', 'Rio de Janeiro', '21060080', 'Rua Aureliano Lessa, Ramos', 'Casa 8 Bloco 5 ', 1516, 'Rio de Janeiro', 'RJ', '9989887787', '98168465132', '98168465132', '9845448949', 'Marcelo da Silva', 'Familiar', 'Incerto'),
(8, 'Meire Da Silva Morais Gomes', '1989-03-03', 34, 'casado', 'Feminino', 'Rio de Janeiro', '21060080', 'Rua Aureliano Lessa, Ramos', 'Casa 8 Bloco 5 ', 1516, 'Rio de Janeiro', 'RJ', '9989887787', '21651651616', '21651651616', '9845448949', 'Marcelo da Silva', 'Familiar', 'Incerto'),
(9, 'Marcelo Da Silva Morais Gomes', '1989-03-03', 34, 'casado', 'Masculino', 'Rio de Janeiro', '21060080', 'Rua Aureliano Lessa, Ramos', 'Casa 8 Bloco 5 ', 1516, 'Rio de Janeiro', 'RJ', '9989887787', '21898498498', '21898498498', '9845448949', 'Marcelo da Silva', 'Familiar', 'Incerto'),
(10, 'Fernando de Maria Silva Da Silva Morais Gomes', '1989-03-03', 34, 'solteiro', 'Masculino', 'Rio de Janeiro', '21060090', 'Rua Doutor Miguel Vieira Ferreira, Ramos', 'Casa 8 Bloco 5 ', 1516, 'Rio de Janeiro', 'RJ', '9989887787', '21898498477', '21898498477', '9845448949', 'Marcelo da Silva', 'Funcionario(a)', 'Certo'),
(11, 'Eliana de Maria Silva Da Silva Morais Gomes', '1989-03-03', 34, 'solteiro', 'Feminino', 'Rio de Janeiro', '21060020', 'Rua Etelvina, Olaria', 'Casa 5 Bloco 5 ', 1414, 'Rio de Janeiro', 'RJ', '9989887787', '21898498477', '21898498477', '9845448949', 'Marcelo da Silva', 'Conhecido(a)', 'Certo'),
(12, 'augusto  de Maria Silva Da Silva Morais Gomes', '1989-03-03', 34, 'solteiro', 'Feminino', 'Rio de Janeiro', '21060020', 'Rua Etelvina, Olaria', 'Casa 5 Bloco 5 ', 1414, 'Rio de Janeiro', 'RJ', '9989887787', '21898498477', '21898498477', '9845448949', 'Marcelo da Silva campos ', 'Conhecido(a)', 'Certo'),
(13, 'Novo augusto  de Maria Silva Da Silva Morais Gomes', '1989-03-03', 34, 'solteiro', 'Feminino', 'Rio de Janeiro', '21060020', 'Rua Etelvina, Olaria', 'Casa 5 Bloco 5 ', 1414, 'Rio de Janeiro', 'RJ', '9989887787', '21898498477', '21898498477', '9845448949', 'Marcelo da Silva campos ', 'Conhecido(a)', 'Certo'),
(14, '', '0000-00-00', 0, '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `criado_por` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` int(11) NOT NULL,
  `data` date NOT NULL,
  `telefone` int(11) NOT NULL,
  `desabilitado` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `criado_por`, `senha`, `tipo`, `data`, `telefone`, `desabilitado`) VALUES
(14, 'mayck', 'maycksc@gmail.com', 'mk', '$2y$10$X2tRBfdMFBVFKhG9LYx7NehFdrYXe5vvdWjpob1CWTmwM9.K612ra', 1, '2023-05-26', 1111111111, 0),
(13, 'mk1', 'mk@gmail.com', 'mk', 'mk', 0, '0000-00-00', 0, 1),
(11, '', '', 'mk', '$2y$10$CWKHQOxfcm/wB4sZqH/EM..mlU2KNSdW927kdVAhig3Ps96xG56Cy', 0, '0000-00-00', 0, 1),
(15, 'nome', 'smkadmsk@gmail.com', '13', '123', 0, '2011-11-11', 0, 1),
(17, 'mk2', 'mk2@gmail.com', '14', '$2y$10$eoaGeN4wByhIxPVe.YCzme9mZ8kJqKmUrm3jxuzcfCzemrP8aBpZe', 4, '0000-00-00', 0, 0),
(19, 'teste', 'email', '17', '$2y$10$XFY3QU8JTh55kYMrB.t6tO/mUiCya0vs95U7i774GtYF4lB8BsKti', 2, '2023-05-28', 2147483647, 0),
(20, 'tets', 'tetet', '17', '$2y$10$W1COaPmNJZaCqZ5Jz0Mu6OazAPx3c4kIKgLN3V.J.Jtqo5pIqmqWe', 1, '2023-05-28', 5465465, 0),
(21, '123', '123', '17', '$2y$10$.L7sIMxj0lPjl58OZ.2i9OwlRu1IYVtIRy54Aq4PIg1bYhcWkSROW', 1, '2023-05-28', 2147483647, 0),
(22, '111111111111111', '11111111111111111', '17', '$2y$10$ZfNqZfDT20/3rJCx1RaEmup8C9NZqjpRN.sOf9EXAv6DmQLr3ejoK', 2, '2023-05-28', 2147483647, 0),
(23, '222222222', '22222222', '17', '$2y$10$v7E52hdnKqTA.CjWVrMivO/zH/Ue3cd0NlLIWRd9DYP33.Dg9uGa6', 2, '2023-05-28', 2147483647, 0),
(24, 'oi', 'qwqweqw@123', '17', '$2y$10$SOBSa01Dk20DCXCnB6yVdu5DDTegFtUTSolazsaHv6mvJqgbiNGm.', 1, '2023-05-28', 2147483647, 0),
(25, 'teste2', 'email@gmail.com', '17', '$2y$10$MreL6Umo/nrJ6In/2awBBehPNP9sik7rLcmggGGl0RGNstaSCvt5W', 1, '2023-05-28', 2147483647, 0),
(26, '', '', '17', '$2y$10$a4BYWvbVMfLbaFMvk8.m.OmN6PImLslf10k/PndsS7mlD4yhzLdeO', 0, '2023-05-30', 0, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamento`
--
ALTER TABLE `agendamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
