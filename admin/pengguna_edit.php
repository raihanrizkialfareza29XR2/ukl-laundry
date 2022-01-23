<?php
$title = 'pengguna';
require'functions.php';

$role = ['admin','owner','kasir'];

$id_user = $_GET['id'];
$queryedit = "SELECT * FROM user WHERE id_user = '$id_user'";
$edit = ambilsatubaris($conn,$queryedit);

if(isset($_POST['btn-simpan'])){
    $nama     = $_POST['nama_user'];
    $username = $_POST['username'];
    $role     = $_POST['role'];
    $passwordlam = $_POST['passlama'];
    $querypass = "select * from user where id_user = '".$id_user."'";
    $passwordlama = mysqli_query($conn, $querypass);
    $passlama = mysqli_fetch_array($passwordlama);
    if(md5($passwordlam)!=$passlama['password']){
        echo "<script>alert('Password tidak sesuai');location.href='pengguna_edit.php?id=".$_GET['id']."';</script>";
    } else {
        if($_POST['password'] != null || $_POST['password'] == ''){
            $pass     = md5($_POST['password']);
            $query = "UPDATE user SET nama_user = '$nama' , username = '$username' , role = '$role' , password ='$pass' WHERE id_user = '$id_user'";    
        }else{
            $query = "UPDATE user SET nama_user = '$nama' , username = '$username' , role = '$role' WHERE id_user = '$id_user'";
        }
    }
    
    
    $execute = bisa($conn,$query);
    if($execute == 1){
        $success = 'true';
        $title = 'Berhasil';
        $message = 'Berhasil mengubah ' .$role;
        $type = 'success';
        header('location: pengguna.php?crud='.$success.'&msg='.$message.'&type='.$type.'&title='.$title);
    }else{
        echo "Gagal Tambah Data";
    }
}


require'layout_header.php';
?> 
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Data Master Pengguna</h4> </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="outlet.php">Pengguna</a></li>
                <li><a href="#">Tambah Pengguna</a></li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-md-6">
                          <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-primary box-title"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <button id="btn-refresh" class="btn btn-primary box-title text-right" title="Refresh Data"><i class="fa fa-refresh" id="ic-refresh"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <form method="post" action="">
                <div class="form-group">
                    <label>Nama Pengguna</label>
                    <input type="text" name="nama_user" class="form-control" value="<?= $edit['nama_user'] ?>">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?= $edit['username'] ?>">
                <div class="form-group">
                    <label>Password Lama</label>
                    <input type="text" name="passlama" required class="form-control">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" class="form-control">
                    <small class="text-danger">Kosongkan saja jika tidak akan mengubah password</small>
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="owner">Owner</option>
                        <option value="kasir">Kasir</option>
                    </select>
                </div>
                <div class="text-right">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" name="btn-simpan" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require'layout_footer.php';
?> 