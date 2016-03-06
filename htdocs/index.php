<?php
define('VPSFREE', true);

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

require "config.php";
require "lib/db.lib.php";

$db = new sql_db (DB_HOST, DB_USER, DB_PASS, DB_NAME);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">    
    <title>vpsFree.cz - Virtuální Privátní Servery svobodně</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="keywords" content="VPS, hosting, virtualni server, linux, server, privatni server, virtual, virtualny">    
    <meta name="description" content="vpsFree.cz je spolek, který provozuje virtuální servery pro své členy. Členům poskytujeme virtuální server za 300 Kč měsíčně.">
    <link rel="apple-touch-icon" href="i/ctverec.png" />

	<!-- Meta tagy pre socialne siete-->
	<meta property="og:site_name" content="vpsFree.cz">
	<meta property="og:url" content="https://www.vpsfree.cz">	
	<meta property="og:title" content="vpsFree.cz - Virtuální Privátní Servery svobodně">
	<meta property="og:description" content="vpsFree.cz je spolek, který provozuje virtuální servery pro své členy. Členům poskytujeme virtuální server za 300 Kč měsíčně.">
	<meta name="author" content="vpsFree.cz"/>
	<meta property="og:type" content="article">
	<meta property="og:image" content="i/servery_logo.jpg">
	<meta property="og:image:type" content="image/jpeg" />


	<meta name="robots" content="index,follow">
	<meta name="verify-v1" content="VFP8KLvL6aSAgDSLKjMidGlun/+Kfw+Vb7CImUqU6do=" />
	<meta name="google-site-verification" content="OMMaumGl7mwK1mr9Sr0SjHU7AbeXL95Fl8Lrm07M3NI" />	
	<!-- CSS -->
	<link href='https://fonts.googleapis.com/css?family=Oswald:300,400,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:100,200,300,400,600,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>	
	
	<!-- potom zmenit link na serverovy, ak by neslo -->
    <link rel="stylesheet" href="css/c.css" type="text/css">
    
    <script src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/d.js"></script>
    
    <link rel="icon" href="/favicon.png" type="image/png" />
    
</head>

<body>
	<header>
		<section>
		<h1><a href="/"><span>vpsFree.cz - Virtuální Privátní Servery svobodně</span></a></h1>
		<a href="#" class="menu-btn">Menu</a>
		<nav>
			<ul class="clearfix">
				<li><a href="#about" title="O vpsFree.cz">O vpsFree.cz</a></li>
				<li><a href="#slide-parameters" title="Co dostanu za prostředky">Co dostanu</a></li>
				<li><a href="#order" title="Přihláška">Přihláška</a></li>
				<li><a href="#faq" title="Časté dotazy">Časté dotazy</a></li>
				<li><a href="#contacts" title="Kontakty">Kontakty</a></li>
			</ul>
		</nav>
		<div class="c"> </div>
		</section>
	</header>

	<section class="pg page1">
		<div class="in">
			<div class="hearth"> </div>
			<h2>Milujeme servery</h2>
			<p>Pokud chceš mít svůj vlastní <strong>virtuální server</strong>, který si&nbsp;přizpůsobíš svým potřebám
