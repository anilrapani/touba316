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
                    
                    <form role="form" id="addJob" action="<?php echo base_url() ?>jobprovider/job/addNewJob" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control required" id="name" name="name" maxlength="128">
                                    </div>
                                    
                                </div>
                                  <div class="col-md-6">
                                  <div class="form-group">
                                        <label for="job_type">Job type</label>
                                        <select class="form-control required" id="job_type_id" name="job_type_id" maxlength="128">
                                            <option value="0">Select Job Type</option>
                                            <?php
                                            if(!empty($job_types))
                                            {
                                                foreach ($job_types as $rl)
                                                {
                                                    ?>
                                                    <option value="<?php echo $rl->id ?>"><?php echo $rl->name ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                  </div>
                                
                                
                            </div>
                            
                            
                            <div class="row">
                                
                                  <div class="col-md-6">
                                    <div class="form-group">
                                          <label for="job_type">Discipline</label>
                                          <select class="form-control required" id="discipline_id" name="discipline_id" maxlength="128">
                                              <option value="0">Select Discipline</option>
                                              <?php
                                              if(!empty($disciplines))
                                              {
                                                  foreach ($disciplines as $rl)
                                                  {
                                                      ?>
                                                      <option value="<?php echo $rl->id ?>"><?php echo $rl->name ?></option>
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