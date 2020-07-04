<?php  

error_reporting(0);

define('BOT_TOKEN', '1361966481:AAG4OT9j_8xe8FsvW1Xz7UDEleowv3vm-go');
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');

if (isset($_GET['bin'])) {
	$bin=substr($_GET['bin'], 0,6);

	$ch=curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://bincheck.org/'.$bin);
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	$e=curl_exec($ch);
	$split=explode('</td>',$e);
	$split2=explode('<td>',$e);


	function rep($str){
	return trim(strip_tags(preg_replace('/<(head|title|style|script)[^>]*>.*>\/\\1>/s', '', $str))); 
	}
	 echo str_replace('Brand', '', 'Cartão: '.rep($split[1])).'<br>';
     echo str_replace('Type', '', 'Tipo: '.rep($split[2])).'<br>';
     echo str_replace('Category', '', 'Level: '.rep($split[3])).'<br>';
     echo str_replace('Bank URL', '', 'Banco: '.rep($split2[5])).'<br>';
     echo str_replace('Country', '', 'País: '.rep($split[6])).'<br>';
}
    ?>
