<div class="h-screen w-full flex items-center justify-center">
    <div class="bg-white w-[500px] rounded-lg p-5 shadow-lg animate__animated animate__bounceInDown">
        <div class="flex items-center flex-col space-y-4">
            <img src="./assets/img/logo.svg" alt="logo" class="w-14 h-14">
            <h4 class="text-center uppercase font-bold text-2xl text-slate-900 ">Create Account</h4>
        </div>
        <form class="mb-4 w-full" id="sign-up-form" method="post" action="index.php?act=sign-up">
            <div class="flex flex-col space-y-6">
                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Username
                    </label>
                    <input class="form-input ring-0 outline-none text-sm rounded-md w-full" id="name" name="name" type="text" placeholder="Ex: David">
                    <span class="form-message text-xs text-red-600"></span>
                </div>
                <div class="form-group">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="form-input ring-0 outline-none text-sm rounded-md w-full" id="email" name="email" type="email" placeholder="example@domain.com">
                    <span class="form-message text-xs text-red-6000"></span>
                </div>
                <div class="relative form-group">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <div class="relative">
                        <input class="form-input ring-0 outline-none text-sm rounded-md w-full pr-[50px]" id="password" name="password" type="password">
                        <div class="toggle-show-password absolute cursor-pointer h-[40px] w-[40px] right-1 top-[0%]  flex items-center justify-center">
                            <i class="bi bi-eye "></i>
                        </div>
                    </div>
                    <span class="form-message text-xs text-red-600 relative leading-3"></span>
                </div>
                <button class="btn md:btn-md btn-sm capitalize bg-slate-700 hover:bg-slate-800 w-full text-white btn-disabled" type="submit" name="sign-up" id="sign-up">
                    Create account
                </button>
                <?php echo !empty($registerError) ? '<span class="text-red-500 text-sm">' . $registerError . '</span>' : ""  ?>
            </div>
        </form>
        <p class="text-sm text-center">
            Have already an account? <a class="hover:underline" href="index.php?act=login">Login</a>
        </p>
    </div>
</div>

<script>
    const inputEmail = document.getElementById('email');
    const inputName = document.getElementById('name');
    const inputPassword = document.getElementById('password');
    const signUpBtn = document.getElementById('sign-up');
    const signUpForm = document.getElementById('sign-up-form')
    const togglePassword = document.querySelector('.toggle-show-password')

    inputEmail.addEventListener('input', function() {
        const isValid = validateEmail(this.value)
        toggleShowFormMessage(isValid, this, "Valid email!", "Invalid email!");
        checkFormValidity()

    })

    inputName.addEventListener('input', function() {
        const isValid = validateName(this.value)
        toggleShowFormMessage(isValid, this, "Valid username!", "Invalid username!");
        checkFormValidity()

    })

    inputPassword.addEventListener('input', function() {
        const isValid = validatePassword(this.value)
        toggleShowFormMessage(isValid, this, "Valid pasword!", "Minimum password is 6 characters, contains at least 1 uppercase letter, number and special character");
        checkFormValidity()
    })


    function toggleShowFormMessage(isValid, elm, suc, err) {
        const parent = getParent(elm, '.form-group');
        const formMessage = parent.querySelector('.form-message');
        if (!isValid) {
            formMessage.innerText = err
            formMessage.classList.add('text-red-500')
            formMessage.classList.remove('text-green-500')
        } else {
            formMessage.innerText = suc
            formMessage.classList.add('text-green-500')
            elm.classList.add('border-violet-500')
            formMessage.classList.remove('text-red-500')

        }
    }

    function validateEmail(email) {
        const regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}/g;
        return regex.test(email)
    }

    function validateName(name) {
        const regex = /^[A-Za-z ]+$/;
        return regex.test(name)
    }

    function validatePassword(pass) {
        const regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{6,}$/g
        return regex.test(pass)
    }

    function checkFormValidity() {
        if (validateEmail(inputEmail.value) && validateName(inputName.value) && validatePassword(inputPassword.value)) {
            signUpBtn.classList.remove('btn-disabled')
            console.log(signUpBtn)
        } else {
            signUpBtn.classList.add('btn-disabled')
        }
    }

    togglePassword.addEventListener('click', () => {
        if (inputPassword.type === "password") {
            inputPassword.type = 'text';
            togglePassword.innerHTML = `<i class="bi bi-eye-slash text-slate-700"></i>`
        } else {
            inputPassword.type = 'password'
            togglePassword.innerHTML = `<i class="bi bi-eye"></i>`
        }
    })

    signUpBtn.addEventListener('click', function() {



    })
</script>