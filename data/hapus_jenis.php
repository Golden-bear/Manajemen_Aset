<?php
session_start();
if(!isset($_SESSION['login']))
  {
    header ("location:../login.php");
  }
else
  {
    error_reporting(0);
    $deleted=$_REQUEST['deleted'];
?>
<!DOCTYPE html>
<html>
<?php
include "../main/header.php";
?>
  
<body class="hold-transition skin-blue sidebar-mini">
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Form Hapus Jenis Asset</h1>
      <ol class="breadcrumb">
        <li><a href="../index.php"><i class="fa fa-home"></i> Home</a></li>
        <li>Data Asset</li>
        <li class="active">Hapus Jenis Asset</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-body">
           <form method="POST" action="proses_hapus_jenis.php" enctype="multipart/form-data" role="form">
          <div class="form-group">
            <label> Nama Jenis Asset</label>
            <select class="form-control" name="jenis">
              <?php
                include"../koneksi.php";
                $sql = "SELECT * FROM jenis_asset ORDER BY jenis ASC";
                $query = mysqli_query ($connect, $sql);
                while($jenis=mysqli_fetch_array($query))
                {
                  echo "<option value=$jenis[id_jenis]>$jenis[jenis]</option>";        
                }
              ?>
            </select>
          </div>
               
        <div class="row">
          <div class="col-xs-8"></div>
          <div class="col-xs-4">
            <button type="submit" name="simpan" value= "simpan" class="btn btn-primary btn-block btn-flat">HAPUS</button>
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
      if($deleted!=NULL)
      {
        if($deleted=='success'){?>
          alert("Data Berhasil Dihapus!");
     <?php }
        else{?>
          alert("Data Gagal Dihapus!");
      <?php }
      } ?>
  </script>
</body>
<?php
  include "../main/footer.php";
?>
</html>
<?php } ?>