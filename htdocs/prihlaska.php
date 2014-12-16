<?php
define('VPSFREE', true);

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
	
require "config.php";
require "lib/db.lib.php";

	
function cfg_get($key) {
	global $db;

	$cfg = $db->findByColumnOnce("sysconfig", "cfg_name", $key);
	return json_decode($cfg["cfg_value"]);
}

$is_ajax = $_GET['js'] || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';


/**
			'nick'			:nick,
			'name'			:name,
			'surname'		:surname,
			'birth'			:birth,
			'address'		:address,
			'city'			:city,
			'zip'			:zip,
			'country'		:country,
			'email'			:email,
			'how'			:how,
			'notes'			:notes,
			'distribution'	:distribution,
			'location'		:location,
			'currency'		:currency
**/
if ($_POST) {
	$errors = array();
	if (strlen($_POST['nick']) < 3) {
		$errors[] = 'nick';
	}
	
	if (strlen($_POST['name']) < 3) {
		$errors[] = 'name';
	}
	
	if (strlen($_POST['surname']) < 3) {
		$errors[] = 'surname';
	}
	
	if (strlen($_POST['birth']) < 3) {
		$errors[] = 'birth';
	}
	
	if (strlen($_POST['address']) < 3) {
		$errors[] = 'address';
	}
	
	if (strlen($_POST['city']) < 3) {
		$errors[] = 'city';
	}
	
	if (strlen($_POST['zip']) < 5) {
		$errors[] = 'zip';
	}
	
	if (strlen($_POST['country']) < 3) {
		$errors[] = 'country';
	}
	
	if (strlen($_POST['email']) < 3) {
		$errors[] = 'email';
	}
	
	if (!isset($_POST['distribution'])) {
		$errors[] = 'distribution';
	}
	
	if (!isset($_POST['location'])) {
		$errors[] = 'location';
	}	
	
	if (!isset($_POST['currency'])) {
		$errors[] = 'currency';
	}		
	
	if (count($errors) > 0) {
		if ($is_ajax) {
			echo json_encode($errors);
			die();
			
		} else {
			include "form.php";
		}
	}
	
	$db = new sql_db (DB_HOST, DB_USER, DB_PASS, DB_NAME);
	
	$created = time();

	$db->query("INSERT INTO members_changes SET
				            m_created = ".$created.",
				            m_type = 'add',
				            m_state = 'awaiting',
				            m_nick = '".$db->check($_POST["nick"])."',
				            m_name = '".$db->check($_POST["name"]." ".$_POST["surname"])."',
				            m_mail = '".$db->check($_POST["email"])."',
				            m_address = '".$db->check($_POST["address"].", ".$_POST["zip"]." ".$_POST["city"].", ".$_POST["country"])."',
				            m_year = '".$db->check($_POST["birth"])."',
				            m_jabber = '',
				            m_how = '".$db->check($_POST["how"])."',
				            m_note = '".$db->check($_POST["note"])."',
				            m_distribution = '".$db->check($_POST["distribution"])."',
				            m_location = '".$db->check($_POST["location"])."',
				            m_currency = '".$db->check($_POST["currency"])."',
				            m_reason = '',
				            m_addr = '".$db->check($_SERVER["REMOTE_ADDR"])."',
				            m_addr_reverse = '".$db->check(gethostbyaddr($_SERVER["REMOTE_ADDR"]))."',
				            m_last_mail_id = 1
				            ");

	$request_id = $db->insert_id();

	// Mail admins
	$admins = explode(",", cfg_get("mailer_requests_sendto"));
	$subject = cfg_get("mailer_requests_admin_sub");
	$text = cfg_get("mailer_requests_admin_text");

	$subject = str_replace("%request_id%", $request_id, $subject);
	$subject = str_replace("%type%", "add", $subject);
	$subject = str_replace("%state%", "awaiting", $subject);
	$subject = str_replace("%member_id%", "-", $subject);
	$subject = str_replace("%member%", "-", $subject);
	$subject = str_replace("%name%", $_POST["name"]." ".$_POST["surname"], $subject);

	$text = str_replace("%created%", strftime("%Y-%m-%d %H:%M", $created), $text);
	$text = str_replace("%changed_at%", "-", $text);
	$text = str_replace("%request_id%", $request_id, $text);
	$text = str_replace("%type%", "add", $text);
	$text = str_replace("%state%", "awaiting", $text);
	$text = str_replace("%member_id%", "-", $text);
	$text = str_replace("%member%", "-", $text);
	$text = str_replace("%admin_id%", "-", $text);
	$text = str_replace("%admin%", "-", $text);
	$text = str_replace("%reason%", "-", $text);
	$text = str_replace("%admin_response%", "-", $text);
	$text = str_replace("%ip%", $_SERVER["REMOTE_ADDR"], $text);
	$text = str_replace("%ptr%", gethostbyaddr($_SERVER["REMOTE_ADDR"]), $text);

	$distro = $db->findByColumnOnce("cfg_templates", "templ_id", $_POST["distribution"]);
	$location = $db->findByColumnOnce("locations", "location_id", $_POST["location"]);

	$application = '
     Nickname: '.$_POST["nick"].'
         Name: '.$_POST["name"].' '.$_POST["surname"].'
        Email: '.$_POST["email"].'
       Adresa: '.$_POST["address"].", ".$_POST["zip"]." ".$_POST["city"].", ".$_POST["country"].'
Year of birth: '.$_POST["birth"].'
       Jabber: 
          How: '.$_POST["how"].'
         Note: '.$_POST["note"].'
     Currency: '.$_POST["currency"].'
 Distribution: '.$distro["templ_id"].' '.$distro["templ_label"].'
     Location: '.$location["location_id"].' '.$location["location_label"].'
	';

	$text = str_replace("%changed_info%", $application, $text);

	$headers =  "FROM: podpora@vpsfree.cz\n".
				'MIME-Version: 1.0' . "\n" .
				'Content-type: text/plain; charset=UTF-8'."\n".
				'Message-ID: vpsadmin-request-'.$request_id.'-1@vpsadmin.vpsfree.cz';

	foreach($admins as $admin) {
		mail($admin, $subject, $text, $headers);
	}

	// Mail applicant
	$subject = "[vpsFree.cz] Přihláška přijata";
	$text = 'Ahoj '.$_POST["nick"].',

Tvá přihláška byla přijata a bude předložena radě sdružení ke schválení. Do 24 hodin Tě budeme kontaktovat.
Pokud by se tak nestalo, obrať se prosím na podpora@vpsfree.cz.

Mezitím doporučujeme, aby sis prošel důkladněji náš web na https://www.vpsfree.cz.
Další informace, které nezbytně potřebuješ vědět, jsou na https://kb.vpsfree.cz/informace/novacci.
A konečně, na naší Knowledge Base je kolekce krátkych návodů, které jsou pro vpsFree specifické, je dobré o nich aspoň mít přehled:
https://kb.vpsfree.cz

Vážíme si Tvého zájmu,

vpsFree.cz
';
	
	mail($_POST["email"], $subject, $text, $headers);

}
?>