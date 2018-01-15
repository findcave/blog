<div class="row">
    <div class="col">
        <h3 class="text-info">Sign In?</h3>
        <hr>
    </div>
</div>


<div class="row">
    <div class="col">
        <form name="registerform" action="<?php echo base_url(); ?>auth/signin" method="post" >

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" value="<?php echo set_value('email') ;?>"  name="email">
                <span class="text-danger"> <?php echo form_error('email'); ?> </span>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" value="<?php echo set_value('password') ;?>" autocomplete="off" name="password">
                <span class="text-danger"> <?php echo form_error('password'); ?> </span>
            </div>

            <hr>

            <button type="submit" class="btn btn-primary add">Sign In</button>
            <a href="<?php echo base_url();?>" class="btn btn-light">Cancel</a> &nbsp;  &nbsp;  &nbsp;


            <a href="#forgot" data-toggle="modal">Forget Password ?</a>



        </form>
    </div>
</div>

<div class="modal fade" id="forgot">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="font-size: 32px; padding: 12px;"> Recover Your Password </h4>
            </div>

            <form action="<?php echo base_url();?>auth/forgetpassword" method="post">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon iga2">
                                            <span class="glyphicon glyphicon-envelope"></span>
                                        </div>
                                        <input type="email" class="form-control" placeholder="Enter Your E-Mail ID" name="email">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-info"> Save <span class="glyphicon glyphicon-saved"></span></button>

                        <button type="button" data-dismiss="modal" class="btn btn-lg btn-default"> Cancel <span class="glyphicon glyphicon-remove"></span></button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>