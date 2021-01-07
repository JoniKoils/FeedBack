<!DOCTYPE html>
<html lang="ru">
<head>
<title>Web Фишки - Форма обратной связи</title>
</head>
<body>
<form action="contact.php" method="post">
<p>
  <label>Имя:<br></label>
  <input name="name" type="text" size="15" maxlength="15">
</p>
<p>
  <label>E-mail:<br></label>
  <input name="email" type="email" size="32" maxlength="32">
</p>
<p>
  <label>Сообщение:<br></label>
  <textarea name="message"></textarea>
</p>
<p>
  <input type="submit" name="submit" value="Отправить">
</p>

</form>
</body>
</html>
<?php
$to_mail = "pochta@domain.ru"; // Habar yekazib berilgich pochta manzili
$subject = "Сообщение из формы обратной связи"; // Xat sarlavhasi
$message = htmlspecialchars($_POST['message']);
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
// Formamiz to'lliq to'ldirilganmi yoqmi tekshirib ko'ramiz
if ($name == "") {
exit ("Пожалуйста, заполните поле Имя");
} elseif ($email == "") {
exit ("Пожалуйста, заполните поле E-mail");
} elseif ($message == "") {
exit ("Пожалуйста, заполните поле Сообщение");
} else {
// Matnni kodlash, bu misolda kirill alifbosi
$headers  = "Content-type: text/html; charset=windows-1251 \r\n";
// Javob berish uchun jo'natuvchini manzilini qo'shib olamiz
$headers .= "From: ".$name." <".$email.">\r\n";
// Va pochta yuborish funksiyasini chaqiramiz
$send = mail($to_mail, $subject, $message, $headers);
// Muvaffaqiyatli operatsiyani tekshiramiz agar yetkazilgan bo'lsa 
if ($send == 'TRUE') {
  echo "Ваше обращение успешно отправлено.";
} else {
  exit('Произошла ошибка.');
}
}
?>
