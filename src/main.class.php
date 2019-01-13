<?php
class Adminfinder {
	// set your user agent
	public $ua='Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:53.0) Gecko/20100101 Firefox/53.0';

	public function __construct()
	{
		define('RED',"\e[1;31m");
		define('REDBG',"\e[7;31m");
		define('LIME',"\e[1;32m");
		define('BLUE',"\e[1;34m");
		define('WHITE',"\e[0;0m");
	}

	public function curl($site)
	{
		$ch=curl_init($site);
		curl_setopt($ch, CURLOPT_USERAGENT, $this->ua);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_exec($ch);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		if(!($http_code == 404 || $http_code == 0 || $http_code == 404)) {
			echo 'URL: ['.LIME.$http_code.WHITE.']';
			echo '['.BLUE.$site.WHITE."]\n";
		}
		else {
			echo 'URL: ['.RED.$http_code.WHITE.']';
			echo '['.BLUE.$site.WHITE."]\n";
		}
	}
}