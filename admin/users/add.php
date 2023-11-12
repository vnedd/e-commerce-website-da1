<div>
    <div class="flex items-center justify-between border-b border-neutral-300 pb-5">
        <div class="heading">
            <h4 class="font-semibold text-3xl ">Add users</h4>
            <p class="text-neutral-500 mt-1">Add new user</p>
        </div>
    </div>
    <div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="preview-image mt-2"></div>
            <div class="flex flex-col space-y-2 w-1/2 my-6">
                <label class="font-semibold" for="image_url">Upload image</label>
                <input class="image-upload p-2 bg-neutral-100 rounded-md cursor-pointer" id="image_url" name="image_url" type="file">
                <?php echo !empty($error['image_url']) ? '<span class="text-red-500 text-sm">' . $error['image_url'] . '</span>' : ""  ?>
            </div>
            <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-4">
                <div class="flex flex-col space-y-2">
                    <label for="name" class="font-semibold">Username</label>
                    <input type="text" class="form-input rounded text-slate-900" name="name" id="name" placeholder="Example: wellcome halloween" />
                    <?php echo !empty($error['name']) ? '<span class="text-red-500 text-sm">' . $error['name'] . '</span>' : ""  ?>
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="email" class="font-semibold">Email</label>
                    <input type="email" class="form-input rounded text-slate-900" name="email" id="email" />
                    <?php echo !empty($error['email']) ? '<span class="text-red-500 text-sm">' . $error['email'] . '</span>' : ""  ?>
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="password" class="font-semibold">Password</label>
                    <input type="password" class="form-input rounded text-slate-900" name="password" id="password" />
                    <?php echo !empty($error['password']) ? '<span class="text-red-500 text-sm">' . $error['password'] . '</span>' : ""  ?>
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="phone" class="font-semibold">Phone</label>
                    <input type="tel" class="form-input rounded text-slate-900" name="phone" id="phone" />
                </div>
            </div>
            <div class="grid lg:grid-cols-2 grid-cols-1 gap-x-4 mt-6 ">
                <div class="flex flex-col space-y-2">
                    <label class="font-semibold">Address</label>
                    <div class="flex items-center justify-between space-x-2">
                        <div>
                            <select class="px-4 py-[8px] w-[195px] rounded-full" id="city" aria-label=".form-select-sm" name="city">
                                <option value="">--Choose City--</option>
                            </select>
                            <?php echo !empty($error['city']) ? '<span class="text-red-500 text-sm">' . $error['city'] . '</span>' : ""  ?>
                        </div>
                        <div>
                            <select class="px-4 py-[8px] w-[195px] rounded-full" id="district" aria-label=".form-select-sm" name="district">
                                <option value="">--Choose District--</option>

                            </select>
                            <?php echo !empty($error['district']) ? '<span class="text-red-500 text-sm">' . $error['district'] . '</span>' : ""  ?>

                        </div>
                        <div>
                            <select class="px-4 py-[8px] w-[195px] rounded-full" id="ward" aria-label=".form-select-sm" name="ward">
                                <option value="">--Choose Ward--</option>

                            </select>
                            <?php echo !empty($error['ward']) ? '<span class="text-red-500 text-sm">' . $error['ward'] . '</span>' : ""  ?>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col space-y-2 mt-4 md:mt-0">
                    <label for="name" class="font-semibold">Roles</label>
                    <select class="px-4 py-[8px] rounded-full" name="role_id">
                        <option value="">--Select User Account Role--</option>

                        <?php
                        foreach ($roles as $role) {
                        ?>
                            <option class="block px-2 py-3" value="<?php echo $role['role_id'] ?>"><?php echo $role['role_name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <?php echo !empty($error['role_id']) ? '<span class="text-red-500 text-sm">' . $error['role_id'] . '</span>' : ""  ?>
                </div>
            </div>
            <button class="btn md:btn-md btn-sm capitalize rounded-full bg-slate-700 hover:bg-slate-900 text-white mt-5" type="submit" name="add_user">Add user</button>
        </form>
    </div>
</div>



<!-- user image display -->
<script>
    const imageUpload = document.querySelector('.image-upload');
    const previewContainer = document.querySelector('.preview-image')

    imageUpload.addEventListener('change', function() {
        previewContainer.innerHTML = "";
        for (const file of imageUpload.files) {
            if (file) {
                const reader = new FileReader();
                const img = document.createElement("img");
                img.classList.add("product-upload-img");
                reader.onload = function(e) {
                    img.src = e.target.result;
                };

                reader.readAsDataURL(file);
                previewContainer.appendChild(img);
            }
        }
    });
</script>



<!-- select address viet nam -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");
    var Parameter = {
        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
        method: "GET",
        responseType: "application/json",
    };
    var promise = axios(Parameter);
    promise.then(function(result) {
        renderCity(result.data);
    });

    function renderCity(data) {
        for (const x of data) {
            citis.options[citis.options.length] = new Option(x.Name, x.Id);
        }
        citis.onchange = function() {
            district.length = 1;
            ward.length = 1;
            if (this.value != "") {
                const result = data.filter(n => n.Id === this.value);

                for (const k of result[0].Districts) {
                    district.options[district.options.length] = new Option(k.Name, k.Id);
                }
            }
        };
        district.onchange = function() {
            ward.length = 1;
            const dataCity = data.filter((n) => n.Id === citis.value);
            if (this.value != "") {
                const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

                for (const w of dataWards) {
                    wards.options[wards.options.length] = new Option(w.Name, w.Id);
                }
            }
        };
    }
</script>