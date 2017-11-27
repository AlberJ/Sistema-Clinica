-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 23-Nov-2017 às 03:24
-- Versão do servidor: 5.7.19-log
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bancoclinicamodelo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

DROP TABLE IF EXISTS `consulta`;
CREATE TABLE IF NOT EXISTS `consulta` (
  `codConsulta` int(11) NOT NULL,
  `dataConsulta` date NOT NULL,
  `cpfPaciente` varchar(11) NOT NULL,
  `crmMedico` int(11) NOT NULL,
  `descricaoConsulta` text NOT NULL,
  PRIMARY KEY (`codConsulta`) USING BTREE,
  KEY `cpfPaciente` (`cpfPaciente`) USING BTREE,
  KEY `crmMedico` (`crmMedico`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `exame`
--

DROP TABLE IF EXISTS `exame`;
CREATE TABLE IF NOT EXISTS `exame` (
  `tipoExame` int(11) NOT NULL AUTO_INCREMENT,
  `descricaoExame` varchar(1000) NOT NULL,
  PRIMARY KEY (`tipoExame`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `exame`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicamento`
--

DROP TABLE IF EXISTS `medicamento`;
CREATE TABLE IF NOT EXISTS `medicamento` (
  `cod_medicamento` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` text NOT NULL,
  `Descricao` text NOT NULL,
  PRIMARY KEY (`cod_medicamento`)
) ENGINE=InnoDB AUTO_INCREMENT=1235 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `medicamento`
--
-- --------------------------------------------------------

--
-- Estrutura da tabela `medico`
--

DROP TABLE IF EXISTS `medico`;
CREATE TABLE IF NOT EXISTS `medico` (
  `CRM` int(10) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Telefone` int(11) NOT NULL,
  `DataNasc` date DEFAULT NULL,
  `Especialidade` varchar(50) NOT NULL,
  PRIMARY KEY (`CRM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

DROP TABLE IF EXISTS `paciente`;
CREATE TABLE IF NOT EXISTS `paciente` (
  `CPF` varchar(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Convenio` varchar(100) NOT NULL,
  `Telefone` varchar(30) NOT NULL,
  `DataNasc` date NOT NULL,
  `TipoSanguineo` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`CPF`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `paciente`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `prescricao`
--

DROP TABLE IF EXISTS `prescricao`;
CREATE TABLE IF NOT EXISTS `prescricao` (
  `codPrescricao` int(11) NOT NULL AUTO_INCREMENT,
  `codConsulta` int(11) NOT NULL,
  `codMedicamento` int(11) DEFAULT NULL,
  `codExame` int(11) DEFAULT NULL,
  `Comentario` text NOT NULL,
  PRIMARY KEY (`codPrescricao`),
  UNIQUE KEY `codConsulta` (`codConsulta`),
  UNIQUE KEY `codMedicamento` (`codMedicamento`),
  UNIQUE KEY `codExame` (`codExame`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `FK_MEDICO` FOREIGN KEY (`crmMedico`) REFERENCES `medico` (`CRM`),
  ADD CONSTRAINT `FK_PACIENTE` FOREIGN KEY (`cpfPaciente`) REFERENCES `paciente` (`CPF`);

--
-- Limitadores para a tabela `prescricao`
--
ALTER TABLE `prescricao`
  ADD CONSTRAINT `FK_CONSULTA` FOREIGN KEY (`codConsulta`) REFERENCES `consulta` (`codConsulta`),
  ADD CONSTRAINT `FK_EXAME` FOREIGN KEY (`codExame`) REFERENCES `exame` (`tipoExame`),
  ADD CONSTRAINT `FK_MEDICAMENTO` FOREIGN KEY (`codMedicamento`) REFERENCES `medicamento` (`cod_medicamento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
