<?php
session_start();
$nome = $_POST["nome"];
$email = $_POST["email"];
$mensagem = $_POST["mensagem"];

require_once("/phpMailer/PHPMailerAutoload.php");

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "rblima0@gmail.com";
$mail->Password = "egeodolce321";

$mail->setFrom("rblima0@gmail.com", "Sistema Loja");
$mail->addAddress("rblima0@gmail.com");
$mail->Subject = "Email de contato da loja";
$mail->msgHTML("<html>De: {$nome}<br/>E-mail: {$email}<br/>Mensagem: {$mensagem}</html>");
$mail->AltBody = "De: {$nome}\nE-mail:{$email}\nMensagem: {$mensagem}";

if($mail->send()) {
    $_SESSION["success"] = "Mensagem enviada com sucesso";
    header("Location: index.php");
} else {
    $_SESSION["danger"] = "Erro ao enviar mensagem " . $mail->ErrorInfo;
    header("Location: contato.php");
}
die();