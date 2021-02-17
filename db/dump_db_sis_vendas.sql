-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Fev-2021 às 00:10
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_sis_vendas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `cod` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `valor_venda` decimal(7,2) NOT NULL,
  `comissao` decimal(7,2) GENERATED ALWAYS AS (`valor_venda` / 100 * 8.5) STORED,
  `data_venda` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`cod`, `id_vendedor`, `valor_venda`, `data_venda`) VALUES
(1, 1, '1000.00', '2021-02-16'),
(2, 1, '1000.95', '2021-02-16'),
(4, 1, '10000.00', '2021-02-16'),
(5, 1, '750.00', '2021-02-16'),
(7, 5, '500.00', '2021-02-16'),
(9, 4, '559.90', '2021-02-16'),
(10, 3, '99.90', '2021-02-16'),
(11, 3, '89.90', '2021-02-16'),
(12, 3, '100.00', '2021-02-16'),
(14, 3, '350.00', '2021-02-16'),
(15, 2, '100.00', '2021-02-16'),
(16, 2, '1000.00', '2021-02-16'),
(17, 1, '550.00', '2021-02-16'),
(19, 1, '750.00', '2021-02-14'),
(20, 2, '1000.00', '2021-02-14'),
(21, 3, '3000.00', '2021-02-14'),
(22, 1, '750.00', '2021-02-15'),
(23, 2, '1000.00', '2021-02-15'),
(24, 3, '3000.00', '2021-02-15'),
(25, 3, '25.00', '2021-02-13'),
(26, 3, '25.00', '2021-02-13'),
(27, 4, '50.00', '2021-02-13'),
(28, 5, '100.00', '2021-02-16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedores`
--

CREATE TABLE `vendedores` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vendedores`
--

INSERT INTO `vendedores` (`id`, `nome`, `email`) VALUES
(1, 'Luiz Augusto Custodio', 'luizaugustocustodio@gmail.com'),
(2, 'Maria Ferreira', 'maria.f@yahoo.com'),
(3, 'Stefanie Mendes', 'stefanie25@gmail.com'),
(4, 'Amarildo da Silva', 's.amarildo@gmail.com'),
(5, 'Ester Rodrigues Martins Lopes', 'estermartins@hotmail.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `id_vendedor` (`id_vendedor`);

--
-- Índices para tabela `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas_ibfk_1` FOREIGN KEY (`id_vendedor`) REFERENCES `vendedores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
