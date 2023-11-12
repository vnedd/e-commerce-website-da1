<?php
session_start();
include '../model/pdo.php';
include '../model/users.php';

if (isset($_SESSION['admin'])) {
    header('location: index.php');
}

if (isset($_POST['login'])) {
    $error = array();
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email)) {
        $error['email'] = "Email is required";
    }
    if (empty($password)) {
        $error['password'] = "Password is required";
    }

    if (empty($error)) {
        $user = checklogin_admin($email, $password);
        if (is_array($user)) {
            if ($user['role_id'] == 1) {
                $user_session_data = array(
                    'user_id' => $user['user_id'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'phone' => $user['phone'],
                    'address' => $user['address'],
                    'image_url' => $user['image_url'],
                    'role_id' => $user['role_id'],
                );
                $_SESSION['admin'] = $user_session_data;
                header("Location:index.php");
            } else {
                $loginError = "You are not an admin";
            }
        } else {
            $loginError = "Email or password is incorrect, please re-enter!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dự án 1</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
    <link href="https://unpkg.com/@tailwindcss/forms@0.2.1/dist/forms.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="h-screen w-full flex items-center justify-center bg-neutral-100 bg-[url(../assets/img/sign-in-bg.svg)] bg-no-repeat bg-top bg-cover">
        <div class="bg-white w-[500px] rounded-lg py-8 px-6 shadow-lg animate__animated animate__bounceInDown">
            <h4 class="text-center font-bold text-3xl text-slate-900 ">Login to admin</h4>
            <form class="x-8 pt-6 pb-8 mb-4 w-full" method="post" action="">
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
            <p class="text-center text-gray-500 text-xs">
                &copy;2023 Admin. All rights reserved.
            </p>
        </div>
    </div>
</body>

</html>

<script>
    const togglePassword = document.querySelector('.toggle-show-password')
    const inputPassword = document.getElementById('password');

    togglePassword.addEventListener('click', () => {
        if (inputPassword.type === "password") {
            inputPassword.type = 'text';
            togglePassword.innerHTML = `<i class="bi bi-eye-slash text-slate-700"></i>`
        } else {
            inputPassword.type = 'password'
            togglePassword.innerHTML = `<i class="bi bi-eye"></i>`
        }
    })
</script>