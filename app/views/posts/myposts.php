<?php require_once APPROOT.'/views/inc/header.php' ?>

<div class='container'>
    <h3>My Posts</h3>
        <?php foreach($data['user_posts'] as $post):?>
          <div class="card mt-3">
            <div class="card-body">
              <h4 class="card-title"><?php echo $post->title ?></h4>
              <p class="card-text"><?php echo $post->body ?></p>
              <footer class="blockquote-footer">Posted at <?php echo date('M j Y g:i A', strtotime($post->created_at)); ?> </footer>
              <button class='btn btn-outline-primary' type="submit">Edit</button>
              <button class='btn btn-outline-danger' type="submit">Delete</button>

            </div>
          </div>
        <?php endforeach;?>
      </div>
<?php require_once APPROOT.'/views/inc/footer.php' ?>
