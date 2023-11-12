<?php


function getall_role()
{
    $sql = "SELECT * FROM roles";
    return pdo_query($sql);
}
