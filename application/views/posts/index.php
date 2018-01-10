
<div class="row">
  <div class="col">
    <h3 class="text-info" style="display:inline">Posts</h3>
    <span class="float-right"> <a href="<?php echo base_url(); ?>posts/create" class="btn btn-success">New Post</a><br></span>
  <hr>
  </div>
</div>

<div class="row">
      <div class="col">
        <?php foreach ($posts as $key=>$post) {
            $dateObj =  date("jS F, Y", strtotime($post->publishdate));
            ?>

        <div class="media">
              <img class="mr-3" src="http://via.placeholder.com/100x100" alt="Generic placeholder image">
              <div class="media-body">
                    <h4 class="mt-0"><?php echo $post->title ;?></h4>
                    <p>By <a href="#">John Doe</a>, Channels : <a href="#"><?php echo $channels[$key]->name ;?></a>,  Published at <?php echo $dateObj ;?>   <?php  echo ($post->status == 1) ? 'Active' : 'Inactive'; ?> </p>
                    <p><?php echo $post->description ;?></p>
                    <div class="btn-group">
                          <a href="<?php echo base_url() ;?>posts/edit/<?php echo $post->id ;?>" class="btn btn-link btn-sm" >Edit</a>

                          <form action="<?php echo base_url();?>posts/destroy/<?php echo $post->id ;?>" method="post" class="form-inline">
                              <button type="submit" class="btn btn-link btn-sm">Delete</button>
                          </form>
                    </div>
              </div>
        </div>

        <hr>

        <?php } ?>

      </div>
</div>
