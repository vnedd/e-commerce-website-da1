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
                    <input class="form-input text-sm rounded-md w-full" id="email" name="email" type="text" placeholder="Email">
                    <?php echo !empty($error['email']) ? '<span class="text-red-500 text-xs">' . $error['email'] . '</span>' : ""  ?>

                    <button class="btn md:btn-md btn-sm capitalize bg-slate-700 hover:bg-slate-800 w-full text-white mt-5" type="submit" name="sendMail">
                        Confirm
                    </button>
                    <?php echo !empty($loginError) ? '<span class="text-red-500 text-xs">' . $loginError . '</span>' : ""  ?>
                </div>
                <?php if (isset($sendMailMess) && $sendMailMess != '') {
                    echo $sendMailMess;
                } ?>
        </form>
        <p class="text-sm text-center">
            Dont't have an account? <a class="hover:underline" href="index.php?act=sign-up">Create now!</a>
        </p>
    </div>
</div>