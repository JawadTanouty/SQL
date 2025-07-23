<?php
session_start();
unset($_SESSION['CART_PRODUCTS']);
header("Location: cart.php");
exit;
