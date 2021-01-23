<?php
$login = $_POST['user_name'];
$pass = $_POST['user_password'];

$host = 'localhost';
$database = 'test';
$user = 'root';
$password = 'root';

$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));
 
$query ="SELECT * FROM users WHERE login = '$login' AND password = '$pass'";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($row = mysqli_fetch_assoc($result)) {
    $_SESSION['user'] = $row['id'];
    if (isset($_POST['user_check'])) {
        setcookie("user", $row['id'], time() + 31536000);
    }
    header("Location: /");
} else {
    echo "Логин либо пароль не верны!";
}

mysqli_close($link);
?>