<?php

function getall_brand()
{
    $sql = "SELECT * FROM brand";
    return pdo_query($sql);
}

function getone_brand($brand_id)
{
    $sql = "SELECT * FROM brand WHERE brand_id=$brand_id";
    return pdo_query_one($sql);
}

function insert_brand($name, $description)
{
    $sql = "INSERT INTO brand (name, description) VALUES (?,?)";
    return pdo_execute($sql, $name, $description);
}

function update_brand($brand_id, $name, $description)
{
    $sql = "UPDATE brand SET name=?, description=? WHERE brand_id=?";
    return pdo_execute($sql, $name, $description, $brand_id);
}

function delete_brand($brand_id)
{
    $sql = "DELETE FROM brand WHERE brand_id=?";
    return pdo_execute($sql, $brand_id);
}
