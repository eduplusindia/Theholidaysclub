<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Vouchers Management
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>giftVoucher"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Vouchers List</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url(); ?>vouchers" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                 <form action="<?php echo base_url(); ?>voucherByLocation" method="POST" id="searchList">
                         <div class="row">
                          <div class="col-md-3 col-md-offset-9" style="padding-left: 2%;padding-right:2%;padding-bottom: 1%;">
                            <div class="input-group">
                              <select class="form-control input-sm pull-right" id="locID" name="locID">
                                    <option value="">Search by Location</option>
                                    <?php foreach($voucherLocations as $locs)
                                      {
                                     ?>  
                                      <optgroup label="<?php echo $locs->locationName; ?>">
                                      <?php $voucherVenues = $this->user_model->getActivevenue($locs->id); 
                                      foreach ($voucherVenues as $venues) 
                                      {
                                         ?>
                                         <option value="<?php echo $venues->id;?>"><?php echo $venues->locationName; ?>
                                         </option>
                                         <?php
                                         }
                                         ?>
                                        </optgroup>
                                         <?php
                                          }
                                         ?>
                                        </select>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default"><i class="fa fa-map-marker"></i></button>
                              </div>
                            </div>
                          </div>
                          </div>  
                        </form>
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>Id</th>
                      <th>Voucher Code</th>
                      <th>Name</th>
                      <th>Date Of Generation</th>
                      <th>Expiration Date</th>
					             <th>Manager Name</th>
                       <th>Venue</th>
                      <th class="text-center">Actions</th>
                    </tr>
                    <?php
					
					
                    if(!empty($vouchers))
                    {
						
						//print_r($webuserRecords);
                        foreach($vouchers as $record)
                        {
                    ?>
                    <tr>
                      <td><?php echo $record->id ?></td>
                      <td><?php echo $record->voucher_code?></td>
                      <td><?php echo $record->name ?></td>
                      <td><?php echo $record->date_of_generation ?></td>
                      <td><?php echo $record->expiration_date ?></td>
                      <td><?php echo $record->dsaName  ?></td>
                      <td><?php echo $record->locationName ?></td>
					  <!--<td><?php //echo ($record->status=='1')?'Active':'Inactive'; ?></td>-->
                      <td class="text-center">
             <a class="btn btn-sm btn-info" href="<?php echo base_url().'voucherDetails/'.$record->id; ?>"><i class="fa fa-file-pdf-o"></i>&nbsp;View</a>
              <a class="btn btn-sm btn-info" href="<?php echo base_url().'voucherProfile/'.$record->id; ?>">View Profile</a>            
					  <a class="btn btn-sm btn-danger deleteVoucher" href="<?php echo base_url().'deleteVoucher/'.$record->id; ?>"  data-voucherid="<?php echo $record->id; ?>"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
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
