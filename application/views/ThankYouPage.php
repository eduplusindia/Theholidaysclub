<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-gift"></i>Thank You
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                 <?php
                    if(!empty($info))
                    {
                        foreach($info as $info)
                        {
                    ?>
              <div class="box">
                <div class="box-header">
                   <div class="row"> 
                    <div class="pull-left">
                    <h3 class="box-title">Gift</h3>&nbsp;<p style="float: left;">Code:-<?php echo $info->voucher_code ;?></p>
                    </div>
                    <div class="pull-right">
                    <img src="http://www.webhint.in/theholidays/new/images/logo.png" alt="the Holidays Clubs" align="center">
                     </div>
                    </div> 
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                   
                    <div class="w3-container w3-tangerine">
                    <p style="padding-left: 5%;padding-top: 0.5%;font-weight: bold;font-size: 20px;" class="w3-jumbo" >Congrulations!</p>
                    </div>
                    <p style=" padding-left: 5%;padding-top: 0.5%;"> On participation in the presentation of The Holidays Club, this voucher is issued to: <?php echo ucfirst($info->name) ?></p>
            <p style=" padding-left: 5%;padding-top: 0.5%;">Issued on:<?php echo $info->date_of_generation; ?> valid for six months from the date of issue.
     To avail for this offer you must have at least three options of dates and destination in which the management has the right to offer you any one of the given destination/dat. this voucher entitles you to 3N/4D accommodation at our associate hotels. </p>
     <div class="list">
     <ul>
     <li style="padding-top: 0.5%">This holiday voucher is redeemable for 3N/4D accommodation only in STD/Semi Deluxe room only at The Holidays Club Hotels.</li>
     <li style="padding-top: 0.5%">This voucher can be used at associate Hotels & Resorts only.</li>
     <li style="padding-top: 0.5%">This voucher is only for 2 adults(Couple) and 2 kids (age: below 12 Years).</li>
     <li style="padding-top: 0.5%">This voucher is not valid during peak season & public holidays,as well as Diwali, Christmas, New Year, Independence Day, Republic Day and long weekends.</li>
     <li style="padding-top: 0.5%">This voucher is not transferable & cannot be redeemed for cash.</li>
    <li style="padding-top: 0.5%">A prepaid administration fee of Rs.3000/- is mandatory to pay in advance by CH/CC/NEFT/IMPS. For Neft/ Imps, a mail will be sent for account details from info@theholidaysclubs.com .</li>
    </ul>
    </div>
    <p style="padding-left: 5%;padding-top: 0.5%"> It cannot be by verbal commitment of any person.(No Verbal assurance from whom-so ever is acceptable for voucher redemption/reservation.)</p>

    <p style="padding-left: 5%;padding-top: 0.5%"> Booking is subject to availability.</p>
    <p style="padding-left: 5%;padding-top: 0.5%"> Extra charge as per hotels policy.</p>
    <p style="padding-left: 5%;padding-top: 0.5%"> Company will entertain 1 voucher for one family either member or non-member.</p>
    
   
<p style="padding-left: 5%;padding-top: 0.5%">Destination: Rishikesh, Shimla, Haridwar, Shirdhi, Jodhpur, Goa, Agra, Manali, Jaipur,Jibhi, Nainital</p>
<p style="padding-left: 5%;padding-top: 0.5%">For booking kindly send the scanned copy of your voucher at booking@theholidaysclubs.com along with three choices of destinations and dates providing at least 30-45 days of advance notice.</p>

<table class="table">
    <tr>
        <td></td>
        <td>CHOICE 1</td>
        <td>CHOICE 2</td>
        <td>CHOICE 3</td>
    </tr>
    <tr>
        <th>Destination</th>
        <td><ins></ins></td>
        <td><ins></ins></td>
        <td><ins></ins></td>
    </tr>
    <tr>
        <th>Date</th>
        <td><ins></ins></td>
        <td><ins></ins></td>
        <td><ins></ins></td>
    </tr>
</table>
                    <?php
                        }
                    }
                    ?>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <button type="button" class="btn btn-primary" onclick="window.print();">Print</button>
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
            var link = jQuery(tdis).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "userListing/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
