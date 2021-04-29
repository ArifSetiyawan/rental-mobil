
<!DOCTYPE html>
<html>
<head>
  <?php include('./head.php'); ?>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php 
    // include('../../config/conn.php');
    session_start();
    include('./header.php'); 
    include('./sidebar.php'); 
  ?>
    <div class="content-wrapper">
        <div class="content-header">
        </div>
        <section class="content">
            <div class="container-fluid">
                <marquee behavior="alternate"><h2 style="color: black;"><b>Selamat datang di Rental Mobil UBSI MARGONDA</b></h2></marquee>
            </div>
        </section>
        <!-- /.content -->
    </div>
 
  <?php include('./footer.php'); ?> 
</div>
<?php include('./script.php'); ?>
</body>
</html>