<?php
function insert_comment($content,$created_at, $product_id, $user_id)
{
  
    $sql = "INSERT INTO comments(content,created_at, product_id, user_id) VALUES (?,?,?,?)";
  
    return pdo_execute($sql, $content,$created_at,$product_id,$user_id);

}
?>