<?php 
    session_start();
    session_destroy();
    Header("refresh:0;url=index.php");
?>