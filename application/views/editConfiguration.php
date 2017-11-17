<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-user"></i>Admin Information
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Configuration</h3>
                    <div class="box-tools">
                    </div>
                </div><!-- /.box-header -->

                <form method="POST" action="<?php echo base_url();?>updateConfiguration" role="form">
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <?php
                    if(!empty($admin_info))
                    {
                        foreach($admin_info as $record)
                        {
                    ?>
                    <tr>
                      <th>Id</th>
                      <td>
                        <div class="form-group">                              
                        <input type="text" name="userId" value="<?= $record->userId; ?>" class="form-control required" readonly>
                      </div>
                      </td>
                    </tr>
                     <tr>
                      <th>Name</th>
                      <td>
                        <div class="form-group">                              
                        <input type="text" name="userName" class="form-control required"  value="<?= $record->name; ?>">  
                        </div>                      
                        </td>
                    </tr>
                     <tr>
                      <th>Email</th>
                      <td>
                        <div class="form-group">                              
                        <input type="text" name="userEmail" class="form-control required" value="<?= $record->email; ?>">
                        </div>
                        </td>
                    </tr>
                     <tr>
                      <th>Mobile no</th>
                      <td>
                        <div class="form-group">
                          <input type="text" name="mobile" value="<?= $record->mobile; ?>" class="form-control required">
                      </div>
                      </td>
                    </tr>
                     <?php
                        }
                    }
                    ?>
                     <?php
                    if(!empty($site_info))
                    {
                        foreach($site_info as $site_info)
                        {
                    ?>
                    <tr>
                      <th>Site Name</th>
                      <td>
                        <div class="form-group">
                          <input type="text" name="site_name"  class="form-control required" value="<?= $site_info->site_name; ?>">
                      </div>
                      </td>
                    </tr>
                    <tr>
                      <th>Admin Amount</th>
                      <td>
                        <div class="form-group">
                          <input type="text" name="admin_amount"  class="form-control required" value="<?= $site_info->admin_amount; ?>">
                      </div>
                      </td>
                    </tr>
                    <tr>
                      <th>AMC Amount</th>
                      <td>
                        <div class="form-group">
                          <input type="text" name="amc_amount"  class="form-control required" value="<?= $site_info->amc_amount;?>">
                      </div>
                      </td>
                    </tr>
                     <?php
                        }
                    }
                    ?>
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <input type="submit" name="submit" class="btn btn-primary">
                </div>
                </form>
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
