<div class="row">
  <div class="col">
    <h3 class="text-info">Edit Employee</h3>
    <hr>
  </div>
</div>


<div class="row">
  <div class="col">
    <form name="editform" action="<?php echo base_url(); ?>employees/update" method="post" >

        <input type="hidden" value="<?php if(!empty($employee)){ echo $employee->id ; } else{  echo set_value('id') ; }?>" name="id"  >

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" value="<?php if(!empty($employee)){ echo $employee->name ; } else{  echo set_value('name') ; }?>" name="name" >
            <span class="text-danger"> <?php echo form_error('name'); ?> </span>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" value="<?php if(!empty($employee)){ echo $employee->phone ; } else{  echo set_value('phone') ; }?>" name="phone" >
            <span class="text-danger"> <?php echo form_error('phone'); ?> </span>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" value="<?php if(!empty($employee)){ echo $employee->email ; } else{  echo set_value('email') ; }?>" name="email" >
            <span class="text-danger"> <?php echo form_error('email'); ?> </span>
        </div>

        <?php if(!empty($employee)) { $dept = $employee->departmentid ;}else {$dept = set_value('department') ; } ?>

        <div class="form-group">
            <label for="department">Department</label>
            <select class="form-control" id="department" name="department" >
                <option value="">Select</option>
                <?php foreach ($departments as $department) {?>
                    <option <?php if($dept == $department->id){ echo "selected" ; } ?> value="<?php echo $department->id ; ?>"><?php echo $department->name; ?></option>
                <?php }?>
            </select>
            <span class="text-danger"> <?php echo form_error('department'); ?> </span>
        </div>


        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?php echo base_url();?>employees" class="btn btn-light">Cancel</a>
    </form>
  </div>
</div>