a&nbsp;nechceš se&nbsp;trápit hardwarovým a&nbsp;technickým řešením, chceš sdílet
naši <strong>společnou infrastrukturu</strong> a&nbsp;společný hardware, pojď k&nbsp;nám! Nejsme klasický komerční 
webhosting, jsme spolek, jehož členem se&nbsp;můžeš stát i&nbsp;ty&hellip;</p>
		</div>
	</section>
	
	
	
	<section class="pg page2" id="about">
		
		<div class="dots n">
		 <ul>
		  <li><a href="#" class="yes" title="Naše filozofie"><span class="n">0</span><span class="t">Proč?</span></a></li>
		  <li><a href="#" class="no" title="Prostředky"><span class="n">1</span><span class="t">Prostředky</span></a></li>
		  <li><a href="#" class="no" title="Kdo je za tím vším"><span class="n">2</span><span class="t">Kdo?</span></a></li>
		  <li><a href="#" class="no" title="Komunita"><span class="n">3</span><span class="t">Komunita</span></a></li>
		  <li><a href="#" class="no" title="Jsme vidět"><span class="n">4</span><span class="t">Jsme vidět</span></a></li>
		  <li><a href="#" class="no" title="Poáháme"><span class="n">5</span><span class="t">Pomáháme</span></a></li>
		 </ul>
		</div>

		<div class="arrow icon left"></div>
		<a href="#" class="arrow left"></a>
		<div class="arrow icon right"></div>
		<a href="#" class="arrow right"></a>
		
		<!-- PANELY CO SA SKRYVAJU - Zaciatok -->
		
		
		
		<div class="ab ab1 " id="slide-why">
			<div class="in">
			<h2>Proč to děláme?</h2>
			
			<div class="filozofia">
			 <em> Sdružení vzniklo jako </em>
			 <strong>přímá reakce</strong>
			 <em>na nepružnost a&nbsp;přemrštěné ceny komerčních hostingů v&nbsp;ČR</em>
			 <span> a&nbsp;ještě horší situaci v&nbsp;SR</span>
			</div>
		
		<div class="principy">			 
			 <span>svobodný software</span> <em>+</em> 
			 <span>samostatnost</span> <em>+</em>
			 <span>otevřená komunita</span>
			</div>
			
			<div class="c"> </div>
			<p>
			Naprostá většina informací o&nbsp;<strong>vpsFree.cz</strong> je veřejná.<br />
			Chceme, aby členové i&nbsp;veřejnost měli přehled o&nbsp;dění v&nbsp;našem spolku,<br />
			sleduj naše informační kanály a&nbsp;sociální sítě:<br />
			</p>
			
			
			
			
			<div class="social">
				<a href="http://lists.vpsfree.cz/" class="newsletter" title="Newsletter"><span>Newsletter</span></a>
				<a href="https://www.facebook.com/vpsfree" class="facebook" title="Facebook"><span>Facebook</span></a>
				<a href="https://www.twitter.com/vpsfree_cz" class="twitter" title="Twitter"><span>Twitter</span></a>
				<div class="c"> </div>
			</div>
			<div class="c"></div>
		</div>
			
		</div><!--ab1-->
		
		<div class="ab ab2" id="slide-parameters">
		    <div class="in">
			<h2>Prostředky</h2>
			<p>které členstvím získáte</p>
			
			
			<div class="prostriedky m-t-20">
			 <div class="pr pr1">
			  	<h3>Virtuální server</h3>

				<table>
					<tr>
						<td class="doprava">CPU:</td>
						<td class="dolava"><strong>8&nbsp;jader</strong></td>
					</tr>
					<tr>
						<td class="doprava">RAM:</td>
						<td class="dolava"><strong>4096&nbsp;MB</strong></td>
					</tr>

					<tr>
						<td class="doprava">HDD:</td>
						<td class="dolava"><strong>120&nbsp;GB</strong></td>
					</tr>
					<tr>
						<td class="doprava">IPv4</td>
						<td class="dolava"><strong>1&times;</strong></td>
					</tr>
					<tr>
						<td class="doprava">IPv6</td>
						<td class="dolava"><strong>32&times;</strong></td>
					</tr>
					
					<tr>
						<td class="doprava">konektivita</td>
						<td class="dolava"><strong>300&nbsp;Mbps</strong></td>
					</tr>
					
					<tr>
						<td class="text-center" colspan="2"><strong>Vzdálená konzole</strong></td>
					</tr>
					<tr>
						<td class="text-center" colspan="2"><strong>On-line podpora</strong></td>
					</tr>				
				</table>
				<a class="info" href="https://kb.vpsfree.cz/informace/parametry_vps" target="_blank">Více informací</a>
			 </div>
			 <div class="pr pr2">
			 	<h3>NAS Storage</h3>
			 	<p>V&nbsp;době cloud computingu a&nbsp;obecně trendu přesouvat data z&nbsp;desktopů do&nbsp;
