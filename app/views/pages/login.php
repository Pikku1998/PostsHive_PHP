<?php require_once APPROOT.'/views/inc/header.php' ?>

<div class="card col-md-6 mx-auto mt-3">    
  <div class="card-body">
    <h2>Login</h2>

    <form action="<?php echo URLROOT.'/users/login'?>" method="post">

        <div class='form-group'>
            <label for="email">Email: <sup>*</sup></label>
            <input type="email" name="email" class='form-control <?php echo (empty($data['email_err'])) ? '' : 'is-invalid' ?>' value=<?php echo $data['email'];?>>
            <span class='invalid-feedback'><?php echo $data['email_err']?></span>
        </div>
        <div class='form-group'>
            <label for="password">Password: <sup>*</sup></label>
            <input type="password" name="password" class='form-control <?php echo (empty($data['password_err'])) ? '' : 'is-invalid' ?>' value=<?php echo $data['password'];?>>
            <span class='invalid-feedback'><?php echo $data['password_err']?></span>
        </div>

        <div class="row mt-3">
            <div class="col">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
            <div class="col">
                <a href="<?php echo URLROOT.'/users/register'?>" class="btn btn-light">No account yet? Register here</a>
            </div>
        </div>
    
    </form>
  </div>
</div>


<?php require_once APPROOT.'/views/inc/footer.php' ?>
