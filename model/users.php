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
// finusser
function getall_user_lk_fk($keyword){
    $sql = "SELECT * FROM users where  1= 1";
    if (!empty($keyword)) {
        $sql .= " AND name LIKE '%" . $keyword . "%'";
    }

    
     return pdo_query($sql);
 
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

function sendMail($email) {
    $sql="SELECT * FROM users WHERE email='$email'";
    $account = pdo_query_one($sql);
    if ($account != false) {
        sendMailPass($email, $account['name'], $account['password']);
       
    } 
}

function sendMailPass($email, $username, $pass) {
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = '5c3bab177abd9b';                     //SMTP username
        $mail->Password   = '3c1bc33d9c630f';                               //SMTP password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('duanmau@example.com', 'duanmau');
        $mail->addAddress($email, $username);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Nguoi dung quen mat khau';
        $mail->Body    = 'Mau khau cua ban la' .$pass;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}