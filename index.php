<!DOCTYPE html>
<html>
<head>
  <?php include('rental/views/head.php'); ?>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

<?php
include('controller/DashboardController.php');

$dashboard = new DashboardController();
$dashboard->index();
?>

</div>
<?php include('rental/views/script.php'); ?>
</body>
</html>