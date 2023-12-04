<?php
function getall_posts()
{
    $sql = "SELECT * FROM posts";
    return pdo_query($sql);
}

function insert_posts($title,$image_url="" , $subtitle, $content,$created_at,$user_id=10)
{
    $sql = "INSERT INTO posts (title,image_url, sub_title, content,created_at,user_id) VALUES (?,?,?,?,?,?)";
  
    return pdo_execute($sql, $title,$image_url, $subtitle, $content,$created_at,$user_id);

}
function getone_post($post_id)
{
    $sql = "SELECT * FROM posts WHERE post_id=$post_id";
    return pdo_query_one($sql);
}
function update_posts($title, $subtitle, $content,$created_at,$user_id,$post_id)
{
    $sql = "UPDATE posts SET title=?,sub_title=?,content=?,created_at=?,user_id=?  WHERE post_id=?";
    return pdo_execute($sql, $title, $subtitle, $content,$created_at,$user_id,$post_id);
}

function delete_post($post_id)
{
    $sql = "DELETE FROM posts WHERE post_id=?";
    return pdo_execute($sql, $post_id);
}

?>