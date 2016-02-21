-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17-Fev-2016 às 23:23
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
-- Estrutura da tabela `consultas`
--

CREATE TABLE IF NOT EXISTS `consultas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `clinica` text NOT NULL,
  `nome` text NOT NULL,
  `especialidade` text NOT NULL,
  `data` date NOT NULL,
  `hora` varchar(20) NOT NULL,
  `medico` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `consultas`
--

INSERT INTO `consultas` (`ID`, `clinica`, `nome`, `especialidade`, `data`, `hora`, `medico`) VALUES
(1, 'Porto', 'André Santos', 'Psicologia', '2016-02-23', '15:05-15:50', 'Álvaro Sá'),
(2, 'Lisboa', 'André Santos', 'Psiquiatria', '2016-02-14', '08:25-09:10', 'Ricardo Moreira'),
(3, 'Lisboa', 'Tomás Pinto', 'Psicologia', '2016-02-11', '08:25-09:10', 'Ricardo Moreira');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contactos`
--

CREATE TABLE IF NOT EXISTS `contactos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text NOT NULL,
  `email` text NOT NULL,
  `assunto` text NOT NULL,
  `mensagem` text NOT NULL,
  `data` date NOT NULL,
  `querSerContactado` tinyint(1) NOT NULL,
  `contactada` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `contactos`
--

INSERT INTO `contactos` (`ID`, `nome`, `email`, `assunto`, `mensagem`, `data`, `querSerContactado`, `contactada`) VALUES
(1, 'Tomás Pinto', 'tomas.antonio.sp@gmail.com', 'Opinião', 'Adoro a vossa clinica aqui em Faro. O atendimento é excelente. Parabéns!', '2016-02-10', 0, 1),
(2, 'André Santos', 'andrefilsantos@gmail.com', 'Sugestão', 'Talvez incluir na receção um computador para os utentes consultarem o seu +STD fosse uma boa ideia', '2016-02-10', 1, 1),
(3, 'Rui Teixeira', 'ruiteixeira0@mail.net', 'Sugestão', 'Aplicação para smartphone do +STD!', '2016-02-10', 0, 0),
(4, 'Carlos Bento', 'bentania@gmail.com', 'Opinião', 'Odeio a Dr.ª Júlia Machado. É arrogante e parece que não gosta de estar a dar consultas. Despacha sempre o utente...', '2016-02-14', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicos`
--

CREATE TABLE IF NOT EXISTS `medicos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` text NOT NULL,
  `email` text NOT NULL,
  `Especialidade` text NOT NULL,
  `unidade` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `medicos`
--

