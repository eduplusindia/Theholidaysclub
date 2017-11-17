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
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>vouchers"><i class="fa fa-arrow-left"></i>Back</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Vouchers List</h3>
                    <div class="box-tools">
                        <!--<form action="<?php echo base_url(); ?>vouchers" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>-->
                    </div>
                </div><!-- /.box-header -->
       
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <?php
                     if(!empty($profileInfo))
                     {
                       foreach ($profileInfo as $info) 
                       {
                      ?>
                     <tr>
                       <th>Voucher Id</th>
                       <td><?= $info->id; ?></td>
                     </tr>
		                 <tr>
                     <th>Voucher Code</th>
                       <td><?= $info->voucher_code; ?></td>  
                     </tr>
                     <tr>
                       <th>Name</th>
                       <td><?= $info->name; ?></td>
                     </tr>
                     <tr>
                       <th>Email</th>
                       <td><?= $info->email; ?></td>
                     </tr>
                     <tr>
                       <th>Mobile No</th>
                       <td><?= $info->mobno; ?></td>
                     </tr>
                     <tr>
                       <th>Address</th>
                       <td><?= $info->address; ?></td>
                     </tr>
                     <tr>
                       <th>Date Of Generation</th>
                       <td><?= $info->date_of_generation; ?></td>
                     </tr>
                     <tr>
                       <th>Date Of Expiration</th>
                       <td><?= $info->expiration_date; ?></td>
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
