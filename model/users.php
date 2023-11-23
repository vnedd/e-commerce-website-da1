<?php

function getall_user()
{
    $sql = "SELECT * FROM users";
    return pdo_query($sql);
}
function getone_user($user_id)
{
    $sql = "SELECT * FROM users WHERE user_id=?";
    return pdo_query_one($sql, $user_id);
}

function insert_user($name, $email, $password, $phone = "", $address = "", $image_url = "", $role_id = 2)
{
    $sql = "INSERT INTO users (name, email, password, phone, address, image_url,role_id) VALUES (?,?,?,?,?,?,?)";
    pdo_execute($sql, $name, $email, $password, $phone, $address, $image_url, $role_id);
}

function update_user($user_id, $name, $email, $password, $phone, $address, $image_url, $role_id)
{
    $sql = "UPDATE users SET name=?, email=?, password=?, phone=?, address=?, image_url=?, role_id=? WHERE user_id=?";
    pdo_execute($sql, $name, $email, $password, $phone, $address, $image_url, $role_id, $user_id);
}

function delete_user($user_id)
{
    $sql = "DELETE FROM users WHERE user_id=?";
    pdo_execute($sql, $user_id);
}

function checklogin_admin($email, $password)
{
    $sql = 'SELECT * FROM users WHERE email=? AND password=? AND role_id=1';
    $user =  pdo_query_one($sql, $email, $password);
    return $user;
}


/// register client side

function checksignup_client($email)
{
    $sql = "SELECT * FROM users WHERE email=?";
    $user = pdo_query_one($sql, $email);
    return $user;
}

function checklogin_client($email, $password)
{
    $sql = 'SELECT * FROM users WHERE email=? AND password=? AND role_id=2';
    $user =  pdo_query_one($sql, $email, $password);
    return $user;
}
function getall_user_lk_fk($keyword){
    $sql = "SELECT * FROM users where 
    users.name like '%$keyword%' 
    Group by users.name
     ";
     return pdo_query($sql);
 
}
