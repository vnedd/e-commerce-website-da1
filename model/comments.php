<?php


function getall_comments()
{
    $sql = "SELECT * from comments order by comment_id desc";
    return pdo_query($sql);
}
function getone_comment($comment_id)
{
    $sql = "SELECT * from comments WHERE comment_id='$comment_id'";
    return pdo_query_one($sql);
}

function delete_comment($comment_id)
{
    $sql = "DELETE FROM comments WHERE comment_id='$comment_id'";
    pdo_execute($sql);
}

function deleteall_comment_of_parentId($parent_id)
{
    $sql = "DELETE FROM comments WHERE parent_id='$parent_id'";
    pdo_execute($sql);
}

function insert_comment($comment, $parent, $created_at, $user_id, $product_id)
{
    $sql = "INSERT INTO comments (content, parent_id, created_at, product_id, user_id) 
        VALUES(?,?,?,?,?)
    ";
    pdo_execute($sql, $comment, $parent, $created_at, $user_id, $product_id);
}

function getall_comment_by_productId($product_id)
{
    $sql = "SELECT * FROM comments WHERE product_id ='$product_id' and parent_id = 0 Order by comment_id desc";
    return pdo_query($sql);
}

function getall_comment_by_parentId($parent_id)
{
    $sql = "SELECT * FROM comments WHERE parent_id='$parent_id'";
    return pdo_query($sql);
}
