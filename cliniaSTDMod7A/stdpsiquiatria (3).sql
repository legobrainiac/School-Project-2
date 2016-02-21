-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21-Fev-2016 às 23:20
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

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
  `UserMedico` text NOT NULL,
  `Especialidade` text NOT NULL,
  `unidade` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `medicos`
--

INSERT INTO `medicos` (`ID`, `Nome`, `email`, `UserMedico`, `Especialidade`, `unidade`) VALUES
(1, 'Afonso Martins', 'afonsomartins@stdpsiquiatria.pt', 'afonsomartins', 'Neurologia', 'Porto'),
(2, 'Ana Alves', 'anaalves@stdpsiquiatria.pt', 'anaalves', 'Psiquiatria', 'Coimbra'),
(3, 'Álvaro Sá', 'alvarosa@stdpsiquiatria.pt', 'alvarosa', 'Psicologia', 'Lisboa'),
(4, 'José Almeida', 'josealmeida@stdpsiquiatria.pt', 'josealmeida', 'Psiquiatria', 'Faro'),
(5, 'Márcia Mota', 'marciamota@stdpsiquiatria.pt', 'marciamota', 'Psiquiatria', 'Porto'),
(6, 'Ricardo Moreira', 'ricardomoreira@stdpsiquiatria.pt', 'ricardomoreira', 'Psiquiatria', 'Lisboa'),
(7, 'Pedro Silva Carvalho', 'pedrocarvalho@stdpsiquiatria.pt', 'pedrocarvalho', 'Psiquiatria', 'Lisboa'),
(8, 'Filipa Rouxinol', 'filiparouxinol@stdpsiquiatria.pt', 'filiparouxinol', 'Psicologia', 'Coimbra'),
(9, 'Joaquim Pinto', 'joaquimpinto@stdpsiquiatria.pt', 'joaquimpinto', 'Psiquiatria', 'Faro'),
(10, 'Júlia Machado', 'juliamachado@stdpsiquiatria.pt', 'juliamachado', 'Psicologia', 'Porto'),
(11, 'Maria Esteves', 'mariaesteves@stdpsiquiatria.pt', 'mariaesteves', 'Psiquiatria', 'Lisboa'),
(12, 'André Luz', 'andreluz@stdpsiquiatria.pt', 'andreluz', 'Neurologia', 'Lisboa');

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
(1, 'STD Psiquiatria', 'A sua mente, a nossa força!', 'Somos especialistas num vasto leque de solicitações na área da psiquiatria, psicologia e psicoterapia de orientação psicanalítica (individual ou em grupo). Garantimos um atendimento humanizado e com profissionais altamente especializados num espaço personalizado, atraente e confortável pensado para o bem estar dos nossos clientes. \n<br /><br />\nComo procuramos padrões de excelência na prestação de cuidados, possuímos um corpo clínico altamente especializado e qualificado e em permanente actualização. Os nossos psicoterapeutas têm formação técnica específica validada por Associação ou Sociedade Científica com reconhecimento internacional.', '<h3><i class="fa fa-warning text-yellow"></i> Oops! Página não encontrada..</h3>\n<p>\nLamentamos mas a página que procura não se encontra disponível.<br />\n<br />\nA página poderá ter sido removida, estar temporariamente indisponível ou o endereço poderá ter sido alterado. <br />\n<br />\nSugerimos que verifique se o endereço está escrito corretamente, ou efectue uma pesquisa sobre o tema pretendido.<br /><br />\nPode <a href="index.php" class="error-link">voltar à página principal</a> ou <a href="contactos.php" class="error-link">contactar-nos</a> para informar o problema indicando:<br />\nEndereço / url da página onde se encontrava<br />\nData e hora do erro<br/>\n<br />\nAgradecemos a sua colaboração.\n</p>', 'geral@stdpsiquiatria.pt', '800000000', 0, 3191);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `email`, `nome`, `dataNascimento`, `last_sign`, `morada`, `telemovel`, `linkFb`, `permissoes`, `ativo`) VALUES
(1, 'admin', '5978e5f2cf104d341b7eed9aa7f8c779883e1408', 'geral@stdpsiquiatria.pt', 'Administrador', '2015-09-22', '05/02/2016 às 14:34', '', '', '', '1', 1),
(2, 'andrefilsantos', '8eabf3da57c8248a4383ae6365f7490864a98bc7', 'andrefilipepsantos@hotmail.com', 'André Santos', '1998-10-20', '21/02/2016 às 22:00', 'Rua do André<br />Localidade do André<br />0000-000', '960000000', 'https://www.facebook.com/andrefpdsantos', '1', 1),
(3, 'legobrainiac', '39678b7c89f6913bad3c85339580e164c47485b8', 'tomas.antonio.sp@gmail.com', 'Tomás Pinto', '2015-09-04', '', 'Rua do Tomás<br />Localidade do Tomás<br />1111-111', '910000000', 'https://www.facebook.com/profile.php?id=100000728210384', '1', 1),
(4, 'filiparodrigues', '5c72570e0d66002e5c618ef71b6c70685b3d4c07', 'a20584@esenviseu.net', 'Filipa Rodrigues', '2014-02-14', '', 'Rua da Filipa<br />Localidade da Filipa<br />1111-111', '000000000', '', '4', 1),
(5, 'carlosbento', '27a7108f17eddc6c264061ce9c21210c57613020', 'a20575@esenviseu.net', 'Carlos Bento', '2014-02-14', '', 'Rua do Bento<br />Bentalândia<br />1111-111', '111111111', '', '4', 1),
(6, 'carloscastanheira', '1d79a340aa29ad29475fe2df54f69c4250dc8386', 'a20589@esenviseu.net', 'Carlos Castanheira', '2014-02-14', '', 'Rua do Castanheira<br />Localidade do Castanheira<br />2222-222', '222222222', '', '4', 1),
(7, 'carlossantos', 'b4d6515805ababd18ee4c668b2b578f0b5de9a3e', 'a20585@esenviseu.net', 'Carlos Santos', '2015-02-14', '', 'Rua Carlão<br />Paris<br />3333-333', '333333333', '', '4', 1),
(8, 'danielborges', '7d9202f6dee2db31f74ae91ca99e9d694c2c35b0', 'a20560@esenviseu.net', 'Daniel Borges', '2015-02-14', '', 'Rua do Daniel<br />Localidade do Daniel<br />4444-444', '444444444', '', '4', 1),
(9, 'davisouza', '90c38b09a7fb7578edc77e3fd5174bd0e188f979', 'a20582@esenviseu.net', 'Davi Souza', '2015-02-14', '', 'Rua do Davi<br />Localidade do Davi<br />5555-555', '555555555', '', '4', 1),
(10, 'diogopais', '02def22f76141286b72e3ff991d79794916a71f7', 'a20839@esenviseu.net', 'Diogo Pais', '2015-02-14', '', 'Rua do Diogo<br />Localidade do Diogo<br />6666-666', '666666666', '', '4', 1),
(11, 'edgarlopes', 'd1a2b6b136d9d63173c19bcd27c510a6e1f85812', 'a20578@esenviseu.net', 'Edgar Lopes', '2015-02-14', '', 'Rua do Edgar<br />Localidade do Edgar<br />7777-777', '777777777', '', '4', 1),
(12, 'eduardocunha', 'a1a7bb30f8d047b8c098103a1af0bb2602b155e1', 'a20564@esenviseu.net', 'Eduardo Cunha', '2015-02-14', '', 'Rua do Eduardo<br />Localidade do Eduardo<br />8888-888', '888888888', '', '4', 1),
(13, 'gabrielsabatka', '76e1aa0a13e308d26f9e3ce758cab863bb73b131', 'a19331@esenviseu.net', 'Gabriel Sabatka', '2015-02-14', '', 'Rua do Sabatka<br />Localidade do Sabatka<br />9999-999', '999999999', '', '4', 1),
(14, 'gabrielseixas', '6578bbedd30e4290721e751bc4c5434ac945bf67', 'a20562@esenviseu.net', 'Gabriel Seixas', '2015-02-14', '', 'Rua do Gabriel<br />Localidade do Gabriel<br />1010-101', '101010101', '', '4', 1),
(15, 'goncaloprazeres', '88766cddcf51f84bfeee6745e00707e3e06b6772', 'a20591@esenviseu.net', 'Gonçalo Prazeres', '2015-02-14', '', 'Rua do Gonçalo<br />Localidade do Gonçalo<br />1111-111', '111111111', '', '4', 1),
(16, 'jimmyfernandes', 'd3885ef233817414de10f8a67db956b6b9280312', 'a20580@esenviseu.net', 'Jimmy Fernandes', '2015-02-14', '', 'Rua do Jimmy<br />Localidade do Jimmy<br />1212-121', '121212121', '', '4', 1),
(17, 'joaoaires', 'efedc8987944702c1857389b09fe62ff58833599', 'a20558@esenviseu.net', 'João Aires', '0004-01-12', '', 'Rua do Aires<br />Localidade do Aires<br />1313-131', '131313131', '', '4', 1),
(18, 'joaoreis', '45ff82a5878e03ff3136123de32b7be65b846fc8', 'a20581@esenviseu.net', 'João Reis', '2015-01-12', '', 'Rua do Reis<br />Localidade do Reis<br />1414-141', '141414141', '', '4', 1),
(19, 'josepedro', '29bc7c876450a8c124402c2c7d58da2f1d157789', 'a20555@esenviseu.net', 'José Pedro', '2015-01-12', '', 'Rua do Zé<br />Localidade do Zé<br />1515-151', '151515151', '', '4', 1),
(20, 'luisgoncalves', '5c454f8f1a1392b19b80d69fe1e947118cc409f6', 'a20574@esenviseu.net', 'Luís Gonçalves', '2015-01-12', '', 'Rua do Luis<br />Localidade do Luis<br />1616-161', '161616161', '', '4', 1),
(21, 'marcosantos', 'be1ef8eef9622a5d11d601f679fe7d3f64d29655', 'a20588@esenviseu.net', 'Marco Santos', '2015-01-12', '', 'Rua do Marco<br />Localidade do Marco<br />1717-177', '171717171', '', '4', 1),
(22, 'marcovicente', 'ffc238b6e886fcd4de391a4da92731aa06df5845', 'a20587@esenviseu.net', 'Marco Vicente', '2015-01-12', '', 'Rua do Marco<br />Localidade do Marco<br />1818-181', '181818188', '', '4', 1),
(23, 'rodrigosilva', '3cd724c8d82afce0c540cdbabbd26b6bef595fa4', 'a20561@esenviseu.net', 'Rodrigo Silva', '2015-01-12', '', 'Rua do Rodrigo<br />Localidade do Rodrigo<br />1919-191', '191919191', '', '4', 1),
(24, 'tiagomachado', '06a230c295db319229da3fbd1d2ca42adb67cfa2', 'a20573@esenviseu.net', 'Tiago Machado', '2015-01-12', '', 'Rua do Machado<br />Localidade do Machado<br />2020-202', '202020202', '', '4', 1),
(25, 'tiagoferreira', '2a5b5eb5c41bd5bf261d30a1a20aefe1f64ca3a5', 'a20593@esenviseu.net', 'Tiago Ferreira', '2015-01-12', '', 'Rua do Ferreira<br />Localidade do Ferreira<br />2121-212', '212121212', '', '4', 1),
(26, 'helenafigueiredo', '6bb99f38f810389a147f15cd2efc05ea32c6f608', 'p631@esenviseu.net', 'Helena Figueiredo', '2015-02-14', '', 'Rua da stora Helena<br />Localidade da stora Helena<br />2323-232', '232323232', '', '4', 1),
(27, 'katiacoelho', '495aeb68f448fc8a5f136da23383669498f4f961', 'p1083@esenviseu.net', 'Kátia Coelho', '2015-02-14', '', 'Rua da stora Kátia<br />Localidade da stora Kátia<br />2424-242', '242424242', '', '4', 1),
(28, 'afonsomartins', '5978e5f2cf104d341b7eed9aa7f8c779883e1408', 'afonsomartins@stdpsiquiatria.pt', 'Afonso Martins', '1956-04-20', '', 'Rua do Dr. Afonso<br />Localidade do Dr. Afonso<br />7777-777', '9800000000', '', '2', 1),
(29, 'anaalves', '7853b8232776225dbed3e31d8ac8033cb6af2d89', 'anaalves@stdpsiquiatria.pt', 'Ana Alves', '1970-12-25', '', 'Rua da Drª. Ana <br />Localidade da Drª. Ana <br />7777-777', '9200000000', '', '2', 1),
(30, 'alvarosa', '5978e5f2cf104d341b7eed9aa7f8c779883e1408', 'alvarosa@stdpsiquiatria.pt', 'Álvaro Sá', '1980-01-30', '21/02/2016 às 21:22', 'Rua do Dr. Álvaro<br />Localidade do Dr. Álvaro<br />0000-000', '963852741', '', '2', 1),
(31, 'josealmeida', '5978e5f2cf104d341b7eed9aa7f8c779883e1408', 'josealmeida@stdpsiquiatria', 'José Almeida', '1950-10-20', '', 'Rua do Dr. José<br />Localidade do Dr. José<br />0000-000', '987456321', '', '2', 1),
(32, 'marciamota', '5978e5f2cf104d341b7eed9aa7f8c779883e1408', 'marciamota@stdpsiquiatria', 'Márcia Mota', '1950-10-20', '', 'Rua da Drª. Márcia<br />Localidade da Drª. Márcia<br />0000-000', '987456321', '', '2', 1),
(33, 'ricardomoreira', '5978e5f2cf104d341b7eed9aa7f8c779883e1408', 'ricardomoreira@stdpsiquiatria', 'Ricardo Moreira', '1950-10-20', '', 'Rua do Dr. Ricardo<br />Localidade do Dr. Ricardo<br />0000-000', '987456321', '', '2', 1),
(34, 'pedrocarvalho', '5978e5f2cf104d341b7eed9aa7f8c779883e1408', 'pedrocarvalho@stdpsiquiatria', 'Pedro Silva Carvalho', '1950-10-20', '', 'Rua do Dr. Pedro<br />Localidade do Dr. Pedro<br />0000-000', '987456321', '', '2', 1),
(35, 'joaquimpinto', '5978e5f2cf104d341b7eed9aa7f8c779883e1408', 'joaquimpinto@stdpsiquiatria', 'Joaquim Pinto', '1950-10-20', '', 'Rua do Dr. Joaquim <br />Localidade do Dr. Joaquim <br />0000-000', '987456321', '', '2', 1),
(36, 'andreluz', '5978e5f2cf104d341b7eed9aa7f8c779883e1408', 'andreluz@stdpsiquiatria', 'André Luz', '1950-10-20', '', 'Rua do Dr. André<br />Localidade do Dr. André<br />0000-000', '987456321', '', '2', 1),
(37, 'filiparouxinol', '5978e5f2cf104d341b7eed9aa7f8c779883e1408', 'filiparouxinol@stdpsiquiatria', 'Filipa Rouxinol', '1950-10-20', '', 'Rua da Drª. Filipa<br />Localidade da Drª. Filipa<br />0000-000', '987456321', '', '2', 1),
(38, 'juliamachado', '5978e5f2cf104d341b7eed9aa7f8c779883e1408', 'juliamachado@stdpsiquiatria', 'Júlia Machado', '1950-10-20', '', 'Rua da Drª. Júlia<br />Localidade da Drª. Júlia<br />0000-000', '987456321', '', '2', 1),
(39, 'mariaesteves', '5978e5f2cf104d341b7eed9aa7f8c779883e1408', 'mariaesteves@stdpsiquiatria', 'Maria Esteves', '1950-10-20', '', 'Rua da Drª. Maria<br />Localidade da Drª. Maria<br />0000-000', '987456321', '', '2', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `votacao`
--

CREATE TABLE IF NOT EXISTS `votacao` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `votante` text NOT NULL,
  `heteroavaliacao` int(11) NOT NULL,
  `comentario` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `votacao`
--

INSERT INTO `votacao` (`ID`, `votante`, `heteroavaliacao`, `comentario`) VALUES
(1, 'André Santos', 20, 'Fantástico!'),
(2, 'Filipa Rodrigues', 10, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
