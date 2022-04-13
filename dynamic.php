<?php
    $randomN = rand();
    setcookie("page", "dynamic"); //Persistent cookie
    setcookie("token", $randomN, time() + 3600, "/"); //Temp cookie

    if(isset($_GET["page"])){
        switch($_GET["page"]){
            case 'dynamic1':
                include('includes/inc_dynamic1.php');
                break;
            case 'dynamic2':
                include('includes/inc_dynamic2.php');
                break;
            default:
                include('includes/inc_dynamic1.php');
                break;
        }
    }
?>