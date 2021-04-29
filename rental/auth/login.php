<?php
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
// include('../../config/conn.php'); 
// menangkap data yang dikirim dari form
$username = $_POST['email'];
$password = $_POST['password'];
 
// menyeleksi data admin dengan username dan password yang sesuai
// $query = mysqli_query($conn,"SELECT * FROM user WHERE email='$username' AND pass='$password'");
// $data =mysqli_fetch_array($query);
// print_r($data['role']);
// die;
// // menghitung jumlah data yang ditemukan
// $cek = mysqli_num_rows($query);
// print_r($cek);
 
// if($cek > 0){
	$_SESSION['email'] = $username;
	$_SESSION['status'] = "login";
	header("location:../index.php");
// }else{
	// header("location:../../index.php");
// }
?>