datacenter se&nbsp;hodí úložný prostor navíc.<br /><br /> My nabízíme všem svým členům 
<strong>250&nbsp;GB prostoru</strong> jako standardní součást členských výhod.<br /><br /> V&nbsp;blízké budoucnosti přibude možnost rozšířít kapacitu externího úložiště až na <strong>2&nbsp;TB</strong> a&nbsp;také možnost jeho pravidelného zálohování.</p>
				<a class="info" href="https://kb.vpsfree.cz/navody/vps/nas" target="_blank">Více informací</a>
			 </div>
			 <div class="pr pr3">
			 	<h3>Playground VPS</h3>
			 	<p>Playground VPS jsou virtuální servery v&nbsp;podobné konfiguraci, jako klasické námi poskytované virtuální servery, jen mají životnost omezenou na 
<strong>jeden měsíc</strong>. Běží na post-produkčním hardware a&nbsp;mají jiné rozsahy <strong>IP adres</strong>.<br /><br /> Do&nbsp;Playgroundu lze naklonovat produkční virtuální server, není tedy nutné jej nastavovat od&nbsp;nuly, když potřebujete vyzkoušet jenom drobnou změnu konfigurace.</p>
				<a class="info" href="https://kb.vpsfree.cz/navody/vps/playgroundvps" target="_blank">Více informací</a>
			 </div>
			<div class="c"> </div>
			</div><!--prostriedky-->
			
			
			</div>
			
		</div><!--ab2-->
		
		
		
		<div class="ab ab3" id="slide-who">
		    <div class="in">
			<h2>Kdo je za tím vším</h2>
			
			
			<div class="who m-t-20">
			 <div class="whoe">
			   <img src="i/pavel-snajdr.jpg" alt="Pavel Šnajdr" class="avatar">
			   <h3>Pavel Šnajdr</h3>
			   <div class="bubble">
			     <p>Pavel Šnajdr je zakládajícím členem a předsedou spolku vpsFree.cz. Zabývá se&nbsp;kontejnerovou virtualizací, ZFS a&nbsp;enterprise linuxovými distribucemi. Má rád otevřené prostředí a&nbsp;aktivní lidi. Nesnáší politikaření místo pořádné práce.</p>
			   </div>
			 </div>

			 <div class="whoe">
			   <img src="i/tomas-srnka.jpg" alt="Tomáš Srnka" class="avatar">
			   <h3>Tomáš Srnka</h3>
			   <div class="bubble">
			     <p>Tomáš Srnka je členem rady spolku vpsFree.cz od&nbsp;samého počátku. Zajímá se&nbsp;zejména o&nbsp;vysokou dostupnost a&nbsp;škálovatelnost. Kromě technického směru se&nbsp;stará především o&nbsp;ekonomickou stránku věci.</p>	
			   </div>
			 </div>

			 <div class="whoe">
			   <img src="i/jiri-medved.jpg" alt="Jiří Medvěd" class="avatar">
			   <h3>Jiří Medvěd</h3>
			   <div class="bubble">
			     <p>Jiří Medvěd pracuje jako system administrátor v&nbsp;Seznam.cz a&nbsp;má rád otevřené technologie, které zvýší dostupnost služeb. Ve vpsFree.cz má na starosti technickou podporu, servery a&nbsp;správu templates pro VPS.</p>
			   </div>
			 </div>

			 <div class="whoe">
			   <img src="i/jakub-skokan.jpg" alt="Jakub Skokan" class="avatar">
			   <h3>Jakub Skokan</h3>
			   <div class="bubble">
			     <p>Jakub Skokan je programátor a&nbsp;systémový administrátor. Ve vpsFree.cz vyvíjí administrační rozhraní vpsAdmin společně s&nbsp;dalšími projekty. Stará se&nbsp;o&nbsp;jeho provoz a&nbsp;odpovídá na podpoře. Ve&nbsp;volném čase studuje na vysoké škole.</p>
			   </div>
			 </div>

			 <div class="whoe">
			   <img src="i/michal-janousek.jpg" alt="Pavel Šnajdr" class="avatar">
			   <h3>Michal Janoušek</h3>
			   <div class="bubble">
			     <p>Michal Janoušek je aktivním členem od roku 2010 a má ve vpsFree.cz na starosti přihlášky, faktury a podporu. Dálkově studuje střední školu. Má rád Linux a otevřené prostředí, které máme ve spolku.</p>	
			   </div>
			 </div>

			 <div class="whoe">
			   <img src="i/petr-krcmar.jpg" alt="Petr Krčmář" class="avatar">
			   <h3>Petr Krčmář</h3>
			   <div class="bubble">
			     <p>Petr Krčmář je šéfredaktorem serveru Root.cz a&nbsp;Linuxem se&nbsp;zabývá přes šestnáct let. Má rád otevřený software a&nbsp;transparentní přístup ke&nbsp;světu. Ve&nbsp;vpsFree.cz má na starosti především komunitu a&nbsp;propagaci.</p>
			   </div>
			 </div>

			<div class="c"> </div>
			</div><!--prostriedky-->
			
			
			</div>
			
		</div><!--ab3-->
		
		
		
		<div class="ab ab4" id="slide-community">
		    <div class="in">
			<h2>Komunita</h2>
			<p>která vás neodmítne</p>
			
			<div class="komunity m-t-20">
			
			 <div class="km mailinglist">
			   <span> </span>
			   <h3>Mailing listy</h3>
			   <p>Většina komunikace ve&nbsp;vpsFree.cz se&nbsp;odehrává po mailu. Vše je otevřené a&nbsp;čitelné pro všechny. Najdete tu informace i&nbsp;lidi ochotné poradit. Mailing listy se nacházejí na adrese <a href="http://lists.vpsfree.cz">lists.vpsfree.cz</a>.</p>			  
			 </div>
			 
			 
			 <div class="km jabber">
			   <span> </span>
			   <h3>Jabber multi user chat</h3>
			   <p>Pro rychlou komunikaci používáme Jabber MUC chat. Hodí se, pokud potřebujete rychlou radu nebo se na něco jednoduše zeptat.</p>
			   <br />
			   <p>host: conference.vpsfree.cz<br />místnost: vpsFree.cz</p><p>Heslo najdete <a href="http://lists.vpsfree.cz/pipermail/community-list/2012-August/000815.html">tady</a></p>			  
			   <br />
			 </div>
			 
			 
			 <div class="km srazy">
			   <span> </span>
			   <h3>Děláme srazy</h3>
			   <p>Pravidelně se&nbsp;potkáváme na srazech, kde se&nbsp;dozvíte o&nbsp;směřování spolku, ale popovídáte si&nbsp;i&nbsp;o&nbsp;denních problémech ostatních adminů.</p>			  
			 </div>
			 
			<div class="c"> </div>
			</div><!--komunity-->
			
			
			</div>
			
		</div><!--ab4-->
		
		
		<div class="ab ab5" id="slide-social">
		    <div class="in">
			<h2>Jsme vidět</h2>
			<p>Kde se můžeme příště potkat?</p>
			
			<div class="videt">
			
			 <div class="mapcontainer">
	<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="//www.openstreetmap.org/export/embed.html?bbox=16.595768630504608%2C49.22571689763878%2C16.59775346517563%2C49.22732317961828&amp;layer=mapnik"></iframe><br/><small><a href="//www.openstreetmap.org/#map=19/49.22652/16.59676">Zobrazit větší mapu</a></small>
			  <!--<div class="marker" style="top:80px;left:140px;"> </div>-->
			 </div>
			 
			 
			 <div class="kde">
			   <span> </span>
			   <h3>Nejbližší akce</h3>
			   <p>
			   7.-8. 11. 2015
			   <br />
			   <br />OpenALt 2015
			   <br />FIT VUT v Brně
			   <br />Božetěchova 1/2
			   <br />Brno
			   <br />
			   <br /><a href="https://www.openalt.cz/" target="_blank">OpenAlt.cz</a>
			   
			   </p>	  
			 </div>
			 
			 
			 
			<div class="c"> </div>
			</div><!--videt-->
			
			
			</div>
			
		</div><!--ab5-->
		
		
		
		<div class="ab ab6" id="slide-support">
		    <div class="in">
			<h2>Pomáhame</h2>
			<p>tyto projekty sponzorujeme</p>
			
			<div class="sponzoring">
			
				<a href="https://www.archlinux.org" target="_blank"><img src="i/logo-archlinux.png" alt="Archlinux.org"></a>
				<a href="https://www.liberix.cz" target="_blank"><img src="i/logo-liberix.png" alt="Liberix.cz"></a>
				<a href="https://www.linuxdays.cz" target="_blank"><img src="i/linuxdays.png" alt="LinuxDays.cz"></a>
				<a href="http://www.linuxos.sk" target="_blank"><img src="i/linuxos_sk.png" alt="LinuxOS.sk"></a>
				<a href="http://tech.su.cvut.cz/" target="_blank"><img src="i/tech_su.png" alt="tech@su"></a>
			 
			 
			 
			<div class="c"> </div>
			</div><!--sponzoring-->
			
			
			</div>
			
		</div><!--ab6-->
		
		
		
		<!-- PANELY CO SA SKRYVAJU - Koniec -->
		
	</section>
	
	
	
	<section class="pg page3" id="howto">
		<div class="in">
		
			<h2>Jak začít</h2>
			<p>Staň se členem spolku <strong>vpsFree.cz</strong>, které poskytuje hosting virtuálních serverů</p>
			<div class="boxes">
			
			<a href="#order" class="box b1">
				<div class="ico"> </div>
				<p>
					<strong>
						<span class="orange">Vyplň</span><br />
						Přihlášku<br />
					</strong>
				</p>	
				<span class="circleButton">Teď hned</span>	
			</a>
			
			<div class="box b2">
				<div class="ico"> </div>
				<p><strong><span class="orange">Do 24 hodin</span><br />
				ti připravíme<br />
				virtuální server</strong><br />
				v&nbsp;naší síti</p>			
			</div>
			
            <div class="box b3">
                    <div class="ico">
                            <em>900&nbsp;Kč</em>
                            <em>na tři měsíce</em>
                    </div>
                    <p><strong><span class="orange">Do 7&nbsp;dnů zaplať</span><br />
                    čtvrtletní členský<br />
                    poplatek</strong><br />
                    36&euro; nebo 900 Kč</p>
            </div>
			
			<div class="box b4">
				<div class="ico"> </div>
				<p><strong><span class="orange">Užívej si</span><br />
				svůj nový<br />
				VPS server</strong><br />
				jak potřebuješ</p>			
			</div>
			
			<div class="c"> </div>
			
			</div>
			
		</div>
	</section>


	<section class="pg page4" id="order">
		<div class="in">
			<h2>Přihláška</h2>
			<p>Vyplň údaje úplně a pravdivě. Uvedené informace nikde nezveřejňujeme, 
