<?php
session_start();
include "../../model/pdo.php";
include "../../model/comments.php";
include "../../model/users.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $quantity = $_POST['quantity'];
    $carts = $_SESSION['carts'];
    $totalPrice = 0;
    foreach ($carts as $key => $cart) {
        if ($key == $id) {
            $_SESSION['carts'][$key]['quantity'] = $quantity;
        }
    }
    foreach ($_SESSION['carts'] as $cart) {
        extract($cart);
        $totalPrice += (int)($price) * (int)($quantity);
    }
    echo json_encode(['success' => true, 'totalPrice' => $totalPrice, 'carts' => $_SESSION['carts']]);
}
