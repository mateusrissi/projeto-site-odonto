<?php
if (isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "contato@maisodontologia.com";
    $email_subject = "Email contato website";

    function died($error)
    {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error . "<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }


    // validation expected data exists
    if (
        !isset($_POST['txtName']) ||
        !isset($_POST['txtEmail']) ||
        !isset($_POST['txtPhone']) ||
        !isset($_POST['txtMsg'])
    ) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }



    $txtName = $_POST['txtName']; // required
    $txtEmail = $_POST['txtEmail']; // required
    $txtPhone = $_POST['txtPhone']; // required
    $txtMsg = $_POST['txtMsg']; // not required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $txtEmail)) {
        $error_message .= 'Por favor, digite um email válido.<br />';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if (!preg_match($string_exp, $txtName)) {
        $error_message .= 'Por favor, digite um nome válido.<br />';
    }

    if (strlen($txtMsg) < 2) {
        $error_message .= 'A mensagem que você deseja enviar não parece ser válida.<br />';
    }

    if (strlen($error_message) > 0) {
        died($error_message);
    }

    $email_message = "Detalhes do formulário.\n\n";


    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }



    $email_message .= "Nome: " . clean_string($txtName) . "\n";
    $email_message .= "Email: " . clean_string($txtEmail) . "\n";
    $email_message .= "Telefone: " . clean_string($txtPhone) . "\n";
    $email_message .= "Mensagem: " . clean_string($txtMsg) . "\n";

    // create email headers
    $headers = 'From: ' . $txtEmail . "\r\n" .
        'Reply-To: ' . $txtEmail . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
    ?>

    <!-- include your own success html here -->

    Obrigado por entrar em contato!

<?php

}
?>