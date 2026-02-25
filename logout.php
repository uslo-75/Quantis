<?php
session_start();
session_destroy();
header("Location: /Quantis/pages/login.php");
exit;
