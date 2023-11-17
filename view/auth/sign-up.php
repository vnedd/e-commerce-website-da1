<div class="h-screen w-full flex items-center justify-center">
    <div class="bg-white w-[500px] rounded-lg p-5 shadow-lg animate__animated animate__bounceInDown">
        <div class="flex items-center flex-col space-y-4">
            <img src="./assets/img/logo.svg" alt="logo" class="w-14 h-14">
            <h4 class="text-center uppercase font-bold text-2xl text-slate-900 ">Create Account</h4>
        </div>
        <form class="x-8 pt-6 pb-8 mb-4 w-full" method="post" action="">
            <div class="flex flex-col space-y-6">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Username
                    </label>
                    <input class="form-input text-sm rounded-md w-full" id="name" name="name" type="text" placeholder="Ex: David">
                    <?php echo !empty($error['name']) ? '<span class="text-red-500 text-xs">' . $error['name'] . '</span>' : ""  ?>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="form-input text-sm rounded-md w-full" id="email" name="email" type="email" placeholder="example@domain.com">
                    <?php echo !empty($error['email']) ? '<span class="text-red-500 text-xs">' . $error['email'] . '</span>' : ""  ?>
                </div>
                <div class="relative">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input class="form-input text-sm rounded-md w-full pr-[50px]" id="password" name="password" type="password">
                    <div class="toggle-show-password absolute cursor-pointer h-[40px] w-[40px] right-1 top-[41%]  flex items-center justify-center">
                        <i class="bi bi-eye "></i>
                    </div>
                    <?php echo !empty($error['password']) ? '<span class="text-red-500 text-xs">' . $error['password'] . '</span>' : ""  ?>
                </div>
                <button class="btn md:btn-md btn-sm capitalize bg-slate-700 hover:bg-slate-800 w-full text-white" type="submit" name="sign-up">
                    Create account
                </button>
                <?php echo !empty($loginError) ? '<span class="text-red-500 text-sm">' . $loginError . '</span>' : ""  ?>
            </div>
        </form>
        <p class="text-sm text-center">
            Have already an account? <a class="hover:underline" href="index.php?act=login">Login</a>
        </p>
    </div>
</div>