<div class="row">
  <div class="col">
    <h3 class="text-info">Edit Tag</h3>
    <hr>
  </div>
</div>

<div class="row">
  <div class="col">
        <form name="editform" action="<?php echo base_url(); ?>tags/update" method="post" >

            <input type="hidden" value="<?php if(!empty($tag)){ echo $tag->id ; } else{  echo set_value('id') ; }?>" name="id"  >

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" value="<?php if(!empty($tag)){ echo $tag->name ; } else{  echo set_value('name') ; }?>" name="name" >
                <span class="text-danger"> <?php echo form_error('name'); ?> </span>
            </div>



            <hr>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?php echo base_url();?>channels" class="btn btn-light">Cancel</a>
        </form>
  </div>
</div>
