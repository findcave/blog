<div class="row">
  <div class="col">
    <h3 class="text-info">New Employee</h3>
    <hr>
  </div>
</div>


<div class="row">
  <div class="col">
        <form name="registerform" action="<?php echo base_url(); ?>employees/store" method="post" >
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" value="<?php echo set_value('name') ;?>" name="name"  placeholder="Enter Name">
                <span class="text-danger"> <?php echo form_error('name'); ?> </span>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" value="<?php echo set_value('phone') ;?>" name="phone"  placeholder="Enter Phone">
                <span class="text-danger"> <?php echo form_error('phone'); ?> </span>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" value="<?php echo set_value('email') ;?>" name="email"  placeholder="Enter Email">
                <span class="text-danger"> <?php echo form_error('email'); ?> </span>
            </div>

            <div class="form-group">
                <label for="department">Department</label>
                <select class="form-control" id="department" name="department" >
                    <option value="">Select</option>
                    <?php foreach ($departments as $department) {?>
                        <option <?php echo set_select('department', $department->id); ?> value="<?php echo $department->id; ?>"><?php echo $department->name; ?></option>
                    <?php }?>
                </select>
                <span class="text-danger"> <?php echo form_error('department'); ?> </span>
            </div>


            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="status" name="status">
              <label class="form-check-label" for="status">
                Active Employee ?
              </label>
            </div>

            <hr>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="<?php echo base_url();?>employees" class="btn btn-light">Cancel</a>
        </form>
    </div>
</div>
