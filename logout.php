<?php
session_start();
unset($_SESSION['is_login']);
unset($_SESSION['id']);
unset($_SESSION['name']);
unset($_SESSION['phone']);
echo '<script>location.replace(document.referrer);</script>';
?>
