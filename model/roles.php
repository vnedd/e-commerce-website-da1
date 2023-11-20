<?php


function getall_role()
{
    $sql = "SELECT * FROM roles ";
    return pdo_query($sql);
}
function getall_role_user()
{
    $sql = "SELECT * FROM roles where role_id = 2 ";
    return pdo_query($sql);
}