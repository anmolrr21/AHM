<?php
session_start();
session_destroy();
header("location:/AHM/adminLogin.php?error=false");
?>