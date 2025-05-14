<?php
$kullaniciadi = $_POST['kullaniciadi'] ?? '';
$sifre = $_POST['sifre'] ?? '';

if (empty($kullaniciadi) || empty($sifre)) {
    echo "<script>alert('Kullanıcı adı ve şifre boş olamaz. Lütfen tekrar deneyin.'); window.location.href='giris.html';</script>";
    exit;
}

if (!filter_var($kullaniciadi, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Geçersiz kullanıcı adı. Lütfen geçerli bir e-posta adresi girin.'); window.location.href='giris.html';</script>";
    exit;
}

$pattern = "/^b\d{9}@sakarya\.edu\.tr$/";
if (!preg_match($pattern, $kullaniciadi)) {
    echo "<script>alert('Kullanıcı adı geçerli bir öğrenci e-posta adresi olmalıdır.'); window.location.href='giris.html';</script>";
    exit;
}

$ogrenci_numarasi = substr($kullaniciadi, 0, 10); 
if ($sifre === $ogrenci_numarasi) {
    echo "<script>alert('Hoşgeldiniz, $ogrenci_numarasi!'); window.location.href='index.html';</script>";
} else {
    echo "<script>alert('Kullanıcı adı veya şifre hatalı. Lütfen tekrar deneyin.'); window.location.href='giris.html';</script>";
}
?>
