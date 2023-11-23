<div class="row d-flex justify-content-center w-full mt-5">
  <div class="col-md-8 col-lg-12">
    <div class="card shadow-0 border" style="background-color: #f0f2f5;">
      <div class="card-body p-4">
        <?php 
        
        if (isset($_SESSION['user'])) {
 
       ?>
        <form class="form-outline mb-4" method="post" enctype="multipart/form-data">
          <input type="text" id="content" class="form-control" placeholder="Type comment..." name="content" />
          <?php echo !empty($error['content']) ? '<span class="text-red-500 text-xs">' . $error['content'] . '</span>' : ""  ?>

          <input type="hidden" id="created_at" class="form-control"  name="created_at" />
          <?php echo !empty($error['created_at']) ? '<span class="text-red-500 text-xs">' . $error['created_at'] . '</span>' : ""  ?>
          
          <input type="hidden" id="product_id" class="form-control" value=""  name="product_id" />
          <?php echo !empty($error['product_id']) ? '<span class="text-red-500 text-xs">' . $error['product_id'] . '</span>' : ""  ?>

          <input type="hidden" id="user_id" class="form-control"  name="user_id" />
          <?php echo !empty($error['user_id']) ? '<span class="text-red-500 text-xs">' . $error['user_id'] . '</span>' : ""  ?>
          
          <input type="submit" id="insert_cmt" class="form-control" value="Post Comment" name="insert_cmt" />
         
          
        </form>
          <?php
    } else {

    ?>
        <div class="w-full text-center py-10"><?php echo isset($_POST['comment_id']) ? "No account found !" : ' Create user now!' ?></div>
    <?php
    }
    ?>
    
        <div class="card mb-4">
          <div class="card-body">
            <p>Type your note, and hit enter to add it</p>

            <div class="d-flex justify-content-between">
              <div class="d-flex flex-row align-items-center">
                <img src="./upload/654c6c8bc2d899.jpg" alt="avatar" width="25"
                  height="25" />
                <p class="small mb-0 ms-2">Martha</p>
              </div>
              <div class="d-flex flex-row align-items-center">
                <p class="small text-muted mb-0">Respond</p>
                <i class="far fa-thumbs-up mx-2 fa-xs text-black" style="margin-top: -0.16rem;"></i>
                <p class="small text-muted mb-0">3</p>
              </div>
            </div>
          </div>
        </div>

        <div class="card mb-4">
          <div class="card-body">
            <p>Type your note, and hit enter to add it</p>

            <div class="d-flex justify-content-between">
              <div class="d-flex flex-row align-items-center">
                <img src="upload/654c63a90ce732.jpg" alt="avatar" width="25"
                  height="25" />
                <p class="small mb-0 ms-2">Johny</p>
              </div>
              <div class="d-flex flex-row align-items-center">
                <p class="small text-muted mb-0">Upvote?</p>
                <i class="far fa-thumbs-up mx-2 fa-xs text-black" style="margin-top: -0.16rem;"></i>
                <p class="small text-muted mb-0">4</p>
              </div>
            </div>
          </div>
        </div>

        <div class="card mb-4">
          <div class="card-body">
            <p>Type your note, and hit enter to add it</p>

            <div class="d-flex justify-content-between">
              <div class="d-flex flex-row align-items-center">
                <img src="upload/654c63a90ce732.jpg" alt="avatar" width="25"
                  height="25" />
                <p class="small mb-0 ms-2">Mary Kate</p>
              </div>
              <div class="d-flex flex-row align-items-center text-primary">
                <p class="small mb-0">Upvoted</p>
                <i class="fas fa-thumbs-up mx-2 fa-xs" style="margin-top: -0.16rem;"></i>
                <p class="small mb-0">2</p>
              </div>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <p>Type your note, and hit enter to add it</p>

            <div class="d-flex justify-content-between">
              <div class="d-flex flex-row align-items-center">
                <img src="upload/654c63a90ce732.jpg" alt="avatar" width="25"
                  height="25" />
                <p class="small mb-0 ms-2">Johny</p>
              </div>
              <div class="d-flex flex-row align-items-center">
                <p class="small text-muted mb-0">Upvote?</p>
                <i class="far fa-thumbs-up ms-2 fa-xs text-black" style="margin-top: -0.16rem;"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>