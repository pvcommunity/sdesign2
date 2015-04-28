<?php 
/*
UserCake Version: 2.0.2
http://usercake.com
*/
require_once("../models/db-settings.php");

echo "
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>UserCake</title>
<link href='../models/site-templates/default.css' rel='stylesheet' type='text/css' />
<script src='../models/funcs.js' type='text/javascript'>
</script>
</head>
<body>
<div id='top'><div id='logo'></div></div>
<div id='content'>
<h1>UserCake</h1>
<h2>Installer</h2>";	

if(isset($_GET["install"]))
{
	$db_issue = false;
	
	$permissions_sql = "
	CREATE TABLE IF NOT EXISTS `".$db_table_prefix."permissions` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(150) NOT NULL,
	PRIMARY KEY (`id`)
	) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;
	";
	
	$permissions_entry = "
	INSERT INTO `".$db_table_prefix."permissions` (`id`, `name`) VALUES
	(1, 'New Member'),
	(2, 'Administrator'),
	(3, 'Student'),
	(4, 'Property');
	";
	
	$users_sql = "
	CREATE TABLE IF NOT EXISTS `".$db_table_prefix."users` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`user_name` varchar(50) NOT NULL,
	`display_name` varchar(50) NOT NULL,
	`password` varchar(225) NOT NULL,
	`email` varchar(150) NOT NULL,
	`activation_token` varchar(225) NOT NULL,
	`last_activation_request` int(11) NOT NULL,
	`lost_password_request` tinyint(1) NOT NULL,
	`active` tinyint(1) NOT NULL,
	`title` varchar(150) NOT NULL,
	`sign_up_stamp` int(11) NOT NULL,
	`last_sign_in_stamp` int(11) NOT NULL,
	`gender` varchar(1) NULL,
	`classification` varchar(2) NULL,
	`owner_name` varchar(50) NULL,
	`type` varchar(1) NULL,
	`address` varchar(150) NULL,
	`city` varchar(150) NULL,
	`state` varchar(2) NULL,
	`zipcode` int(5) NULL,
	PRIMARY KEY (`id`)
	) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
	";
	
	$user_permission_matches_sql = "
	CREATE TABLE IF NOT EXISTS `".$db_table_prefix."user_permission_matches` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`user_id` int(11) NOT NULL,
	`permission_id` int(11) NOT NULL,
	PRIMARY KEY (`id`)
	) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;
	";
	
	$user_permission_matches_entry = "
	INSERT INTO `".$db_table_prefix."user_permission_matches` (`id`, `user_id`, `permission_id`) VALUES
	(1, 1, 2);
	";
	
	$configuration_sql = "
	CREATE TABLE IF NOT EXISTS `".$db_table_prefix."configuration` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(150) NOT NULL,
	`value` varchar(150) NOT NULL,
	PRIMARY KEY (`id`)
	) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;
	";
	
	$configuration_entry = "
	INSERT INTO `".$db_table_prefix."configuration` (`id`, `name`, `value`) VALUES
	(1, 'website_name', 'UserCake'),
	(2, 'website_url', 'localhost/'),
	(3, 'email', 'noreply@ILoveUserCake.com'),
	(4, 'activation', 'false'),
	(5, 'resend_activation_threshold', '0'),
	(6, 'language', 'models/languages/en.php'),
	(7, 'template', 'models/site-templates/default.css');
	";
	
	$pages_sql = "CREATE TABLE IF NOT EXISTS `".$db_table_prefix."pages` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`page` varchar(150) NOT NULL,
	`private` tinyint(1) NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`)
	) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;
	";
	
	$pages_entry = "INSERT INTO `".$db_table_prefix."pages` (`id`, `page`, `private`) VALUES
	(1, 'account.php', 1),
	(2, 'activate-account.php', 0),
	(3, 'admin_configuration.php', 1),
	(4, 'admin_page.php', 1),
	(5, 'admin_pages.php', 1),
	(6, 'admin_permission.php', 1),
	(7, 'admin_permissions.php', 1),
	(8, 'admin_user.php', 1),
	(9, 'admin_users.php', 1),
	(10, 'forgot-password.php', 0),
	(11, 'index.php', 0),
	(12, 'left-nav.php', 0),
	(13, 'login.php', 0),
	(14, 'logout.php', 1),
	(15, 'register.php', 0),
	(16, 'resend-activation.php', 0),
	(17, 'user_settings.php', 1);
	";
	
	$permission_page_matches_sql = "CREATE TABLE IF NOT EXISTS `".$db_table_prefix."permission_page_matches` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`permission_id` int(11) NOT NULL,
	`page_id` int(11) NOT NULL,
	PRIMARY KEY (`id`)
	) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;
	";
	
	$permission_page_matches_entry = "INSERT INTO `".$db_table_prefix."permission_page_matches` (`id`, `permission_id`, `page_id`) VALUES
	(1, 1, 1),
	(2, 1, 14),
	(3, 1, 17),
	(4, 2, 1),
	(5, 2, 3),
	(6, 2, 4),
	(7, 2, 5),
	(8, 2, 6),
	(9, 2, 7),
	(10, 2, 8),
	(11, 2, 9),
	(12, 2, 14),
	(13, 2, 17);
	";
	
	$personality_quiz_sql = "CREATE TABLE IF NOT EXISTS `".$db_table_prefix."personality_quiz` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`s_id` int(11) NOT NULL,
	`date_completed` int(11) NOT NULL,
	`personality_result` varchar(4) NOT NULL,
	PRIMARY KEY(`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
	";
	
	$preferences_sql = "CREATE TABLE IF NOT EXISTS `".$db_table_prefix."preferences` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`s_id` int(11) NOT NULL,
	`self_stmt` varchar(180) NOT NULL,
	`major` varchar(100) NOT NULL,
	`major_imp` tinyint(4) NOT NULL,
	`social` varchar(100) NOT NULL,
	`social_imp` tinyint(4) NOT NULL,
	`sleep` varchar(100) NOT NULL,
	`sleep_imp` tinyint(4) NOT NULL,
	`cleaning` varchar(100) NOT NULL,
	`cleaning_imp` tinyint(4) NOT NULL,
	`p_type` varchar(100) NOT NULL,
	`p_rent` varchar(100) NOT NULL,
	`p_sharing` varchar(100) NOT NULL,
	`p_smoking` varchar(100) NOT NULL,
	PRIMARY KEY(`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
	";
	
	$suggested_users_sql = "CREATE TABLE IF NOT EXISTS `".$db_table_prefix."suggested_users` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`s_id` int(11) NOT NULL,
	`su_id` int(11) NOT NULL,
	`compatibility` varchar(10) NOT NULL,
	PRIMARY KEY(`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
	";
	
	$personalities_sql = "CREATE TABLE IF NOT EXISTS `".$db_table_prefix."personalities` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`personality` varchar(4) NOT NULL,
	`personality_title` varchar(30) NOT NULL,
	PRIMARY KEY(`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
	";
	
	$personalities_entry = "INSERT INTO `".$db_table_prefix."personalities` (`id`, `personality`, `personality_title`) VALUES
	(1, 'INFP', 'The Healer'),
	(2, 'INFJ', 'The Counselor'),
	(3, 'INTJ', 'The Mastermind'),
	(4, 'INTP', 'The Architect'),
	(5, 'ISFJ', 'The Protector'),
	(6, 'ISFP', 'The Composer'),
	(7, 'ISTJ', 'The Inspector'),
	(8, 'ISTP', 'The Craftsman'),
	(9, 'ENFJ', 'The Teacher'),
	(10, 'ENFP', 'The Champion'),
	(11, 'ENTJ', 'The Commander'),
	(12, 'ENTP', 'The Visionary'),
	(13, 'ESFJ', 'The Provider'),
	(14, 'ESFP', 'The Performer'),
	(15, 'ESTJ', 'The Supervisor'),
	(16, 'ESTP', 'The Dynamo');
	";
	
	$compatibility_key_sql = "CREATE TABLE IF NOT EXISTS `".$db_table_prefix."compatibility_key` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`pers1` varchar(4) NOT NULL,
	`pers2` varchar(4) NOT NULL,
	`compatibility` varchar(10) NOT NULL,
	PRIMARY KEY(`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
	";
	
	/*$compatibility_key_entry = "INSERT INTO `".$db_table_prefix."compatibility_key` (`id`, `pers1`, `pers2`, `compatibility`) VALUES
	(1, 'INFP', 'INFJ', 'high'),
	(2, 'INFP', 'INTP', 'high'),
	(3, 'INFP', 'ENFP', 'high'),
	(4, 'INFP', 'ISTJ', 'low'),
	(5, 'INFP', 'ESTP', 'low'),
	(6, 'INFP', 'ESTJ', 'low'),
	(7, 'INFP', 'ESFJ', 'low'),
	
	(9, 'INFJ', 'ENFJ', 'high'),
	(10, 'INFJ', 'ISFJ', 'high'),
	(11, 'INFJ', 'ISTP', 'low'),
	(11, 'INFJ', 'ESTP', 'low'),
	(12, 'INFJ', 'ESTJ', 'low'),
	(13, 'INFJ', 'ESFP', 'low'),
	(14, 'INTJ', 'ENTJ', 'high'),
	(15, 'INTJ', 'INTP', 'high'),
	(16, 'INTJ', 'ISTJ', 'high'),
	(17, 'INTJ', 'ISFP', 'low'),
	(18, 'INTJ', 'ISFJ', 'low'),
	(19, 'INTJ', 'ESFP', 'low'),
	(20, 'INTJ', 'ESFJ', 'low'),
	(21, 'INTP', 'ENTP', 'high'),
	(22, 'INTP', 'INFP', 'high'),
	(23, 'INTP', 'INTJ', 'high'),
	(24, 'INTP', 'ISFJ', 'low'),
	(25, 'INTP', 'ESTJ', 'low'),
	(26, 'INTP', 'ESFP', 'low'),
	(27, 'INTP', 'ESFJ', 'low'),
	//(28, 'ISFJ', 'INFJ', 'high'),
	(29, 'ISFJ', 'ESFJ', 'high'),
	(30, 'ISFJ', 'ISTJ', 'high'),
	(31, 'ISFJ', 'INTP', 'low'),
	(32, 'ISFJ', 'INTJ', 'low'),
	(33, 'ISFJ', 'ENTP', 'low'),
	(34, 'ISFJ', 'ENTJ', 'low'),
	(35, 'ISFP', 'ISTP', 'high'),
	(36, 'ISFP', 'ESFP', 'high'),
	(37, 'ISFP', 'ISFJ', 'high'),
	(38, 'ISFP', 'INTJ', 'low'),
	(39, 'ISFP', 'ESTJ', 'low'),
	(40, 'ISFP', 'ENTP', 'low'),
	(41, 'INSP', 'ENTJ', 'low'),
	(1, 'INFP', 'INFJ', 'high'),
	(2, 'INFP', 'INTP', 'high'),
	(3, 'INFP', 'ENFP', 'high'),
	(4, 'INFP', 'ISTJ', 'low'),
	(5, 'INFP', 'ESTP', 'low'),
	(6, 'INFP', 'ESTJ', 'low'),
	(7, 'INFP', 'ESFJ', 'low'),
	;
	";*/
	
	$stmt = $mysqli->prepare($configuration_sql);
	if($stmt->execute())
	{
		$cfg_result = "<p>".$db_table_prefix."configuration table created.....</p>";
	}
	else
	{
		$cfg_result = "<p>Error constructing ".$db_table_prefix."configuration table.</p>";
		$db_issue = true;
	}
	
	echo $cfg_result;
	$stmt = $mysqli->prepare($configuration_entry);
	if($stmt->execute())
	{
		echo "<p>Inserted basic config settings into ".$db_table_prefix."configuration table.....</p>";
	}
	else
	{
		echo "<p>Error inserting config settings access.</p>";
		$db_issue = true;
	}
	
	$stmt = $mysqli->prepare($permissions_sql);
	if($stmt->execute())
	{
		echo "<p>".$db_table_prefix."permissions table created.....</p>";
	}
	else
	{
		echo "<p>Error constructing ".$db_table_prefix."permissions table.</p>";
		$db_issue = true;
	}
	
	$stmt = $mysqli->prepare($permissions_entry);
	if($stmt->execute())
	{
		echo "<p>Inserted 'New Member' and 'Admin' groups into ".$db_table_prefix."permissions table.....</p>";
	}
	else
	{
		echo "<p>Error inserting permissions.</p>";
		$db_issue = true;
	}
	
	$stmt = $mysqli->prepare($user_permission_matches_sql);
	if($stmt->execute())
	{
		echo "<p>".$db_table_prefix."user_permission_matches table created.....</p>";
	}
	else
	{
		echo "<p>Error constructing ".$db_table_prefix."user_permission_matches table.</p>";
		$db_issue = true;
	}
	
	$stmt = $mysqli->prepare($user_permission_matches_entry);
	if($stmt->execute())
	{
		echo "<p>Added 'Admin' entry for first user in ".$db_table_prefix."user_permission_matches table.....</p>";
	}
	else
	{
		echo "<p>Error inserting admin into ".$db_table_prefix."user_permission_matches.</p>";
		$db_issue = true;
	}
	
	$stmt = $mysqli->prepare($pages_sql);
	if($stmt->execute())
	{
		echo "<p>".$db_table_prefix."pages table created.....</p>";
	}
	else
	{
		echo "<p>Error constructing ".$db_table_prefix."pages table.</p>";
		$db_issue = true;
	}
	
	$stmt = $mysqli->prepare($pages_entry);
	if($stmt->execute())
	{
		echo "<p>Added default pages to ".$db_table_prefix."pages table.....</p>";
	}
	else
	{
		echo "<p>Error inserting pages into ".$db_table_prefix."pages.</p>";
		$db_issue = true;
	}
	
	$stmt = $mysqli->prepare($permission_page_matches_sql);
	if($stmt->execute())
	{
		echo "<p>".$db_table_prefix."permission_page_matches table created.....</p>";
	}
	else
	{
		echo "<p>Error constructing ".$db_table_prefix."permission_page_matches table.</p>";
		$db_issue = true;
	}
	
	$stmt = $mysqli->prepare($permission_page_matches_entry);
	if($stmt->execute())
	{
		echo "<p>Added default access to ".$db_table_prefix."permission_page_matches table.....</p>";
	}
	else
	{
		echo "<p>Error adding default access to ".$db_table_prefix."user_permission_matches.</p>";
		$db_issue = true;
	}
	
	$stmt = $mysqli->prepare($users_sql);
	if($stmt->execute())
	{
		echo "<p>".$db_table_prefix."users table created.....</p>";
	}
	else
	{
		echo "<p>Error constructing users table.</p>";
		$db_issue = true;
	}
	
	$stmt = $mysqli->prepare($personality_quiz_sql);
	if($stmt->execute())
	{
		echo "<p>".$db_table_prefix."personality_quiz table created.....</p>";
	}
	else
	{
		echo "<p>Error constructing personality_quiz table.</p>";
		$db_issue = true;
	}
	
	$stmt = $mysqli->prepare($preferences_sql);
	if($stmt->execute())
	{
		echo "<p>".$db_table_prefix."preferences table created.....</p>";
	}
	else
	{
		echo "<p>Error constructing preferences table.</p>";
		$db_issue = true;
	}
	
	$stmt = $mysqli->prepare($suggested_users_sql);
	if($stmt->execute())
	{
		echo "<p>".$db_table_prefix."suggested_users table created.....</p>";
	}
	else
	{
		echo "<p>Error constructing suggested_users table.</p>";
		$db_issue = true;
	}
	
	$stmt = $mysqli->prepare($compatibility_key_sql);
	if($stmt->execute())
	{
		echo "<p>".$db_table_prefix."compatibility_key table created.....</p>";
	}
	else
	{
		echo "<p>Error constructing compatibility_key table.</p>";
		$db_issue = true;
	}
	
	$stmt = $mysqli->prepare($personalities_sql);
	if($stmt->execute())
	{
		echo "<p>".$db_table_prefix."personalities table created.....</p>";
	}
	else
	{
		echo "<p>Error constructing personalities table.</p>";
		$db_issue = true;
	}
	
	$stmt = $mysqli->prepare($personalities_entry);
	if($stmt->execute())
	{
		echo "<p>Added default access to ".$db_table_prefix."personalities table.....</p>";
	}
	else
	{
		echo "<p>Error adding default access to ".$db_table_prefix."personalities.</p>";
		$db_issue = true;
	}
	
	if(!$db_issue)
		echo "<p><strong>Database setup complete, please delete the install folder.</strong></p>";
	else
	echo "<p><a href=\"?install=true\">Try again</a></p>";
}
else
{
	echo "
	<a href='?install=true'>Install UserCake</a>
	";
}

echo "
</body>
</html>";

?>