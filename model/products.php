<?php

function getall_product($keyword, $category_id, $brand_id)
{
    $sql = "SELECT *  FROM products WHERE 1";

    if (!empty($keyword)) {
        $sql .= ' and name like "%' . $keyword . '%"';
    }
    if (!empty($category_id)) {
        $sql .= " and category_id = '" . $category_id . "'";
    }
    if (!empty($brand_id)) {
        $sql .= " and brand_id = '" . $brand_id . "'";
    }
    return pdo_query($sql);
}

function getone_product($product_id)
{
    $sql = "SELECT * FROM products WHERE product_id=$product_id";
    return pdo_query_one($sql);
}

function insert_product($name, $descrition, $price, $quantity, $discount, $category_id, $brand_id, $is_featured)
{
    $sql = "INSERT INTO products (name, description, price, quantity, discount, category_id, brand_id, is_featured) VALUES(?,?,?,?,?,?,?,?) ";
    $pdo = pdo_execute($sql, $name, $descrition, $price, $quantity, $discount, $category_id, $brand_id, $is_featured);
    return $pdo->lastInsertId();
}

function update_product($product_id, $name, $description, $price, $quantity, $discount, $category_id, $brand_id, $is_featured)
{

    $sql = "UPDATE products SET name=?, description=?, price=?, quantity=?, discount=?, category_id=?, brand_id=?, is_featured=? where product_id = ?";
    pdo_execute($sql, $name, $description, $price, $quantity, $discount, $category_id, $brand_id, $is_featured, $product_id);
}

function delete_product($product_id)
{
    $sql = "DELETE FROM products WHERE product_id=?";
    pdo_execute($sql, $product_id);
}
