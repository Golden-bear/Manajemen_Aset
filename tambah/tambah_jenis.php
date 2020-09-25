<?php
session_start();
if(!isset($_SESSION['login']))
  {
    header ("location:../login.php");
  }
else
  {
    error_reporting(0);
    $simpan=$_REQUEST['save'];
?>
<!DOCTYPE html>
<html>
<?php
include "../main/header.php";
?>
  
<body class="hold-transition skin-blue sidebar-mini">
  <div class="content-wrapper">
    <section class="content-header">
      <h1> Form Tambah Jenis Asset</h1>
      <ol class="breadcrumb">
        <li><a href="../index.php"><i class="fa fa-home"></i> Home</a></li>
    <li>Input Asset</li>
        <li class="active">Tambah Jenis Asset</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">

      
            <div class="box-body">
           <form method="POST" action="simpan_jenis.php" enctype="multipart/form-data" role="form">
          <div class="form-group">
            <label> Nama Jenis</label>
            <input type="text" name="jenis" class="form-control" required placeholder="Enter ...">
          </div>
               
        <div class="row">
          <div class="col-xs-8"></div>
          <div class="col-xs-4">
            <button type="submit" name="simpan" value= "simpan" class="btn btn-primary btn-block btn-flat">SIMPAN</button>
          </div>
          </div>
      </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script type="text/javascript">
    <?php 
      if($simpan!=NULL)
      {
        if($simpan=='success'){?>
          alert("Data Berhasil Disimpan!");
     <?php }
        elseif ($simpan=='redudansi') {?>
          alert("Data Telah Tersedia, Harap Masukkan Data Lain!");
        <?php }
        else{?>
          alert("Data Gagal Disimpan!");
      <?php }
      } ?>
  </script>
</body>
<?php
  include "../main/footer.php";
?>
</html>
<?php } ?>