pouze nám slouží k&nbsp;lepšímu posouzení přihlášky.</p>

			<button class="largeButton larger js-show-form">Vyplnit přihlášku</button>

			<form method="POST" action="prihlaska.php" class="clearfix hidden">
			<input type="text" id="name" name="name" value="" placeholder="Jméno">
			<input type="text" id="surname" name="surname" value="" placeholder="Příjmení">
			<input type="text" id="nick" name="nick" value="" placeholder="Přezdívka člena">
			<input type="text" id="birth" name="birth" value="" placeholder="Rok narození">
			 
			 <input type="text" id="address" name="address" placeholder="Ulice, č.p.">
			 <input type="text" id="city" name="city" value="" placeholder="Město">
			 <input type="text" id="zip" name="zip" value="" placeholder="PSČ">
			 <input type="text" id="country" name="country" value="" placeholder="Stát">
			 <input type="text" id="email" name="email" value="" placeholder="E-mail" class="wide">
			 <textarea class="wide" name="how" id="how" placeholder="Jak ses o nás dozvěděl?"></textarea>
			 <textarea class="wide" name="note" id="note" placeholder="Poznámky"></textarea>
			 
			 <span>Distribuce 64bit:</span>
 		 	 <select name="distribution" id="distribution">
				<?php
				  while($tpl = $db->findByColumn("cfg_templates", "templ_supported", "1", "templ_order, templ_label"))
					echo '<option value="'.$tpl["templ_id"].'">'.$tpl["templ_label"].'</option>';
				?>
		 	 </select>

			 <span>Preferovaná lokace pro VPS:</span>
			 <select name="location" id="location">
				<?php
					$sql = 'SELECT location_id, location_label
						FROM locations l
						INNER JOIN servers s ON l.location_id = s.server_location
						WHERE s.environment_id = '.$db->check(ENVIRONMENT_ID).'
						GROUP BY location_id
						ORDER BY location_id';
					$rs = $db->query($sql);
				  while($loc = $db->fetch_array($rs))
						echo '<option value="'.$loc["location_id"].'">Master Internet '.$loc["location_label"].'</option>';
				?>
			 </select>
			 <span>Měna platby:</span>
			 <select name="currency" id="currency">
 			   <option value="CZK">členský poplatek 900&nbsp;Kč na tři měsíce</option>
 			   <option value="EUR">členský poplatek 36&nbsp;eur na tři měsíce</option>			 
			 </select>
			 
			 <input type="submit" name="send" id="send" class="largeButton" value="Odeslat" onclick="signup(); return false;">
			</form>
		</div>
	</section>

	
	<section class="pg page5" id="faq">
		<div class="in">
			<h2>Časté dotazy</h2>
			
			<div class="buttons">
			<a href="https://vpsadmin.vpsfree.cz" target="_blank" class="mediumButton1">vpsAdmin</a>
			<a href="https://prasiatko.vpsfree.cz/munin" target="_blank" class="mediumButton2">Grafy provozu</a>
			<a href="http://kb.vpsfree.cz" target="_blank" class="mediumButton3">Knowledge Base</a>
			</div>
			
			<div class="c"> </div>
			<h3>Jak je to u nás s&nbsp;platbou?</h3>

