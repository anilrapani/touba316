<?php

$id = $name = $job_type_id = $discipline_id = '';
if(!empty($jobInfo))
{
    foreach ($jobInfo as $uf)
    {
        $id = $uf->id;
        $name = $uf->name;
        $job_type_id = $uf->job_type_id;
        $discipline_id = $uf->discipline_id;
        
    }
}


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Job Management
        <small>Add / Edit Job</small>
      </h1>
    </section>
    
    <section class="content">
        <div class="row">
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
        <div class="row">
            
            
        
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Job Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="<?php echo base_url() ?>jobprovider/job/editJob" method="post" id="editJob" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?php echo $name; ?>" maxlength="128">
                                        <input type="hidden" value="<?php echo $id; ?>" name="id" id="id" />    
                                    </div>
                                    <div class="form-group">
                                        <label for="discipline">Discipline</label>
                                        <select class="form-control" id="discipline_id" name="discipline_id">
                                            <option value="">Select Job type</option>
                                            <?php
                                            if(!empty($disciplines))
                                            {
                                                foreach ($disciplines as $rl)
                                                {
                                                    ?>
                                                    <option value="<?php echo $rl->id; ?>" <?php if($rl->id == $discipline_id) {echo "selected=selected";} ?>><?php echo $rl->name ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    
                                     
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role">Job Type</label>
                                        <select class="form-control" id="job_type_id" name="job_type_id">
                                            <option value="">Select Job type</option>
                                            <?php
                                            if(!empty($job_types))
                                            {
                                                foreach ($job_types as $rl)
                                                {
                                                    ?>
                                                    <option value="<?php echo $rl->id; ?>" <?php if($rl->id == $job_type_id) {echo "selected=selected";} ?>><?php echo $rl->name ?></option>
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
            
        </div>    
    </section>
</div>

<script src="<?php echo base_url(); ?>assets/js/jobprovider/job.js" type="text/javascript"></script>