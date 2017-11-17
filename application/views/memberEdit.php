<?php
/* $userId = '';
$name = '';
$email = '';
$mobile = '';
$roleId = '';
$status = ''; */
//print_r($userInfo);
if(!empty($userInfo))
{
    foreach ($userInfo as $uf)
    {
        $userId = $uf->id;
        $a_no = $uf->a_no;
        $memberShipid = $uf->memberShipid;
       
        $m_name = $uf->m_name;
		$dob1 = $uf->dob1;
		$c_name = $uf->c_name;
		$dob2 = $uf->dob2;
       
       $address = $uf->address;
       $city = $uf->city;
       $pin = $uf->pin;
       $mob1 = $uf->mob1;
       $mob2 = $uf->mob2;
       $r_no = $uf->r_no;
	   $email = $uf->email;
	   $doj = $uf->doj;
	   $tenure = $uf->tenure;
	   $vdate = $uf->vdate;
	   $ctype = $uf->ctype;
	   $apartment = $uf->apartment;
	   $occupancy = $uf->occupancy;
	   $purchase_amount = $uf->purchase_amount;
	   $admin_amount = $uf->admin_amount;
	   $total_amount = $uf->total_amount;
	   $initial_payment = $uf->initial_payment;
	   $mode_of_payment = $uf->mode_of_payment;
	   $bal = $uf->bal;
	   $bal_payment = $uf->bal_payment;
	   $no_of_emi = $uf->no_of_emi;
	   $emi_amount = $uf->emi_amount;
	   $emi_start_date = $uf->emi_start_date;
	   $amc = $uf->amc;
	   $excutive_name = $uf->excutive_name;
	   $manager_name = $uf->manager_name;
	   $dsa_id = $uf->dsa_id;
	   $member_offer = $uf->member_offer;
    } 
}


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Members Management
        <small>Add / Edit Member</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Member Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" id="regiration_form" action="<?php echo base_url() ?>updateMember" method="post" role="form" name="form">
					<input type="hidden" value="<?php echo $userId; ?>" name="memberId" id="memberId" /> 
			<div class="box-body">
				<div class="row">
					<div class="col-md-6">                                
						<div class="form-group">
							<label for="">Membership No</label>
							<input type="text" class="form-control" id="" name="memberShip" value="<?php echo $memberShipid;?>">
						</div>
						
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="ano">Approaved Form no</label>
							<input type="text" class="form-control" id="ano" required name="ano" value="<?php echo  $a_no;?>" >
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="Mname">Main Applicant Name</label>
							<input type="text" class="form-control" id="Mname" required name="Mname" 
							value="<?php echo $m_name;?>" >
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="dob1">Date Of Birth</label>
							<input type="date" class="form-control" id="dob1" required name="dob1" value="<?php echo  $dob1;?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="Cname">Co-Applicant Name</label>
							<input type="text" class="form-control" id="Cname" name="Cname" value="<?php echo $c_name; ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="dob2">Date Of Birth</label>
							<input type="date" class="form-control" id="dob2" name="dob2" value="<?php echo $dob2; ?>" >
						</div>
					</div>    
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="address">Address</label>
							<input type="text" class="form-control" id="address" required name="address" value="<?php echo $address; ?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="city">City</label>
							<input type="text" class="form-control" id="city" required name="city" value="<?php echo $city; ?>">
						  
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="pin">Pin</label>
							<input type="text" class="form-control" id="pin" name="pin" value="<?php echo $pin; ?>" >
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="mob1">Mobile No.1</label>
							<input type="text" class="form-control" id="mob1" required name="mob1" value="<?php echo $mob1;?>" >
				   </div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="mob2">Mobile No.2</label>
							<input type="text" class="form-control" id="mob2" name="mob2" value="<?php echo $mob2;?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="rno">Residence no</label>
							<input type="text" class="form-control" id="rno" required name="rno" value="<?php echo $r_no; ?>" >
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="email">Email ID</label>
							<input type="email" class="form-control" id="email" required name="email" value="<?php echo $email; ?>" >
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="doj">Date Of Joining</label>
							<input type="date" class="form-control" id="doj"  name="doj" value="<?php echo $doj;?>" >
							
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="tenure">Tenure</label>
							<select class="form-control" id="tenure" name="tenure">
								<option>Select Tenure</option>
								<option value="1" <?php echo ($tenure=="1")?'Selected':'';?>>1</option>
								<option value="3" <?php echo ($tenure=="3")?'Selected':'';?>>3</option>
								<option value="5" <?php echo ($tenure=="5")?'Selected':'';?>>5</option>
								<option value="10" <?php echo ($tenure=="10")?'Selected':'';?>>10</option>
								<option value="20" <?php echo ($tenure=="20")?'Selected':'';?>>20</option>
								<option value="25" <?php echo ($tenure=="25")?'Selected':'';?>>25</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="vdate">Validity Date</label>
							<input type="date" class="form-control" id="vdate" required name="vdate" value="<?php echo $vdate; ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="ctype">Card Type(Season)</label>
							<select class="form-control " id="ctype" name="ctype">
							  <option>Select Card Type</option>  
							<option value="Red" <?php echo ($ctype=="Red")?'Selected':'';?>>Red</option>
							<option value="White" <?php echo ($ctype=="White")?'Selected':'';?>>White</option>
							<option value="Blue" <?php echo ($ctype=="Blue")?'Selected':'';?>>Blue</option>	
							</select>
							 <?php //echo form_error('ctype','<div class="error">','</div>'); ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="doj">Apartment</label>
							<select class="form-control " id="apartment"  name="apartment" 
							onChange="personoccupancy()">
							 <option>Select Apartment</option>
							 <option value="Studio-2" <?php echo ($apartment=="Studio-2")?'Selected':'';?>>Studio-2</option> 
							 <option value="1 BR-4" <?php echo ($apartment=="1 BR-4")?'Selected':'';?>>1 BR-4</option>  
							</select>
							 <?php //echo form_error('apartment','<div class="error">','</div>'); ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="tenure">Person Ocuupancy</label>
							<input type="text" class="form-control  " id="occupancy" name="occupancy"  value="<?php echo $occupancy; ?>">
							  <?php //echo form_error('occupancy','<div class="error">','</div>'); ?>
						</div>
					</div>
				</div>
				 <div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="pamount" >Purchase Amount</label>
							<input type="text" class="form-control " id="pamount"  name="pamount" onChange="updatesum()" value="<?php echo $purchase_amount; ?>">
							  <?php //echo form_error('pamount','<div class="error">','</div>'); ?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="aamount" >Admin Amount</label>
							<input type="text" class="form-control  " id="aamount" name="aamount" value="<?php echo $admin_amount; ?>" onChange="updatesum()"  >
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="tamount">Total Amount</label>
							<input type="text" class="form-control" id="tamount" name="tamount" onChange="updatesum1()" value="<?php echo $total_amount; ?>" >
							 <?php //echo form_error('tamount','<div class="error">','</div>'); ?>
						</div>
					</div>
				</div>
				 <div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="ipayment">Initial Payment</label>
							<input type="text" class="form-control " id="ipayment"  name="ipayment" onChange="updatesum1()" value="<?php echo $initial_payment; ?>">
							 <?php //echo form_error('ipayment','<div class="error">','</div>'); ?> 
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="mop">Mode Of Payment</label>
							<select type="text" class="form-control  " id="mop" name="mop" >
								<option>Select Mode Of Payment</option>
								<option value="Card" <?php echo ($mode_of_payment=="Card")?'Selected':'';?>>Card</option>
								<option value="Cheque" <?php echo ($mode_of_payment=="Cheque")?'Selected':'';?>>Cheque</option>
								<option value="Online" <?php echo ($mode_of_payment=="Online")?'Selected':'';?>>Online</option>
								<option value="Cash" <?php echo ($mode_of_payment=="Cash")?'Selected':'';?>>Cash</option>
								<option value="Multiple" <?php echo ($mode_of_payment=="Multiple")?'Selected':'';?>>Multiple</option>
							</select>
							  <?php //echo form_error('mop','<div class="error">','</div>'); ?>
						</div>
					</div>
				</div>
				 <div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="bal">Balance</label>
							<input type="text" class="form-control " id="bal"  name="bal" value="<?php echo $bal; ?>" >
							  <?php //echo form_error('bal','<div class="error">','</div>'); ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="bpm">Balance Payment Mode</label>
							<select class="form-control" id="bpm" name="bpm" value="<?php //echo set_value('bpm'); ?>" >
								<option>Select Mode Of Payment</option>
								<option value="Card" <?php echo ($bal_payment=="Card")?'Selected':'';?>>Card</option>
								<option value="Cheque" <?php echo ($bal_payment=="Cheque")?'Selected':'';?>>Cheque</option>
								<option value="Online" <?php echo ($bal_payment=="Online")?'Selected':'';?>>Online</option>
								<option value="Cash" <?php echo ($bal_payment=="Cash")?'Selected':'';?>>Cash</option>
								<option value="Multiple" <?php echo ($bal_payment=="Multiple")?'Selected':'';?>>Multiple</option>
								
							</select>
							 <?php //echo form_error('bpm','<div class="error">','</div>'); ?>
						</div>
					</div>
				</div>
				 <div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="nemi">No. Of EMI</label>
							<select type="text" class="form-control " id="nemi"  name="nemi" onChange="updatesum2()" value="<?php //echo set_value('nemi'); ?>" >
								<option value="3" <?php echo ($no_of_emi=="3")?'Selected':'';?>>3</option>
								<option value="6" <?php echo ($no_of_emi=="6")?'Selected':'';?>>6</option>
								<option value="9" <?php echo ($no_of_emi=="9")?'Selected':'';?>>9</option>
								<option value="12" <?php echo ($no_of_emi=="12")?'Selected':'';?>>12</option>
								<option value="15" <?php echo ($no_of_emi=="15")?'Selected':'';?>>15</option>
							</select>
							  <?php //echo form_error('nemi','<div class="error">','</div>'); ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="eamount">EMI Amount</label>
							<input type="text" class="form-control  " id="eamount" name="eamount"  value="<?php echo $emi_amount; ?>" >
							 <?php //echo form_error('eamount','<div class="error">','</div>'); ?>
						</div>
					</div>
				</div>
				 <div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="edate">EMI Start Date</label>
							<input type="date" class="form-control " id="edate"  name="edate" value="<?php echo $emi_start_date; ?>">
							  <?php //echo form_error('edate','<div class="error">','</div>'); ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="amc">AMC</label>
							<input type="text" class="form-control  " id="amc" name="amc" value="<?php echo $amc;?>"/>
						</div>
					</div>
				</div>
				 <div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="ename">Excutive Name</label>
							<input type="text" class="form-control " id="ename"  name="ename" value="<?php echo $excutive_name; ?>" >
							  <?php //echo form_error('ename','<div class="error">','</div>'); ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="mname">Manager Name</label>
							<input type="text" class="form-control  " id="mname" name="mname" value="<?php echo $manager_name; ?>">
							  <?php //echo form_error('mname','<div class="error">','</div>'); ?>
						</div>
					</div>
				</div>
				 <div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="dsa">DSA Id</label>
							<input type="text" class="form-control " id="dsa"  name="dsa"  value="<?php echo $dsa_id; ?>">
							 <?php //echo form_error('dsa','<div class="error">','</div>'); ?>
						</div>
						 
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="moffer">Member Offer</label>
							<input type="text" class="form-control  " id="moffer" name="moffer" value="<?php echo $member_offer; ?>">
							 <?php //echo form_error('moffer','<div class="error">','</div>'); ?>
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