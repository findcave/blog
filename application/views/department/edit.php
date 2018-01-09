
<div class="row">
    <div class="col">
        <h3 class="text-info">Edit Department</h3>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col">
        <form name="editform" action="<?php echo base_url(); ?>department/update/<?php echo $department->id ;?>" method="post" >


            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" value="<?php echo $department->name ;?>" name="name" >
                <span class="text-danger"> <?php echo form_error('name'); ?> </span>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control"  name="description" id="description" rows="5" ><?php echo $department->description  ;?></textarea>
                <span class="text-danger"> <?php echo form_error('description'); ?> </span>
            </div>


            <div class="form-group">
                <label for="name">Location</label>
                <input type="text" class="form-control" id="location" value="<?php echo $department->location ;?>" name="location"  >
                <span class="text-danger"> <?php echo form_error('location'); ?> </span>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?php echo base_url();?>channels" class="btn btn-light">Cancel</a>
        </form>
    </div>
</div>








