<?php
// session_start();
include_once'/xampp/htdocs/e-commerce-website-da1/model/users.php';


if (isset($_SESSION['users'])) {
   header('location: index.php');
}
if (isset($_POST['login'])) {
    $error= array();
  $email = $_POST['email'];
  $password = $_POST['password'];

 if (empty($email)) {
   $error['email'] = " Email Is Require";
 }
 if (empty($password)) {
    $error['password'] = " Password Is Oblige";
  }
  
  if (empty($error)) {
  $user = checklogin_client($email,$password);
  if (is_array($user)) {
  
       $user_session_data = array(
        'user_id' => $user['user_id'],
        'name' => $user['name'],
        'email' => $user['email'],
        'phone' => $user['phone'],
        'address' => $user['address'],
        'image_url' => $user['image_url'],
        'role_id' => $user['role_id'],
       );
       $_SESSION['users']= $user_session_data;
       header('location:index.php');
    
    
  }else{
    $loginError = "Email or password is incorrect, please re-enter!";
  }
}}
  



?>
<div class="h-screen w-full flex items-center justify-center">
    <div class="bg-white w-[500px] rounded-lg p-5 mb-8 shadow-lg animate__animated animate__bounceInDown">
        <div class="flex items-center flex-col space-y-3">
            <img src="./assets/img/logo.svg" alt="logo" class="w-14 h-14">
            <h4 class="text-center uppercase font-bold text-2xl text-slate-900 ">Wellcome back</h4>
        </div>
        <form class="pt-6 mb-4 w-full" method="post" action="">
            <div class="flex flex-col space-y-6">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="form-input text-sm rounded-md w-full" id="email" name="email" type="text" placeholder="Username">
                    <?php echo !empty($error['email']) ? '<span class="text-red-500 text-sm">' . $error['email'] . '</span>' : ""  ?>
                </div>
                <div class="relative">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input class="form-input text-sm rounded-md w-full pr-[50px]" id="password" name="password" type="password">
                    <div class="toggle-show-password absolute cursor-pointer h-[40px] w-[40px] right-1 top-[41%]  flex items-center justify-center">
                        <i class="bi bi-eye "></i>
                    </div>
                    <?php echo !empty($error['password']) ? '<span class="text-red-500 text-sm">' . $error['password'] . '</span>' : ""  ?>
                </div>
                <button class="btn md:btn-md btn-sm capitalize bg-slate-700 hover:bg-slate-800 w-full text-white" type="submit" name="login">
                    Sign In
                </button>
                <?php echo !empty($loginError) ? '<span class="text-red-500 text-sm">' . $loginError . '</span>' : ""  ?>
            </div>
        </form>
        <p class="text-sm text-center">
            Dont't have an account? <a class="hover:underline" href="index.php?act=sign-up">Create now!</a>
        </p>
    </div>
</div>