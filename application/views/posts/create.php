<div class="row">
  <div class="col">
    <h3 class="text-info">New Post</h3>
    <hr>
  </div>
</div>


<div class="row">
  <div class="col">
        <form name="registerform" action="<?php echo base_url(); ?>posts/store" method="post" >
            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" class="form-control" id="title" value="<?php echo set_value('title') ;?>" name="title"  placeholder="Enter Title">
                <span class="text-danger"> <?php echo form_error('title'); ?> </span>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control"  name="description" id="description" rows="5" ><?php echo set_value('description') ;?></textarea>
                <span class="text-danger"> <?php echo form_error('description'); ?> </span>
            </div>

            <div class="form-group">
                <label for="channel">Channel</label>
                <select class="form-control" id="channel" name="channel" >
                    <option value="">Select</option>
                    <?php foreach ($channels as $channel) {?>
                        <option <?php echo set_select('channel', $channel->id); ?> value="<?php echo $channel->id; ?>"><?php echo $channel->name; ?></option>
                    <?php }?>
                </select>
                <span class="text-danger"> <?php echo form_error('channel'); ?> </span>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="status" name="status">
              <label class="form-check-label" for="status">
                Active Channel ?
              </label>
            </div>

            <hr>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="<?php echo base_url();?>posts" class="btn btn-light">Cancel</a>
        </form>
    </div>
</div>