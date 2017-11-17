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
              <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>editConfiguration"><i class="fa fa-pencil"></i> Edit</a>
                </div>
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
                      <td><?= $record->userId; ?></td>
                    </tr>
                     <tr>
                      <th>Name</th>
                      <td><?= $record->name; ?></td>
                    </tr>
                     <tr>
                      <th>Email</th>
                      <td><?= $record->email; ?></td>
                    </tr>
                     <tr>
                      <th>Mobile no</th>
                      <td><?= $record->mobile; ?></td>
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
                      <td><?php echo $site_info->site_name; ?></td>
                    </tr>
                    <tr>
                      <th>Admin Amount</th>
                      <td><?php echo $site_info->admin_amount; ?></td>
                    </tr>
                    <tr>
                      <th>AMC Amount</th>
                      <td><?php echo $site_info->amc_amount; ?></td>
                    </tr>
                    <?php
                        }
                    }
                    ?>                   
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
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
