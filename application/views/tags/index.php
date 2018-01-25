
<div class="row">
  <div class="col">
    <h3 class="text-info" style="display:inline">Tags</h3>
    <span class="float-right"> <a href="<?php echo base_url(); ?>tags/create" class="btn btn-success">New Tag</a><br></span>

  </div>
</div>

<div class="row">
  <div class="col"><br>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($tags as $tag) { ?>
            <tr>
                <td><?php echo $tag->name ;?></td>
                <td>
                  <div class="btn-group">
                    <a href="<?php echo base_url() ;?>tags/edit/<?php echo $tag->id ;?>" class="btn btn-link btn-sm" >Edit</a>

                    <form action="<?php echo base_url();?>tags/destroy/<?php echo $tag->id ;?>" method="post" class="form-inline">
                        <button type="submit" class="btn btn-link btn-sm">Delete</button>
                    </form>

                  </div>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

  </div>
</div>
