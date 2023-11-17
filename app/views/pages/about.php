<?php require_once APPROOT.'/views/inc/header.php' ?>

<div class="card mt-3">
    
  <div class="card-body">
    <h2 class="card-title"><?php echo $data['title']?></h2>
    <p class="card-text"><?php echo $data['description']?></p>
    <p>App version : <strong><?php echo APPVERSION ?></strong></p>
  </div>

</div>

<?php require_once APPROOT.'/views/inc/footer.php' ?>