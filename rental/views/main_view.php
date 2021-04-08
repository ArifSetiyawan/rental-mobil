<?php
class main_view {
    public function mainView($page){
        include('header.php');
        include('sidebar.php');
        echo"
        <div class='content-wrapper'>
        <!-- Content Header (Page header) -->
        <div class='content-header'>
        <div class='container-fluid'>
            
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class='content'>
        <div class='container-fluid'>
        ";
        if ($page == 'dashboard') {
           include('dashboard/index.php');
        } 
        
        echo"
        </div><!-- /.container-fluid -->
        </section>
        </div>
        ";
        include('footer.php');
        

    }        
}

?>