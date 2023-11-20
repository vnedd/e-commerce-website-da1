<?php
function insert_comment($comment_id,$content,$parrent_id,$created_at,$product_id,$user_id){
$sql = " INSERT INTO comments(comment_id,content,parrent_id,created_at,product_id,user_id) VALUE (?,?,?,?,?,?) ";
pdo_execute($sql, $comment_id,$content,$parrent_id,$created_at,$product_id,$user_id);
}
function getall_comment($idproduct){
    $sql = "
            SELECT comments.comment_id, comments.content, users.user_id FROM `comments` 
            LEFT JOIN users ON comments.user_id = users.user_id
            LEFT JOIN products ON comments.product_id = products.product_id
            WHERE products.product_id = $idproduct;
        ";
}

?>