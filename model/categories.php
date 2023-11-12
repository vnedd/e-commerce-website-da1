<?php

function getall_category()
{
    $sql = "SELECT * FROM categories";
    return pdo_query($sql);
}

function getone_category($category_id)
{
    $sql = "SELECT * FROM categories WHERE category_id=$category_id";
    return pdo_query_one($sql);
}

function insert_category($name, $description, $parent_id)
{
    $sql = "INSERT INTO categories (name, description, parent_id) VALUES (?,?,?)";
    pdo_execute($sql, $name, $description, $parent_id);
}

function update_category($category_id, $name, $description, $parent_id = null)
{
    $sql = "UPDATE categories SET name=?, description=?, parent_id=? WHERE category_id=?";
    return pdo_execute($sql, $name, $description, $parent_id, $category_id);
}

function update_when_delete_parrent($parent_id)
{
    $sql = "UPDATE categories SET parent_id=NULL WHERE parent_id=$parent_id";
    pdo_execute($sql);
}

function delete_category($category_id)
{
    $sql = "DELETE FROM categories WHERE category_id=?";
    return pdo_execute($sql, $category_id);
}
