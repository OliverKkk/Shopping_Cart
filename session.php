<?php
session_start();
unset($_)
session_destroy();
header("location:index.php");
?> 