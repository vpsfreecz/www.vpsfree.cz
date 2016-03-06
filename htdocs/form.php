<?php
if (!defined('VPSFREE'))
	die("I smell a rat.");

$db = new sql_db (DB_HOST, DB_USER, DB_PASS, DB_NAME);
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>vpsFree.cz - Virtuální Privátní Servery svobodně</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <meta name="keywords" content="VPS, hosting, VPS hosting, virtualni server, linux, server, privatni server, virtual server, virtualny server">    
	<meta name="description" content="Fajný, či už raňajkový,alebo len tak ku kávičke.">
    <meta name="description" content="vpsFree.cz je spolek, který provozuje virtuální servery pro své členy. Pro naše členy poskytujeme virtuální server za 300 Kč měsíčně.">

	<!-- Meta tagy pre socialne siete-->
	<meta property="og:site_name" content="vpsFree.cz">
	<meta property="og:url" content="http://www.vpsfree.cz">	
	<meta property="og:title" content="vpsFree.cz - Virtuální Privátní Servery svobodně">
	<meta property="og:description" content="vpsFree.cz je spolek, který provozuje virtuální servery pro své členy. Pro naše členy poskytujeme virtuální server za 300 Kč měsíčně.">	
	<meta property="og:type" content="article">
	<!--<meta property="og:image" content="/assets/linka-na-konkretny-obrazok-predvoleny-pre-facebook.jpg">-->
	<meta property="og:image:type" content="image/jpeg" />


	<meta name="robots" content="index,follow">
	<!--<meta name="google-site-verification" content="SEM_DAT_KOD_AK_CHCETE_WEBMASTERS_TOOLS">-->
	
	<!-- CSS -->
	<link href='http://fonts.googleapis.com/css?family=Oswald:300,400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:100,200,300,400,600,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>	
	
	<!-- potom zmenit link na serverovy, ak by neslo -->
    <link rel="stylesheet" href="css/c.css" type="text/css">
    
    <script src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/d.js"></script>
    
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
    
</head>

<body>
	<header>
		<section>
		<h1><a href="/"><span>vpsFree.cz - Virtuální Privátní Servery svobodně</span></a></h1>
		<a href="#" class="menu-btn">Menu</a>
		<div class="c"> </div>
		</section>
	</header>
	
	<section class="pg page4" id="order">
		<div class="in">
			<h2>Přihláška</h2>
			<p>Vyplň údaje úplně a pravdivě. Uvedené informace nikde nezveřejňujeme, 
				pouze nám slouží k&nbsp;lepšímu posouzení přihlášky.</p>
				
			<p class="error">Přihláška obsahuje chyby. Oprav prosím políčka zvýrazněná červeně.</p>
			
			<form method="POST" action="prihlaska.php">
			 <input type="text" id="nick" name="nick" class="<?= in_array('nick', $errors) ? 'error' : '' ?>"
			  value="<?= $_POST['nick'] ?>" placeholder="Přezdívka člena">
			 <input type="text" id="name" name="name" class="<?= in_array('name', $errors) ? 'error' : '' ?>"
			  value="<?= $_POST['name'] ?>" placeholder="Jméno">
			 <input type="text" id="surname" name="surname" class="<?= in_array('surname', $errors) ? 'error' : '' ?>"
			  value="<?= $_POST['surname'] ?>" placeholder="Příjmení">
			 <input type="text" id="birth" name="birth" class="<?= in_array('birth', $errors) ? 'error' : '' ?>"
			  value="<?= $_POST['birth'] ?>" placeholder="Rok narození">
			 
			 <input type="text" id="address" name="address" class="<?= in_array('address', $errors) ? 'error' : '' ?>"
			  value="<?= $_POST['address'] ?>" placeholder="Ulice, č.p.">
			 <input type="text" id="city" name="city" class="<?= in_array('city', $errors) ? 'error' : '' ?>"
			  value="<?= $_POST['city'] ?>" placeholder="Město">
			 <input type="text" id="zip" name="zip" class="<?= in_array('zip', $errors) ? 'error' : '' ?>"
			  value="<?= $_POST['zip'] ?>" placeholder="PSČ">
			 <input type="text" id="country" name="country" class="<?= in_array('country', $errors) ? 'error' : '' ?>"
			  value="<?= $_POST['country'] ?>" placeholder="Stát">
			 <input type="text" id="email" name="email" class="<?= in_array('email', $errors) ? 'error' : '' ?>"
			  value="<?= $_POST['email'] ?>" placeholder="E-mail">
			 <textarea name="how" id="how" class="<?= in_array('how', $errors) ? 'error' : '' ?>"
			  placeholder="Jak ses o nás dozvěděl?"><?= $_POST['how'] ?></textarea>
			 <textarea name="note" id="note" class="<?= in_array('notes', $errors) ? 'error' : '' ?>"
			  placeholder="Poznámky"><?= $_POST['notes'] ?></textarea>
			 
			 <span>Distribuce 64bit:</span>
 		 	 <select name="distribution" id="distribution" class="<?= in_array('distribution', $errors) ? 'error' : '' ?>">
				<?php
				  while($tpl = $db->findByColumn("cfg_templates", "templ_supported", "1", "templ_order, templ_label"))
					echo '<option value="'.$tpl["templ_id"].'" '.($tpl['templ_id'] == $_POST['distribution'] ? 'selected' : '').'>'.$tpl["templ_label"].'</option>';
				?>
		 	 </select>

			 <span>Preferovaná lokace pro VPS:</span>
			 <select name="location" id="location" class="<?= in_array('location', $errors) ? 'error' : '' ?>">
				<?php
					while($loc = $db->findByColumn("locations", "location_type", "production", "location_id"))
						echo '<option value="'.$loc["location_id"].'"'.($tpl['location_id'] == $_POST['location'] ? 'selected' : '').'>Master Internet '.$loc["location_label"].'</option>';
				?>
			 </select>
			 <span>Měna platby:</span>
			 <select name="currency" id="currency" class="<?= in_array('currency', $errors) ? 'error' : '' ?>">
 			   <option value="CZK" <?= $_POST['currency'] == 'CZK' ? 'selected' : '' ?>>členský poplatek 900&nbsp;Kč na tři měsíce</option>
 			   <option value="EUR" <?= $_POST['currency'] == 'EUR' ? 'selected' : '' ?>>členský poplatek 36&nbsp;eur na tři měsíce</option>			 
			 </select>
			 
			 <input type="submit" name="send" id="send" class="largeButton" value="Odeslat" onclick="signup(); return false;">
			</form>
		</div>
	</section>
	
	
	<section class="pg page6" id="contacts">
		<div class="in">
			<h2>Kontakty</h2>
			
			<a href="mailto:podpora@vpsfree.cz" class="support">podpora@vpsFree.cz</a>
			
			
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
			Copyright &copy; vpsFree.cz z.s. 2009-2014. vpsFree na <a href="https://www.facebook.com/vpsfree">Facebooku</a> a <a href="https://twitter.com/vpsfree_cz">Twitteri</a> &bull;
			
			Web site by <a href="http://www.abaffydesign.com/">Abaffy Design</a>
		</div>

	</footer>
</body>
</html>
