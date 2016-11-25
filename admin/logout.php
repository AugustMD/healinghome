<?php
session_start();
unset($_SESSION['admin_is_login']);
unset($_SESSION['admin_id']);
unset($_SESSION['admin_name']);
unset($_SESSION['admin_phone']);
echo '<script>location.replace(document.referrer);</script>';
?>
