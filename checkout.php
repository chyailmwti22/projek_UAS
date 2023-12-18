<?php

@include 'config.php';

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $country = $_POST['country'];
   $pin_code = $_POST['pin_code'];

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = number_format($product_item['price'] * $product_item['quantity']);
         $price_total += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `orders`(name, number, email, method, flat, street, city, state, country, pin_code, total_products, total_price) VALUES('$name','$number','$email','$method','$flat','$street','$city','$state','$country','$pin_code','$total_product','$price_total')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>Terima kasih telah berbelanja!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> Total: Rp ".number_format($price_total, 0, ',', '.').",-  </span>
         </div>
         <div class='customer-details'>
            <p> Nama Anda: <span>".$name."</span> </p>
            <p> Nomor Anda: <span>".$number."</span> </p>
            <p> Email Anda: <span>".$email."</span> </p>
            <p> Alamat Anda: <span>".$flat.", ".$street.", ".$city.", ".$state.", ".$country." - ".$pin_code."</span> </p>
            <p> Metode Pembayaran: <span>".$method."</span> </p>
            <p>(*Bayar saat barang tiba*)</p>
         </div>
            <a href='products.php' class='btn'>Lanjutkan Belanja</a>
         </div>
      </div>
      ";
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Checkout</title>

   <!-- Font Awesome CDN link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'header.php'; ?>

<div class="container">

<section class="checkout-form">

   <h1 class="heading">Selesaikan Pesanan Anda</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0) {
            while($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                $total_price = $fetch_cart['price'] * $fetch_cart['quantity'];
                $total += $total_price; // Tambahkan nilai total_price ke variabel total
                ?>
                <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
                <?php
            }
        } else {
            echo "<div class='display-order'><span>Keranjang Anda kosong!</span></div>";
        }
        
        // Tampilkan total yang benar di sini
        ?>
        <span class="grand-total"> Total Keseluruhan: Rp <?= number_format($total, 0, ',', '.'); ?>,- </span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>Nama Anda</span>
            <input type="text" placeholder="Masukkan nama Anda" name="name" required>
         </div>
         <div class="inputBox">
            <span>Nomor Anda</span>
            <input type="number" placeholder="Masukkan nomor Anda" name="number" required>
         </div>
         <div class="inputBox">
            <span>Email Anda</span>
            <input type="email" placeholder="Masukkan email Anda" name="email" required>
         </div>
         <div class="inputBox">
            <span>Metode Pembayaran</span>
            <select name="method">
               <option value="cash on delivery" selected>Bayar Tunai</option>
               <option value="credit card">Kartu Kredit</option>
               <option value="paypal">PayPal</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Alamat Line 1</span>
            <input type="text" placeholder="Contoh: nomor flat" name="flat" required>
         </div>
         <div class="inputBox">
            <span>Alamat Line 2</span>
            <input type="text" placeholder="Contoh: nama jalan" name="street" required>
         </div>
         <div class="inputBox">
            <span>Kota</span>
            <input type="text" placeholder="Contoh: Jakarta" name="city" required>
         </div>
         <div class="inputBox">
            <span>Provinsi</span>
            <input type="text" placeholder="Contoh: DKI Jakarta" name="state" required>
         </div>
         <div class="inputBox">
            <span>Negara</span>
            <input type="text" placeholder="Contoh: Indonesia" name="country" required>
         </div>
         <div class="inputBox">
            <span>Kode Pos</span>
            <input type="text" placeholder="Contoh: 123456" name="pin_code" required>
         </div>
      </div>
      <input type="submit" value="Pesan Sekarang" name="order_btn" class="btn">
   </form>

</section>

</div>

<!-- Custom JS file link -->
<script src="js/script.js"></script>
   
</body>
</html>
