<?php 
require 'functions.php';
$sql = "DELETE FROM outlet WHERE id_outlet = " . $_GET['id'];
$exe = mysqli_query($conn,$sql);

if($exe){
    // $success = 'true';
    // $title = 'Berhasil';
    // $message = 'Menghapus Data';
    // $type = 'success';
    // header('location: outlet.php?crud='.$success.'&msg='.$message.'&type='.$type.'&title='.$title);
    // header('location: logout.php');
    echo "<script>alert('Outlet telah ditutup terimakasih atas dedikasi anda selama ini');location.href='logout.php';</script>";
}
