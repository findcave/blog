
<div class="row">
  <div class="col">
    <h3 class="text-info" style="display:inline">Posts</h3>
    <span class="float-right"> <a href="<?php echo base_url(); ?>posts/create" class="btn btn-success">New Post</a><br></span>

  </div>
</div>

<div class="row">
  <div class="col"><br>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col" >Description</th>
            <th scope="col" >Channel</th>
            <th scope="col" >Published Date</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($posts as $post) {
            $channel = $this->post->get_one_item('channel','id',$post->channelid);

            ?>
            <tr>
                <td><?php echo $post->title ;?></td>
                <td><?php echo $post->description ;?></td>
                <td><?php echo $channel->name ;?></td>
                <td><?php echo $post->created_at ;?></td>

                <td><?php echo ($post->status == 1) ? 'active' : 'inactive'; ?></td>
                <td>
                      <div class="btn-group">
                            <a href="<?php echo base_url() ;?>posts/edit/<?php echo $post->id ;?>" class="btn btn-link btn-sm" >Edit</a>

                            <form action="<?php echo base_url();?>posts/destroy/<?php echo $post->id ;?>" method="post" class="form-inline">
                                <button type="submit" class="btn btn-link btn-sm">Delete</button>
                            </form>

                            <form action="<?php echo base_url();?>posts/changeStatus/<?php echo $post->id ;?>" method="post">
                                <input type="hidden" name="status" value="<?php echo $post->status ;?>">
                                <button type="submit" class="btn btn-link btn-sm" >
                                    <?php echo ($post->status == 1) ? 'Deactivate' : 'Activate'; ?>
                                </button>
                            </form>
                      </div>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

  </div>
</div>
