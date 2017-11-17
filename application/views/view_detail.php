

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Mewmber Management
        <small>View Mewmber Details</small>
      </h1>
    </section>
    <section class="content">
        
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Member Details</h3>
                   <?php //print_r($memberInfo);?>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
				  <tr>
                      <th>User ID</th>
                      <th><?php echo $memberInfo[0]->id;?></th>
                     </tr>
                    <tr>
                      <th>Approaved Form no</th>
                      <th><?php echo $memberInfo[0]->a_no;?></th>
                     </tr> 
					 <tr>
                      <th>Applicant Name</th>
                      <th><?php echo $memberInfo[0]->m_name;?></th>
                     </tr> 
					
					 <tr>
                      <th>Date Of Birth</th>
                      <th><?php echo $memberInfo[0]->dob1;?></th>
                     </tr>
					 <tr>
                      <th>Co-Applicant Name</th>
                      <th><?php echo $memberInfo[0]->c_name;?></th>
                     </tr>
					 
					 <tr>
                      <th>Date Of Birth</th>
                      <th><?php echo $memberInfo[0]->dob2;?></th>
                     </tr>
					 
					 
					 <tr>
                      <th>Address</th>
                      <th><?php echo $memberInfo[0]->address;?></th>
                     </tr> 
					 <tr>
                      <th>City</th>
                      <th><?php echo $memberInfo[0]->city;?></th>
                     </tr> 
                    <tr>
                      <th>Pincode</th>
                      <th><?php echo $memberInfo[0]->pin;?></th>
                     </tr>
					 <tr>
                      <th>Mobile No.1</th>
                      <th><?php echo $memberInfo[0]->mob1;?></th>
                     </tr>
					 <tr>
                      <th>Mobile No.2</th>
                      <th><?php echo $memberInfo[0]->mob2;?></th>
                     </tr>
					 <tr>
                      <th>Residence no</th>
                      <th><?php echo $memberInfo[0]->r_no;?></th>
                     </tr>
					 <tr>
                      <th>Email ID</th>
                      <th><?php echo $memberInfo[0]->email;?></th>
                     </tr>
					 <tr>
                      <th>Date Of Joining</th>
                      <th><?php echo $memberInfo[0]->doj;?></th>
                     </tr>
					 <tr>
                      <th>Tenure</th>
                      <th><?php echo $memberInfo[0]->tenure;?></th>
                     </tr>
					 <tr>
                      <th>Validity Date</th>
                      <th><?php echo $memberInfo[0]->vdate;?></th>
                     </tr>
					 <tr>
                      <th>Card Type(Season)</th>
                      <th><?php echo $memberInfo[0]->ctype;?></th>
                     </tr>
					 <tr>
                      <th>Apartment</th>
                      <th><?php echo $memberInfo[0]->apartment;?></th>
                     </tr>
					 <tr>
                      <th>Person Ocuupancy</th>
                      <th><?php echo $memberInfo[0]->occupancy;?></th>
                     </tr>
					 <tr>
                      <th>Purchase Amount</th>
                      <th><?php echo $memberInfo[0]->purchase_amount;?></th>
                     </tr>
					 <tr>
                      <th>Admin Amount</th>
                      <th><?php echo $memberInfo[0]->admin_amount;?></th>
                     </tr>
					 <tr>
                      <th>Total Amount</th>
                      <th><?php echo $memberInfo[0]->total_amount;?></th>
                     </tr>
					 <tr>
                      <th>Initial Payment</th>
                      <th><?php echo $memberInfo[0]->initial_payment;?></th>
                     </tr>
					 <tr>
                      <th>Mode Of Payment</th>
                      <th><?php echo $memberInfo[0]->mode_of_payment;?></th>
                     </tr>
					 <tr>
                      <th>Balance</th>
                      <th><?php echo $memberInfo[0]->bal;?></th>
                     </tr>
					 <tr>
                      <th>Balance Payment Mode</th>
                      <th><?php echo $memberInfo[0]->bal_payment;?></th>
                     </tr>
					 <tr>
                      <th>No. Of EMI</th>
                      <th><?php echo $memberInfo[0]->no_of_emi;?></th>
                     </tr>
					 <tr>
                      <th>EMI Amount</th>
                      <th><?php echo $memberInfo[0]->emi_amount;?></th>
                     </tr>
					 <tr>
                      <th>EMI Start Date</th>
                      <th><?php echo $memberInfo[0]->emi_start_date;?></th>
                     </tr>
					 <tr>
                      <th>AMC</th>
                      <th><?php echo $memberInfo[0]->amc;?></th>
                     </tr>
					 <tr>
                      <th>Excutive Name</th>
                      <th><?php echo $memberInfo[0]->excutive_name;?></th>
                     </tr>
					 <tr>
                      <th>Manager Name</th>
                      <th><?php echo $memberInfo[0]->manager_name;?></th>
                     </tr>
					 <tr>
                      <th>DSA ID</th>
                      <th><?php echo $memberInfo[0]->dsa_id;?></th>
                     </tr>
					 <tr>
                      <th>Member Offer</th>
                      <th><?php echo $memberInfo[0]->member_offer;?></th>
                     </tr>
					  <tr>
                      <th colspan='2'><a href="<?php echo base_url().'membersList/';?>" align="center">Back</a></th>
                      
                     </tr>
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php //echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "userListing/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
