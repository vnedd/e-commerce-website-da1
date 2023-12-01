<div class="grid grid-cols-1 gap-y-6">
    <div id="comments" class="grid grid-cols-1 gap-y-4"></div>
    <?php
    if (isset($_SESSION['user'])) {
    ?>
        <form>
            <div class="flex items-start space-x-4">
                <img class=" w-16 h-16 rounded-full" src="<?php echo !empty($_SESSION['user']['image_url']) ? './' . $image_path . $_SESSION['user']['image_url'] : "assets/img/mock-avatar.svg" ?>" alt="">
                <div class="shrink w-full relative">
                    <textarea name="content" id="comment" class="form-textarea w-full rounded-md px-2 py-3 border-0 outline-none ring-0 bg-violet-50 bg-opacity-25 focus:bg-white" rows="4" placeholder="Add your comment"></textarea>
                    <button type="button" id="send-comment" class="btn btn-circle btn-sm absolute right-3 bottom-4 btn-disabled" onclick="submitComment(null); return false;">
                        <i class="bi bi-send-fill absolute text-sm"></i>
                    </button>
                </div>
            </div>
        </form>
    <?php
    } else {
    ?>
        <div class="p-4 text-center rounded-lg bg-red-100 bg-opacity-30">Please log in to be able to post comments!</div>
    <?php
    }
    ?>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    const commentContent = document.getElementById('comment');
    const sendCommentBtn = document.getElementById('send-comment');
    let user_id = `<?php echo isset($_SESSION['user']) ? $_SESSION['user']['user_id']  : "none" ?>`;
    if (user_id === 'none') {
        user_id = null;
    }
    const product_id = <?php echo $_GET['product_id'] ?>;
    if (commentContent) {
        commentContent.addEventListener('input', function() {
            if (this.value) {
                sendCommentBtn.classList.remove('btn-disabled')
                sendCommentBtn.classList.add('comment-textarea-active')
            } else {
                sendCommentBtn.classList.add('btn-disabled')
                sendCommentBtn.classList.remove('comment-textarea-active')

            }
        })
    }


    function submitComment(parent_id) {
        const comment = $('#comment').val();
        $.ajax({
            type: "POST",
            url: "/e-commerce-website-da1/view/comment/process_comment.php",
            data: {
                comment,
                user_id,
                product_id,
                parent_id
            },
            success: function(response) {
                loadAllComments(product_id);
                $('#comment').val('')
            }
        });
    }

    $(document).ready(function() {
        loadAllComments(product_id);
    });

    function loadAllComments(product_id) {
        $.ajax({
            type: "POST",
            url: `/e-commerce-website-da1/view/comment/process_comment.php?product_id=${product_id}`,
            data: {
                product_id
            },
            success: function(response) {
                $("#comments").html(response);
            }
        });
    }
</script>

<!-- reply comment -->
<script>
    const commentWrapper = document.getElementById('comments');

    commentWrapper.onclick = function(e) {
        const target = e.target;
        if (target.classList.contains('reply-btn')) {
            const parent = getParent(target, '.comment-item');
            const parrent_commnent_id = parent.dataset.id;
            const formReply = parent.querySelector('.form-reply');
            formReply.classList.toggle('hidden');

            const sendBtn = formReply.querySelector('.send-comment');
            const commentReply = formReply.querySelector('.comment-content');

            commentReply.addEventListener('input', function() {
                if (this.value) {
                    sendBtn.classList.remove('btn-disabled');
                    sendBtn.classList.add('comment-textarea-active');
                } else {
                    sendBtn.classList.add('btn-disabled');
                    sendBtn.classList.remove('comment-textarea-active');
                }
            });

            sendBtn.addEventListener('click', function() {
                $.ajax({
                    type: "POST",
                    url: `/e-commerce-website-da1/view/comment/process_comment.php?product_id=${product_id}`,
                    data: {
                        comment: commentReply.value,
                        user_id: user_id,
                        product_id: product_id,
                        parent_id: parrent_commnent_id
                    },
                    success: function(response) {
                        loadAllComments(product_id);
                        commentReply.value = "";
                    }
                });
            });
        }
    };
</script>