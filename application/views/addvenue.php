<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Venue Management
        <small>Add / Edit Venue</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Venue</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php //print_r($locations);?>
                    <form role="form" action="<?php echo base_url() ?>insertVenue" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                       <label for="fname">Location</label>
                                       <select name="location" class="form-control" required>
									      <option value="">--Please Select--</option>
									   <?php foreach($locations as $locData){?>
									   <option value="<?php echo $locData->id;?>" <?php echo ($locID==$locData->id)?'Selected':'';?>><?php echo $locData->locationName;?></option>
									   <?php }?>
									   </select>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Venue</label>
                                        <input type="text" class="form-control" id="venue" name="venue" maxlength="128" required />
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Status</label>
										
                                        Active <input type="radio" name="status" value='1' checked />
										  Deactive <input type="radio" name="status" value='0'/>
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- /.box-body -->
    
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
<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>