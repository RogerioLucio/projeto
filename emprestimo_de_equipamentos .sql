-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26-Abr-2017 às 02:38
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emprestimo_de_equipamentos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL,
  `nome_cargo` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `nome_cargo`) VALUES
(1, 'Cargo'),
(2, 'Roupeiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `descricao_categoria` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `descricao_categoria`) VALUES
(1, 'aaaaaaa'),
(2, 'bbbbbbbb');

-- --------------------------------------------------------

--
-- Estrutura da tabela `documento`
--

CREATE TABLE `documento` (
  `id_documento` int(11) NOT NULL,
  `data_documento` datetime NOT NULL,
  `tipo_documento` varchar(256) NOT NULL,
  `id_reserva` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamento`
--

CREATE TABLE `equipamento` (
  `id_equipamento` int(11) NOT NULL,
  `patrimonio_equipamento` text NOT NULL,
  `status_equipamento` varchar(256) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `descricao` varchar(120) NOT NULL,
  `id_espaco` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `equipamento`
--

INSERT INTO `equipamento` (`id_equipamento`, `patrimonio_equipamento`, `status_equipamento`, `id_categoria`, `descricao`) VALUES
(1, 'Cadeira', 'Normal', 1, 'Lenovo'),
(2, '12', 'acabada', 1, 'Intel'),
(3, '14', 'asasas', 1, 'Xintes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamento_excluido`
--

CREATE TABLE `equipamento_excluido` (
  `id_equip_excl` int(11) NOT NULL,
  `data_equip_excl` date NOT NULL,
  `id_equipamento` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamento_reservado`
--

CREATE TABLE `equipamento_reservado` (
  `id_equip_rese` int(11) NOT NULL,
  `comentario_equip_rese` text NOT NULL,
  `status_equip_rese` varchar(256) NOT NULL,
  `id_reserva` int(11) NOT NULL,
  `id_equipamento` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `equipamento_reservado`
--

INSERT INTO `equipamento_reservado` (`id_equip_rese`, `comentario_equip_rese`, `status_equip_rese`, `id_reserva`, `id_equipamento`, `quantidade`) VALUES
(1, '', '', 1, 1, 12),
(2, '', '', 1, 2, 24);

-- --------------------------------------------------------

--
-- Estrutura da tabela `espaco`
--

CREATE TABLE `espaco` (
  `id_espaco` int(11) NOT NULL,
  `local_espaco` varchar(256) NOT NULL,
  `descricao_espaco` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `espaco`
--

INSERT INTO `espaco` (`id_espaco`, `local_espaco`, `descricao_espaco`) VALUES
(1, 'IFSP', 'Avenida urucubaca'),
(2, 'IFSLOST', 'Avenida rouxinol');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `data_inicio_reserva` varchar(200) NOT NULL,
  `data_final_reserva` varchar(200) NOT NULL,
  `descricao_reserva` text NOT NULL,
  `status_reserva` varchar(256) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_espaco` int(11) NOT NULL,
  `id_equipamento` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `data_inicio_reserva`, `data_final_reserva`, `descricao_reserva`, `status_reserva`, `id_usuario`, `id_espaco`, `id_equipamento`, `id_categoria`) VALUES
(4, '23434234324', '2343432', 'muitas', '', 232323, 1, 2, 1),
(3, '23434234324', '2343432', 'muitas', '', 232323, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE `setor` (
  `id_setor` int(11) NOT NULL,
  `nome_setor` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`id_setor`, `nome_setor`) VALUES
(1, 'Alaude'),
(2, 'Bairro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` text NOT NULL,
  `rg_usuario` text NOT NULL,
  `tipo_usuario` text NOT NULL,
  `prontuario_usuario` text NOT NULL,
  `senha_usuario` text NOT NULL,
  `login_usuario` text NOT NULL,
  `email_usuario` text NOT NULL,
  `cpf_usuario` text NOT NULL,
  `nascimento_usuario` date NOT NULL,
  `telefone_usuario` text NOT NULL,
  `celular_usuario` text NOT NULL,
  `observacoes_usuario` longtext NOT NULL,
  `sexo_usuario` text NOT NULL,
  `data_senha_usuario` date NOT NULL,
  `id_setor` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `rg_usuario`, `tipo_usuario`, `prontuario_usuario`, `senha_usuario`, `login_usuario`, `email_usuario`, `cpf_usuario`, `nascimento_usuario`, `telefone_usuario`, `celular_usuario`, `observacoes_usuario`, `sexo_usuario`, `data_senha_usuario`, `id_setor`, `id_cargo`) VALUES
(1, 'Paçoca', '1213', 'administrador', '232323', '123', 'a', 'a@a.com', '45645645', '0000-00-00', '3434343', 'mascu', '113131ffs', 'masculino', '0000-00-00', 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`id_documento`),
  ADD KEY `id_reserva` (`id_reserva`);

--
-- Indexes for table `equipamento`
--
ALTER TABLE `equipamento`
  ADD PRIMARY KEY (`id_equipamento`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_espaco` (`id_espaco`);
  

--
-- Indexes for table `equipamento_excluido`
--
ALTER TABLE `equipamento_excluido`
  ADD PRIMARY KEY (`id_equip_excl`),
  ADD KEY `id_equipamento` (`id_equipamento`);

--
-- Indexes for table `equipamento_reservado`
--
ALTER TABLE `equipamento_reservado`
  ADD PRIMARY KEY (`id_equip_rese`),
  ADD KEY `id_reserva` (`id_reserva`),
  ADD KEY `id_equipamento` (`id_equipamento`);

--
-- Indexes for table `espaco`
--
ALTER TABLE `espaco`
  ADD PRIMARY KEY (`id_espaco`);

--
-- Indexes for table `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_espaco` (`id_espaco`);

--
-- Indexes for table `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`id_setor`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_setor` (`id_setor`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `documento`
--
ALTER TABLE `documento`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `equipamento`
--
ALTER TABLE `equipamento`
  MODIFY `id_equipamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `equipamento_excluido`
--
ALTER TABLE `equipamento_excluido`
  MODIFY `id_equip_excl` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `equipamento_reservado`
--
ALTER TABLE `equipamento_reservado`
  MODIFY `id_equip_rese` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `espaco`
--
ALTER TABLE `espaco`
  MODIFY `id_espaco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `setor`
--
ALTER TABLE `setor`
  MODIFY `id_setor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
