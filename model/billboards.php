<?php

function getall_billboard()
{
    $sql = "SELECT * FROM billboard";
    return pdo_query($sql);
}

function getone_billboard($billboard_id)
{
    $sql = "SELECT * FROM billboard WHERE billboard_id=$billboard_id";
    return pdo_query_one($sql);
}

function insert_billboard($title, $subtitle, $image_url)
{
    $sql = "INSERT INTO billboard (title, subtitle, image_url) VALUES (?,?,?)";
    return pdo_execute($sql, $title, $subtitle, $image_url);
}

function update_billboard($billboard_id, $title, $subtitle, $image_url)
{
    $sql = "UPDATE billboard SET title=?, subtitle=?, image_url=? WHERE billboard_id=?";
    return pdo_execute($sql, $title, $subtitle, $image_url, $billboard_id);
}

function delete_billboard($billboard_id)
{
    $sql = "DELETE FROM billboard WHERE billboard_id=?";
    return pdo_execute($sql, $billboard_id);
}
