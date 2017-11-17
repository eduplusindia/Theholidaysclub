<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-gift"></i> User Management
        <small>Add Gift Voucher</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter User Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" id="addUser" action="<?php echo base_url() ?>addGiftVoucher" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="gname">Name</label>
                                        <input type="text" class="form-control required" id="gname" name="gname" maxlength="128">
                                    </div>
                                    <div class="form-group">
                                        <label for="giftemail">Email address</label>
                                        <input type="text" class="form-control required email" id="giftemail"  name="giftemail" maxlength="128">
                                    </div>
                                    <div class="form-group">
                                        <label for="mobno">Mobile No</label>
                                        <input type="text" class="form-control required" id="mobno"  name="mobno" maxlength="10">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control required" id="address" name="address">
                                    </div>
                                    <div class="form-group">
                                         <?php
                                            if(!empty($userInfo))
                                            {
                                                foreach ($userInfo as $info)
                                                {
                                                    ?>
                                        <input type="hidden" name="location" id="location" class="form-control" value="<?php echo $info->locID;  ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="vcode" name="vcode" value="<?php echo 'THLC'.mt_rand(0000,9999); ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="dog" name="dog" value="<?php echo date('Y-m-d');?>">
                                    </div>
                                    <?php
                                      $current_time = date('Y-m-d');  
                                        //echo $current_time."<br>";
                                  $six_months = date("Y-m-d", strtotime("+6 month $current_time"));
                                      //echo $six_months;
                                    ?>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="edate" name="edate" value="<?php echo $six_months; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="dsaName" name="dsaName" value="<?php echo $info->name; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="dsaId" name="dsaId" value="<?php echo $info->userId ; ?>" >
                                    </div>
                                     <?php
                                         }
                                            }
                                            ?>

                                </div>
                                <div class="col-md-6">
                                
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
<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>