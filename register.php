<?php

include 'config.php';

if (isset($_POST['submit'])) {

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

   $select = mysqli_query($conn, "SELECT * FROM `user_info` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if (mysqli_num_rows($select) > 0) {
      $message[] = 'Pengguna sudah terdaftar!';
   } else {
      mysqli_query($conn, "INSERT INTO `user_info` (name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');
      $message[] = 'Registrasi berhasil!';
      header('location:login.php');
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Registrasi</title>

   <!-- Tautan file CSS kustom -->
   <link rel="stylesheet" href="style.css">

</head>
<body>

<?php
if (isset($message)) {
   foreach ($message as $message) {
      echo '<div class="message" onclick="this.remove();">' . $message . '</div>';
   }
}
?>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Daftar Sekarang</h3>
      <input type="text" name="name" required placeholder="Masukkan nama pengguna" class="box">
      <input type="email" name="email" required placeholder="Masukkan email" class="box">
      <input type="password" name="password" required placeholder="Masukkan kata sandi" class="box">
      <input type="password" name="cpassword" required placeholder="Konfirmasi kata sandi" class="box">
      <input type="submit" name="submit" class="btn" value="Daftar Sekarang">
      <p>Sudah punya akun? <a href="login.php">Masuk sekarang</a></p>
   </form>

</div>

<script src="js/script.js"></script>

</body>
</html>
