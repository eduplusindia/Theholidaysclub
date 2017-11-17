<?php

  $config = [
             'add_member_rules' =>[ 
             	[
              	'field' => 'ano', 
                 'label' => 'approval form no',
                 'rules' => 'trim|required|numeric'
             ],
             [
               'field' =>'Mname',
                'label' => 'Main Applicant Name',
                'rules' => 'trim|required|regex_match[/^[\\p{L} .-]+$/]'
             ],
             [
               'field' => 'dob1',
                'label' => 'Date Of Birth(Main Applicant)',
                'rules' => 'trim|required'
             ],
             [
                'field' => 'Cname',
                 'label' => 'Co-Applicant Name',
                 'rules' => 'trim|regex_match[/^[\\p{L} .-]+$/]'
             ],
              [
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'trim|required|alpha_dash'
              ], 
              [
                'field' => 'city',
                'label' => 'City',
                'rules' => 'trim|required|alpha'
              ],
              [
                'field' => 'pin',
                'label' => 'Pin code',
                'rules' => 'trim|required|numeric'
              ],
              [
                'field' => 'mob1',
                'label' => 'Mobile No1',
                'rules' => 'trim|required|numeric'
              ],
              [
                'field' => 'mob2',
                'label' => 'Mobile No2',
                'rules' => 'trim|numeric'
              ],
              [
                'field' => 'rno',
                'label' => 'Residence No',
                'rules' => 'trim|required|numeric'
              ],
              [
                'field' => 'email',
                'label' => 'Email Id',
                'rules' => 'trim|required|valid_email'
              ],
              [
                'field' => 'doj',
                'label' => 'Date Of Joining',
                'rules' => 'trim|required'
              ],
              [
                'field' => 'tenure',
                'label' => 'Tenure',
                'rules' => 'required'
              ],
              [
                'field' => 'vdate',
                'label' => 'Validity Date',
                'rules' => 'required'
              ],
              [
                'field' => 'ctype',
                'label' => 'Card Type',
                'rules' => 'required'
              ],
              [
                'field' => 'apartment',
                'label' => 'Apartment',
                'rules' => 'required'
              ],
              [
                'field' => 'pamount',
                'label' => 'Purchase Amount',
                'rules' => 'trim|required|numeric'
              ],
              [
                'field' => 'tamount',
                'label' => 'Total Amount',
                'rules' => 'trim|required|numeric'
              ],
              [
                'field' => 'ipayment',
                'label' => 'Intial Payment',
                'rules' => 'trim|required|numeric'
              ],
              [
                'field' => 'mop',
                'label' => 'Mode Of Payment',
                'rules' => 'required'
              ],
              [
                'field' => 'bal',
                'label' => 'Balance',
                'rules' => 'trim|required|numeric'
              ],
              [
                'field' => 'bpm',
                'label' => 'Balance Payment Mode',
                'rules' => 'required'
              ],
              [
                'field' => 'nemi',
                'label' => 'No Of EMI',
                'rules' => 'required'
              ],
              [
                'field' => 'eamount',
                'label' => 'EMI Amount',
                'rules' => 'trim|required|numeric'
              ],
              [
                'field' => 'edate',
                'label' => 'EMI Start Date',
                'rules' => 'required'
              ],
              [
                'field' => 'ename',
                'label' => 'Excutive Name',
                'rules' => 'trim|required|regex_match[/^[\\p{L} .-]+$/]'
              ],
              [
                'field' => 'mname',
                'label' => 'Manager Name',
                'rules' => 'trim|required|regex_match[/^[\\p{L} .-]+$/]'
              ],
              [
                'field' => 'dsa',
                'label' => 'DSA Id',
                'rules' => 'trim|required|numeric'
              ],
              [
                'field' => 'moffer',
                'label' => 'Member Offer',
                'rules' => 'trim|alpha'
              ]
             ]
            ];