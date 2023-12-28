<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php

$host = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "uyelik"; 


$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}


$adsoyad = mysqli_real_escape_string($conn, $_POST["adsoyad"]);
$mail = mysqli_real_escape_string($conn, $_POST["mail"]);
$mesaj = mysqli_real_escape_string($conn, $_POST["mesaj"]);


$sql = "INSERT INTO iletisim_formu (adsoyad, mail, mesaj) VALUES ('$adsoyad', '$mail', '$mesaj')";

if ($conn->query($sql) === TRUE) {
    echo "Veriler başarıyla kaydedildi.";
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
</body>
</html>
