<?php

function getall_user()
{
    $sql = "SELECT * FROM users";
    return pdo_query($sql);
}
function getall_user_user($user_id)
{
    $sql = "SELECT * FROM users WHERE user_id = ?";
    return pdo_query_one($sql, $user_id);
}
function getone_user($user_id)
{
    $sql = "SELECT * FROM users WHERE user_id=?";
    return pdo_query_one($sql, $user_id);
}

function insert_user($name, $email, $password, $phone, $address, $image_url, $role_id = 2)
{
    $sql = "INSERT INTO users (name, email, password, phone, address, image_url,role_id) VALUES (?,?,?,?,?,?,?)";
    pdo_execute($sql, $name, $email, $password, $phone, $address, $image_url, $role_id);
}
function insert_user_signup($name, $email, $password, $role_id = 2)
{
    $sql = "INSERT INTO users (name, email, password,role_id) VALUES (?,?,?,?)";
    pdo_execute($sql, $name, $email, $password, $role_id);
}
function  isEmailRegistered($email){
    $sql = "SELECT * FROM users WHERE email=?";
    $user = pdo_query_one($sql, $email);
    return $user;
    
}
// function emailValid($email)
// {
//     return (bool)preg_match ("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $email);
// }

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
    $sql = 'SELECT * FROM users WHERE email=? AND password=? AND role_id = 1 ';
    $user =  pdo_query_one($sql, $email, $password);
    return $user;
}

function checklogin_client($email, $password)
{
    $sql = 'SELECT * FROM users WHERE email=? AND password=? AND role_id = 2 ';
    $user =  pdo_query_one($sql, $email, $password);
    return $user;
}

/// register client side