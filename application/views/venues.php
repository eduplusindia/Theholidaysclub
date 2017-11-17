<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Venue Management
        <small>List</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
				<a class="btn btn-primary" href="<?php echo base_url(); ?>locations"><i class="fa fa-eye"></i> View Locations</a>
                <a class="btn btn-primary" href="<?php echo base_url(); ?>addvenue/<?php echo $locID;?>"><i class="fa fa-plus"></i> Add New Venue</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Venues List</h3>
                   <!-- <div class="box-tools">
                        <form action="<?php echo base_url() ?>userListing" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php //echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>-->
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>Id</th>
                      <th class="text-center">Venue</th>
                      <th class="text-center">Location</th>
					   <th class="text-center">Status</th>
					   <th class="text-center">Action</th>
                    </tr>
                    <?php
	$loc_arr=array();
                    if(!empty($locations))
                    {
                        foreach($locations as $record)
                        {
						$loc_arr = $this->user_model->getsingleLocation($record->parent_id);
						if(count($loc_arr)>0){
						$larr = $loc_arr[0]->locationName;
						}else{
						$larr = $loc_arr=array();	
						}
						
                    ?>
                    <tr>
                      <td><?php echo $record->id ?></td>
                      <td class="text-center"><?php echo $record->locationName ?></td>
                      <td class="text-center"><?php if(count($loc_arr)>0){echo $larr;}?></td>
                      <td class="text-center"><?php echo ($record->status==1)?'Active':'Deactive'; ?></td>
                
                     
                      <td class="text-center">
                          <a class="btn btn-sm btn-info" href="<?php echo base_url().'editvenues/'.$record->id; ?>"><i class="fa fa-pencil"></i></a>
                          <a class="btn btn-sm btn-danger deleteUser" href="#" data-userid="<?php echo $record->id; ?>"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
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
