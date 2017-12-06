<?php

$id = $name = '';
if(!empty($jobseekerInfo))
{
    foreach ($jobseekerInfo as $uf)
    {
        $id = $uf->id;
        $name = $uf->name;
        
    }
}


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Jobseeker Details
        
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
                    
                    <form role="form" action="<?php echo base_url() ?>jobprovider/job/savejobseeker" method="post" id="editJob" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">    
                                    <div class="box box-default">
                                    <div class="box-header ">
                                      <h3 class="box-title"><span>name: </span><?php echo $name; ?></h3>
                                      <input type="hidden" value="<?php echo $id; ?>" name="user_id_jobseeker" id="user_id_jobseeker" />    
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
                            
                            <?php if(!isset($isSaved) || $isSaved < 1){ ?>
                                        <input type="submit" class="btn btn-primary" name="submit" value="Save" />
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>    
    </section>
</div>

