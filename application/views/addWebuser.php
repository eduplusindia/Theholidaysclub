<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Member Management
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
		
		<form role="form" id="regiration_form" action="<?php echo base_url() ?>insertMember" method="post" role="form" name="form">
			<div class="box-body">
				<div class="row">
					<div class="col-md-6">                                
						<div class="form-group">
							<label for="">Membership No</label>
							<input type="text" class="form-control" id="">
						</div>
						
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="ano">Approaved Form no</label>
							<input type="text" class="form-control" id="ano"  name="ano" value="<?php //echo set_value('ano');?>" >
							<?php //echo form_error('ano','<div class="error">','</div>'); ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="Mname">Main Applicant Name</label>
							<input type="text" class="form-control " id="Mname"  name="Mname" 
							value="<?php //echo set_value('Mname'); ?>" >
							 <?php //echo form_error('Mname','<div class="error">','</div>'); ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="dob1">Date Of Birth</label>
							<input type="date" class="form-control  " id="dob1" name="dob1" value="<?php //echo set_value('dob1'); ?>">
							 <?php //echo form_error('dob1','<div class="error">','</div>'); ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="Cname">Co-Applicant Name</label>
							<input type="text" class="form-control " id="Cname" name="Cname" value="<?php //echo set_value('Cname'); ?>">
							 <?php //echo form_error('Cname','<div class="error">','</div>'); ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="dob2">Date Of Birth</label>
							<input type="date" class="form-control " id="dob2" name="dob2" value="<?php //echo set_value('dob2'); ?>" >
							 <?php //echo form_error('dob2','<div class="error">','</div>'); ?>
						</div>
					</div>    
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="address">Address</label>
							<input type="text" class="form-control " id="address"  name="address" value="<?php //echo set_value('address'); ?>">
							   <?php //echo form_error('address','<div class="error">','</div>'); ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="city">City</label>
							<input type="text" class="form-control " id="city"  name="city" value="<?php //echo set_value('city'); ?>">
						   <?php //echo form_error('city','<div class="error">','</div>'); ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="pin">Pin</label>
							<input type="text" class="form-control  " id="pin" name="pin" value="<?php //echo set_value('pin'); ?>" >
							 <?php //echo form_error('pin','<div class="error">','</div>'); ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="mob1">Mobile No.1</label>
							<input type="text" class="form-control " id="mob1"  name="mob1" value="<?php //echo set_value('mob1'); ?>" >
							 <?php //echo form_error('mob1','<div class="error">','</div>'); ?>                                                                          </div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="mob2">Mobile No.2</label>
							<input type="text" class="form-control  " id="mob2" name="mob2" value="<?php //echo set_value('mob2'); ?>">
							  <?php //echo form_error('mob2','<div class="error">','</div>'); ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="rno">Residence no</label>
							<input type="text" class="form-control " id="rno"  name="rno" value="<?php //echo set_value('rno'); ?>" >
							 <?php //echo form_error('rno','<div class="error">','</div>'); ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="email">Email ID</label>
							<input type="text" class="form-control  " id="email" name="email" value="<?php //echo set_value('email'); ?>" >
							 <?php //echo form_error('email','<div class="error">','</div>'); ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="doj">Date Of Joining</label>
							<input type="date" class="form-control " id="doj"  name="doj" value="<?php echo date('Y-m-d');?>" >
							 <?php //echo form_error('doj','<div class="error">','</div>'); ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="tenure">Tenure</label>
							<select class="form-control  " id="tenure" name="tenure" value="<?php //echo set_value('tenure'); ?>">
								<option>Select Tenure</option>
								<option value="1">1</option>
								<option value="3">3</option>
								<option value="5">5</option>
								<option value="10">10</option>
								<option value="20">20</option>
								<option value="25">25</option>
							</select>
							 <?php //echo form_error('tenure','<div class="error">','</div>'); ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="vdate">Validity Date</label>
							<input type="date" class="form-control " id="vdate"  name="vdate" value="<?php //echo set_value('vdate'); ?>">
						  <?php //echo form_error('vdate','<div class="error">','</div>'); ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="ctype">Card Type(Season)</label>
							<select class="form-control " id="ctype" name="ctype" value="<?php //echo set_value('ctype'); ?>">
							  <option>Select Card Type</option>  
							<option value="Red">Red</option>
							<option value="White">White</option>
							<option value="Blue">Blue</option>	
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
							onChange="personoccupancy()" value="<?php //echo set_value('apartment'); ?>">
							 <option>Select Apartment</option>
							 <option value="Studio-2">Studio-2</option> 
							 <option value="1 BR-4">1 BR-4</option>  
							</select>
							 <?php //echo form_error('apartment','<div class="error">','</div>'); ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="tenure">Person Ocuupancy</label>
							<input type="text" class="form-control  " id="occupancy" name="occupancy"  value="<?php //echo set_value('occupancy'); ?>">
							  <?php //echo form_error('occupancy','<div class="error">','</div>'); ?>
						</div>
					</div>
				</div>
				 <div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="pamount" >Purchase Amount</label>
							<input type="text" class="form-control " id="pamount"  name="pamount" onChange="updatesum()" value="<?php //echo set_value('pamount'); ?>">
							  <?php //echo form_error('pamount','<div class="error">','</div>'); ?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="aamount" >Admin Amount</label>
							<input type="text" class="form-control  " id="aamount" name="aamount" value="12000" onChange="updatesum()"  >
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="tamount">Total Amount</label>
							<input type="text" class="form-control" id="tamount" name="tamount" onChange="updatesum1()" value="<?php //echo set_value('tamount'); ?>" >
							 <?php //echo form_error('tamount','<div class="error">','</div>'); ?>
						</div>
					</div>
				</div>
				 <div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="ipayment">Initial Payment</label>
							<input type="text" class="form-control " id="ipayment"  name="ipayment" onChange="updatesum1()" value="<?php //echo set_value('ipayment'); ?>">
							 <?php //echo form_error('ipayment','<div class="error">','</div>'); ?> 
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="mop">Mode Of Payment</label>
							<select type="text" class="form-control  " id="mop" name="mop" value="<?php //echo set_value('mop'); ?>" >
								<option>Select Mode Of Payment</option>
								<option value="Card">Card</option>
								<option value="Cheque">Cheque</option>
								<option value="Online">Online</option>
								<option value="Cash">Cash</option>
								<option value="Multiple">Multiple</option>
							</select>
							  <?php //echo form_error('mop','<div class="error">','</div>'); ?>
						</div>
					</div>
				</div>
				 <div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="bal">Balance</label>
							<input type="text" class="form-control " id="bal"  name="bal" value="<?php //echo set_value('bal'); ?>" >
							  <?php //echo form_error('bal','<div class="error">','</div>'); ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="bpm">Balance Payment Mode</label>
							<select class="form-control  " id="bpm" name="bpm" value="<?php //echo set_value('bpm'); ?>" >
								<option>Select Mode Of Payment</option>
								<option>Card</option>
								<option>Cheque</option>
								<option>Online</option>
								<option>Cash</option>
								<option>Multiple</option>
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
								<option>3</option>
								<option>6</option>
								<option>9</option>
								<option>12</option>
								<option>15</option>
							</select>
							  <?php //echo form_error('nemi','<div class="error">','</div>'); ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="eamount">EMI Amount</label>
							<input type="text" class="form-control  " id="eamount" name="eamount"  value="<?php //echo set_value('eamount'); ?>" >
							 <?php //echo form_error('eamount','<div class="error">','</div>'); ?>
						</div>
					</div>
				</div>
				 <div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="edate">EMI Start Date</label>
							<input type="date" class="form-control " id="edate"  name="edate" value="<?php //echo set_value('edate'); ?>">
							  <?php //echo form_error('edate','<div class="error">','</div>'); ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="amc">AMC</label>
							<input type="text" class="form-control  " id="amc" name="amc" value="8500"   >
						</div>
					</div>
				</div>
				 <div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="ename">Excutive Name</label>
							<input type="text" class="form-control " id="ename"  name="ename" value="<?php //echo set_value('ename'); ?>" >
							  <?php //echo form_error('ename','<div class="error">','</div>'); ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="mname">Manager Name</label>
							<input type="text" class="form-control  " id="mname" name="mname" value="<?php //echo set_value('mname'); ?>">
							  <?php //echo form_error('mname','<div class="error">','</div>'); ?>
						</div>
					</div>
				</div>
				 <div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="dsa">DSA Id</label>
							<input type="text" class="form-control " id="dsa"  name="dsa"  value="<?php //echo set_value('dsa'); ?>">
							 <?php //echo form_error('dsa','<div class="error">','</div>'); ?>
						</div>
						 
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="moffer">Member Offer</label>
							<input type="text" class="form-control  " id="moffer" name="moffer" value="<?php //echo set_value('moffer'); ?>">
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
	</div>    
</section>
    
</div>
<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>
