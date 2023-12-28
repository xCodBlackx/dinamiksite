<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php
// Veritabanı bağlantısı
$host = "localhost"; // Veritabanı sunucusu
$username = "root"; // Veritabanı kullanıcı adı
$password = ""; // Veritabanı parolası
$dbname = "uyelik"; // Veritabanı adı

// Veritabanı bağlantısını oluştur
$conn = new mysqli($host, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// POST verilerini güvenli bir şekilde alır
$adsoyad = mysqli_real_escape_string($conn, $_POST["adsoyad"]);
$mail = mysqli_real_escape_string($conn, $_POST["mail"]);
$mesaj = mysqli_real_escape_string($conn, $_POST["mesaj"]);

// Verileri veritabanına ekleyin
$sql = "INSERT INTO iletisim_formu (adsoyad, mail, mesaj) VALUES ('$adsoyad', '$mail', '$mesaj')";

if ($conn->query($sql) === TRUE) {
    echo "Veriler başarıyla kaydedildi.";
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}

// Veritabanı bağlantısını kapat
$conn->close();
?>
</body>
</html>