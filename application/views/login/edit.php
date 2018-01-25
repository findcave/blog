<div class="row">
    <div class="col">
        <h3 class="text-info">Reset password</h3>
        <hr>
    </div>
</div>


<div class="row">
    <div class="col">
        <form name="registerform" action="<?php echo base_url(); ?>auth/update" method="post" >


            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" value="<?php echo set_value('password') ;?>" autocomplete="off" name="password">
                <span class="text-danger"> <?php echo form_error('password'); ?> </span>
            </div>

            <hr>

            <button type="submit" class="btn btn-primary add">Reset Password</button>
            <a href="<?php echo base_url();?>user" class="btn btn-light">Cancel</a>
        </form>
    </div>
</div>
