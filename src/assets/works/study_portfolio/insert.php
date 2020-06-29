<?php

$nameErr = $emailErr = "";
$name = $email = $message = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Skriv dit navn";
    } else {
      $name = test_input($_POST["name"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed"; 
      }
    }
  
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format"; 
      }
    }
  
    if (empty($_POST["message"])) {
      $message = "";
    } else {
        $messageErr = "write your message";
      }
    
      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;

 
      }
    }
}
$to = "okomaro@gmail.com";
$subject = "contact from okomaro.bplaced.net site";
$message = " Name: " . $name . "\r\n Email: " . $email. "\r\n message: " . $data;
 
 
$from = "okomaro-portfolio";
$headers = "From:" . $from . "\r\n";

mail($to,$subject,$data,$headers)   
?>  
