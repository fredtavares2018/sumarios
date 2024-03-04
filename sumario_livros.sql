-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31-Mar-2023 às 03:24
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sumario_livros`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `capitulos`
--

CREATE TABLE `capitulos` (
  `id` int(11) NOT NULL,
  `nome` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint(20) DEFAULT NULL,
  `dataCadastro` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `capitulos`
--

INSERT INTO `capitulos` (`id`, `nome`, `id_user`, `dataCadastro`) VALUES
(15, 'Capítulo 15', 1, '2021-06-08 00:00:00'),
(13, 'Capítulo 13', 1, '2021-06-08 00:00:00'),
(12, 'Capítulo 12', 1, '2021-06-08 00:00:00'),
(11, 'Capítulo 11', 1, '2021-06-06 00:00:00'),
(7, 'Capítulo 07', 1, '2021-06-06 00:00:00'),
(10, 'Capítulo 10', 1, '2021-06-06 00:00:00'),
(9, 'Capítulo 09', 1, '2021-06-06 00:00:00'),
(1, 'Capítulo 01', 1, '2021-06-11 00:00:00'),
(2, 'Capítulo 02', 1, '2021-06-11 00:00:00'),
(3, 'Capítulo 03', 1, '2021-06-11 00:00:00'),
(4, 'Capítulo 04', 1, '2021-06-11 00:00:00'),
(5, 'Capítulo 05', 1, '2021-06-11 00:00:00'),
(6, 'Capítulo 06', 1, '2021-06-11 00:00:00'),
(8, 'Capítulo 08', 1, '2021-06-06 00:00:00'),
(14, 'Capítulo 14', 1, '2021-06-08 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteudos`
--

