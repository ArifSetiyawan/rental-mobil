<?php
include('./rental/views/main_view.php');

class DashboardController{
    public function index() {
        $page = 'dashboard';
        $main = new main_view();
        $main->mainView($page);
    }
}
?>