<?php require_once APPROOT.'/views/inc/header.php' ?>
<a href="<?php echo URLROOT.'/posts/viewposts/'.$_SESSION['user_id']?>" class='btn btn-outline-dark mb-4'>Back  <i class="bi bi-backspace"></i></a>

<h3>Edit your Post</h3>

<form action="" method="post">
    <div class="mb-3 mt-2">
        <label for="title" class="form-label">Title: </label>
        <input type="text" class="form-control <?php echo (empty($data['title_err'])) ? '' : 'is-invalid' ?>" name='title' id="title" value='<?php echo $data['title']?>' placeholder="What's on your mind?">
        <span class='invalid-feedback'><?php echo $data['title_err']?></span>

    </div>
    <div class="mb-3">
        <label for="body" class="form-label">Description: </label>
        <textarea class="form-control <?php echo (empty($data['body_err'])) ? '' : 'is-invalid' ?>" name='body' id="body" rows="3" placeholder="Describe a little more about it.."><?php echo $data['body'] ?></textarea>
        <span class='invalid-feedback'><?php echo $data['body_err']?></span>
    </div>
    <button type="submit" class="btn btn-success"><i class="bi bi-pencil"></i>  Update Post</button>
</form>


<?php require_once APPROOT.'/views/inc/footer.php' ?>


