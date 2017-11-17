<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle; ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <style>
    	.error{
    		color:red;
    		font-weight: normal;
    	}

      .w3-tangerine {
    font-family: "Tangerine", serif;
     }

     .list{
      padding-left: 5%;
      padding-top: 0.5%;
     }

     .memberinput {
      border: 0 !important ;
       outline: 0 !important ;
    background: transparent !important ;
     border-bottom: 1px solid black !important ;
     }

     #payment:after {
  content: "";
  background-color: #000;
  position: absolute;
  width: 2px;
  height: 100px;
  top: 10px;
  left: 100%;
  display: block;
}

.memberpara{
  padding-left: 3%;
  padding-right: 3%;
}

.membertable{
  padding-left: 4%;
  padding-right: 4%;
  width:100%;
}

 #box 
 {
     width:320px;
  padding: 0;
   padding-top: 0 !important;
    padding-bottom: 0!important;
    border: 3px solid gray;
    margin: 0;
}


@media print
{
  #box 
  {
     width: 200px;
     padding: 5px;
   padding-top: 0 !important;
    padding-bottom: 0!important;
    border: 1px   solid gray;
    margin: 0;
  }

  #box h4
  {
      font-size: 15px;
      float: left;
      padding-top: 0 !important;
      padding-bottom: 0  !important;
      text-align: left;
  }

  #box p
  {
     font-size: 10px;
      float: left;
      padding-top: 0 !important;
      text-align: left;
  }

  #box h3
  {
    font-size: 10px;
    text-align: right;

  }
}

   .col-container
    {
    display: table;
    width: 100%;
    margin-top: 0;
   }
   .col-row
   {
    display: table-row;

   }
.col 
{
    display: table-cell;
    padding: 16px;
}

.ruleList
{
  padding-top: 0.5%;
}

.signature
{
  padding-top: 15%;
}


    </style>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>
    <script type="text/javascript">
      function updatesum() {
 document.form.tamount.value = (document.form.pamount.value -0) + (document.form.aamount.value -0);
    
}    

 function updatesum1() {
    document.form.bal.value = ((document.form.tamount.value) - (document.form.ipayment.value -0));
 }     

 function updatesum2(){
    document.form.eamount.value = ((document.form.bal.value) / (document.form.nemi.value -0));
 }

  function personoccupancy()
 {
  if(document.form.apartment.value == 'Studio-2')
  {
    document.form.occupancy.value = 2;
  }
  if(document.form.apartment.value == '1 BR-4')
  {
    document.form.occupancy.value = 4;
  }
 }

    </script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>HC</b>AS</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b><?php 
          /*$site_name = $this->user_model->site_name();
            foreach ($site_name as $site_name) 
            {
              echo $site_name->site_name;
            }*/
           ?>TheHolidaysClubs</b>AS</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $name; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $name; ?>
                      <small><?php echo $role_text; ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url(); ?>loadChangePass" class="btn btn-default btn-flat"><i class="fa fa-key"></i> Change Password</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url(); ?>logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
              </a>
            </li>
            <!--<li class="treeview">
              <a href="#" >
                <i class="fa fa-plane"></i>
                <span>New Task</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#" >
                <i class="fa fa-ticket"></i>
                <span>My Tasks</span>
              </a>
            </li>-->
            <?php
            if($role == ROLE_ADMIN || $role == ROLE_MANAGER)
            {
            ?>
            <!--<li class="treeview">
              <a href="#" >
                <i class="fa fa-thumb-tack"></i>
                <span>Task Status</span>
              </a>
            </li>-->
            <li class="treeview">
              <a href="<?php echo base_url(); ?>leads" >
                <i class="fa fa-upload"></i>
                <span>Packages</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>giftVoucher" >
                <i class="fa fa-plus"></i>
                <span>Add Voucher</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url()?>vouchers">
                <i class="fa fa-gift"></i>
                <span>Vouchers</span>
              </a>
            </li>
            
            
            <?php
            }
            if($role == ROLE_ADMIN)
            {
            ?>
            
            <li class="treeview">
              <a href="<?php echo base_url(); ?>userListing">
                <i class="fa fa-users"></i>
                <span>Admin Users</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>configuration">
                <i class="fa fa-cogs"></i>
                <span>Configuration</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>userRole" >
                <i class="fa fa-users"></i>
                <span>Users Role</span>
              </a>
            </li>
             <li class="treeview">
              <a href="<?php echo base_url(); ?>locations">
                <i class="fa fa-map-marker"></i>
                <span>Locations</span>
              </a>
            </li>

            <!--<li class="treeview">
              <a href="#" >
                <i class="fa fa-files-o"></i>
                <span>Reports</span>
              </a>
            </li>-->
            <?php
            }
            ?>
			<li class="treeview">
              <a href="<?php echo base_url(); ?>membersList">
                <i class="fa fa-users"></i>
                <span>Members</span>
              </a>
            </li>
			
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>