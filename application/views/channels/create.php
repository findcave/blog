<div class="row">
  <div class="col">
    <h3 class="text-info">New Channel</h3>
    <hr>
  </div>
</div>


<div class="row">
  <div class="col">
        <form name="registerform" action="<?php echo base_url(); ?>channels/store" method="post" >
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" value="<?php echo set_value('name') ;?>" name="name"  placeholder="Enter Name">
                <span class="text-danger"> <?php echo form_error('name'); ?> </span>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control"  name="description" id="description" rows="5" ><?php echo set_value('description') ;?></textarea>
                <span class="text-danger"> <?php echo form_error('description'); ?> </span>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="status" name="status">
              <label class="form-check-label" for="status">
                Active Channel ?
              </label>
            </div>

            <hr>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="<?php echo base_url();?>channels" class="btn btn-light">Cancel</a>
        </form>
    </div>
</div>
