<div class="row">
    <div class="col">
        <h3 class="text-info">New User ?</h3>
        <hr>
    </div>
</div>


<div class="row">
    <div class="col">
        <form name="registerform" action="<?php echo base_url(); ?>register/store" method="post" >

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" value="<?php echo set_value('name') ;?>" autocomplete="off" name="name">
                <span class="text-danger"> <?php echo form_error('name'); ?> </span>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" value="<?php echo set_value('email') ;?>" autocomplete="off" name="email">
                <span class="text-danger"> <?php echo form_error('email'); ?> </span>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" value="<?php echo set_value('phone') ;?>" autocomplete="off" name="phone">
                <span class="text-danger"> <?php echo form_error('phone'); ?> </span>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" value="<?php echo set_value('password') ;?>" autocomplete="off" name="password">
                <span class="text-danger"> <?php echo form_error('password'); ?> </span>
            </div>

            <hr>

            <button type="submit" class="btn btn-primary add">Submit</button>
            <a href="<?php echo base_url();?>" class="btn btn-light">Cancel</a>
        </form>
    </div>
</div>
