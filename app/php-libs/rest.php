<?php
function add_lead_to_bitrix24( $phone, $email, $site, $landing_name, $vendorcodes, $material, $accessories, $diameter, $depth, $instrument, $city, $place, $utm, $comment ) {
	define('CRM_HOST', 'vekprom-ru.bitrix24.ru'); // your CRM domain name
	define('CRM_PORT', '443'); // CRM server port
	define('CRM_PATH', '/crm/configs/import/lead.php'); // CRM server REST service path

	// CRM server authorization data
	define('CRM_LOGIN', 'v3kpro@yandex.ru'); // login of a CRM user able to manage leads
	define('CRM_PASSWORD', 'n#N42j&nfvQ'); // password of a CRM user
	// CRM server conection data
	// OR you can send special authorization hash which is sent by server after first successful connection with login and password
	//define('CRM_AUTH', 'e54ec19f0c5f092ea11145b80f465e1a'); // authorization hash
	
	// get lead data from the form
	$postData = array(
		'TITLE' => 'Новая заявка',
		'PHONE_WORK' => $phone, // Телефон клиента
		'EMAIL_WORK' => $email, // Email
		'WEB_WORK' => $site, // Сайт
		'SOURCE_ID' => 'WEB', // Источник заявки
		'UF_CRM_1546504315' => $landing_name, // Продукция
		'UF_CRM_1546504330' => $vendorcodes, // Артикулы
		'UF_CRM_1546504356' => $material, // Материал сверления
		'UF_CRM_1546504369' => $accessories, // Аксессуары
		'UF_CRM_1546504386' => $diameter, // Диаметр сверл
		'UF_CRM_1546504397' => $depth, // Глубина сверления
		'UF_CRM_1546520220' => $instrument, // Инструмент сверления
		'UF_CRM_1546504417' => $city, // Город доставки
		'UF_CRM_1546504429' => $place, // Где оставили заявку
		'UF_CRM_1546504446' => $utm, // UTM
		'COMMENTS' => $comment, // COMMENT
	);

	// append authorization data
	if (defined('CRM_AUTH'))
	{
		$postData['AUTH'] = CRM_AUTH;
	}
	else
	{
		$postData['LOGIN'] = CRM_LOGIN;
		$postData['PASSWORD'] = CRM_PASSWORD;
	}

	// open socket to CRM
	$fp = fsockopen("ssl://".CRM_HOST, CRM_PORT, $errno, $errstr, 30);
	if ($fp)
	{
		// prepare POST data
		$strPostData = '';
		foreach ($postData as $key => $value)
			$strPostData .= ($strPostData == '' ? '' : '&').$key.'='.urlencode($value);

		// prepare POST headers
		$str = "POST ".CRM_PATH." HTTP/1.0\r\n";
		$str .= "Host: ".CRM_HOST."\r\n";
		$str .= "Content-Type: application/x-www-form-urlencoded\r\n";
		$str .= "Content-Length: ".strlen($strPostData)."\r\n";
		$str .= "Connection: close\r\n\r\n";

		$str .= $strPostData;

		// send POST to CRM
		fwrite($fp, $str);

		// get CRM headers
		$result = '';
		while (!feof($fp))
		{
			$result .= fgets($fp, 128);
		}
		fclose($fp);

		// cut response headers
		$response = explode("\r\n\r\n", $result);

		$output = '<pre>'.print_r($response[1], 1).'</pre>';
	}
	else
	{
		echo 'Connection Failed! '.$errstr.' ('.$errno.')';
	}
}


// HTML form
?>