<?php

$id = $name = $state_id = '';

if(!empty($cityInfo))
{
    foreach ($cityInfo as $uf)
    {
        $id = $uf->id;
        $name = $uf->name;
        $state_id = $uf->state_id;
        
    }
}


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-cities"></i> city Management
        <small>Add / Edit City</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter City Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="<?php echo base_url() ?>admin/city/editCity" method="post" id="editCity" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?php echo $name; ?>" maxlength="128">
                                        <input type="hidden" value="<?php echo $id; ?>" name="id" id="id" />    
                                    </div>
                                     <div class="form-group">
                                        <label for="role">State</label>
                                        <select class="form-control" id="state_id" name="state_id">
                                            <option value="">Select State</option>
                                            <?php
                                            if(!empty($states))
                                            {
                                                foreach ($states as $rl)
                                                {
                                                    ?>
                                                    <option value="<?php echo $rl->id; ?>" <?php if($rl->id == $state_id) {echo "selected=selected";} ?>><?php echo $rl->name ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>    
    </section>
</div>
<script src="<?php echo base_url(); ?>assets/js/admin/city.js" type="text/javascript"></script>