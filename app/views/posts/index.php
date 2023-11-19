<?php require_once APPROOT.'/views/inc/header.php' ?>

<div class="container mt-4">
  <?php if(isset($_SESSION['post_status'])){
          ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?php echo $_SESSION['post_status']; unset($_SESSION['post_status']); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php
      }
      ?>

      <div class="row">
        <div class="col-md-6">
          <h2>Posts</h2>
        </div>
        <div class="col-md-6 text-end">
        <a class='btn btn-primary'  href="<?php echo URLROOT.'/posts/viewposts/'.$_SESSION['user_id']?>"><i class="bi bi-journal-check"></i>  My Posts</a>

          <a class='btn btn-primary'  href="<?php echo URLROOT.'/posts/addpost'?>"><i class="bi bi-plus-lg"></i>  New Post</a>
        </div>
      </div>
      <div class='container'>
        <?php foreach($data['posts'] as $post):?>
          <div class="card mt-3">
            <div class="card-body">
              <h4 class="card-title"><?php echo $post->title ?></h4>
              <p class="card-text"><?php echo $post->body ?></p>
              <footer class="blockquote-footer">Written by <cite title="Source Title"><?php echo $post->name ?></cite> at <?php echo date('M j Y g:i A', strtotime($post->created_at)); ?> </footer>
            </div>
          </div>
        <?php endforeach;?>
      </div>
  </div>
<?php require_once APPROOT.'/views/inc/footer.php' ?>