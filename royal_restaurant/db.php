<?php
$host = "localhost:3307";
$user = "root";
$pass = ""; // اتركه فارغاً تماماً كما هو هنا
$dbname = "royal_db"; // تأكد أن هذا هو نفس اسم قاعدة البيانات في phpMyAdmin بجهازك

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    // هذا السطر سيخبرك بالخطأ بدل الصفحة البيضاء إذا فشل الاتصال
    die("Connection failed: " . mysqli_connect_error());
}
?>