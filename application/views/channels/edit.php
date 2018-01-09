<div class="row">
  <div class="col">
    <h3 class="text-info">Edit Channel</h3>
    <hr>
  </div>
</div>

<div class="row">
  <div class="col">
        <form name="editform" action="<?php echo base_url(); ?>channels/update" method="post" >

            <input type="hidden" value="<?php if(!empty($channel)){ echo $channel->id ; } else{  echo set_value('id') ; }?>" name="id"  >

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" value="<?php if(!empty($channel)){ echo $channel->name ; } else{  echo set_value('name') ; }?>" name="name" >
                <span class="text-danger"> <?php echo form_error('name'); ?> </span>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control"  name="description" id="description" rows="5" ><?php if(!empty($channel)){ echo $channel->description ; } else{  echo set_value('description') ; }?></textarea>
                <span class="text-danger"><?php echo form_error('description'); ?> </span>
            </div>

            <div class="form-check">
                <input class="form-check-input" <?php if($channel->status  == 1) { echo "checked" ; }?> type="checkbox" value="" id="status" name="status">
                <label class="form-check-label" for="status">
                    Active Channel ?
                </label>
            </div>

            <hr>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?php echo base_url();?>channels" class="btn btn-light">Cancel</a>
        </form>
  </div>
</div>
