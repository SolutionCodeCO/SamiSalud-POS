<?php

class DashboardEmpleado extends sessionController{
    public function __construct(){
        parent:: __construct();
        error_log("controllers/dashboardEmpleado.php -> Inicio de dashboardEmpleado");
        error_log("===================================================");
    }

    function render(){
        $this->view->render('dashboard/dashboardEmpleado/index');
    }

   
}