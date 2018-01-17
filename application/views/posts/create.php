<div class="row">
  <div class="col">
    <h3 class="text-info">New Post</h3>
    <hr>
  </div>
</div>


<div class="row">
  <div class="col">
        <form name="registerform" action="<?php echo base_url(); ?>posts/store" method="post" enctype="multipart/form-data"  >

            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" class="form-control" id="title" value="<?php echo set_value('title') ;?>" autocomplete="off" name="title">
                <span class="text-danger"> <?php echo form_error('title'); ?> </span>
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" id="slug" value="<?php echo set_value('slug') ;?>" name="slug"  >
                <span class="text-danger"> <?php echo form_error('slug'); ?> </span>
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
                    <?php foreach($channels as $channel) {?>
                        <option <?php echo set_select('channel', $channel->id); ?> value="<?php echo $channel->id; ?>"><?php echo $channel->name; ?></option>
                    <?php }?>
                </select>
                <span class="text-danger"> <?php echo form_error('channel'); ?> </span>
            </div>

            <div class="form-group">
                <label for="channel">Tags</label>
                <select  multiple='multiple'   class='js-example-basic-multiple control-group'
                         tabindex='1'
                         name='tag[]' id="multipleCast">
                    <?php foreach($tags as $tag) {?>
                        <option <?php echo set_select('tag', $tag->id); ?> value="<?php echo $tag->id; ?>"><?php echo $tag->name; ?></option>
                    <?php }?>
                </select>
                <span style="color:#CC0000"> <?php echo form_error('tag[]'); ?> </span>
            </div>


            <div class="form-group">
                <label for="publishingdate">Publishing Date</label>
                <div class='input-group date' >
                    <input type='date' class="form-control" name="publishingdate" value="<?php echo set_value('publishingdate') ;?>"/>
                    <span class="text-danger"> <?php echo form_error('publishingdate'); ?> </span>
                </div>
            </div>

            <div class="form-group">
                <label for="pic">Image</label>
                <input type='file' id="pic" class="form-control" accept="image/*" name="pic"/>
                <span class="text-danger"></span>
            </div>

            <hr>

            <button type="submit" class="btn btn-primary add">Submit</button>
            <a href="<?php echo base_url();?>user" class="btn btn-light">Cancel</a>
        </form>
    </div>
</div>


<!--slug creation-->
<script type="text/javascript">   
    $(function() {

       $("#title").change(function(){
            $("#slug").val(slugify(this.value));
        });

    });
</script>


<!-- select 2 -->
<script type="text/javascript">
    $(".js-example-basic-multiple").select2();
</script>
