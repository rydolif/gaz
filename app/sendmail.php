<?php
	$SITE_TITLE = 'Message';
	$SITE_DESCR = '';

	if ( isset($_POST) ) {
		$name = htmlspecialchars(trim($_POST['name']));
		$sity = htmlspecialchars(trim($_POST['sity']));
		$phone = htmlspecialchars(trim($_POST['phone']));
		$position = htmlspecialchars(trim($_POST['position']));
		$power = htmlspecialchars(trim($_POST['power']));

		$subject = $_POST['subject'] ? htmlspecialchars(trim($_POST['subject'])) : '';
		$to = 'rudolifrudolif@gmail.com';

		$headers = "From: $SITE_TITLE \r\n";
		$headers .= "Reply-To: ". $email . "\r\n";
		$headers .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= "Content-Type: text/html; charset=utf-8\r\n";

		$data = '<h1>'.$subject."</h1>";

		if ( $name != '' ) {
			$data .= 'Имя: '.$name."<br>";
		}
		
		if ( $phone != '' ) {
			$data .= 'Телефон: '.$phone."<br>";
		}

		if ( $sity != '' ) {
			$data .= 'Котеджный поселок: ' . $sity ."<br>";
		}

		if ( $position != '' ) {
			$data .= 'Выберите назначение: ' . $position ."<br>";
		}

		if ( $power != '' ) {
			$data .= 'Мощность оборудования: ' . $power ."<br>";
		}


		$message = "<div style='background:#ccc;border-radius:10px;padding:20px;'>
				".$data."
				<br>\n
				<hr>\n
				<br>\n
				<small>это сообщение было отправлено с сайта ".$SITE_TITLE." - ".$SITE_DESCR.", отвечать на него не надо</small>\n</div>";
		$send = mail($to, $subject, $message, $headers);

		if ( $send ) {
			echo '';
		} else {
				echo '<div class="error">Ошибка отправки формы</div>';
		}

	}
	else {
			echo '<div class="error">Ошибка, данные формы не переданы.</div>';
	}
	die();
?>