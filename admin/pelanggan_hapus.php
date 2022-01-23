<?php 
require 'functions.php';
// die($_GET['id']);
$id = $_GET['id'];
$outlet_id = $_GET['outlet'];
$sql = "DELETE FROM member WHERE id_member = " . $id;
$passwordlam = $_POST['passlama'];
// die($passwordlam);
$querypass = "select * from user where role = 'owner' and outlet_id = '$outlet_id'";
// die($querypass);
$passwordlama = mysqli_query($conn, $querypass);
$passlama = mysqli_fetch_array($passwordlama);
if(md5($passwordlam) != $passlama['password']){
    echo "<script>alert('Password tidak sesuai');location.href='pelanggan.php';</script>";
    // $sql = "NO";
} else {
    $sql = "DELETE FROM member WHERE id_member = " . $id;
    $exe = mysqli_query($conn,$sql);
}
// $exe2 = mysqli_query($conn,$sql2);
if($exe){
    // mysqli_query($conn, $sql2);
	$success = 'true';
    $title = 'Berhasil';
    $message = 'Menghapus Data';
    $type = 'success';
    header('location: pelanggan.php?crud='.$success.'&msg='.$message.'&type='.$type.'&title='.$title);
}
?>