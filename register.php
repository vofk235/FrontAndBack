<?php
$mail = $_POST['user_mail'];
$login = $_POST['user_name'];
$pass = $_POST['user_password'];

$host = 'localhost';
$database = 'test';
$user = 'root';
$password = 'root';

$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));
 
$query ="INSERT INTO users (login, post, password) VALUES ('$login', '$mail', '$pass')";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result) {
    $_SESSION['user'] = mysqli_insert_id($link);
    header("Location: /");
} else {
    echo "Данные не сохранены!";
}

mysqli_close($link);
?>