<?php
// Include the database configuration file here
include('config.php');

// Start a session
session_start();

// Periksa apakah pengguna sudah masuk
if (!isset($_SESSION['user_id'])) {
    // Alihkan ke halaman login jika belum masuk
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Jika pengguna mengklik tautan logout
if (isset($_GET['logout'])) {
    // Hancurkan sesi
    session_destroy();

    // Alihkan ke halaman login setelah logout
    header("Location: login.php");
    exit();
}

// Process data update if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newName = $_POST['new_name'];
    $newEmail = $_POST['new_email'];

    // Perform data validation if necessary

    // Update user data in the database
    $update_query = mysqli_query($conn, "UPDATE `user_info` SET name = '$newName', email = '$newEmail' WHERE id = '$user_id'");

    if ($update_query) {
        // If the update is successful, redirect to the profile page or another appropriate page
        echo '<div class="success-message">Data Successfully Updated!</div>';
        header("Location: index.php");
        exit();
    } else {
        // If there is an error in the update, handle it as needed
        echo "Error: " . mysqli_error($conn);
    }
}

// Fetch user data for pre-filling the form
$fetch_user_query = mysqli_query($conn, "SELECT * FROM `user_info` WHERE id = '$user_id'");
$fetch_user = mysqli_fetch_assoc($fetch_user_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="update-profile">
   <h2>Update Profile</h2>
   <form action="" method="post">
      <label for="new_name">New Username:</label>
      <input type="text" id="new_name" name="new_name" value="<?php echo $fetch_user['name']; ?>" required>

      <label for="new_email">New Email:</label>
      <input type="email" id="new_email" name="new_email" value="<?php echo $fetch_user['email']; ?>" required>

      <button type="submit">Update</button>

      <a href="?logout=true" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
   </form>
</div>

<script src="js/script1.js"></script>

</body>
</html>