CREATE TABLE `conteudos` (
  `id` int(11) NOT NULL,
  `serie` int(11) NOT NULL,
  `capitulo` int(11) NOT NULL,
  `nome` text COLLATE utf8_unicode_ci NOT NULL,
  `assunto` text COLLATE utf8_unicode_ci NOT NULL,
  `chekin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `conteudos`
--

INSERT INTO `conteudos` (`id`, `serie`, `capitulo`, `nome`, `assunto`, `chekin`) VALUES
(1, 92, 1, 'Potências e raízes', '1. Potências - potências na base 10', 0),
(2, 91, 1, 'Potências e raízes', '1. Potências - potências na base 10', 0),
(3, 91, 1, 'Potências e raízes', '2. Calculando com raízes', 0),
(4, 92, 1, 'Potências e raízes', '2. Calculando com raízes', 0),
(5, 91, 1, 'Potências e raízes', '3. Potências com expoente fracionário', 0),
(6, 91, 1, 'Potências e raízes', '4. Propriedades dos radicais', 0),
(7, 91, 1, 'Potências e raízes', '5. Adição algébrica com radicais', 0),
(8, 91, 1, 'Potências e raízes', '6. Multiplicação e divisão com radicais', 0),
(9, 91, 1, 'Potências e raízes', '7. Potenciação com radicais', 0),
(10, 91, 1, 'Potências e raízes', '8. Radiciação com radicais', 0),
(11, 91, 1, 'Potências e raízes', '9. Racionalização de denominadores', 0),
(12, 92, 1, 'Potências e raízes', '3. Potências com expoente fracionário', 0),
(13, 92, 1, 'Potências e raízes', '4. Propriedades dos radicais', 0),
(14, 92, 1, 'Potências e raízes', '5. Adição algébrica com radicais', 0),
(15, 92, 1, 'Potências e raízes', '6. Multiplicação e divisão com radicais', 0),
(16, 92, 1, 'Potências e raízes', '7. Potenciação com radicais', 0),
(17, 92, 1, 'Potências e raízes', '8. Radiciação com radicais', 0),
(18, 92, 1, 'Potências e raízes', '9. Racionalização de denominadores', 0),
(19, 91, 2, 'Proporcionalidade e semelhança em Geometria', '1. Razão entre dois segmentos', 0),
(20, 91, 3, 'Estatística e probabilidade', '2. Formas de obtenção, organização e apresentação de dados', 0),
(21, 91, 4, 'Equações do 2o grau', '1. Equações do 2o grau com uma incógnita', 0),
(22, 92, 2, 'Proporcionalidade e semelhança em Geometria', '1. Razão entre dois segmentos', 0),
(23, 91, 3, 'Estatística e probabilidade', '1. Origem da Estatística', 0),
(24, 92, 3, 'Estatística e probabilidade', '1. Origem da Estatística', 0),
(25, 92, 3, 'Estatística e probabilidade', '2. Formas de obtenção, organização e apresentação de dados', 0),
(26, 91, 2, 'Proporcionalidade e semelhança em Geometria', '2. Feixe de paralelas', 0),
(27, 91, 2, 'Proporcionalidade e semelhança em Geometria', '3. Teorema de Tales', 0),
(28, 91, 2, 'Proporcionalidade e semelhança em Geometria', '4. Figuras semelhantes', 0),
(29, 91, 2, 'Proporcionalidade e semelhança em Geometria', '5. Semelhança aplicada a triângulos', 0),
(30, 91, 3, 'Estatística e probabilidade', '3. Frequência relativa', 0),
(31, 91, 3, 'Estatística e probabilidade', '4. Medidas de tendência central ou medidas-resumo (Moda, Média aritmética, Média aritmética ponderada, Mediana )', 0),
(32, 91, 3, 'Estatística e probabilidade', '5. Noções de probabilidade', 0),
(33, 91, 4, 'Equações do 2o grau', '2. Raízes de uma equação do 2o grau', 0),
(34, 91, 4, 'Equações do 2o grau', '3. Resolvendo equações do 2o grau', 0),
(35, 91, 4, 'Equações do 2o grau', '4. Resolvendo equações do 2o grau completando quadrados', 0),
(36, 91, 4, 'Equações do 2o grau', '5. A fórmula resolutiva de uma equação do 2o grau', 0),
(37, 91, 4, 'Equações do 2o grau', '6. Estudando as raízes de uma equação do 2o grau', 0),
(38, 91, 4, 'Equações do 2o grau', '7. Relações de Girard', 0),
(39, 91, 5, 'Triângulos retângulos', '1. Um pouco de História', 0),
(40, 91, 5, 'Triângulos retângulos', '2. Projeções ortogonais', 0),
(41, 91, 5, 'Triângulos retângulos', '3. Elementos de um triângulo retângulo', 0),
(42, 91, 5, 'Triângulos retângulos', '4. Teorema de Pitágoras', 0),
(43, 91, 5, 'Triângulos retângulos', '5. Aplicações do teorema de Pitágoras', 0),
(44, 91, 5, 'Triângulos retângulos', '6. Relações métricas em um triângulo retângulo', 0),
(45, 91, 6, 'Razões trigonométricas nos triângulos retângulos', '1. A Trigonometria', 0),
(46, 91, 6, 'Razões trigonométricas nos triângulos retângulos', '2. As razões trigonométricas seno, cosseno e tangente', 0),
(47, 91, 6, 'Razões trigonométricas nos triângulos retângulos', '3. Como usar a tabela de razões trigonométricas', 0),
(48, 91, 6, 'Razões trigonométricas nos triângulos retângulos', '4. Resolução de problemas que envolvem triângulos retângulos', 0),
(49, 91, 6, 'Razões trigonométricas nos triângulos retângulos', '5. Razões trigonométricas dos ângulos de 45°, 30° e 60°', 0),
(50, 91, 7, 'Estudo das funções', '1. Conceito de função - Gráficos', 0),
(51, 91, 7, 'Estudo das funções', '2. Função polinomial do 1o grau (Gráficos e Sinais)', 0),
(52, 91, 7, 'Estudo das funções', '3. Função polinomial do 2o grau (Gráficos, Sinais, Vmáx, Vmín)', 0),
(53, 91, 8, 'Circunferência, arcos e relações métricas', '1. Circunferência e arcos de circunferência', 0),
(54, 91, 8, 'Circunferência, arcos e relações métricas', '2. Triângulo retângulo inscrito em uma circunferência', 0),
(55, 91, 8, 'Circunferência, arcos e relações métricas', '3. Relações métricas em uma circunferência', 0),
(56, 91, 9, 'Polígonos regulares e áreas', '1. Polígonos regulares (Propriedades e Elementos)', 0),
(57, 91, 9, 'Polígonos regulares e áreas', '2. Relações métricas nos polígonos regulares (Quadrado inscrito, Hexágono regular inscrito, Triângulo equilátero inscrito)', 0),
(58, 91, 9, 'Polígonos regulares e áreas', '3. Área de um polígono regular', 0),
(59, 91, 9, 'Polígonos regulares e áreas', '4. Área de um círculo ( Coroa e Setor )', 0),
(60, 92, 2, 'Proporcionalidade e semelhança em Geometria', '2. Feixe de paralelas', 0),
(61, 92, 2, 'Proporcionalidade e semelhança em Geometria', '3. Teorema de Tales', 0),
(62, 92, 2, 'Proporcionalidade e semelhança em Geometria', '4. Figuras semelhantes', 0),
(63, 92, 2, 'Proporcionalidade e semelhança em Geometria', '5. Semelhança aplicada a triângulos', 0),
(64, 92, 3, 'Estatística e probabilidade', '3. Frequência relativa', 0),
(65, 92, 3, 'Estatística e probabilidade', '4. Medidas de tendência central ou medidas-resumo (Moda, Média aritmética, Média aritmética ponderada, Mediana )', 0),
(66, 92, 3, 'Estatística e probabilidade', '5. Noções de probabilidade', 0),
(67, 92, 4, 'Equações do 2o grau', '1. Equações do 2o grau com uma incógnita', 0),
(68, 92, 4, 'Equações do 2o grau', '2. Raízes de uma equação do 2o grau', 0),
(69, 92, 4, 'Equações do 2o grau', '3. Resolvendo equações do 2o grau', 0),
(70, 92, 4, 'Equações do 2o grau', '4. Resolvendo equações do 2o grau completando quadrados', 0),
(71, 92, 4, 'Equações do 2o grau', '5. A fórmula resolutiva de uma equação do 2o grau', 0),
(72, 92, 4, 'Equações do 2o grau', '6. Estudando as raízes de uma equação do 2o grau', 0),
(73, 92, 4, 'Equações do 2o grau', '7. Relações de Girard', 0),
(74, 92, 5, 'Triângulos retângulos', '1. Um pouco de História', 0),
(75, 92, 5, 'Triângulos retângulos', '2. Projeções ortogonais', 0),
(76, 92, 5, 'Triângulos retângulos', '3. Elementos de um triângulo retângulo', 0),
(77, 92, 5, 'Triângulos retângulos', '4. Teorema de Pitágoras', 0),
(78, 92, 5, 'Triângulos retângulos', '5. Aplicações do teorema de Pitágoras', 0),
(79, 92, 5, 'Triângulos retângulos', '6. Relações métricas em um triângulo retângulo', 0),
(80, 92, 6, 'Razões trigonométricas nos triângulos retângulos', '1. A Trigonometria', 0),
(81, 92, 6, 'Razões trigonométricas nos triângulos retângulos', '2. As razões trigonométricas seno, cosseno e tangente', 0),
(82, 92, 6, 'Razões trigonométricas nos triângulos retângulos', '3. Como usar a tabela de razões trigonométricas', 0),
(83, 92, 6, 'Razões trigonométricas nos triângulos retângulos', '4. Resolução de problemas que envolvem triângulos retângulos', 0),
(84, 92, 6, 'Razões trigonométricas nos triângulos retângulos', '5. Razões trigonométricas dos ângulos de 45°, 30° e 60°', 0),
(85, 92, 7, 'Estudo das funções', '1. Conceito de função - Gráficos', 0),
(86, 92, 7, 'Estudo das funções', '2. Função polinomial do 1o grau (Gráficos e Sinais)', 0),
(87, 92, 7, 'Estudo das funções', '3. Função polinomial do 2o grau (Gráficos, Sinais, Vmáx, Vmín)', 0),
(88, 92, 8, 'Circunferência, arcos e relações métricas', '1. Circunferência e arcos de circunferência', 0),
(89, 92, 8, 'Circunferência, arcos e relações métricas', '2. Triângulo retângulo inscrito em uma circunferência', 0),
(90, 92, 8, 'Circunferência, arcos e relações métricas', '3. Relações métricas em uma circunferência', 0),
(91, 92, 9, 'Polígonos regulares e áreas', '1. Polígonos regulares (Propriedades e Elementos)', 0),
(92, 92, 9, 'Polígonos regulares e áreas', '2. Relações métricas nos polígonos regulares (Quadrado inscrito, Hexágono regular inscrito, Triângulo equilátero inscrito)', 0),
(93, 92, 9, 'Polígonos regulares e áreas', '3. Área de um polígono regular', 0),
(94, 92, 9, 'Polígonos regulares e áreas', '4. Área de um círculo ( Coroa e Setor )', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `id` int(11) NOT NULL,
  `turma` bigint(20) NOT NULL,
  `id_user` bigint(20) DEFAULT NULL,
  `dataCadastro` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id`, `turma`, `id_user`, `dataCadastro`) VALUES
