
<div class="row">
  <div class="col">
    <h3 class="text-info" style="display:inline">Employees</h3>
    <span class="float-right"> <a href="<?php echo base_url(); ?>employees/create" class="btn btn-success">New Employee</a><br></span>

  </div>
</div>

<div class="row">
  <div class="col"><br>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col" >Phone</th>
            <th scope="col" >Email</th>
            <th scope="col" >Department</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($employees as $key=>$employee) {
            ?>
            <tr>
                <td><?php echo $employee->name ;?></td>
                <td><?php echo $employee->phone ;?></td>
                <td><?php echo $employee->email ;?></td>
                <td><?php echo $departments[$key]->name ;?></td>

                <td><?php echo ($employee->status == 1) ? 'Active' : 'Inactive'; ?></td>
                <td>
                  <div class="btn-group">
                    <a href="<?php echo base_url() ;?>employees/edit/<?php echo $employee->id ;?>" class="btn btn-link btn-sm" >Edit</a>

                    <form action="<?php echo base_url();?>employees/destroy/<?php echo $employee->id ;?>" method="post" class="form-inline">
                        <button type="submit" class="btn btn-link btn-sm">Delete</button>
                    </form>

                    <form action="<?php echo base_url();?>employees/changeStatus/<?php echo $employee->id ;?>" method="post">
                        <input type="hidden" name="status" value="<?php echo $employee->status ;?>">
                        <button type="submit" class="btn btn-link btn-sm" >
                            <?php echo ($employee->status == 1) ? 'Deactivate' : 'Activate'; ?>
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
