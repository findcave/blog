<div class="row">
  <div class="col">
    <h3 class="text-info">Edit Post</h3>
    <hr>
  </div>
</div>


<div class="row">
  <div class="col">
    <form name="editform" action="<?php echo base_url(); ?>posts/update" method="post" >

        <input type="hidden" value="<?php if(!empty($post)){ echo $post->id ; } else{  echo set_value('id') ; }?>" name="id"  >

        <div class="form-group">
            <label for="title">Name</label>
            <input type="text" class="form-control" id="title" value="<?php if(!empty($post)){ echo $post->title ; } else{  echo set_value('title') ; }?>" name="title" >
            <span class="text-danger"> <?php echo form_error('title'); ?> </span>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control"  name="description" id="description" rows="5" ><?php if(!empty($post)){ echo $post->description ; } else{  echo set_value('description') ; }?></textarea>
            <span class="text-danger"> <?php echo form_error('description'); ?> </span>
        </div>

        <?php if(!empty($post)) { $ch = $post->channelid ;}else {$ch = set_value('channel') ; } ?>

        <div class="form-group">
            <label for="channel">Channel</label>
            <select class="form-control" id="channel" name="channel" >
                <option value="">Select</option>
                <?php foreach ($channels as $channel) {?>
                    <option <?php if($ch == $channel->id){ echo "selected" ; } ?> value="<?php echo $channel->id ; ?>" ><?php echo $channel->name; ?></option>
                <?php }?>
            </select>
            <span class="text-danger"> <?php echo form_error('channel'); ?> </span>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?php echo base_url();?>posts" class="btn btn-light">Cancel</a>
    </form>
  </div>
</div>
