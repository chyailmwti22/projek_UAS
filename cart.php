<?php

@include 'config.php';

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      header('location:cart.php');
   }
}

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
   header('location:cart.php');
}

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart`");
   header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Shopping Cart</title>

   <!-- Font Awesome CDN link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'header.php'; ?>

<div class="container">

<section class="shopping-cart">

   <h1 class="heading">Keranjang Belanja</h1>

   <table>

      <thead>
         <th>Foto</th>
         <th>Nama</th>
         <th>Harga</th>
         <th>Jumlah</th>
         <th>Total Belanja</th>
         <th>Tindakan</th>
      </thead>

      <tbody>

         <?php 
         
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
               ?>

               <tr>
                  <td><img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
                  <td><?php echo $fetch_cart['name']; ?></td>
                  <td>Rp<?php echo number_format($fetch_cart['price'], 0, ',', '.'); ?>,-</td>
                  <td>
                     <form action="" method="post">
                        <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>" >
                        <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['quantity']; ?>" >
                        <input type="submit" value="Update" name="update_update_btn">
                     </form>   
                  </td>
                  <td>Rp<?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity'], 0, ',', '.'); ?>,-</td>
                  <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('Yakin menghapus item dari keranjang??')" class="delete-btn"> <i class="fas fa-trash"></i> Hapus</a></td>
               </tr>

               <?php
               $grand_total += $fetch_cart['price'] * $fetch_cart['quantity'];  
            }
         }
         ?>

         <tr class="table-bottom">
            <td><a href="products.php" class="option-btn" style="margin-top: 0;">Lanjut Belanja</a></td>
            <td colspan="3">Total Keseluruhan</td>
            <td>Rp<?php echo number_format($grand_total, 0, ',', '.'); ?>,-</td>
            <td><a href="cart.php?delete_all" onclick="return confirm('Kamu yakin menghapus semua belanjaanmu??');" class="delete-btn"> <i class="fas fa-trash"></i> Hapus Semua </a></td>
         </tr>

      </tbody>

   </table>

   <div class="checkout-btn">
      <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">Lanjut Checkout</a>
   </div>

</section>

</div>
   
<!-- Custom JS file link -->
<script src="js/script.js"></script>

</body>
</html>
