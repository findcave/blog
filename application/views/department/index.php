

<div class="row">
    <div class="col">
        <h3 class="text-info" style="display:inline">Departments</h3>
        <span class="float-right"> <a href="<?php echo base_url(); ?>department/create" class="btn btn-success">New Department</a><br></span>

    </div>
</div>


<div class="row">
    <div class="col"><br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Location</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($departments as $department) { ?>
                <tr>
                    <td><?php echo $department->name ;?></td>
                    <td><?php echo $department->description ;?></td>
                    <td><?php echo $department->location ;?></td>
                    <td><?php echo ($department->status == 1) ? 'Active' : 'Inactive'; ?></td>
                    <td>
                        <div class="btn-group">
                            <a href="<?php echo base_url() ;?>department/edit/<?php echo $department->id ;?>" class="btn btn-link btn-sm" >Edit</a>

                            <form action="<?php echo base_url();?>department/destroy/<?php echo $department->id ;?>" method="post" class="form-inline">
                                <button type="submit" class="btn btn-link btn-sm">Delete</button>
                            </form>

                            <!--                            <form action="--><?php //echo base_url();?><!--department/changeStatus/--><?php //echo $department->id ;?><!--" method="post">-->
                            <!--                                <input type="hidden" name="status" value="--><?php //echo $department->status ;?><!--">-->
                            <!--                                <button type="submit" class="btn btn-link btn-sm" >-->
                            <!--                                    --><?php //echo ($department->status == 1) ? 'Deactivate' : 'Activate'; ?>
                            <!--                                </button>-->
                            <!--                            </form>-->
                        </div>
                    </td>

                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

</div>









