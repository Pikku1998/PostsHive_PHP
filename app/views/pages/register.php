<?php require_once APPROOT.'/views/inc/header.php' ?>

<div class="card col-md-6 mx-auto mt-3">    
  <div class="card-body">
    <h2>Create an Account</h2>
    <form action="<?php echo URLROOT.'/users/register'?>" method="post">
        <div class='form-group'>
            <label for="name">Name: <sup>*</sup></label>
            <input type="text" name="name" class='form-control <?php echo (empty($data['name_err'])) ? '' : 'is-invalid '?>' value=<?php echo $data['name'];?>>
            <span class='invalid-feedback'><?php echo $data['name_err']?></span>
        </div>
        <div class='form-group'>
            <label for="email">Email: <sup>*</sup></label>
            <input type="email" name="email" class='form-control <?php echo (empty($data['email_err'])) ? '' : 'is-invalid' ?>' value=<?php echo $data['email'];?>>
            <span class='invalid-feedback'><?php echo $data['email_err']?></span>
        </div>
        <div class='form-group'>
            <label for="password1">Password: <sup>*</sup></label>
            <input type="password" name="password1" class='form-control <?php echo (empty($data['password_err'])) ? '' : 'is-invalid' ?>' value=<?php echo $data['password1'];?>>
            <span class='invalid-feedback'><?php echo $data['password_err']?></span>
        </div>
        <div class='form-group'>
            <label for="password2">Confirm Password: <sup>*</sup></label>
            <input type="password" name="password2" class='form-control <?php echo (empty($data['password_err'])) ? '' : 'is-invalid' ?>' value=<?php echo $data['password2'];?>>
            <span class='invalid-feedback'><?php echo $data['password_err']?></span>
        </div>

        <div class="row mt-3">
            <div class="col">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
            <div class="col">
                <a href="<?php echo URLROOT.'/users/login'?>" class="btn btn-light">Have an account? Login here</a>
            </div>
        </div>
    

    </form>
  </div>
</div>


<?php require_once APPROOT.'/views/inc/footer.php' ?>
