-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 04-Jun-2019 às 01:05
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `agencia_turismo`
--
CREATE DATABASE IF NOT EXISTS `agencia_turismo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `agencia_turismo`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cartao`
--

CREATE TABLE IF NOT EXISTS `cartao` (
  `NUMERO_CARTAO` varchar(50) NOT NULL,
  `DATA_VALIDADE` date NOT NULL,
  `CODIGO_SEGURANCA` char(3) NOT NULL,
  `COD_CLIENTE` varchar(50) NOT NULL,
  `EMPRESA` varchar(50) NOT NULL,
  `NOME_TITULAR` varchar(50) NOT NULL,
  `TIPO_CARTAO` varchar(50) NOT NULL,
  PRIMARY KEY (`NUMERO_CARTAO`),
  KEY `COD_CLIENTE` (`COD_CLIENTE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cartao`
--

INSERT INTO `cartao` (`NUMERO_CARTAO`, `DATA_VALIDADE`, `CODIGO_SEGURANCA`, `COD_CLIENTE`, `EMPRESA`, `NOME_TITULAR`, `TIPO_CARTAO`) VALUES
('4024007124277707', '2019-11-20', '217', '42870973216', 'Visa', 'Gabrieli Luisa Moreira', 'Débito'),
('4897269523181393', '2020-08-27', '191', '05412465854', 'Visa', 'João A. da Silva', 'Débito'),
('5407899682781151', '2020-12-23', '888', '05412465854', 'MasterCard', 'João A. da Silva', 'Crédito');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE IF NOT EXISTS `cidade` (
  `ID_CIDADE` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(50) NOT NULL,
  `COD_PAIS` int(11) NOT NULL,
  PRIMARY KEY (`ID_CIDADE`),
  KEY `COD_PAIS` (`COD_PAIS`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`ID_CIDADE`, `NOME`, `COD_PAIS`) VALUES
(1, 'São Paulo', 1),
(2, 'Miami', 2),
(3, 'Rio de Janeiro', 1),
(4, 'Acapulco', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `ID_CLIENTE` varchar(50) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `SOBRENOME` varchar(50) NOT NULL,
  `DATA_NASCIMENTO` date NOT NULL,
  `SEXO` char(1) NOT NULL,
  `TELEFONE` varchar(50) NOT NULL,
  `ENDERECO` varchar(100) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `SENHA` varchar(50) NOT NULL,
  `PERMISSAO` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_CLIENTE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`ID_CLIENTE`, `NOME`, `SOBRENOME`, `DATA_NASCIMENTO`, `SEXO`, `TELEFONE`, `ENDERECO`, `EMAIL`, `SENHA`, `PERMISSAO`) VALUES
('05412465854', 'João Augusto', 'da Silva', '1990-10-29', 'm', '(16)3322-5183', 'Rua Nove de Julho, 126 - Centro, Araraquara-SP', 'joao_silva@gmail.com', 'b714337aa8007c433329ef43c7b8252c', 0),
('09876543210', 'Maria Laura', 'Freitas', '1998-07-25', 'f', '(16)99834-7719', 'Avenida José Nogueira Neves, 128 - Melhado, Araraquara-SP', 'maria_lau@email.com.br', 'b714337aa8007c433329ef43c7b8252c', 0),
('42870973216', 'Gabrieli Luisa', 'Moreira', '2001-02-02', 'f', '(16)99734-5580', 'Avenida Artur Lopes de Castro, 06 -Jardim Guaianazes, Araraquara-SP', 'gabrieli.moreira@outlook.com.br', 'b714337aa8007c433329ef43c7b8252c', 1),
('76549039218', 'Sérgio', 'Alex Luge', '0985-11-08', 'm', '(16)997549323', 'Rua 15', 'sergio_luge@email.com', '', 0),
('87452985691', 'Joice ', 'Romero', '1985-06-20', 'f', '(16)997539574', 'Rua 5', 'joice_romero@email.com', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `companhia`
--

CREATE TABLE IF NOT EXISTS `companhia` (
  `ID_COMPANHIA` varchar(50) NOT NULL,
  `NOME_COMPANHIA` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `TIPO_VIAGEM` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_COMPANHIA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `companhia`
--

INSERT INTO `companhia` (`ID_COMPANHIA`, `NOME_COMPANHIA`, `EMAIL`, `TIPO_VIAGEM`) VALUES
('1111', 'Clube Turismo', 'clube_turismo@email.com', 'Avião'),
('2222', 'StarLight', 'starlight@email.com', 'Cruzeiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `companhia_origem_destino`
--

CREATE TABLE IF NOT EXISTS `companhia_origem_destino` (
  `ID_COMPANHIA_ORIGEM_DESTINO` int(11) NOT NULL AUTO_INCREMENT,
  `COD_COMPANHIA` varchar(50) NOT NULL,
  `COD_ORIGEM` int(11) NOT NULL,
  `COD_DESTINO` int(11) NOT NULL,
  `VALOR_PASSAGEM` float NOT NULL,
  PRIMARY KEY (`ID_COMPANHIA_ORIGEM_DESTINO`),
  KEY `COD_COMPANHIA` (`COD_COMPANHIA`),
  KEY `COD_ORIGEM` (`COD_ORIGEM`),
  KEY `COD_DESTINO` (`COD_DESTINO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `companhia_origem_destino`
--

INSERT INTO `companhia_origem_destino` (`ID_COMPANHIA_ORIGEM_DESTINO`, `COD_COMPANHIA`, `COD_ORIGEM`, `COD_DESTINO`, `VALOR_PASSAGEM`) VALUES
(1, '1111', 1, 2, 2000),
(2, '1111', 2, 1, 1900),
(3, '1111', 1, 4, 1500),
(4, '2222', 1, 3, 2500),
(5, '1111', 1, 3, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `facilidade`
--

CREATE TABLE IF NOT EXISTS `facilidade` (
  `ID_FACILIDADE` varchar(50) NOT NULL,
  `NOME_FACILIDADE` varchar(50) NOT NULL,
  `DESCRICAO` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_FACILIDADE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `facilidade`
--

INSERT INTO `facilidade` (`ID_FACILIDADE`, `NOME_FACILIDADE`, `DESCRICAO`) VALUES
('2', 'Pagamento', 'Pagamento reembolsável'),
('3', 'Reserva', 'Cancelamento de reservas gratuito'),
('4', 'Academia', 'Acesso livre à academia'),
('5', 'Wi-Fi', 'Acesso gratuito e ilimitado à rede Wi-Fi nas dependências do hotel'),
('9', 'Estacionamento', 'Estacionamento gratuito');

-- --------------------------------------------------------

--
-- Estrutura da tabela `guia_turismo`
--

CREATE TABLE IF NOT EXISTS `guia_turismo` (
  `ID_GUIA` varchar(50) NOT NULL,
  `NOME` varchar(100) NOT NULL,
  `TELEFONE` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `COD_COMPANHIA_ORIGEM_DESTINO` int(11) NOT NULL,
  `PRECO` float NOT NULL,
  PRIMARY KEY (`ID_GUIA`),
  KEY `COD_COMPANHIA_ORIGEM_DESTINO` (`COD_COMPANHIA_ORIGEM_DESTINO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `guia_turismo`
--

INSERT INTO `guia_turismo` (`ID_GUIA`, `NOME`, `TELEFONE`, `EMAIL`, `COD_COMPANHIA_ORIGEM_DESTINO`, `PRECO`) VALUES
('56732980175', 'Elisa', 'Campos', 'elisa_guia_viagens@email.com', 5, 1950),
('57489475843', 'Luiz de Arruda Campos', '33778945', 'luiz_guiat@email.com', 1, 3500),
('87230487502', 'Maria dos Anjos Machado', '44372895', 'mariaanjos.turismo@email.com', 4, 2900);

-- --------------------------------------------------------

--
-- Estrutura da tabela `hotel`
--

CREATE TABLE IF NOT EXISTS `hotel` (
  `ID_HOTEL` varchar(50) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `TELEFONE` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `TIPO_QUARTO` varchar(50) NOT NULL,
  `QNT_QUARTO` int(11) NOT NULL,
  `PRECO_DIARIA` float NOT NULL,
  `COD_CIDADE` int(11) NOT NULL,
  PRIMARY KEY (`ID_HOTEL`),
  KEY `COD_CIDADE` (`COD_CIDADE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `hotel`
--

INSERT INTO `hotel` (`ID_HOTEL`, `NOME`, `TELEFONE`, `EMAIL`, `TIPO_QUARTO`, `QNT_QUARTO`, `PRECO_DIARIA`, `COD_CIDADE`) VALUES
('11', 'The Shard', '66582730', 'the_shardm@email.com', 'Superior Shard', 10, 2500, 2),
('12', 'The Shard', '33227845', 'the_shardsp@email.com', 'Superior Shard', 5, 3000, 1),
('22', 'Morada do Sol', '33229865', 'moradadosol@email.com', 'Duplo', 4, 500, 1),
('33', 'Comfort Hotel', '34327865', 'comfort_hotel@email.com', 'Superior Double Room', 7, 750, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `hotel_facilidade`
--

CREATE TABLE IF NOT EXISTS `hotel_facilidade` (
  `COD_HOTEL` varchar(50) NOT NULL,
  `COD_FACILIDADE` varchar(50) NOT NULL,
  PRIMARY KEY (`COD_HOTEL`,`COD_FACILIDADE`),
  KEY `COD_FACILIDADE` (`COD_FACILIDADE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `hotel_facilidade`
--

INSERT INTO `hotel_facilidade` (`COD_HOTEL`, `COD_FACILIDADE`) VALUES
('11', '2'),
('22', '3'),
('33', '4'),
('11', '5');

-- --------------------------------------------------------

--
-- Stand-in structure for view `info_hotel_facilidades`
--
CREATE TABLE IF NOT EXISTS `info_hotel_facilidades` (
`HOTEL` varchar(50)
,`FACILIDADE` varchar(50)
,`DESCRICAO` varchar(100)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `info_reserva`
--
CREATE TABLE IF NOT EXISTS `info_reserva` (
`CLIENTE` varchar(50)
,`HOTEL` varchar(50)
,`COMPANHIA` varchar(50)
,`ORIGEM_DESTINO` int(11)
,`CHECK_IN` date
,`CHECK_OUT` date
,`QNT_VIAJANTES` int(11)
,`DATA_COMPRA` date
,`STATUS_PAGAMENTO` varchar(50)
,`STATUS_RESERVA` varchar(50)
,`VALOR_TOTAL` float
);
-- --------------------------------------------------------

--
-- Estrutura da tabela `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `ID_PAIS` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_PAIS`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `pais`
--

INSERT INTO `pais` (`ID_PAIS`, `NOME`) VALUES
(1, 'Brasil'),
(2, 'Estados Unidos'),
(3, 'México'),
(4, 'Canadá');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `ID_RESERVA` int(11) NOT NULL AUTO_INCREMENT,
  `COD_CLIENTE` varchar(50) NOT NULL,
  `COD_HOTEL` varchar(50) NOT NULL,
  `COD_COMPANHIA` varchar(50) NOT NULL,
  `ORIGEM_DESTINO` int(11) NOT NULL,
  `CHECK_IN` date NOT NULL,
  `CHECK_OUT` date NOT NULL,
  `QNT_VIAJANTES` int(11) NOT NULL,
  `DATA_COMPRA` date NOT NULL,
  `STATUS_PAGAMENTO` varchar(50) NOT NULL,
  `STATUS_RESERVA` varchar(50) NOT NULL,
  `VALOR_TOTAL` float NOT NULL,
  PRIMARY KEY (`ID_RESERVA`),
  KEY `COD_CLIENTE` (`COD_CLIENTE`),
  KEY `COD_HOTEL` (`COD_HOTEL`),
  KEY `COD_COMPANHIA` (`COD_COMPANHIA`),
  KEY `ORIGEM_DESTINO` (`ORIGEM_DESTINO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `reserva`
--

INSERT INTO `reserva` (`ID_RESERVA`, `COD_CLIENTE`, `COD_HOTEL`, `COD_COMPANHIA`, `ORIGEM_DESTINO`, `CHECK_IN`, `CHECK_OUT`, `QNT_VIAJANTES`, `DATA_COMPRA`, `STATUS_PAGAMENTO`, `STATUS_RESERVA`, `VALOR_TOTAL`) VALUES
(1, '05412465854', '11', '1111', 1, '2019-05-25', '2019-07-30', 3, '2010-05-03', 'Aguardando confirmação', 'Aguardando pagamento', 10100),
(2, '05412465854', '11', '2222', 2, '2019-04-25', '2019-05-03', 1, '2019-01-05', 'Pago', 'Processando informação', 12500),
(3, '42870973216', '11', '1111', 3, '2019-04-25', '2019-05-03', 2, '2018-12-25', 'Pago', 'Concluída', 8000),
(4, '42870973216', '33', '1111', 1, '2019-04-17', '2019-04-27', 1, '2018-07-30', 'Aguardando confirmação', 'Aguardando pagamento', 19000),
(6, '42870973216', '22', '2222', 2, '2019-05-17', '2019-05-29', 5, '2017-05-31', 'Pago', 'Gerando confirmação', 15000),
(7, '05412465854', '11', '1111', 3, '2019-04-25', '2019-05-10', 1, '2019-02-02', 'Aguardando confirmação', 'Aguardando pagamento', 13500);

-- --------------------------------------------------------

--
-- Structure for view `info_hotel_facilidades`
--
DROP TABLE IF EXISTS `info_hotel_facilidades`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `info_hotel_facilidades` AS select `hotel`.`NOME` AS `HOTEL`,`facilidade`.`NOME_FACILIDADE` AS `FACILIDADE`,`facilidade`.`DESCRICAO` AS `DESCRICAO` from ((`hotel` join `hotel_facilidade` on((`hotel`.`ID_HOTEL` = `hotel_facilidade`.`COD_HOTEL`))) join `facilidade` on((`hotel_facilidade`.`COD_FACILIDADE` = `facilidade`.`ID_FACILIDADE`))) order by `hotel`.`NOME`,`facilidade`.`NOME_FACILIDADE`;

-- --------------------------------------------------------

--
-- Structure for view `info_reserva`
--
DROP TABLE IF EXISTS `info_reserva`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `info_reserva` AS select `cliente`.`NOME` AS `CLIENTE`,`hotel`.`NOME` AS `HOTEL`,`companhia`.`NOME_COMPANHIA` AS `COMPANHIA`,`reserva`.`ORIGEM_DESTINO` AS `ORIGEM_DESTINO`,`reserva`.`CHECK_IN` AS `CHECK_IN`,`reserva`.`CHECK_OUT` AS `CHECK_OUT`,`reserva`.`QNT_VIAJANTES` AS `QNT_VIAJANTES`,`reserva`.`DATA_COMPRA` AS `DATA_COMPRA`,`reserva`.`STATUS_PAGAMENTO` AS `STATUS_PAGAMENTO`,`reserva`.`STATUS_RESERVA` AS `STATUS_RESERVA`,`reserva`.`VALOR_TOTAL` AS `VALOR_TOTAL` from ((((`cliente` join `reserva` on((`cliente`.`ID_CLIENTE` = `reserva`.`COD_CLIENTE`))) join `hotel` on((`reserva`.`COD_HOTEL` = `hotel`.`ID_HOTEL`))) join `companhia_origem_destino` on((`reserva`.`COD_COMPANHIA` = `companhia_origem_destino`.`COD_COMPANHIA`))) join `companhia` on((`companhia_origem_destino`.`COD_COMPANHIA` = `companhia`.`ID_COMPANHIA`))) order by `cliente`.`NOME`,`hotel`.`NOME`;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cartao`
--
ALTER TABLE `cartao`
  ADD CONSTRAINT `cartao_ibfk_1` FOREIGN KEY (`COD_CLIENTE`) REFERENCES `cliente` (`ID_CLIENTE`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `cidade_ibfk_1` FOREIGN KEY (`COD_PAIS`) REFERENCES `pais` (`ID_PAIS`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `companhia_origem_destino`
--
ALTER TABLE `companhia_origem_destino`
  ADD CONSTRAINT `companhia_origem_destino_ibfk_1` FOREIGN KEY (`COD_COMPANHIA`) REFERENCES `companhia` (`ID_COMPANHIA`) ON UPDATE CASCADE,
  ADD CONSTRAINT `companhia_origem_destino_ibfk_2` FOREIGN KEY (`COD_ORIGEM`) REFERENCES `cidade` (`ID_CIDADE`) ON UPDATE CASCADE,
  ADD CONSTRAINT `companhia_origem_destino_ibfk_3` FOREIGN KEY (`COD_DESTINO`) REFERENCES `cidade` (`ID_CIDADE`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `guia_turismo`
--
ALTER TABLE `guia_turismo`
  ADD CONSTRAINT `guia_turismo_ibfk_1` FOREIGN KEY (`COD_COMPANHIA_ORIGEM_DESTINO`) REFERENCES `companhia_origem_destino` (`ID_COMPANHIA_ORIGEM_DESTINO`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `hotel_ibfk_1` FOREIGN KEY (`COD_CIDADE`) REFERENCES `cidade` (`ID_CIDADE`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `hotel_facilidade`
--
ALTER TABLE `hotel_facilidade`
  ADD CONSTRAINT `hotel_facilidade_ibfk_1` FOREIGN KEY (`COD_HOTEL`) REFERENCES `hotel` (`ID_HOTEL`) ON UPDATE CASCADE,
  ADD CONSTRAINT `hotel_facilidade_ibfk_2` FOREIGN KEY (`COD_FACILIDADE`) REFERENCES `facilidade` (`ID_FACILIDADE`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`COD_CLIENTE`) REFERENCES `cliente` (`ID_CLIENTE`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`COD_HOTEL`) REFERENCES `hotel` (`ID_HOTEL`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reserva_ibfk_3` FOREIGN KEY (`COD_COMPANHIA`) REFERENCES `companhia` (`ID_COMPANHIA`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reserva_ibfk_4` FOREIGN KEY (`ORIGEM_DESTINO`) REFERENCES `companhia_origem_destino` (`ID_COMPANHIA_ORIGEM_DESTINO`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
