<?php

$email_to = "contato@maisodontologia.com";
$email_subject = "Email contato website";

$txtName = $_POST['txtName']; // required
$txtEmail = $_POST['txtEmail']; // required
$txtPhone = $_POST['txtPhone']; // required
$txtMsg = $_POST['txtMsg']; // required

$email_message = "Detalhes do formulário.\n\n";


$email_message .= "Nome: $txtName \n";
$email_message .= "Email: $txtEmail \n";
$email_message .= "Telefone: $txtPhone \n";
$email_message .= "Mensagem: $txtMsg \n";

$mailheader = "From: $txtEmail \r\n";

mail($email_to, $email_subject, $email_message, $mailheader) or die("Error!");
echo "Thank You!";

?>