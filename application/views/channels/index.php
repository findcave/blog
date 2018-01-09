
<div class="row">
  <div class="col">
    <h3 class="text-info" style="display:inline">Channels</h3>
    <span class="float-right"> <a href="<?php echo base_url(); ?>channels/create" class="btn btn-success">New Channel</a><br></span>

  </div>
</div>

<div class="row">
  <div class="col"><br>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col" >Description</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($channels as $channel) { ?>
            <tr>
                <td><?php echo $channel->name ;?></td>
                <td><?php echo $channel->description ;?></td>
                <td><?php echo ($channel->status == 1) ? 'Active' : 'Inactive'; ?></td>
                <td>
                  <div class="btn-group">
                    <a href="<?php echo base_url() ;?>channels/edit/<?php echo $channel->id ;?>" class="btn btn-link btn-sm" >Edit</a>

                    <form action="<?php echo base_url();?>channels/destroy/<?php echo $channel->id ;?>" method="post" class="form-inline">
                        <button type="submit" class="btn btn-link btn-sm">Delete</button>
                    </form>

                    <!--                    <form action="--><?php //echo base_url();?><!--channels/changeStatus/--><?php //echo $channel->id ;?><!--" method="post">-->
                    <!--                        <input type="hidden" name="status" value="--><?php //echo $channel->status ;?><!--">-->
                    <!--                        <button type="submit" class="btn btn-link btn-sm" >-->
                    <!--                            --><?php //echo ($channel->status == 1) ? 'Deactivate' : 'Activate'; ?>
                    <!--                        </button>-->
                    <!--                    </form>-->
                    </div>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

  </div>
</div>
