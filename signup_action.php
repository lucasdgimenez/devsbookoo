<?php 
require 'config.php';
require 'models/Auth.php';

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$name = filter_input(INPUT_POST, 'name');
$birthdate = filter_input(INPUT_POST, 'birthdate');
$password = filter_input(INPUT_POST, 'password');

if($email && $password && $name && $birthdate) {
    $auth = new Auth($pdo, $base);

    $birthdate = explode('/', $birthdate);
    if(count($birthdate) != 3) {
        $_SESSION['flash'] = 'Data de nascimento invalida';
        header("Location: ".$base."/signup.php");
        exit;
    }

    $birthdate = $birthdate[2].'-'.$birthdate[1].'-'.$birthdate[0];
    if(strtotime($birthdate) === false) {
        $_SESSION['flash'] = 'Data de nascimento invalida';
        header("Location: ".$base."/signup.php");
        exit;
    }

    if($auth->emailExists($email) === false) { //fazer cadastro
        $auth->registerUser($name, $email, $password, $birthdate);
        header("Location: ".$base);
        exit;
    } else {
        $_SESSION['flash'] = 'E-mail já cadastrado';
        header("Location: ".$base."/signup.php");
        exit;
    }
    
}

$_SESSION['flash'] = 'Campos nao enviados';
header("Location: ".$base."/signup.php");
exit;
?>