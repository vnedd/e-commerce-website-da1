<?php

function getone_order($order_id)
{
    $sql = "SELECT * FROM orders WHERE order_id='$order_id'";
    return pdo_query_one($sql);
}

function getPayment_method()
{
    $sql = "SHOW COLUMNS FROM orders LIKE 'payment_methods'";
    $paymentMethod =  pdo_query_one($sql);
    $enum_str = $paymentMethod['Type'];
    preg_match("/\((.*?)\)/", $enum_str, $matches);
    $enum_values = explode(",", $matches[1]);
    return $enum_values;
}

function insert_order($username, $email, $phone, $order_note, $createdAt, $totalAmount, $address, $shipingType, $payment_method, $payment_status, $order_status, $user_id)
{
    $sql = "INSERT INTO orders (order_username, order_user_email, order_tel, order_note, created_at, total_amount, shipping_address, shipping_type_id, payment_methods, payment_status, order_status, user_id )
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
    return pdo_execute($sql, $username, $email, $phone, $order_note, $createdAt, $totalAmount, $address, $shipingType, $payment_method, $payment_status, $order_status, $user_id);
}

/// order details
function insert_order_details($variant_id, $product_id, $product_name, $image,  $quantity, $price_per_unit, $order_id)
{
    $sql = "INSERT INTO order_details (variant_id, product_id,product_name, image, quantity, price_per_unit, order_id) VALUES(?,?,?,?,?,?,?)";
    pdo_execute($sql, $variant_id, $product_id, $product_name, $image,  $quantity, $price_per_unit, $order_id);
}

function getall_order_details_by_orderId($order_id)
{
    $sql = "SELECT * FROM order_details WHERE order_id='$order_id'";
    return pdo_query($sql);
}

function update_paymentStatus_when_payment_succeeded($order_id)
{
    $sql = "UPDATE orders SET payment_status = 'Succeeded' WHERE order_id = '$order_id'";
    pdo_execute($sql);
}
