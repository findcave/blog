<div class="row">
  <div class="col">
    <h3 class="text-info">New Tag</h3>
    <hr>
  </div>
</div>


<div class="row">
  <div class="col">
        <form name="registerform" action="<?php echo base_url(); ?>tags/store" method="post" >
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" value="<?php echo set_value('name') ;?>" name="name"  placeholder="Enter Name">
                <span class="text-danger"> <?php echo form_error('name'); ?> </span>
            </div>

            <hr>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="<?php echo base_url();?>tags" class="btn btn-light">Cancel</a>
        </form>
    </div>
</div>
