<?php  
  /**  
  * Requires the "PHP Email Form" library  
  * The "PHP Email Form" library is available only in the pro version of the template  
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php  
  * For more info and help: https://bootstrapmade.com/php-email-form/  
  */  

  // Cambia el correo electrónico de recepción  
  $receiving_email_address = 'reandre2001@gmail.com';  

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {  
    include( $php_email_form );  
  } else {  
    die( 'Unable to load the "PHP Email Form" Library!');  
  }  

  $contact = new PHP_Email_Form;  
  $contact->ajax = true;  
  
  $contact->to = $receiving_email_address;  // Este es el nuevo correo de recepción  
  $contact->from_name = $_POST['name'];  
  $contact->from_email = $_POST['email'];  
  $contact->subject = $_POST['subject'];  

  // Descomenta el siguiente código si deseas utilizar SMTP para enviar correos.   
  // Necesitas ingresar tus credenciales SMTP correctas.  
  /*  
  $contact->smtp = array(  
    'host' => 'example.com',  
    'username' => 'example',  
    'password' => 'pass',  
    'port' => '587'  
  );  
  */  

  $contact->add_message( $_POST['name'], 'From');  
  $contact->add_message( $_POST['email'], 'Email');  
  $contact->add_message( $_POST['message'], 'Message', 10);  

  echo $contact->send();  
?>