INSERT INTO `medicos` (`ID`, `Nome`, `email`, `Especialidade`, `unidade`) VALUES
(1, 'Afonso Martins', 'afonsomartins@stdpsiquiatria.pt', 'Neurologia', 'Porto'),
(2, 'Ana Alves', 'anaalves@stdpsiquiatria.pt', 'Psiquiatria', 'Coimbra'),
(3, 'Álvaro Sá', 'alvarosa@stdpsiquiatria.pt', 'Psicologia', 'Lisboa'),
(4, 'José Almeida', 'josealmeida@stdpsiquiatria.pt', 'Psiquiatria', 'Faro'),
(5, 'Márcia Mota', 'marciamota@stdpsiquiatria.pt', 'Psiquiatria', 'Porto'),
(6, 'Ricardo Moreira', 'ricardomoreira@stdpsiquiatria.pt', 'Psiquiatria', 'Lisboa'),
(7, 'Pedro Silva Carvalho', 'pedrocarvalho@stdpsiquiatria.pt', 'Psiquiatria', 'Lisboa'),
(8, 'Filipa Rouxinol', 'filiparouxinol@stdpsiquiatria.pt', 'Psicologia', 'Coimbra'),
(9, 'Joaquim Pinto', 'joaquimpinto@stdpsiquiatria.pt', 'Psiquiatria', 'Faro'),
(10, 'Júlia Machado', 'juliamachado@stdpsiquiatria.pt', 'Psicologia', 'Porto'),
(11, 'Mariana Teixeira', 'marianateixeira@stdpsiquiatria.pt', 'Psiquiatria', 'Lisboa'),
(12, 'André Luz', 'andreluz@stdpsiquiatria.pt', 'Neurologia', 'Lisboa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE IF NOT EXISTS `mensagens` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `emissor` text NOT NULL,
  `recetor` text NOT NULL,
  `mensagem` text NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `mensagens`
--

INSERT INTO `mensagens` (`ID`, `emissor`, `recetor`, `mensagem`, `data`) VALUES
(1, 'andrefilsantos', 'legobrainiac', '#oaeomi', '2016-02-17 00:00:00'),
(2, 'andrefilsantos', 'andrefilsantos', 'Lobe Mi', '2016-02-17 00:00:00'),
(3, 'andrefilsantos', 'admin', 'Tudo funciona incrivelmente bem! Parabéns!!!', '2016-02-17 00:00:00'),
(4, 'admin', 'andrefilsantos', '#oaef', '0000-00-00 00:00:00'),
(5, 'legobrainiac', 'andrefilsantos', 'Nesta turma é só pros... a copiar!', '2016-02-17 13:30:00');

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
  `visitas` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `site`
--

INSERT INTO `site` (`ID`, `nome`, `slogan`, `SobreNosTexto`, `paginaErroTexto`, `email`, `telefone`, `manutencao`, `visitas`) VALUES
(1, 'STD Psiquiatria', 'A sua mente, a nossa força!', 'Somos especialistas num vasto leque de solicitações na área da psiquiatria, psicologia e psicoterapia de orientação psicanalítica (individual ou em grupo). Garantimos um atendimento humanizado e com profissionais altamente especializados num espaço personalizado, atraente e confortável pensado para o bem estar dos nossos clientes. \n<br /><br />\nComo procuramos padrões de excelência na prestação de cuidados, possuímos um corpo clínico altamente especializado e qualificado e em permanente actualização. Os nossos psicoterapeutas têm formação técnica específica validada por Associação ou Sociedade Científica com reconhecimento internacional.', '<h3><i class="fa fa-warning text-yellow"></i> Oops! Página não encontrada..</h3>\n<p>\nLamentamos mas a página que procura não se encontra disponível.<br />\n<br />\nA página poderá ter sido removida, estar temporariamente indisponível ou o endereço poderá ter sido alterado. <br />\n<br />\nSugerimos que verifique se o endereço está escrito corretamente, ou efectue uma pesquisa sobre o tema pretendido.<br /><br />\nPode <a href="index.php" class="error-link">voltar à página principal</a> ou <a href="contactos.php" class="error-link">contactar-nos</a> para informar o problema indicando:<br />\nEndereço / url da página onde se encontrava<br />\nData e hora do erro<br/>\n<br />\nAgradecemos a sua colaboração.\n</p>', 'geral@stdpsiquiatria.pt', '800000000', 0, 2782);

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidades`
--

CREATE TABLE IF NOT EXISTS `unidades` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text NOT NULL,
  `morada` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `unidades`
--

INSERT INTO `unidades` (`ID`, `nome`, `morada`) VALUES
(1, 'STD Lisboa', 'Rua Abílio Mendes <br /> 1500-458 Lisboa'),
(2, 'STD Porto', 'Avenida da Boavista 171 <br /> 4050-115 Porto'),
(3, 'STD Coimbra', 'Avenida da Republica, 1294 <br/> 4430-192 Coimbra'),
(4, 'STD Faro', 'Largo de Camões, 11 <br /> 8000 - 140 Faro');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `email`, `nome`, `dataNascimento`, `last_sign`, `morada`, `telemovel`, `linkFb`, `permissoes`, `ativo`) VALUES
(1, 'admin', '5978e5f2cf104d341b7eed9aa7f8c779883e1408', 'geral@stdpsiquiatria.pt', 'Administrador', '2015-09-22', '05/02/2016 às 14:34', '', '', '', '1', 1),
(2, 'andrefilsantos', '8eabf3da57c8248a4383ae6365f7490864a98bc7', 'andrefilipepsantos@hotmail.com', 'André Santos', '1998-10-20', '17/02/2016 às 22:21', 'Rua do André<br />Localidade do André<br />0000-000', '960000000', 'https://www.facebook.com/andrefpdsantos', '1', 1),
(3, 'legobrainiac', '39678b7c89f6913bad3c85339580e164c47485b8', 'tomas.antonio.sp@gmail.com', 'Tomás Pinto', '2015-09-04', '', 'Rua do Tomás<br />Localidade do Tomás<br />1111-111', '910000000', 'https://www.facebook.com/profile.php?id=100000728210384', '1', 1),
(4, 'afonsomartins', '7853b8232776225dbed3e31d8ac8033cb6af2d89', 'afonsomartins@stdpsiquiatria.pt', 'Dr. Afonso Martins', '1956-04-20', '', 'Rua do Dr. Afonso<br />Localidade do Dr. Afonso<br />7777-777', '9800000000', '', '2', 1),
(5, 'anaalves', '7853b8232776225dbed3e31d8ac8033cb6af2d89', 'anaalves@stdpsiquiatria.pt', 'Dr.ª Ana Alves', '1970-12-25', '', 'Rua da Drª. Ana <br />Localidade da Drª. Ana <br />7777-777', '9200000000', '', '2', 1),
(6, 'alvarosa', '7853b8232776225dbed3e31d8ac8033cb6af2d89', 'alvarosa@stdpsiquiatria.pt', 'Dr. Álvaro Sá', '1980-01-30', '', 'Rua do Dr. Álvaro<br />Localidade do Dr. Álvaro<br />0000-000', '963852741', '', '2', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
