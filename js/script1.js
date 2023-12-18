function konfirmasiLogout() {
    var konfirmasi = confirm("Apakah Anda yakin ingin keluar?");
    if (konfirmasi) {
       // Jika dikonfirmasi, redirect ke halaman logout atau lakukan tindakan logout yang sesuai
       window.location.href = "logout.php";
    } else {
       // Jika tidak dikonfirmasi, tidak lakukan apa-apa atau tambahkan tindakan lain sesuai kebutuhan Anda
    }
 }
 
 // Fungsi konfirmasi edit
 function konfirmasiEdit() {
    var konfirmasi = confirm("Apakah Anda yakin ingin mengedit?");
    if (konfirmasi) {
       // Jika dikonfirmasi, lanjutkan dengan pengeditan
       document.getElementById("form-update").submit();
    } else {
       // Jika tidak dikonfirmasi, tidak lakukan apa-apa atau tambahkan tindakan lain sesuai kebutuhan Anda
    }
 }