<?php require_once APPROOT.'/views/inc/header.php' ?>
    <div class="row">
      <div class="col-md-6">
        <h2>Posts</h2>
      </div>
      <div class="col-md-6 text-end">
        <a class='btn btn-primary'  href="">Add new post</a>
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
<?php require_once APPROOT.'/views/inc/footer.php' ?>