(17, 201, 1, '2021-06-08 00:00:00'),
(16, 102, 1, '2021-06-08 00:00:00'),
(15, 101, 1, '2021-06-08 00:00:00'),
(13, 91, 1, '2021-06-08 00:00:00'),
(12, 82, 1, '2021-06-08 00:00:00'),
(11, 81, 1, '2021-06-06 00:00:00'),
(7, 61, 1, '2021-06-06 00:00:00'),
(10, 72, 1, '2021-06-06 00:00:00'),
(9, 71, 1, '2021-06-06 00:00:00'),
(18, 202, 1, '2021-06-08 00:00:00'),
(19, 301, 1, '2021-06-08 00:00:00'),
(20, 302, 1, '2021-06-08 00:00:00'),
(1, 10, 1, '2021-06-11 00:00:00'),
(2, 11, 1, '2021-06-11 00:00:00'),
(3, 21, 1, '2021-06-11 00:00:00'),
(4, 31, 1, '2021-06-11 00:00:00'),
(5, 41, 1, '2021-06-11 00:00:00'),
(6, 51, 1, '2021-06-11 00:00:00'),
(8, 62, 1, '2021-06-06 00:00:00'),
(14, 92, 1, '2021-06-08 00:00:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `capitulos`
--
ALTER TABLE `capitulos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `conteudos`
--
ALTER TABLE `conteudos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `capitulos`
--
ALTER TABLE `capitulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `conteudos`
--
ALTER TABLE `conteudos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT de tabela `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
