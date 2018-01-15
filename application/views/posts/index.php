
<?php if($this->session->userdata('usertype') == 2) { ?>
<div class="row">
      <div class="col">
        <h3 class="text-info" style="display:inline">Posts</h3>
        <span class="float-right"> <a href="<?php echo base_url(); ?>posts/create" class="btn btn-success">New Post</a><br></span>
      <hr>
      </div>
    </div>
<?php }?>

<div class="row">
      <div class="col postlist">
            <?php
            foreach ($posts as $key=>$post) {
            $dateObj =  date("jS F, Y", strtotime($post->publishdate));
            ?>

                <div class="media">
                    <div>
                        <?php if(!empty($post->image)) { ?>
                          <img class="mr-3" src="<?php echo base_url();?>assets/blogpost/thumb/<?php echo $post->image ;?>" >
                        <?php }else {?>
                          <img class="mr-3" src="<?php echo base_url();?>assets/blogpost/thumb/default.png" >
                        <?php }?>


                        <div style="clear: both"></div>
                        <?php if($this->session->userdata('usertype') == 2) { ?>
                             <a href="#forgot" class="change-image" data-toggle="modal" data-postid="<?php echo $post->id ;?>">Change</a>
                        <?php }?>
                    </div>


                      <div class="media-body">
                            <h4 class="mt-0"><?php echo $post->title ;?></h4>
                            <p> By <a href="<?php echo base_url();?>posts/show/auther/<?php echo $users[$key]->id ;?>"><?php echo $users[$key]->name ;?> </a>,
                                Channels : <a href="<?php echo base_url();?>posts/show/channel/<?php echo $channel[$key]->id ;?>"><?php echo $channel[$key]->name ;?></a>,
                                Published at <?php echo $dateObj ;?>
                                <?php  echo ($post->status == 1) ? 'Active' : 'Inactive'; ?>
                            </p>
                            <p><?php echo $post->description ;?></p>

                            <p><?php if(!empty($tags[$key])) { foreach($tags[$key] as $tgs) { ?>
                                  <a href="<?php echo base_url(); ?>posts/show/tags/<?php echo $tgs ;?>"  ><?php echo $tgs; echo '&nbsp';?></a>
                                <?php } } ?> </p>




                          <?php if($this->session->userdata('usertype') == 2) { ?>

                              <div class="btn-group">
                                      <a href="<?php echo base_url() ;?>posts/edit/<?php echo $post->slug ;?>" class="btn btn-link btn-sm" >Edit</a>

                                      <form action="<?php echo base_url();?>posts/destroy/<?php echo $post->slug ;?>" method="post" class="form-inline">
                                          <button type="submit" class="btn btn-link btn-sm">Delete</button>
                                      </form>
                                </div>
                          <?php }?>

                          <?php if($this->session->userdata('usertype') == 1) { ?>

                              <div class="btn-group">
                                  <form action="<?php echo base_url();?>posts/changeStatus/<?php echo $post->id ;?>" method="post">
                                      <input type="hidden" name="status" value="<?php echo $post->status ;?>">
                                      <button type="submit" class="btn btn-link btn-sm" >
                                          <?php echo ($post->status == 1) ? 'Deactivate' : 'Activate'; ?>
                                      </button>
                                  </form>
                              </div>
                          <?php }?>


                      </div>
                </div>

                <hr>

            <?php } ?>

      </div>
</div>


<div class="modal fade" id="forgot">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style=" padding: 12px;">Upload Image </h5>
            </div>

            <form action="<?php echo base_url();?>posts/updateimage" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon iga2">
                                            <span class="glyphicon glyphicon-envelope"></span>
                                        </div>
                                        <input type="file" class="form-control" accept="image/*" name="pic">

                                    </div>
                                    <input type="hidden" class="form-control postid" name="id">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-info"> Change <span class="glyphicon glyphicon-saved"></span></button>

                        <button type="button" data-dismiss="modal" class="btn btn-lg btn-default"> Cancel <span class="glyphicon glyphicon-remove"></span></button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>


<script type="text/javascript">
        $(".change-image").click(function(){
            postid = $(this).data('postid');
            $(".postid").val(postid);
        });
</script>