<p>Z rozhodnutí Rady spolku se&nbsp;platí vždy na období minimálně tří měsíců dopředu, číslo účtu je uvedeno v&nbsp;sekci Kontakt, jako variabilní symbol se&nbsp;uvádí členské číslo, které člen vidí ve&nbsp;vpsAdminu, sekce Admin Členů jako první sloupeček (ID) (Ne ID virtuálního serveru!).</p>

<h3>Proč tolik prosazujete OpenVZ?</h3>

<p>To, co aktuálně umí plná virtualizace dostupná pod Linuxem (KVM, Xen), pro nás v&nbsp;porovnání s&nbsp;OpenVZ kontejnery není dostatečné. U&nbsp;nás například nelimitujeme CPU, což by s&nbsp;jakoukoliv jinou technologií nebylo možné. Ze&nbsp;všech zmíněných možností virtualizace má OpenVZ také nejmenší režii (zejména proto, že jde o kontejnery).</p>

<h3>Co pro mě znamená použití OpenVZ?</h3>

<p><strong class="faq-subtitle">Co je stejné?</strong>
VPS se&nbsp;ve&nbsp;většině situací chová stejně jako fyzický linuxový server (nebo plně virtualizovaný virtuální server) s&nbsp;danou distribucí. Má svoje účty, svoje aplikace, svoje data.<br />
<br />
<strong class="faq-subtitle">Co je jiné?</strong>
U&nbsp;plné virtualizace má virtuální server z&nbsp;pohledu operačního systému svůj vlastní (virtualizovaný nebo paravirtualizovaný) hardware. Na tomto hardwaru je následně spuštěno jádro, přičemž každý virtuální server může mít jiné. U&nbsp;OpenVZ toto neplatí; virtuální server nemá svůj hardware, nemá žádné PCI ani jiné sběrnice, ani svojí síťovou kartu. Také nemá vlastní jádro; aplikace běží pod jádrem hostitelského stroje.<br />
<br />
<strong class="faq-subtitle">Co mi na OpenVZ nebude fungovat?</strong>
V&nbsp;podstatě je problém s&nbsp;každou aplikací, která by chtěla pracovat ve&nbsp;velmi těsné vazbě na hardware (což platí pro většinu způsobů virtualizace) nebo využívat speciální vlastnosti jádra. Problémy tak můžete mít, pokud budete chtít používat pokročilý routing, shaper, některé pokročilé využití iptables (hlavně IPv6, IPv4 NAT je možný pouze s&nbsp;workaroundem).<br />
<br />
Na druhou stranu u&nbsp;nás narazíte na pravděpodobně nejlépe vyladěné nasazení OpenVZ, které máte šanci potkat. Nechceme se tím chvástat, ale ladění OpenVZ na našich serverech věnujeme opravdu hodně nocí :-).</p>

