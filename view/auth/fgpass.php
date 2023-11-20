<div class="card mt-5">

    <h5 class=" card-header text-bg-dark "> Forgot password </h5>

    <div class="card-body ">
        <form action="index.php?act=fg-pass" method="post">
            <div>
                <p  class="text-center">Email </p>
                <input class="w-100 "  type="text" name="email" placeholder="email">
            </div>
            <input class=" btn mt-3 bg-black text-light mx-auto d-block " type="submit" value="Xác Nhận" name="confirm">
            <?php
            if (isset($sendMail) && $sendMail != "") {
                
                echo $sendMail;
            }
            ?>


        </form>