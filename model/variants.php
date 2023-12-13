
<?php

function insert_variant($name, $price, $quantity, $product_id)
{
    $sql = "INSERT INTO variants (variant_name, price, quantity, product_id) VALUES (?,?,?,?)";
    pdo_execute($sql, $name, $price, $quantity, $product_id);
}

function getall_variant_by_productId($product_id)
{
    $sql = "SELECT * FROM variants WHERE product_id=?";
    return pdo_query($sql, $product_id);
}


function getone_variant($variant_id)
{
    $sql = "SELECT * FROM variants WHERE variant_id=?";
    return pdo_query_one($sql, $variant_id);
}


function deleteall_variant_by_id_product($product_id)
{
    $sql = 'DELETE FROM variants WHERE product_id=?';
    pdo_execute($sql, $product_id);
}

// giảm số lượng sản phẩm xuống khi người dùng nhận hàng thành công

function descrease_quantity_when_order_delivered($variant_id, $descrease)
{
    $sql = "UPDATE variants SET quantity = quantity - '$descrease' WHERE variant_id='$variant_id'";
    pdo_execute($sql);
}
