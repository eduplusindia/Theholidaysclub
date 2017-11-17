<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> User Management
        <small>Add / Edit User</small>
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
                    
                    <form role="form"  name="memberForm" id="addUser" action="<?php echo base_url() ?>insertMember" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                      <label>Membership No</label>
                                      <input type="text" class="form-control" id="" name="memberShip">
                                    </div>                         
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Approaved Form No</label>
                                        <input type="text" class="form-control digits required" id="ano" name="ano" value="<?php //echo set_value('ano');?>" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Main Applicant Name</label>
                                        <input type="text" class="form-control" id="Mname" required name="Mname" 
                                      value="<?php //echo set_value('Mname'); ?>" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword"> Date Of Birth</label>
                                        <input type="date" class="form-control" required id="dob1" name="dob1" value="<?php //echo set_value('dob1'); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">Co-applicant Name</label>
                                        <input type="text" class="form-control" id="Cname" name="Cname" value="<?php //echo set_value('Cname'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role">Date of Birth</label>
                                        <input type="date" class="form-control"  id="dob2" name="dob2" value="<?php //echo set_value('dob2'); ?>" >
                                    </div>
                                </div>    
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" required id="address"  name="address" value="<?php //echo set_value('address'); ?>">
                                    </div>
                                </div> 
                            </div>
                             <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                      <label>City</label>
                                      <input type="text" class="form-control" required id="address"  name="address" value="<?php //echo set_value('address'); ?>">
                                    </div>                         
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pin Code</label>
                                        <input type="text" class="form-control digits" required id="pin" name="pin" value="<?php //echo set_value('pin'); ?>" maxlength="6" >
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                      <label>Mobile No1</label>
                                     <input type="text" class="form-control digits" id="mob1" required name="mob1" value="<?php //echo set_value('mob1'); ?>" maxlength="14" >
                                    </div>                         
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mobile No2</label>
                                        <input type="text" class="form-control digits" id="mob2" name="mob2" value="<?php //echo set_value('mob2'); ?>" maxlength="14">
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                      <label>Phone No</label>
                                         <input type="text" class="form-control digits" id="rno"  name="rno" value="<?php //echo set_value('rno'); ?>" >
                                    </div>                         
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email Id</label>
                                        <input type="email" class="form-control" required id="email" name="email" value="<?php //echo set_value('email'); ?>" >
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                      <label>Date Of Joining</label>
                                    <input  class="form-control" id="doj" name="doj" value="<?php echo date('d/m/Y'); ?>" readonly >
                                    </div>                         
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tenure</label>
                                        <select class="form-control" id="tenure" name="tenure" value="<?php //echo set_value('tenure'); ?>" onChange="validityDate()" required>
                                <option value="">Select Tenure</option>
                                <option value="1">1</option>
                                <option value="3">3</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="25">25</option>
                            </select>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                      <label>Validity Date</label>
                                            <input class="form-control" id="vdate" required name="vdate" value="<?php //echo set_value('vdate'); ?>" readonly >
                                    </div>                         
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Card Type(Season)</label>
                                        <select class="form-control" id="ctype" name="ctype" value="<?php //echo set_value('ctype'); ?>">
                              <option>Select Card Type</option>  
                            <option value="Red">Red</option>
                            <option value="White">White</option>
                            <option value="Blue">Blue</option>  
                            </select>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                      <label>Apartment</label>
                                       <select class="form-control" id="apartment"  name="apartment" 
                            onChange="personoccupancy()" value="<?php //echo set_value('apartment'); ?>" required>
                             <option value="">Select Apartment</option>
                             <option value="Studio-2">Studio-2</option> 
                             <option value="1 BR-4">1 BR-4</option>  
                            </select>
                                    </div>                         
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Person Occupancy</label>
                                        <input type="text" class="form-control" id="occupancy" name="occupancy"  value="<?php //echo set_value('occupancy'); ?>">
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-4">                                
                                    <div class="form-group">
                                      <label>Purchase Amount</label>
                                     <input type="text" class="form-control digits" id="pamount" required name="pamount" value="<?php //echo set_value('pamount'); ?>">  
                                    </div>                         
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Admin Amount</label>
                                        <?php $amount = $this->user_model->site_info(1); ?>
                            <input type="text" class="form-control digits" id="aamount" name="aamount" value="<?php 
                            foreach($amount as $admin_amount)
                                {
                                    echo $admin_amount->admin_amount;
                                }
                                ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Total Amount</label>
                                        <input type="text" class="form-control digits" id="tamount" name="tamount" value="<?php //echo set_value('tamount'); ?>" >
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                      <label>Initial Payment</label>
                                    <input type="text" class="form-control digits" id="ipayment" required name="ipayment" value="<?php //echo set_value('ipayment'); ?>">
                                    </div>                         
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mode Of Payment</label>
                                        <select class="form-control" id="mop" name="mop" required>
                                <option>Select Mode Of Payment</option>
                                <option value="Card" id='card'>Card</option>
                                <option value="Cheque" id="cheque">Cheque</option>
                                <option value="Online" id="online">Online</option>
                                <option value="Cash" id="cash">Cash</option>
                                <option value="Multiple" id="multiple">Multiple</option>
                            </select>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                      <label>Balance</label>
                                      <input type="text" class="form-control digits" id="bal" required name="bal" value="<?php //echo set_value('bal'); ?>" >
                                    </div>                         
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Balance Payment Mode</label>
                                        <select class="form-control" id="bpm" name="bpm" required>
                                <option value="">Select Mode Of Payment</option>
                                <option value="Card">Card</option>
                                <option value="Cheque">Cheque</option>
                                <option value="Online">Online</option>
                                <option value="Cash">Cash</option>
                                <option value="Multiple">Multiple</option>
                            </select>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                      <label>No Of EMI</label>
                                        <select type="text" class="form-control" id="nemi" name="nemi" required>
                                       <option value="">Select No Of EMI</option>
                                       <option value="1">No EMI</option>
                                       <option value="3">3</option>
                                       <option value="6">6</option>
                                       <option value="9">9</option>
                                       <option value="12">12</option>
                                       <option value="15">15</option>
                            </select>
                                    </div>                         
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>EMI Amount</label>
                                        <input type="text" class="form-control digits" id="eamount" name="eamount" value="<?php //echo set_value('eamount'); ?>" >
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                      <label>EMI Start</label>
                                    <input type="date" class="form-control" id="edate"  name="edate" value="<?php //echo set_value('edate'); ?>">
                                    </div>                         
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>AMC(Amount)</label>
                                        <input type="text" class="form-control digits" id="amc" name="amc" value="<?php 
                                            foreach($amount as $amc_amount)
                                            {
                                              echo $amc_amount->amc_amount;
                                            }   
                                          ?>"   >
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                      <label>Excutive Name</label>
                                        <input type="text" class="form-control" id="ename" required name="ename" value="<?php //echo set_value('ename'); ?>" >
                                    </div>                         
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Manager Name</label>
                                        <input type="text" class="form-control" id="mname" required name="mname" value="<?php //echo set_value('mname'); ?>">
                                    </div>
                                </div>
                            </div>
                             <?php
                              if(!empty($dsaInfo))
                                {
                                   foreach($dsaInfo as $info)
                               {
                               ?>
                             <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                      <label>DSA Id</label>
                                      <input type="text" class="form-control" id="dsa" required name="dsa"  value="<?php echo $info->name; ?>">
                                    </div>                         
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Member Offer</label>
                                        <input type="text" class="form-control  " id="moffer" name="moffer" value="<?php //echo set_value('moffer'); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                   <div class="form-group">
                                      <input type="hidden" name="dsa_id" id="dsa_id" value="<?php echo 
                                      $this->session->userdata('userId');?>"> 
                                   </div> 
                                </div>
                            </div>
                              <?php
                                     }
                                       }
                                  ?>
                            
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
<script>
$( document ).ready(function() {
$("#pamount").change(function(){
    $("#tamount").val(parseInt($("#aamount").val())+parseInt($("#pamount").val()));
}); 
$("#ipayment").change(function(){
    $("#bal").val(parseInt($("#tamount").val())-parseInt($("#ipayment").val()));
}); 
$("#nemi").change(function(){
    $("#eamount").val(parseInt($("#bal").val())/parseInt($("#nemi").val()));
});
 $("#apartment").change(function(){
    if($("#apartment").val()=="Studio-2"){
        $("#occupancy").val(2);
    }else if($("#apartment").val()=="1 BR-4"){
        $("#occupancy").val(4);
    }
});
});
</script>
<script type="text/javascript">
 function validityDate() 
 {
    var str = document.memberForm.doj.value;

    if( /^\d{2}\/\d{2}\/\d{4}$/i.test( str ) )
    {
       var parts = str.split("/");

       var day = parts[0] && parseInt( parts[0], 10 );

       var month = parts[1] && parseInt( parts[1], 10 );

       var year = parts[2] && parseInt( parts[2], 10 );

       var time = document.memberForm.tenure.value;

       var duration = time && parseInt(time,10);

       if( day <= 31 && day >= 1 && month <= 12 && month >= 1 )
       {
        var expiryDate = new Date( year, month - 1, day );
                expiryDate.setFullYear( expiryDate.getFullYear() + duration );

          var day = ( '0' + expiryDate.getDate() ).slice( -2 );
          var month = ( '0' + ( expiryDate.getMonth() + 1 ) ).slice( -2 );
           var year = expiryDate.getFullYear();

           document.memberForm.vdate.value = (day + "/" + month + "/" + year);

       }

       else
       {
        alert('something went wrong');
       }



    }
        
 }  
</script>
<script type="text/javascript">
    
</script>