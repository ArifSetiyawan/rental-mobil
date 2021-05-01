<!DOCTYPE html>
<html>
<head>
  <?php include('./head.php'); ?>
</head>
<style>
    .card-footer {
        align-self: center;
    }
</style>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php 
    // include('././config/conn.php');
    session_start();
    include('./header.php'); 
    include('./sidebar.php'); 
    
    //proses PHP
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $umur = $_POST['umur'];
    $ktp = $_POST['ktp'];
    $telfon = $_POST['telfon'];
    $kapasitas = $_POST['kapasitas'];
    $harga = $_POST['harga'];
    $durasi = $_POST['durasi'];
    $subtotal = $_POST['subtotal'];
    $discount = $_POST['discount'];
    $mBayar = $_POST['mBayar'];
    $Badmin = $_POST['Badmin'];
    $total = $_POST['total'];
    $orderid = 'BSI-' . date('d/m/Y');
    $tanggal = date('d/m/Y');
    $tenggat = date("d F Y",strtotime ('+4 days',strtotime($tanggal)));
  ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Invoice</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Peminjaman Mobil</a></li>
                    <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-12">
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                        <h4>
                            <i class="fa fa-graduation-cap"></i> UBSI MARGONDA
                            <small class="float-right">Date: <?php echo date('d/m/Y') ?></small>
                        </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                        From
                        <address>
                            <strong>12.2D.01 SI</strong><br>
                            Margonda<br>
                            Jl. Salak, Beiji Depok<br>
                            Phone: (804) 123-5432<br>
                            Email: SI.margonda@gmail.com
                        </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                        To
                        <address>
                            <strong><?php echo $nama ?></strong><br>
                            <?php echo $alamat ?><br>
                            Phone: <?php echo $telfon ?><br>
                            Email: <?php echo $email ?>
                        </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                        <b>Invoice #007612</b><br>
                        <br>
                        <b>Order ID:</b> <?php echo $orderid ?><br>
                        <b>Payment Due:</b> <?php echo $tenggat ?><br>
                        <b>Account:</b> 968-34567
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No KTP</th>
                                <th>Kapasitas Mobil</th>
                                <th>Durasi Peminjaman</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><?php echo $nama ?></td>
                                <td><?php echo $email ?></td>
                                <td><?php echo $ktp ?></td>
                                <td><?php echo $kapasitas ?> Orang</td>
                                <td><?php echo $durasi ?> Hari</td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6">
                        <p class="lead">Metode Pembayaran : <b><?php echo $mBayar ?></b></p>
                        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                            Notes :
                        </p>
                        <p class="text-muted well well-sm shadow-none">
                            Jika anda memilih Metode Non Tunai akan ada tambahan biaya admin
                        </p>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                        <p class="lead">Amount Due <?php echo date('d/m/Y') ?></p>

                        <div class="table-responsive">
                            <table class="table">
                            <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td><?php echo $subtotal ?></td>
                            </tr>
                            <tr>
                                <th>Discount</th>
                                <td><?php echo $discount ?></td>
                            </tr>
                            <tr>
                                <th>Biaya Admin:</th>
                                <td><?php 
                                if ($Badmin != 0) {
                                    echo $Badmin;
                                } else {
                                    echo '-';
                                }?></td>
                            </tr>
                            <tr>
                                <th>Total Bayar:</th>
                                <td><?php echo $total ?></td>
                            </tr>
                            </table>
                        </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                        <!-- <a href="invoice.php" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> -->
                        <button onclick="history.go(-1);" class="btn btn-secondary float-right" style="margin-left: 5px;">
                            <i class="fa fa-chevron-left"></i> Kembali
                        </button>
                        <button type="button" class="btn btn-success float-right"><i class="fa fa-envelope"></i> Send to Email
                        </button>
                        <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                            <i class="fas fa-download"></i> Generate PDF
                        </button>
                       
                        </div>
                    </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
  <?php include('./footer.php'); ?> 
</div>
<?php include('./script.php'); ?>
</body>
</html>
