-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 10:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baza`
--
CREATE DATABASE IF NOT EXISTS `baza` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci;
USE `baza`;

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) NOT NULL,
  `prezime` varchar(32) NOT NULL,
  `korisnicko_ime` varchar(32) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'Josip', 'Akrap', 'joso', '$2y$10$/tQcttjyH6pshY.d0CqPqumBySLFCJXpZ3dARRgT7377A5o.M6s2S', 1),
(5, 'Josip', 'iokp', 'joso222', '$2y$10$iLvUVzu4FSdK3klpg0QyJOqiCaRvQQ/DIF5uVeSwx3EyWH2osN1FW', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` datetime NOT NULL DEFAULT current_timestamp(),
  `naslov` varchar(64) NOT NULL,
  `tekst` text NOT NULL,
  `slika` varchar(64) NOT NULL,
  `kategorija` varchar(64) NOT NULL,
  `arhiva` tinyint(1) NOT NULL,
  `sazetak` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `tekst`, `slika`, `kategorija`, `arhiva`, `sazetak`) VALUES
(62, '2024-06-11 14:26:23', 'Dugo očekivani povratak Big Mac-a.', 'Conor McGregor, poznat kao \"The Notorious,\" nije samo borac, on je fenomen. Šoumen koji svojom harizmom privlači pažnju ne samo ljubitelja borilačkih sportova, već i šire javnosti. Njegova sposobnost da dominira vijestima, potakne prodaju ulaznica i izazove diskusije čini ga jednom od najutjecajnijih figura u sportu.\r\n\r\nOd njegovog posljednjeg nastupa koji se održao u srpnju 2021. godine, fanovi diljem svijeta nestrpljivo iščekuju njegov povratak, a sada kada je datum konačno određen, očekivanja su na vrhuncu. U svom nadolazećem meču, Connor se bori protiv Michael Chandlera, amerikanac s podlogom hrvanja koji je poznat po svom agresivnom stilu borbe, svi su znali da će protivnik biti on, još od reality UFC serije \"The Ultimate Fighter\" gdje su Connor i Michael bili treneri dvaju timova.\r\n\r\nMcGregor se ne bori samo protiv svog protivnika u oktagonu, već i protiv očekivanja i sumnji koje su se nakupile tijekom njegove pauze. Hoće li McGregor uspjeti zadiviti svijet svojim povratkom ili je vrijeme učinilo svoje? Bez obzira na ishod, njegov povratak već je sada neizostavni dio sportske povijesti.', 'connor.png', 'MMA', 0, 'Nakon skoro 3 godine, lice UFC-a se vraća u oktagon...'),
(63, '2024-06-11 14:28:32', 'Jon Jones: Kada ga možemo očekivati?', 'Jon Jones, legenda poluteške kategorije, prije više od godinu dana(6.3.2023.) debitirao je u teškoj kategoriji i slavio pobjedom protiv francuza Ciryl Ganea i pritom postao prvak \"kraljevske\" teške kategorije, međutim, nakon što je izazvao velikana Stipu Miočića, uoči borbe je zadobio tešku ozljedu prsnih mišića i otkazana je borba.\r\n\r\nFanovi i analitičari s nestrpljenjem iščekuju ovaj susret titana, koji bi mogao redefinirati naslijeđe oba borca. Dok Jones nastavlja s pripremama koje bi trebale osigurati njegov uspjeh u novoj kategoriji, postavlja se pitanje hoće li i kada UFC uspjeti organizirati ovu povijesnu borbu. Stipe Miočić, s druge strane, već je dokazao svoju dominaciju teškom kategorijom i već je na zalasku svoje karijere, neki bi rekli da je spreman za mirovinu.\r\n\r\nOva borba ne bi bila samo još jedan meč, to bi bio spektakl koji bi privukao pažnju svjetske sportske javnosti. Hoće li se borba ikada dogoditi, ostaje neizvjesno, ali jedno je sigurno, ako se ova dva giganta ikada nađu licem u lice u oktagonu, to će biti jedan od najiščekivanijih događaja u povijesti borilačkih sportova.', 'jones.png', 'MMA', 0, 'Nakon ozljede pred meč, datum je i dalje nepoznat...'),
(64, '2024-06-11 14:30:16', 'Islam Makachev brani titulu po 3. put!', 'Kako Islam Makhachev brani svoju titulu po treći put na UFC 302 24. lipnja 2024. godine. UFC svijet ponovno se fokusira na njegovu gotovo neprobojnu tehniku i taktiku koja dolazi iz srca Dagestana. S druge strane, Dustin Poirier nije stranac velikim borbama i ponovno stoji pred prilikom da ostvari svoj san - osvajanje UFC titule lake kategorije.\r\n\r\nPoirier, poznat po svojoj neustrašivosti i sposobnosti da izdrži i odgovori na teške udarce, možda nikada nije bio bliže cilju. Međutim, pitanje ostaje: Može li prekinuti impresivan niz Makhacheva, borca koji se istaknuo svojom svestranošću i kontrolom u borbi? Ova borba nije samo test fizičke spreme; to je i okršaj dva različita stila i mentaliteta.\r\n\r\nDok Makhachev nastoji učvrstiti svoj status među najboljima, Poirier ima priliku dokazati da upornost i srčanost mogu nadjačati tehničku perfekciju. Fanovi širom svijeta jedva čekaju vidjeti ishod ove uzbudljive borbe, koja bi mogla donijeti dramatične promjene na vrhu lake kategorije...', 'makachev.png', 'MMA', 0, 'UFC 302 priredba donosi puno zanimljivih borbi...'),
(65, '2024-06-11 14:31:50', 'Što je sljedeće za brazilsku UFC zvijezdu?', 'Alex Pereira, zvijezda UFC-a čiji su spektakularni nokauti već ušli u anale borilačkih sportova, sada stoji na raskrižju svoje impresivne karijere. Nakon što je osvojio titulu u srednjoj kategoriji, i na spektakularnoj UFC 300 priredbi nokautirao Jamahal Hill-a i prvi put obranio pojas poluteške kategorije mnogi se pitaju što je sljedeće za ovog sjajnog borca.\r\n\r\nPereira, poznat po svojoj tehničkoj preciznosti i brutalnoj udaračkoj snazi, mogao bi težiti postati prvi trostruki prvak u povijesti UFC-a, što bi bio povijesni uspjeh ne samo za njega osobno već i za cijeli sport. Međutim, ova ambicija nije bez rizika. Prelazak u tešku kategoriju kategorija i suočavanje s vrhunskim borcima u teškoj kategoriji zahtijevat će od Pereire ne samo fizičku prilagodbu već i taktičku reviziju njegove borilačke strategije.\r\n\r\nS druge strane, ostajanje u poluteškoj kategoriji i obrana pojasa mogla bi mu omogućiti da učvrsti svoj status i legat, prije nego što se upusti u dodatne izazove. Bez obzira na izbor, Pereira je već ostavio neizbrisiv trag u UFC-u, a njegove buduće odluke će neizbježno oblikovati daljnji tijek njegove već legendarnog putovanja kroz svijet borilačkih umjetnosti.', 'pereira.png', 'MMA', 0, 'Nakon brutalnog prekida, fanovi žele novu borbu...'),
(66, '2024-06-11 14:33:18', 'Bivol i Betribiev: Što se dogodilo?', 'Očekivani dvoboj između Dmitryja Bivola i Artura Beterbieva za neosporenu titulu prvaka svijeta u poluteškoj kategoriji obećavao je biti jedan od vrhunaca boksačke sezone. Međutim, otkazivanje ovog spektakularnog događaja ostavilo je fanove i analitičare u šoku i razočaranju.\r\n\r\nUnatoč mjesecima priprema i promocije, razlog za otkazivanje borbe je Betrebijeva povrijeda koljena na pripremama za ovaj dvoboj. Stvorena je situacija u kojoj su rizici nadmašili potencijalne koristi za organizatore i same borce, te je borba odgođena.\r\n\r\nDok fanovi žalosno prihvaćaju ovu vijest, organizatori pokušavaju dogovoriti novi datum za ovaj boksački spektakl. U međuvremenu, oči svijeta ostaju uprte u Bivola i Beterbieva, s nadom da će se ova borba moći reorganizirati i pružiti fanovima onaj spektakl koji su željno iščekivali.', 'bivol.png', 'Box', 0, 'Dugo iščekivani duel morat će pričekati...evo i zašto...'),
(67, '2024-06-11 14:34:08', 'Nakon 25 godina, novi neosporeni prvak!', 'Poslije četvrt stoljeća, boksački svijet je svjedočio povijesnom trenutku kada je Oleksandr Usyk zadao prvi profesionalni poraz Tysonu Furyju, osvajajući titulu neosporenog prvaka svijeta teške kategorije. U spektakularnoj borbi koja je zadovoljila očekivanja kako navijača tako i kritičara, Usyk je pokazao izuzetnu tehničku superiornost i taktičku disciplinu.\r\n\r\nKombinacija njegove brzine, preciznosti i sposobnosti čitanja Furyjevih poteza bila je ključna u dominaciji tokom meča. Fury, poznat po svojoj izdržljivosti i nekonvencionalnom stilu, našao se na izazovu koji nije uspio savladati protiv Usyka, boksača koji je već dokazao svoje umijeće u nižim kategorijama prije nego što je prešao u tešku kategoriju.\r\n\r\nOva borba nije samo testament Usykove vještine i odvažnosti, već i simbol njegove nevjerojatne putanje od kruzera do vrha teške kategorije. Pobjeda nad Furyjem ne samo da je osigurala Usyku titulu neosporenog prvaka, već je i prekinula Furyjevu dugogodišnju neporaženost, postavljajući Usyka među legendama boksa. Ovaj meč će neizbježno ostati zabilježen kao jedan od ključnih trenutaka u modernoj povijesti boksa, pokazujući da prava šampionska kvaliteta leži u sposobnosti da se izazovi prevladaju s vjerom u vlastite sposobnosti i nepokolebljivom odlučnošću.', 'usyk.png', 'Box', 0, 'U subotu, 18.5 u Riyadu, dogodio se spektakl...'),
(70, '2024-06-11 16:46:48', 'Prognoze uoči borbe Duboisa i Hrgovića.', 'Filip Hrgović, poznat kao \"El Animal\", konačno je dobio priliku da se dokaže na svjetskoj sceni teške kategorije nakon što je pronašao dostojnog protivnika. Hrgović, koji je do sada u profesionalnoj karijeri ostao neporažen, pokazao je impresivne sposobnosti koje ga postavljaju kao jednog od najperspektivnijih boksača u kategoriji.\r\n\r\nNjegov slijedeći meč ne samo da je test njegovih vještina, već i prilika da pokaže svijetu da je spreman za vrh. Hrgovićeva tehnika, koja uključuje snažne udarce i iznimnu agilnost za teškaša, čini ga ozbiljnim kandidatom za osvajanje pojasa. Protivnici su se često našli u nezavidnom položaju suočeni s njegovom snalažljivošću i moći da završi borbe nokautom.\r\n\r\nS obzirom na njegovu dosadašnju karijeru i postignuća, očekivanja su visoka. Međutim, svaka borba nosi svoje rizike, a Hrgović će morati zadržati fokus i demonstrirati svoju sposobnost da se prilagodi i dominira pod pritiskom. Ukoliko uspije ostvariti pobjedu u ovom ključnom meču, Hrgović ne samo da će potvrditi svoje mjesto među boksačkom elitom, već će i otvoriti vrata za daljnje izazove i možda borbe za unifikaciju pojasa. Ova borba nije samo prilika za dokazivanje, već i za utvrđivanje Hrgovićeva naslijeđa u sportu koji ne prašta.', 'hrga.png', 'Box', 0, 'Kakve su šanse El Animalu u borbi za pojas...'),
(71, '2024-06-11 16:47:19', 'Kako je Ryan Garcia svladao Haney-a?', 'Ryan Garcia, poznat po svojoj briljantnoj brzini i eksplozivnosti, uspio je svladati Devina Haneyja u ringu, unatoč općem mišljenju koje je bilo protiv njega prije borbe. Svi su sumnjali u Garciju, neki su čak mislili da je izgubio smisao za realnost, no on je na impresivan način pokazao zašto je jedan od najtalentiranijih boksača svoje generacije.\r\n\r\nGarcia je iskoristio svoju iznimnu brzinu i preciznost u udarcima kako bi nadmašio Haneyjevu obranu, čineći ključne poteze u pravim trenutcima. Njegova sposobnost da održi visok tempo i preciznost kroz cijelu borbu bila je ključna za ovu pobjedu. Međutim, unatoč njegovom impresivnom uspjehu u ringu, Garcia nije mogao osvojiti titulu zbog promašaja na vagi prije borbe. Ovaj propust zasjenio je njegovu pobjedu i izazvao kritike, ukazujući na važnost discipline i profesionalnosti u svim aspektima sporta. Incident s vagom nije samo lišio Garciju titule, već je i postavio pitanja o njegovoj budućnosti u boksu.\r\n\r\nRyan Garcia je dokazao da još uvijek posjeduje izvanredan talent i sposobnost da se suprotstavi vrhunskim borcima, ali ovaj događaj je također podsjetnik na to koliko je važno da sportaši ostanu fokusirani ne samo na trening i tehniku, već i na ključne aspekte poput pripreme za vagu. Ova borba, iako mu nije donijela titulu, svakako je potvrdila Garcijinu sposobnost da se natječe na najvišoj razini, a njegova sljedeća borba bit će prilika za iskupljenje kako u ringu tako i izvan njega.', 'garcia.png', 'Box', 0, 'Borba u kojoj je Garcia šokirao čitav svijet boksa...');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
