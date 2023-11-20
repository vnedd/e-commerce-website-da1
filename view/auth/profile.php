<div class="container mx-auto max-w-[1440px] my-12 p-4 pt-14 md:p-8 ">
    <div class=" mx-auto max-w-[1200px] rounded-md bg-white border">
        <ul class="flex items-center justify-between">
            <li class="infor-tab flex items-center justify-center w-full rounded-md p-4 cursor-pointer transition">My Information</li>
            <li class="infor-tab flex items-center justify-center w-full rounded-md p-4 cursor-pointer transition">My Orders</li>
        </ul>
        <div>
            <div class="panel hidden p-4 md-p-8">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="preview-image mt-2">
                        <img class="w-[150px] h-[150px] object-cover rounded-full" src="<?php echo !empty($user['image_url']) ? "./" . $image_path . $user['image_url'] : '.././assets/img/mock-avatar.svg' ?>" alt="">
                    </div>
                    <div class="flex flex-col space-y-2 w-1/2 my-6">
                        <label class="font-semibold" for="image_url">Upload image</label>
                        <input class="image-upload p-2 bg-neutral-100 rounded-md cursor-pointer" id="image_url" name="image_url" type="file">
                        <?php echo !empty($error['image_url']) ? '<span class="text-red-500 text-sm">' . $error['image_url'] . '</span>' : ""  ?>
                    </div>
                    <div class="grid md:grid-cols-4 grid-cols-1 gap-4">
                        <div class="flex flex-col space-y-2">
                            <label for="name" class="font-semibold">Username</label>
                            <input type="text" class="form-input rounded text-slate-900" name="name" id="name" placeholder="Example: nedd" value="<?php echo $user['name'] ?>" />
                            <?php echo !empty($error['name']) ? '<span class="text-red-500 text-sm">' . $error['name'] . '</span>' : ""  ?>
                        </div>
                        <div class="flex flex-col space-y-2">
                            <label for="email" class="font-semibold">Email</label>
                            <input type="email" class="form-input rounded text-slate-900" name="email" disabled id="email" value="<?php echo $user['email'] ?>" />
                            <input type="email" class="form-input rounded text-slate-900" name="email" hidden id="email" value="<?php echo $user['email'] ?>" />
                            <?php echo !empty($error['email']) ? '<span class="text-red-500 text-sm">' . $error['email'] . '</span>' : ""  ?>
                        </div>
                        <div class="flex flex-col space-y-2">
                            <label for="password" class="font-semibold">Password</label>
                            <input type="password" class="form-input rounded text-slate-900" name="password" id="password" value="<?php echo $user['password'] ?>" />
                            <?php echo !empty($error['password']) ? '<span class="text-red-500 text-sm">' . $error['password'] . '</span>' : ""  ?>
                        </div>
                        <div class="flex flex-col space-y-2">
                            <label for="phone" class="font-semibold">Phone</label>
                            <input type="tel" class="form-input rounded text-slate-900" name="phone" id="phone" value="<?php echo $user['phone'] ?>" />
                        </div>
                    </div>
                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-x-4 mt-6 ">
                        <div class="flex flex-col space-y-2">
                            <label class="font-semibold">Address</label>
                            <div class="flex flex-col md:items-center md:justify-between md:flex-row gap-4">
                                <div>
                                    <select class="w-full px-4 lg:w-[200px] md:w-[210px] py-2 rounded-full" id="city" aria-label=".form-select-sm" name="city">
                                        <option value="">--Choose City--</option>
                                    </select>
                                    <?php echo !empty($error['city']) ? '<span class="text-red-500 text-sm">' . $error['city'] . '</span>' : ""  ?>
                                </div>
                                <div>
                                    <select class="w-full px-4 lg:w-[200px] md:w-[210px] py-2 rounded-full" id="district" aria-label=".form-select-sm" name="district">
                                        <option value="">--Choose District--</option>
                                    </select>
                                    <?php echo !empty($error['district']) ? '<span class="text-red-500 text-sm">' . $error['district'] . '</span>' : ""  ?>
                                </div>
                                <div>
                                    <select class="w-full px-4 lg:w-[200px] md:w-[210px] py-2 rounded-full" id="ward" aria-label=".form-select-sm" name="ward">
                                        <option value="">--Choose Ward--</option>

                                    </select>
                                    <?php echo !empty($error['ward']) ? '<span class="text-red-500 text-sm">' . $error['ward'] . '</span>' : ""  ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="btn md:btn-md btn-sm capitalize rounded-full bg-slate-700 hover:bg-slate-900 text-white mt-5" type="submit" name="update_user">Update user</button>
                </form>
            </div>
            <div class="panel hidden p-4 md-p-8">
                <div class="flex flex-col space-y-6">
                    <?php
                    if (count($orders) > 0) {
                        foreach ($orders as $key => $order) {
                            extract($order);
                            $order_details = getall_order_details_by_orderId($order_id);
                    ?>
                            <div class="rounded-lg border p-4">
                                <h3 class="font-semibold text-xl">Order ID: <?php echo $order_id ?></h3>
                                <?php echo order_item($order, $order_details, true) ?>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <div class="p-10">You don't have order! Shopping now!</div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    const tabs = document.querySelectorAll('.infor-tab')
    const panels = document.querySelectorAll('.panel')
    panels[0].classList.remove('hidden')
    tabs[0].classList.add('tab-active');
    tabs.forEach((tab, index) => {
        tab.addEventListener('click', function() {
            tabs.forEach(tab => tab.classList.remove('tab-active'))
            panels.forEach(panel => panel.classList.add('hidden'));
            panels[index].classList.remove('hidden');
            tab.classList.add('tab-active');
        })
    })
</script>














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
    const citis = document.getElementById("city");
    const districts = document.getElementById("district");
    const wards = document.getElementById("ward");

    const Parameter = {
        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
        method: "GET",
        responseType: "application/json",
    };
    const promise = axios(Parameter);
    promise.then(function(result) {
        renderCity(result.data);
    });
    <?php
    if (count($arrayAddress) > 0) {
    ?>
        let cityId = <?php echo $arrayAddress[0] ?>;
        cityId = cityId.toString();
        if (cityId.length < 2) {
            cityId = '0' + cityId;
        }

        let districtId = <?php echo $arrayAddress[1] ?>;
        districtId = districtId.toString();

        if (districtId.length < 3) {
            districtId = '0' + districtId;
        }

        let wardId = <?php echo $arrayAddress[2] ?>;
        wardId = wardId.toString();

        if (wardId.length < 5) {
            wardId = '0' + wardId;
        }

        console.log(cityId)
        console.log(districtId)
        console.log(wardId)

        function renderCity(data) {
            for (const x of data) {
                citis.options[citis.options.length] = new Option(x.Name, x.Id, x.Id === cityId, x.Id === cityId)
            }

            if (districtId && cityId) {
                const result = data.filter(n => n.Id === cityId);
                for (const k of result[0].Districts) {
                    district.options[district.options.length] = new Option(k.Name, k.Id, k.Id === districtId, k.Id === districtId);
                }
            }
            if (wardId && districtId && cityId) {
                const dataCity = data.filter((n) => n.Id === cityId);
                console.log(dataCity)
                const dataWards = dataCity[0].Districts.filter(n => n.Id === districtId)[0].Wards;
                console.log(dataWards)
                for (const w of dataWards) {
                    wards.options[wards.options.length] = new Option(w.Name, w.Id, w.Id === wardId, w.Id === wardId);
                }
            }

            citis.onchange = function() {
                district.length = 1;
                ward.length = 1;
                if (this.value != "") {
                    const result = data.filter(n => n.Id === this.value);

                    for (const k of result[0].Districts) {
                        district.options[district.options.length] = new Option(k.Name, k.Id, k.Id === districtId, k.Id === districtId);
                    }
                }
            };
            district.onchange = function() {
                ward.length = 1;
                const dataCity = data.filter((n) => n.Id === citis.value);
                if (this.value != "") {
                    const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

                    for (const w of dataWards) {
                        wards.options[wards.options.length] = new Option(w.Name, w.Id, w.Id === wardId, w.Id === wardId);
                    }
                }
            };
        }
    <?php
    } else {
    ?>

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
    <?php
    }
    ?>
</script>