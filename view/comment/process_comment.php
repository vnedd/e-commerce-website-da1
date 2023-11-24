<?php
session_start();
include "../../model/pdo.php";
include "../../model/comments.php";
include "../../model/users.php";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["comment"])) {
    $commentText = $_POST["comment"];
    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];
    $created_at = date("Y-m-d");
    $parent_id = $_POST['parent_id'];
    insert_comment($commentText, $parent_id, $created_at, $product_id, $user_id);
}

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    $allComments = getall_comment_by_productId($product_id);

    if (count($allComments) > 0) {
        foreach ($allComments as $key => $comment) {
            extract($comment);
            $children = getall_comment_by_parentId($comment_id);
            $user = getone_user($user_id);
?>
            <div class="comment-item" data-id="<?php echo $comment_id ?>">
                <div class=" flex items-start space-x-3 ">
                    <img class="w-10 h-10 rounded-full" src="<?php echo !empty($user['image_url']) ? './upload/' .  $user['image_url'] : "assets/img/mock-avatar.svg" ?>" alt="">
                    <div class="flex flex-col bg-violet-100 bg-opacity-50 rounded-3xl px-3 py-4 min-w-[400px] max-w-[80%] relative">
                        <p class="mb-0 text-xs font-semibold"><?php echo $user['name'] ?></p>
                        <p class="mb-0 text-sm"><?php echo $content ?></p>
                        <i class="bi bi-reply text-xl reply-btn absolute bottom-3 right-4 cursor-pointer"></i>
                        <span class="absolute right-4 text-xs"><?php echo $created_at ?></span>
                    </div>
                </div>
                <div class=" pl-20 mt-3">
                    <div class="children-comment my-2">
                        <?php
                        if (count($children) > 0) {
                            foreach ($children as $item) {
                                $user = getone_user($item['user_id']);
                        ?>
                                <div class="flex items-start space-x-3 mt-4">
                                    <img class="w-10 h-10 rounded-full" src="<?php echo !empty($user['image_url']) ? './upload/' .  $user['image_url'] : "assets/img/mock-avatar.svg" ?>" alt="">
                                    <div class="flex flex-col bg-violet-100 bg-opacity-50 rounded-3xl px-3 py-4 min-w-[400px] max-w-[80%] relative">
                                        <p class="mb-0 text-xs font-semibold"><?php echo $user['name'] ?></p>
                                        <p class="mb-0 text-sm"><?php echo $item['content'] ?></p>
                                        <span class="absolute right-4 text-xs"><?php echo $created_at ?></span>
                                    </div>
                                </div>
                            <?php
                            }
                        } else {
                            ?>
                            <div>Don't have reply!</div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="mt-4 form-reply hidden">
                        <div>
                            <div class="flex items-start space-x-4">
                                <img class=" w-8 h-8 rounded-full" src="<?php echo !empty($_SESSION['users']['image_url']) ? './upload/' .  $_SESSION['users']['image_url'] : "assets/img/mock-avatar.svg" ?>" alt="">
                                <div class="shrink min-w-[400px] max-w-[80%] relative">
                                    <textarea name="content_<?php echo $comment_id ?>" class="comment-content form-textarea w-full rounded-md px-2 py-3 border-0 outline-none ring-0 bg-violet-50 bg-opacity-25 focus:bg-white" rows="2" placeholder="Reply this comment"></textarea>
                                    <button type="button" class="send-comment btn btn-circle btn-sm absolute right-3 bottom-4 btn-disabled">
                                        <i class="bi bi-send-fill absolute text-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
    } else {
        ?>
        <div class="w-full p-8 grid place-items-center">
            <p class="text-sm">No Comments found!</p>
        </div>
<?php
    }
}
?>