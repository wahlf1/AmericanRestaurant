<?php
    //Creating get current year
    function get_current_year(){
        echo date("Y");
    }
?>

<footer class="navbar-dark bg-dark">
    <p>Created by: Walter Ahlf</p>
    <p>CS 485 | Copyright &copy; <?php get_current_year(); ?></p>
</footer>