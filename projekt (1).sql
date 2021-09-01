-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 01 Gru 2020, 23:33
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `projekt`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `articles`
--

CREATE TABLE `articles` (
  `id_artykul` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `data_utworzenia` date NOT NULL,
  `data_edycji` date NOT NULL,
  `tytul` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `tresc` longtext COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `articles`
--

INSERT INTO `articles` (`id_artykul`, `id_user`, `data_utworzenia`, `data_edycji`, `tytul`, `tresc`) VALUES
(72, 2, '2020-12-01', '2020-12-01', 'Pierwsza wyprawa w góry', '<p><span style=\"color: #474747; font-family: \'Hind Siliguri\', sans-serif; font-size: 20px; background-color: #ffffff;\">Jeśli jednak zestawić zalety z wadami samotnej wędr&oacute;wki i głębiej zastanowić się nad tym, w jakim stopniu to towarzysze wyprawy podnoszą nasze poczucie bezpieczeństwa, pomysł wędr&oacute;wki solo zyskuje coraz więcej punkt&oacute;w. W końcu można iść własnym tempem, nikt nie pogania, nikt nie spowalnia, nie jesteś zobowiązany do podtrzymywania rozmowy i słuchania komentarzy czy narzekań innych. Totalna wolność i możliwość obcowania z naturą na własnych zasadach.&nbsp;</span></p>'),
(73, 2, '2020-12-01', '2020-12-01', 'Trening i potrzebne doświadczenie górskie, czyli…', '<p><span style=\"color: #222222; font-family: \'Fira Sans\', Helvetica, Arial, sans-serif; font-size: 17px; background-color: #ffffff;\">Szlaki na Lofotach nie są bardzo trudne technicznie, jest to klasyczny trekking. Jednak należy pamiętać, że miejscami podejścia są strome, a w kilku miejscach konieczne jest asekurowanie się rękoma na skałach bądź na zamontowanych na szlaku linach/łańcuchach. Na uwagę zasługuje r&oacute;wnież fakt, że podczas części trekking&oacute;w poruszamy się z ciężkim plecakiem, w kt&oacute;rym mamy ekwipunek (namiot, karimata, śpiw&oacute;r, prowiant, itp.) na spędzenie np. 2 dni w g&oacute;rach.</span></p>'),
(74, 9, '2020-12-01', '2020-12-01', 'Przygoda Twojego Życia – Trekkingi W Himalajach', '<p style=\"padding-left: 40px; text-align: right;\"><em><span style=\"color: #3d3d3d; font-family: Poppins, serif; font-size: 14px; background-color: #ffffff;\">Na początku należy zaznaczyć, że jeśli idzie o trekking, Karakorum i Himalaje są bardzo trudnymi pasmami g&oacute;rskimi &ndash; nawet, jak wyprawa nie nie ma na celu zdobycia danego szczytu. Przyczyną komplikacji bywa też samo przygotowanie podr&oacute;ży &ndash; kupno bilet&oacute;w <span style=\"font-family: impact, sans-serif;\">lotniczych</span> czy otrzymanie pozwolenia i wizy. Z tej przyczyny najlepszym rozwiązaniem będzie skorzystanie z oferty firm planujących wyjazdy w te okolice. Dodatkowym plusem jest opieka zawodowych przewodnik&oacute;w (w tym posługujących się językiem polskim), dzięki czemu trekking w Himalajach będzie bezpieczny nawet dla os&oacute;b, nie posiadających wprawy w wędr&oacute;wce po wysokich g&oacute;rach.</span></em></p>');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `login` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `uprawnienia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id_user`, `login`, `haslo`, `uprawnienia`) VALUES
(2, 'dawid123', '202cb962ac59075b964b07152d234b70', 0),
(3, 'kondor12', '0947c31712fd53336932dfd615d27791', 0),
(4, 'kondor12', '0947c31712fd53336932dfd615d27791', 0),
(5, 'test1', '098f6bcd4621d373cade4e832627b4f6', 0),
(6, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0),
(9, 'Kondor379', 'acbd9ab2f68bea3f5291f825416546a1', 0),
(10, 'Dawid379', 'acbd9ab2f68bea3f5291f825416546a1', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_artykul`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `articles`
--
ALTER TABLE `articles`
  MODIFY `id_artykul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
