<?php
session_start();

if(isset($_SESSION['User']) || isset($_SESSION['qc']) || isset($_SESSION['cs']))
{
    session_destroy();
    header("Location:/project/account/inpage.php");
}

?>
