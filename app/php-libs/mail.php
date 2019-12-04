<?php
// Запись в Bitrix24
// include_once "rest.php";

use PHPMailer\PHPMailer\PHPMailer;
require "phpmailer/vendor/autoload.php";

$mail = new PHPMailer(true);
  
$mail->setLanguage("ru");
$mail->CharSet = "UTF-8";

//Server settings
// $mail->SMTPDebug = 4;                                 // Enable verbose debug output
// $mail->isSMTP();                                      // Set mailer to use SMTP
// $mail->Host = 'ssl://smtp.yandex.ru';  // Specify main and backup SMTP servers
// $mail->SMTPAuth = true;                               // Enable SMTP authentication
// $mail->Username = 'info@bonadifactory.com';                 // SMTP username
// $mail->Password = 'MYgpFdc!KA9VyvE';                           // SMTP password
// $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
// $mail->Port = 465; //587      
$mail->From = "info@bonadifactory.com";
$mail->FromName = $_POST["landing_name"]; 

//Recipients
$recipients = array(
   "dosurgeest@gmail.com" => "Семенов",
   // "anpestis@gmail.com" => "Анна Пестис",
   // "info.bonadi@mail.ru" => "Bonadi",
);

$mail->isHTML(true);

$formdata = array(
	// "name" => "Имя",
	// "landing_name" => "Продукция",
	// "phone" => "Телефон",
	// "place" => "Где оставили заявку",
	// "utm" => "UTM",
	// "site" => "Сайт",
	// "comment" => "Комментарий",
);

// Заменяем знак ";" на "-" и показываем одно значение, если диапазона нет
$_POST["depth"] = rangeData( $_POST["depth"] );
$_POST["diameter"] = rangeData( $_POST["diameter"] );

$mail->Subject = "Новая заявка на " . $_POST["landing_name"];

// Создаем из основного массива массив для отправки в Bitrix
$bitrixArrayKeys = array_keys( $formdata );
$bitrixArray = array_fill_keys( $bitrixArrayKeys, array() );

// Стили для таблицы в форме заявки, которая приходит на почту
$table_style = "style='width:100%;border-collapse: collapse;'";
$td_style = "style='padding:10px;border: #e9e9e9 1px solid;font-size:20px;'";

// Начало письма
$mail->Body .= "<table $table_style>";

// Сбор всех полей форм
foreach ($formdata as $formitem => $title) {
	for ($i=0; $i < count($_POST); $i++) { 
		if( array_key_exists( $formitem, $_POST ) && !empty( trim( $_POST[$formitem] ) ) ) {
	    $mail->Body .= "<tr style='background-color: #f8f8f8;'>
					<td ". $td_style ."><b>".$title."</b></td>
					<td ". $td_style .">". trim( $_POST[$formitem] ) ."</td>
				</tr>";

			$bitrixArray[$formitem] = $_POST[$formitem];
				break;
		} else {
			$bitrixArray[$formitem] = "";
		}
	}
}

// Конец письма
$mail->Body .= "</table>";

//Sending emails
foreach( $recipients as $email => $name ) {
	$mail->addAddress($email, $name);
  if( !$mail->send() ) {
	    echo "Ошибка: " . $mail->ErrorInfo;
	}
	$mail->clearAddresses();
}
echo "done";

// add_lead_to_bitrix24( 
// 	$bitrixArray["phone"], 
// 	$bitrixArray["email"], 
// 	$bitrixArray["site"], 
// 	$bitrixArray["landing_name"], 
// 	$bitrixArray["vendorcodes"], 
// 	$bitrixArray["material"], 
// 	$bitrixArray["accessories"],
// 	$bitrixArray["diameter"],
// 	$bitrixArray["depth"],
// 	$bitrixArray["instrument"],
// 	$bitrixArray["city"],
// 	$bitrixArray["place"],
// 	$bitrixArray["utm"],
// 	$bitrixArray["comment"]
// );

function rangeData( $data ) {
	if ( isset( $data ) && $data != "" && strpos($data, ';') !== false) {
		list($depth_from, $depth_to) = split(";", $data);
		if ( $depth_from == $depth_to ) {
			$data = $depth_from . " мм";
		} else {
			$data = $depth_from . "-" . $depth_to . " мм";
		}
	}
	return $data;
}

?>