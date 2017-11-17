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
            <div class="col-xs-12 text-right">
                <div class="form-group">
                	<button type="button" class="btn btn-primary" onclick="window.print();">Print</button>
                </div>
            </div>
        </div>
	<div class="row">
		<!-- left column -->
<div class="col-md-12">
  <!-- general form elements -->
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Enter Member Details</h3>
		</div><!-- /.box-header -->
		<!-- form start -->
		
		<form role="form" id="regiration_form" action="<?php echo base_url() ?>insertMember" method="post" role="form" name="form">
			 <?php
                    if(!empty($info))
                    {
                        foreach($info as $info)
                        {
                    ?>
			<div class="box-body">
				<div class="row">
					<h4 class="memberpara" style="padding-top: 0;">Vacation Ownership & Payment Detail</h4>
				   <div class="membertable">
					<table style="width: 50%;">
						<tr>
							<th>Main Applicant Name</th>
							<td><?= $info->m_name; ?></td>
							<td><?= $info->dob1; ?></td>
						</tr>
						<tr>
							<th>Co-Applicant Name</th>
							<td><?= $info->c_name; ?></td>
							<td><?= $info->dob2; ?></td>
						</tr>
					</table>
				   </div>
				   <ul style="list-style: none;">
					<li><b>Address:-</b><?= $info->address; ?></li>
					<li><b>Pin:-</b><?= $info->pin; ?></li>
					<li><b>Mobile No:-</b><?= $info->mob1?>,<?= $info->mob2; ?></li>
					</ul>	
					<p class="memberpara">Whereas purchaser(s) hereby applies for a vacation ownership of “CLUB HOLIDAYS & RESORTS PVT. LTD. (CHRPL)” (exclusively promoted by its parent company CLUB HOLIDAYS & RESORTS PVT. LTD) corporate office at Address, hereinafter referred to as the developer, which is authorized to sell and allot “CLUB HOLIDAYS & RESORTS PVT. LTD. (CHRPL)” vacation ownership, details hereunder:</p>
					<div class="membertable">
					<table style="width: 80%">
						<tr>
							<th>Membership Tenure</th>
							<th>Membership Type</th>
							<th>Apartment Type</th>
							<th>Occupany</th>
							<th>Season Type</th>
						</tr>
						<tr>
							<td><?= $info->tenure; ?></td>
							<td></td>
							<td><?= $info->apartment?></td>
							<td><?= $info->occupancy?></td>
							<td><?= $info->ctype; ?></td>
						</tr>
					</table>
				   </div>
					
			<p class="memberpara" style="padding-bottom: 0 !important;margin-bottom: 0 !important;">
Subject only to admission to the vacation ownership of CLUB HOLIDAYS & RESORTS PVT. LTD. (CHRPL) the purchaser(s) agree to purchase and developer agree to sell, the vacation ownership rights specified as above and the purchaser(s) hereby agree to pay the purchase price specified as below towards administration fee and the vacation ownership fee as per the terms of this agreement given hereunder and overleaf upon receipt by the CLUB HOLIDAYS & RESORTS PVT. LTD. (CHRPL) of the full purchase consideration payable by the Purchaser(s) / Member(s) hereto, The Developer shall admit the purchaser(s) to the vacation ownership of CLUB HOLIDAYS & RESORTS PVT. LTD. (CHRPL). In accordance with the rules of occupation of CLUB HOLIDAYS & RESORTS PVT. LTD. (CHRPL) the purchaser(s) hereby applies for the vacation ownership of CLUB HOLIDAYS & RESORTS PVT. LTD. (CHRPL).
</p>		
  <div class="col-container" style="padding-top: 0 !important;">
  <div class="col" style="padding-left: 4%; padding-top: 0 ;">
  	<h3>Payment Terms</h3>
    	<table>
   		<tr>
   			<td>Vacation Ownership Fee</td>
   			<td><?= $info->purchase_amount; ?></td>
   		</tr>
   		<tr>
   			<td>Admintration Fee</td>
   			<td><?= $info->admin_amount?></td>
   		</tr>
   		<tr>
   			<td>Total Purchase Fee</td>
   			<td><?= $info->total_amount ?></td>
   		</tr>
   		<tr>
   			<td>Initial Payment Received(Not Refundable)</td>
   			<td><?= $info->initial_payment; ?></td>
   		</tr>
   		<tr>
   			<td>Balance Due</td>
   			<td><?= $info->bal; ?></td>
   		</tr>
   	</table>
  </div>

  <div class="col" style="padding-right: 4%;padding-top: 0;"> 
    <h3>Balance mode & Due Dates</h3>
   		<p>Rs.<?= $info->emi_amount; ?>/12&nbsp;MonthsEMI</p>
   		<p>w.e.f(Date)........../........./...........</p>
  </div>
</div>
   <p class="memberpara">
   	All payments should be made in favour of the Developer CLUB HOLIDAYS & RESORTS PVT. LTD. (CHRPL) only against their signed receipts and agreement / Terms & Conditions of company. The purchaser(s) acknowledges and agrees that upon the expiry of the membership rights referred to in this agreement his membership of CLUB HOLIDAYS & RESORTS PVT. LTD. (CHRPL) shall cease. YOUR CURRENT ANNUAL MANAGEMENT/MAINTENACE CHARGES IS Rs. 8,500/-(Rupees Eight Thousand Five Hundred only) For Studio Apartment & Rs. 11,000/- (Rupees Eleven Thousand only) For 1BR Apartment. This is variable in accordance with inflation. The management charges are mandatory and payable by all members and are specified above in advance on every yearly basis. The first maintenance will be payable after 90 days from date of joining or before availing first holidays, whichever comes first. Where the purchaser(s) is more than one person, then each such person shall be jointly and severally liable for the obligations and liabilities of the purchaser(s) under this agreement.
   </p>
      
      <div class="col-container">
        <div class="col" style="padding-right: 15%;padding-top: 0;">
           	<p style="padding-left: 10%;padding-top: 0;">Purchaser(1)......................................</p>
      			<p style="padding-left: 3%;padding-top: 1%;">Signatures</p>
      			<p style="padding-left:10%;padding-top: 1%; ">Purchaser(2)......................................</p>     
         </div>

        <div class="col" style="padding-top: 0;">
        	<div id="box">
           <h4><b>For The Behalf of</b></h4>
         	<p>CLUB HOLIDAYS & RESORTS PVT. LTD(CHRPL)</p>
         	<h3 style="padding-top: 8%;text-align:right;">Auth.Signatory</h3>
         </div>
       </div>
    </div>

      <h4 style="text-align:center;color: blue;text-decoration: underline;" id="heading">VACATION OWNERSHIP PURCHASE TERMS AND CONDITIONS</h4>
      <div class="ruleList">
      <ol>
      	<li>THE DEVLOPER: The Company Signature Linkers Private Limited whose address is </li>
      	<li>DEVELOPER COVENANT: Developer agrees that upon receipt of the total amount due from the purchaser(s), it shall admit the purchaser(s) to the vacation ownership of CLUB HOLIDAYS & RESORTS PVT. LTD. (CHRPL) and shall ensure that a vacation ownership card / certificate be issued in respect of their vacation ownership of “CLUB HOLIDAYS & RESORTS PVT. LTD. (CHRPL)” (exclusively promoted by Its parent company CLUB HOLIDAYS & RESORTS PVT. LTD. (CHRPL) to the purchaser (s) within 90-120 days of receipt of such amount.</li>
      	<li>APPLICANT (S) ENTITLEMENT: the purchaser (s) shall not be entitled to exercise any occupancy Rights at th		e resort until all sums payable pursuant to this Vacation Ownership purchase agreement have been paid in full and the applicant (s) have been admitted to Vacation Ownership of “CLUB HOLIDAYS & RESORTS PVT. LTD. (CHRPL)”. However an interim membership card will be provided by developer for domestic use during the EMIs period. If any overdue EMI/Maintenance/AMC is pending due to any reason, purchaser(s) shall not be entitled for any holiday / service. </li>
      	<li>MODIFICATION: No amendment or modification of this membership purchase agreement shall be valid unless made in writing and signed by the purchaser (s) and promoter and no promises, verbal or implied are valid.</li>
      	<li>NO ESCALATION:  The purchase of Vacation Ownership rights under this agreement will not result in any Costs, charges or obligations  (save those, which are outside the control of the CLUB HOLIDAYS & RESORTS PVT. LTD. (CHRPL) or the constituents of the developer such as future taxes imposed by the central or state governments which may be of a national or local nature, which tax shall include but not limited to luxury tax, room tax, service tax, sales tax, registration tax, etc) other than those specified in this agreement and the documents referred to in it.</li>
      	<li>EXIT OPTION: it is understood that within the period of 7 days from the date of this agreement, upon receipt of written notice this agreement is terminable at the option of the purchaser(s). In case of the purchaser(s) opting for the exit option there would be no further liabilities on the purchaser(s) and amount paid by purchaser(s) will not be refunded in case of exit due to any reason in any circumstances</li>
      	<li>ANNUAL MANAGEMENT CHARGES: The purchaser(s) hereby agrees to pay the annual management charges together with any applicable tax or other similar tax (if any). The annual management charges stipulated in this agreement shall be payable to CLUB HOLIDAYS & RESORTS PVT. LTD. (CHRPL). (Payment to anyone other than the payees cited above shall not discharge the purchaser(s) from the obligation outlined herein), Management Charges are mandatory due & payable after 90 days from the date of joining or before availing first holidays each year for the following year and is payable exclusively to CLUB HOLIDAYS & RESORTS PVT. LTD. (CHRPL) in advance, which is variable in accordance with inflation. In case of default in payment of management charges, developer at its sole discretion, may terminate the membership and forfeit all monies paid by the purchaser and neither party shall be under any further liability to the others.  </li>
      	<li>RIGHT OF OCCUPATION: The purchaser(s) is/are entitled to the right of occupation in the unit of accommodation as stipulated in this agreement. These rights shall exist for a period specified in vacation ownership period of vacation ownership details of this agreement on a right to use basis only.</li>
      	<li>OCCUPANCY: I/We understand that the maximum number of occupants in Studio unit / room is 02(Two) persons, One Bedroom unit 04(four) persons each and two kids below the age of 9 years can accommodate in both the units. I/we also understand that my/our occupancy shall not commence until all the balance payment due under the agreement has been paid in full.</li>
      	<li>SEASON: The purchaser(s) has right to avail the holiday in their specified or below season. CLUB HOLIDAYS & RESORTS PVT. LTD. (CHRPL) follows three season category as mentioned. A) Red Season – Member(s) of red season can avail holidays throughout the year with minimum 7 days prior written intimation for booking of holidays. B) White Season – If purchaser has opted white season, there entitlement for holidays is in moderate or off season of that place. But in case of up gradation of season minimum 20 – 25 days prior intimation is required for booking of holidays. C) Blue Season – The member of Blue season are entitle for the holidays only in off season. In case of up gradation of season at the time of holidays purchase(s) has to give minimum 30 – 45 days prior intimation to confirm their holidays. All holidays against season up gradation will be subject to availability only.</li>
      	<li>ADDITIONAL SERVICES: Pickup/Drop / Sightseeing / Breakfast / Lunch / Dinner or any other customize services can be arranged on Request ONLY ON PAYMENT BASIS.</li>
      	<li>RIGHT OF TRANSFER: “The purchaser(s) besides having the right to use his/her week(s), may also gift, save, advance, split and transfer or bequeath the week(s) of membership to any third party, with prior written intimation to the promoter. 
         The Member(s) understand that the holidays are to be utilizing under the Agreement and that once the holiday laps, the same cannot be renewed under any Circumstances. All previous agreement (If any) signed stands cancelled and void.                                                                               
        </li>
      	<li>TERMINATION OF VACATION OWNER’S RIGHT: In the event of purchaser failing to pay the installments / AMC due hereunder on the specified date (time being of essence), the Developer shall notify the purchaser in writing of the default. If the purchaser fails to remedy the default within a period of 30 days from the date of receipt of written notice of the developer, the developer at its sole discretion shall deem this agreement to be terminated, and forfeit all monies paid by the purchaser. In the above case neither party shall be under any further liability to the others.</li>
      	<li>FINENCIAL STATUS: Our decision to purchase the Vacation Ownership/timeshare of the Company has been made after Careful consideration & under full Awareness of our financial position & I/We are happy to confirm that this purchase creates no undue financial burden on my/our family.</li>
      	<li>PURPOSE: I/We acknowledge that I/We are purchasing the Vacation ownership/timeshare membership for the purpose of Luxury holidays and not as an Investment for any financial gains.</li>
      	<li>INTERPRETATION: This purchase agreement, its terms and conditions, purchaser(s) acknowledgement, shall constitute the full agreement between the parties herein and the purchaser(s) acknowledges that no other document shall from a constituted part of this agreement for the purpose of enforcement and interpretation of this agreement. The terms and condition of this agreement will be subject to the jurisdiction of appropriate court at New Delhi only.
       After careful consideration and under full awareness of financial position, both existing and future, this agreement/arrangement creates no undue financial burden upon Purchaser(s) family. This agreement is full & final and cancellation of this agreement or refund of the amount paid by the Purchaser(s) is not permitted in any circumstances. The pictures shown during presentation are for indicative purpose only and may vary from actual.</li>
      	<li>JURISDICTION & APPLICABLE LAW : The law of India shall in all respects govern the construction, validity and performance of this agreement. If any dispute arises with the respect to this agreement, it shall be referred to the arbitration in accordance with the Arbitration and Conciliation Act, 1996 or any modification or re-enactment thereof for the time being in force. The dispute shall be referred to Arbitration at the written request of either party to the sole arbitrator mutually appointed by the developer. The cost of arbitration shall be shared by all the parties. The arbitration proceeding shall be conducted at city of Delhi, India only and in English. All participants shall hold the Contents and result of the arbitration in confidence. The arbitral award is final and binding upon both the parties.</li>
      	<li>ACKNOWLEDGEMENT: Member(s) acknowledges that the CLUB HOLIDAYS & RESORTS PVT. LTD. (CHRPL), has treated us pleasantly and courteously and I/We have entered into this Agreement as at our free will and accord and there is no compulsion or co coercion or undue influence exercised by CLUB HOLIDAYS & RESORTS PVT. LTD. (CHRPL), and/or its agents/representatives upon us. I/We have read & fully understood the agreement & I/We are bound by the terms of the agreement.</li>
      	<li>INDEMNITY: The purchaser(s) shall be liable for all legal and other costs on a full indemnity basis incurred by the developer/promoter or its constituents in enforcing this membership purchase agreement in any jurisdiction.</li>
      	<li>PURCHASER”S DICLARATION: I/We here by confirm that I/We have gone through the aforesaid term and condition and benefits/obligation and I/We have understood very well and accepted the same.</li>
      </ol>
     </div>
      <div class="col-container signature">
        <div class="col" style="padding-right: 15%;">
           	<p style="padding-left: 10%;">Purchaser(1)......................................</p>
      			<p style="padding-left: 3%;">Signatures</p>
      			<p style="padding-left:10%;">Purchaser(2)......................................</p>     
         </div>

        <div class="col">
        	<div id="box">
           <h4><b>For The Behalf of</b></h4>
         	<p>CLUB HOLIDAYS & RESORTS PVT. LTD(CHRPL)</p>
         	<h3 style="padding-top: 8%;text-align:right;">Auth.Signatory</h3>
         </div>
       </div>
    </div>

      
				</div>					
			</div><!-- /.box-body -->

			<div class="box-footer">
			</div>
			 <?php
                 }
                    }
              ?>
		</form>
	</div>
</div>
	</div>    
</section>
    
</div>
