<?php require_once APPROOT.'/views/inc/header.php' ?>
<a href="<?php echo URLROOT?>/posts/index" class='btn btn-outline-dark mb-4'>Back  <i class="bi bi-backspace"></i></a>


<div class='container'>
<?php if(isset($_SESSION['post_status'])){
          ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?php echo $_SESSION['post_status']; unset($_SESSION['post_status']); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php
      }
      ?>
    <h3>My Posts</h3>
        <?php foreach($data['user_posts'] as $post):?>
          <div class="card mt-3">
            <div class="card-body">
              <h4 class="card-title"><?php echo $post->title ?></h4>
              <p class="card-text"><?php echo $post->body ?></p>
              <footer class="blockquote-footer">Posted at <?php echo date('M j Y g:i A', strtotime($post->created_at)); ?> </footer>

          <a class='btn btn-outline-primary'  href="<?php echo URLROOT.'/posts/editpost/'.$post->id ?>"><i class="bi bi-pencil"></i>Edit</a>
          <a class='btn btn-outline-danger'  href="<?php echo URLROOT.'/posts/deletepost/'.$post->id ?>"><i class="bi bi-trash"></i>Delete</a>


            </div>
          </div>
        <?php endforeach;?>
      </div>
<?php require_once APPROOT.'/views/inc/footer.php' ?>
