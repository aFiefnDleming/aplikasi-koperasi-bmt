<?php 
include 'config/config.php';

unset($_SESSION['username']);
echo "<script>window.location='".base_url('')."';</script>";
?>