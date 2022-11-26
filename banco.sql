-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Nov-2022 às 23:07
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_pw2`
--
CREATE DATABASE IF NOT EXISTS `bd_pw2` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `bd_pw2`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblcategoria`
--

CREATE TABLE `tblcategoria` (
  `codCategoria` int(11) NOT NULL,
  `nomeCategoria` varchar(150) COLLATE utf8_bin NOT NULL,
  `categoriaDataHora` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblfavoritos`
--

CREATE TABLE `tblfavoritos` (
  `codFavorito` int(11) NOT NULL,
  `usuarioFavorito` int(11) NOT NULL,
  `produtoFavorito` int(11) NOT NULL,
  `dataHoraFavorito` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbllogs`
--

CREATE TABLE `tbllogs` (
  `codLog` int(11) NOT NULL,
  `acaoLog` varchar(250) COLLATE utf8_bin NOT NULL,
  `dataHoraLog` datetime NOT NULL DEFAULT current_timestamp(),
  `usuarioLog` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblproduto`
--

CREATE TABLE `tblproduto` (
  `codProduto` int(11) NOT NULL,
  `categoriaProduto` int(11) NOT NULL,
  `nomeProduto` varchar(150) COLLATE utf8_bin NOT NULL,
  `precoProduto` float NOT NULL,
  `descricaoProduto` varchar(250) COLLATE utf8_bin NOT NULL,
  `imagemProduto` varchar(250) COLLATE utf8_bin NOT NULL,
  `usuarioProduto` int(11) NOT NULL,
  `dataHoraProduto` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblusuario`
--

CREATE TABLE `tblusuario` (
  `codUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(150) COLLATE utf8_bin NOT NULL,
  `emailUsuario` varchar(150) COLLATE utf8_bin NOT NULL,
  `senhaUsuario` varchar(50) COLLATE utf8_bin NOT NULL,
  `fotoUsuario` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `tipoUsuario` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `statusUsuario` int(11) NOT NULL,
  `codAtivacaoUsuario` varchar(150) COLLATE utf8_bin NOT NULL,
  `dataCriacaoUsuario` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tblcategoria`
--
ALTER TABLE `tblcategoria`
  ADD PRIMARY KEY (`codCategoria`);

--
-- Índices para tabela `tblfavoritos`
--
ALTER TABLE `tblfavoritos`
  ADD PRIMARY KEY (`codFavorito`),
  ADD KEY `fk_usuario_favorito` (`usuarioFavorito`),
  ADD KEY `fk_produto_favorito` (`produtoFavorito`);

--
-- Índices para tabela `tbllogs`
--
ALTER TABLE `tbllogs`
  ADD PRIMARY KEY (`codLog`),
  ADD KEY `fk_usuario_log` (`usuarioLog`);

--
-- Índices para tabela `tblproduto`
--
ALTER TABLE `tblproduto`
  ADD PRIMARY KEY (`codProduto`),
  ADD KEY `fk_categoria` (`categoriaProduto`),
  ADD KEY `fk_usuario_produto` (`usuarioProduto`);

--
-- Índices para tabela `tblusuario`
--
ALTER TABLE `tblusuario`
  ADD PRIMARY KEY (`codUsuario`),
  ADD UNIQUE KEY `email` (`emailUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tblcategoria`
--
ALTER TABLE `tblcategoria`
  MODIFY `codCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tblfavoritos`
--
ALTER TABLE `tblfavoritos`
  MODIFY `codFavorito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbllogs`
--
ALTER TABLE `tbllogs`
  MODIFY `codLog` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tblproduto`
--
ALTER TABLE `tblproduto`
  MODIFY `codProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tblusuario`
--
ALTER TABLE `tblusuario`
  MODIFY `codUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tblfavoritos`
--
ALTER TABLE `tblfavoritos`
  ADD CONSTRAINT `fk_produto_favorito` FOREIGN KEY (`produtoFavorito`) REFERENCES `tblproduto` (`codProduto`),
  ADD CONSTRAINT `fk_usuario_favorito` FOREIGN KEY (`usuarioFavorito`) REFERENCES `tblusuario` (`codUsuario`);

--
-- Limitadores para a tabela `tbllogs`
--
ALTER TABLE `tbllogs`
  ADD CONSTRAINT `fk_usuario_log` FOREIGN KEY (`usuarioLog`) REFERENCES `tblusuario` (`codUsuario`);

--
-- Limitadores para a tabela `tblproduto`
--
ALTER TABLE `tblproduto`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`categoriaProduto`) REFERENCES `tblcategoria` (`codCategoria`),
  ADD CONSTRAINT `fk_usuario_produto` FOREIGN KEY (`usuarioProduto`) REFERENCES `tblusuario` (`codUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- Inserir usuario no banco
INSERT INTO tblusuario (nomeUsuario, emailUsuario, senhaUsuario, tipoUsuario, statusUsuario, codAtivacaoUsuario)
	VALUES ('Gustavo', 'gustavo@gmail.com', MD5('123456'), '1', 1, '1');