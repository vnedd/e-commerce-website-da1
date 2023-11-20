<?php
     if (isset($_SESSION['users'])) {
     $logError = "You aren't  login yet  ";
   }

      if(isset($_GET['insert_cmt'])){
     $error = array();
     $content = $_POST['insert_content'];
  
   
      }
      
       break;

?>


<div class="row d-flex justify-content-center w-full mt-5">
  <div class="col-md-8 col-lg-12">
    <div class="card shadow-0 border" style="background-color: #f0f2f5;">
      <div class="card-body p-4">
        <form class="form-outline mb-4" action="index.php?act=" method="post">
          <input type="text" id="addANote" class="form-control" placeholder="Type comment..." name="insert_content" />
          <input type="submit" id="addANote" class="form-control" value="Post Comment" name="insert_cmt" />
          <label class="form-label" for="addANote">+ Add a note</label>
        </form>

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