<h3>Kde mohu najít další informace?</h3>
<p>Další informace o&nbsp;vpsFree.cz můžeš najít v naší wiki - <a href="http://kb.vpsfree.cz/" target="_blank">Knowledge Base</a> nebo nám můžeš kdykoliv napsat.</p> 

<br />
			<p>Pokud máš další otázky:</p>
			<a href="#contacts" class="largeButton">Napiš nám</a>
		</div>
	</section>
	
	
	
	
	<section class="pg page6" id="contacts">
		<div class="in">
			<h2>Kontakty</h2>
			
			<a href="mailto:podpora@vpsfree.cz" class="support">podpora@vpsFree.cz</a>
			
<!--
				
			<h3>Předseda rady / Správce serverů</h3>
			
			<div class="predseda">
			   
			   <img src="i/pavel-snajdr.jpg" alt="Pavel Šnajdr" class="avatar">
			   <div class="vizitka">
			   <strong>Pavel Šnajdr</strong><br />
			   Jabber: snajpa (zavináč) snajpa.net<br />
			   E-mail: pavel.snajdr (zavináč) vpsfree.cz<br />
			   Lokace: Bratislava<br />
			   Mobil: +421 948 816 186<br />
			   </div>
			   <div class="c"> </div>
			</div>
	-->		
						
			<div class="ceskoslovensko"> </div>
			
			<h3>Bankovní účet (Fio Banka)</h3>
			
			<div class="banks">
			<div class="bank">
			<strong>2200041594/2010</strong><br />
			(CZ)
			</div>
			<div class="bank">
			<strong>SK15 8330 0000 0022 0004 1594</strong> &nbsp; FIOBCZPPXXX<br />
			</div>
			<div class="c"> </div>
			</div>			
			
			<h3>Poštovní adresa</h3>
			
			<div class="address">

			<address>
				<strong>vpsFree.cz z.s.</strong><br />
				Nad Dalejským údolím 2699/9<br />
				155 00 Praha-Stodůlky<br />
				Česká republika<br />
			</address>
			
			</div>
			
			<span class="info">
				Prosíme, na obálku uvádějte celou adresu, předejdete tak možnému nedoručení zásilky.
			</span>

			<h3>Údaje spolku</h3>
			
			<div class="business">
				<strong>IČ:</strong> 26568055<br />
				<strong>DIČ:</strong> CZ26568055<br />
				Nejsme plátci <strong>DPH</strong>.<br />
			</div>



			
		</div>
	</section>

	<footer>
		<div>
			Copyright &copy; vpsFree.cz z.s. 2009-<?php echo date("Y"); ?>. vpsFree na <a href="https://www.facebook.com/vpsfree">Facebooku</a> a <a href="https://twitter.com/vpsfree_cz">Twitteru</a> &bull;
		</div>

	</footer>
	


  <!-- GA -->
  <script>
     (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-51951641-1', 'vpsfree.cz');
      ga('send', 'pageview');
  </script>

  <!-- Piwik -->
    <script type="text/javascript">
    var pkBaseURL = (("https:" == document.location.protocol) ? "https://piwik.vpsfree.cz/" : "http://piwik.vpsfree.cz/");
    document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
    </script><script type="text/javascript">
    try {
    var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 1);
    piwikTracker.trackPageView();
    piwikTracker.enableLinkTracking();
    } catch( err ) {}


    </script><noscript><p><img src="http://piwik.vpsfree.cz/piwik.php?idsite=1" alt="" /></p></noscript>
  <!-- End Piwik Tracking Code -->

</body>
</html>
