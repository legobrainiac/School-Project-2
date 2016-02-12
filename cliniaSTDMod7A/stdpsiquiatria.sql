-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12-Fev-2016 às 21:08
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stdpsiquiatria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicos`
--

CREATE TABLE IF NOT EXISTS `medicos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` text NOT NULL,
  `Especialidade` text NOT NULL,
  `HorasConsultas` text NOT NULL,
  `unidade` text NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `medicos`
--

INSERT INTO `medicos` (`ID`, `Nome`, `Especialidade`, `HorasConsultas`, `unidade`, `ativo`) VALUES
(1, 'Afonso Martins', 'Neurologia', '', 'Porto', 1),
(2, 'Ana Alves', 'Psiquiatria', '', 'Porto', 1),
(3, 'Álvaro Sá', 'Psicologia', '', 'Lisboa', 1),
(4, 'José Fernando Santos Almeida', 'Psiquiatria', '', 'Faro', 1),
(5, 'Márcia Mota', 'Psiquiatria', '', 'Porto', 1),
(6, 'Ricardo Moreira', 'Psiquiatria', '', 'Lisboa', 1),
(7, 'Pedro Silva Carvalho', 'Psiquiatria', '', 'Lisboa', 1),
(8, 'Filipa Rouxinol', 'Psicologia', '', 'Coimbra', 1),
(9, 'Joaquim Pinto', 'Psicologia', '', 'Faro', 1),
(10, 'Júlia Machado', 'Psicologia', '', 'Porto', 1),
(11, 'Mariana Teixeira', 'Psicologia', '', 'Lisboa', 1),
(12, 'André Luz', 'Neurologia', '', 'Lisboa', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nomeProduto` text NOT NULL,
  `descricaoProduto` text NOT NULL,
  `precoProduto` text NOT NULL,
  `quantidadeDisponivel` int(11) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `site`
--

CREATE TABLE IF NOT EXISTS `site` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text NOT NULL,
  `slogan` text NOT NULL,
  `SobreNosTexto` text NOT NULL,
  `paginaErroTexto` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(9) NOT NULL,
  `manutencao` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `site`
--

INSERT INTO `site` (`ID`, `nome`, `slogan`, `SobreNosTexto`, `paginaErroTexto`, `email`, `telefone`, `manutencao`) VALUES
(1, 'STD Psiquiatria', 'A sua mente, a nossa força!', 'Somos especialistas num vasto leque de solicitações na área da psiquiatria, psicologia e psicoterapia de orientação psicanalítica (individual ou em grupo). Garantimos um atendimento humanizado e com profissionais altamente especializados num espaço personalizado, atraente e confortável pensado para o bem estar dos nossos clientes. \n<br /><br />\nComo procuramos padrões de excelência na prestação de cuidados, possuímos um corpo clínico altamente especializado e qualificado e em permanente actualização. Os nossos psicoterapeutas têm formação técnica específica validada por Associação ou Sociedade Científica com reconhecimento internacional.', '<h3><i class="fa fa-warning text-yellow"></i> Oops! Página não encontrada..</h3>\n<p>\nLamentamos mas a página que procura não se encontra disponível.<br />\n<br />\nA página poderá ter sido removida, estar temporariamente indisponível ou o endereço poderá ter sido alterado. <br />\n<br />\nSugerimos que verifique se o endereço está escrito corretamente, ou efectue uma pesquisa sobre o tema pretendido.<br /><br />\nPode <a href="index.php" class="error-link">voltar à página principal</a> ou <a href="contactos.php" class="error-link">contactar-nos</a> para informar o problema indicando:<br />\nEndereço / url da página onde se encontrava<br />\nData e hora do erro<br/>\n<br />\nAgradecemos a sua colaboração.\n</p>', 'geral@stdpsiquiatria.pt', '800000000', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidades`
--

CREATE TABLE IF NOT EXISTS `unidades` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text NOT NULL,
  `morada` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `nome` text NOT NULL,
  `dataNascimento` date NOT NULL,
  `last_sign` text NOT NULL,
  `morada` text NOT NULL,
  `telemovel` text NOT NULL,
  `linkFb` text NOT NULL,
  `permissoes` text NOT NULL,
  `ativo` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `email`, `nome`, `dataNascimento`, `last_sign`, `morada`, `telemovel`, `linkFb`, `permissoes`, `ativo`) VALUES
(1, 'admin', '5978e5f2cf104d341b7eed9aa7f8c779883e1408', '', 'Administrador', '2015-09-22', '05/02/2016 às 14:34', '', '', '', '1', 1),
(2, 'andrefilsantos', '8eabf3da57c8248a4383ae6365f7490864a98bc7', 'andrefilipepsantos@hotmail.com', 'André Santos', '1998-10-20', '12/02/2016 às 20:08', 'Rua do André<br />Localidade do André<br />0000-000', '960000000', 'https://www.facebook.com/andrefpdsantos', '1', 1),
(3, 'legobrainiac', '39678b7c89f6913bad3c85339580e164c47485b8', 'tomas.antonio.sp@gmail.com', 'Tomás Pinto', '2015-09-04', '', 'Rua do Tomás<br />Localidade do Tomás<br />1111-111', '910000000', 'https://www.facebook.com/profile.php?id=100000728210384', '1', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
