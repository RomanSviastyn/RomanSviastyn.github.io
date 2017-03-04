<?php
define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("DB", "book");
define("MYLINK", "http://book/");

function DO_EXIT($path)
{
	header("Location: ".MYLINK.$path);
}

function cool_print($data)
{
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}
//Secure
function correctInput($value)
{
	return trim(strip_tags(htmlspecialchars($value)));
}

function is_Admin()
{
	return (isset($_SESSION['admin']) && count($_SESSION['admin']) != 0)? true: false;
}

function getIp()
{
	if (!empty($_SERVER['HTTP_CLIENT_IP']))
	{
		$ip=$_SERVER['HTTP_CLIENT_IP'];
	}
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	{
		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	else
	{
		$ip=$_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}

function getBrowser()
{
	$agent = $_SERVER['HTTP_USER_AGENT'];
	preg_match("/(MSIE|Opera|Firefox|Chrome|Version)(?:\/| )([0-9.]+)/", $agent, $browser_info);
	list(,$browser,$version) = $browser_info;
	return $browser.' '.$version;
}

function shifr($text)
{
	return md5(strrev(md5("hash?".$text."md_5")));
}
//Show_error(example "Incorrect E-mail")
function show_error()
{
	if(!empty($_SESSION['error']))
		echo "<div id='error_block'><div id='close_window'></div>".$_SESSION['error']."</div>";
	$_SESSION['error'] = "";
}