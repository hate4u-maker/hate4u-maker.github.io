<?php
// Параметры для отправки email
$toEmail = 'kap.work.94@gmail.com'; // Ваш email, на который отправлять сообщения
$subject = 'Новое сообщение от сайта';

// Данные из формы
$name = filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
$header = filter_var(trim($_POST["header"]), FILTER_SANITIZE_STRING);
$message = filter_var(trim($_POST["message"]), FILTER_SANITIZE_STRING);

// Формирование тела сообщения
$messageBody = "Имя: $name\n";
$messageBody .= "Email: $email\n\n";
$messageBody .= "Тема: $header\n";
$messageBody .= "Сообщение:\n$message";

// Заголовки для письма
$headers = "From: $name <$email>";

// Отправка письма
if (mail($toEmail, $subject, $messageBody, $headers)) {
    // Отправка успешна
    echo json_encode(array('success' => true));
} else {
    // Ошибка при отправке
    echo json_encode(array('success' => false));
}
?>
