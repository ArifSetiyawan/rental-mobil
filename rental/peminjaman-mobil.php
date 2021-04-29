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
  ?>
    <div class="content-wrapper">
        <div class="content-header">
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="invoice.php" method="post">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Transaksi peminjaman mobil</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Form Biodata</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" class="form-control" id="nama" name="nama">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="umur">Umur</label>
                                                <input type="text" class="form-control" name="umur" id="umur" onchange="validateUmur()">
                                            </div>
                                            <div class="form-group">
                                                <label for="ktp">No KTP</label>
                                                <input type="text" class="form-control" name="ktp" id="ktp">
                                            </div>
                                            <div class="form-group">
                                                <label for="telfon">No Telefon</label>
                                                <input type="text" class="form-control" name="telfon" id="telfon">
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <textarea class="form-control" name="alamat" id="alamat"></textarea>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <h3 class="card-title">Peminjaman Mobil</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="kapasitas">Kapasitas</label>
                                                <input type="text" class="form-control" name="kapasitas" id="kapasitas" onchange="hargaKapasitas()">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Harga Kapasitas / Hari</label>
                                                <input type="text" class="form-control" name="harga" readonly id="hrgKapasitas">
                                            </div>
                                            <div class="form-group">
                                                <label for="durasi">Durasi Peminjaman</label>
                                                <input type="text" class="form-control" name="durasi" id="durasi" onchange="validatePinjam()">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-secondary">
                                        <div class="card-header">
                                            <h3 class="card-title">Grand Total</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="discount">Sub Total</label>
                                                <input type="text" class="form-control" readonly name="subtotal" id="subtotal">
                                            </div>
                                            <div class="form-group">
                                                <label for="discount">Discount</label>
                                                <input type="text" class="form-control" readonly name="discount"  id="discount">
                                            </div>
                                            <div class="form-group">
                                                <label for="metode">Metode Pembayaran</label>
                                                <select class="form-control" id="mBayar" name="mBayar" >
                                                    <option value=''>-- Silakan Pilih Metode Pembayaran --</option>
                                                    <option value="Cash">Cash</option>
                                                    <option value="Non Tunai">Non Tunai</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="discount">Total Bayar</label>
                                                <input type="text" class="form-control" name="total" readonly id="totalbayar">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
  <?php include('./footer.php'); ?> 
</div>
<?php include('./script.php'); ?>
<script>
    function validateUmur(){
        if ($('#umur').val() < 18) {
            alert('Maaf umur anda belum mencukupi')
            $('#ktp').prop( "disabled", true );
            $('#telfon').prop( "disabled", true );
            $('#alamat').prop( "disabled", true );
            $('#kapasitas').prop( "disabled", true );
            $('#durasi').prop( "disabled", true );
        }
        else {
            $('#ktp').prop( "disabled", false );
            $('#telfon').prop( "disabled", false );
            $('#alamat').prop( "disabled", false );
            $('#kapasitas').prop( "disabled", false );
            $('#durasi').prop( "disabled", false );
        }
    }
    function validatePinjam(){
        if ($('#durasi').val() > 14) {
            alert("Mohon maaf "+$('#nama').val()+" , untuk peminjaman lebih dari 14 hari dimohon datang langsung untuk detail lebih lanjutnya")
        } else {
            var subTotal = $('#durasi').val() * $('#hrgKapasitas').val();
            $('#subtotal').val(subTotal);
            if ($('#durasi').val() > 6) {
                var diskon = ($('#durasi').val() * $('#hrgKapasitas').val()) * 0.05;
                $('#discount').val(diskon);
            } else {
                var diskon = 0;
                $('#discount').val(diskon);
            }
        }
        $('#mBayar').change(function(){
        if ($('#mBayar').val() == 'Cash') {
            var total = ($('#durasi').val() * $('#hrgKapasitas').val()) - $('#discount').val();
        } else {
            var total = ($('#durasi').val() * $('#hrgKapasitas').val()) - $('#discount').val() + 6500;
        }
        $('#totalbayar').val(total);
    })
    }
    
    function hargaKapasitas() {
        if ($('#kapasitas').val() <= 4) {
            var hargaKap = 500000;
            $('#hrgKapasitas').val(hargaKap);
        } else if ($('#kapasitas').val() <= 7) {
            var hargaKap = 750000;
            $('#hrgKapasitas').val(hargaKap);
        } else if ($('#kapasitas').val() <= 12) {
            var hargaKap = 1050000;
            $('#hrgKapasitas').val(hargaKap);
        } else {
            alert('Maaf anda telah melebihi kapasitas')
        }
    }
    
</script>
</body>
</html>