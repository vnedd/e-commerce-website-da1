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

function getone_variant_with_product_infor($variant_id)
{
}

function deleteall_variant_by_id_product($product_id)
{
    $sql = 'DELETE FROM variants WHERE product_id=?';
    pdo_execute($sql, $product_id);
}
