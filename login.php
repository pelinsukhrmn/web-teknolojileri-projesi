<?php
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($username) || empty($password)) {
    echo "<script>alert('Kullanıcı adı ve şifre boş olamaz. Lütfen tekrar deneyin.'); window.location.href='giris.html';</script>";
    exit;
}

if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Geçersiz kullanıcı adı. Lütfen geçerli bir e-posta adresi girin.'); window.location.href='giris.html';</script>";
    exit;
}

$pattern = "/^b\d{9}@sakarya\.edu\.tr$/";
if (!preg_match($pattern, $username)) {
    echo "<script>alert('Kullanıcı adı geçerli bir öğrenci e-posta adresi olmalıdır.'); window.location.href='giris.html';</script>";
    exit;
}

$student_number = substr($username, 0, 10); 
if ($password === $student_number) {
    echo "<script>alert('Hoşgeldiniz, $student_number!'); window.location.href='index.html';</script>";
} else {
    echo "<script>alert('Kullanıcı adı veya şifre hatalı. Lütfen tekrar deneyin.'); window.location.href='giris.html';</script>";
}
?>
