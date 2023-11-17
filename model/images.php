<?php

function getall_image_by_productId($product_id)
{
    $sql = "SELECT * FROM images WHERE product_id='$product_id'";
    return pdo_query($sql);
}

function deleteall_image_by_id_product($product_id)
{
    $sql = 'DELETE FROM images WHERE product_id=?';
    pdo_execute($sql, $product_id);
}

function insert_image($image_url, $product_id)
{
    $sql = "INSERT INTO images (image_url, product_id)
    VALUES (?,?)";
    pdo_execute($sql, $image_url, $product_id);
}
