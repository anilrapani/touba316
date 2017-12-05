<?php

$id = $name = $job_type_name = $discipline_name = '';
if(!empty($jobInfo))
{
    foreach ($jobInfo as $uf)
    {
        $id = $uf->id;
        $name = $uf->name;
        $job_type_name = $uf->jobtype;
        $discipline_name = $uf->discipline;
        
    }
}


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Job Details
        
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
                        <h3 class="box-title"><?php echo $name; ?></h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="<?php echo base_url() ?>job/save" method="post" id="editJob" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">    
                                    <div class="box box-default">
                                    <div class="box-header ">
                                        <h3 class="box-title"><span>Job Type : </span><?php echo $job_type_name; ?></h3>
                                      <br><br>
                                      <h3 class="box-title"><span>Discipline : </span><?php echo $discipline_name; ?></h3>
                                      <input type="hidden" value="<?php echo $id; ?>" name="job_id" id="job_id" />    
                                    </div>
                                    <div class="box-body">
                                      Description Goes here
                                    </div>
                                    <!-- /.box-body -->
                                  </div>
                                     
                                </div>
                                
                                
                            </div>
                            
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Save" />
                            <input type="submit" class="btn btn-primary" value="Apply" />
                        </div>
                    </form>
                </div>
            </div>
            
        </div>    
    </section>
</div>

<script src="<?php echo base_url(); ?>assets/js/jobprovider/job.js" type="text/javascript"></script>