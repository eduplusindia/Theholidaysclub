<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class User extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->isLoggedIn();   
        $this->load->library('session');
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'The Holidays Clubs : Dashboard';
        
        $this->loadViews("dashboard", $this->global, NULL , NULL);
    }
    
    
    /**
     * This function is used to load the user list
     */
    function userListing()
    {
        
        
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('user_model');
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            $this->load->library('pagination');
            $count = $this->user_model->userListingCount($searchText);
            $returns = $this->paginationCompress ( "userListing/", $count, 5 );
            $data['userRecords'] = $this->user_model->userListing($searchText, $returns["page"], $returns["segment"]);
            $this->global['pageTitle'] = 'The Holidays Clubs : User Listing';
            $this->loadViews("users", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function addNew()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('user_model');
            $data['roles'] = $this->user_model->getUserRoles();
            
            $this->global['pageTitle'] = 'The Holidays Clubs : Add New User';

            $this->loadViews("addNew", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to check whether email already exist or not
     */
    function checkEmailExists()
    {
        $userId = $this->input->post("userId");
        $email = $this->input->post("email");

        if(empty($userId)){
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if(empty($result)){ echo("true"); }
        else { echo("false"); }
    }
    
    /**
     * This function is used to add new user to the system
     */
    function addNewUser()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|max_length[128]');
            $this->form_validation->set_rules('password','Password','required|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
            $this->form_validation->set_rules('role','Role','trim|required|numeric');
            $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNew();
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('fname')));
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->input->post('mobile');
                $locID = $this->input->post('locID');
                
                $userInfo = array('email'=>$email, 'password'=>getHashedPassword($password), 'roleId'=>$roleId, 'name'=> $name,
                                    'mobile'=>$mobile,'locID'=>$locID,'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'));
                
                $this->load->model('user_model');
                $result = $this->user_model->addNewUser($userInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New User created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User creation failed');
                }
                
                redirect('addNew');
            }
        }
    }

    
    /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function editOld($userId = NULL)
    {
        if($this->isAdmin() == TRUE || $userId == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('userListing');
            }
            
            $data['roles'] = $this->user_model->getUserRoles();
            $data['userInfo'] = $this->user_model->getUserInfo($userId);
            
            $this->global['pageTitle'] = 'The Holidays Clubs : Edit User';
            
            $this->loadViews("editOld", $this->global, $data, NULL);
        }
    }
    
    
    /**
     * This function is used to edit the user information
     */
    function editUser()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            $userId = $this->input->post('userId');
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|max_length[128]');
            $this->form_validation->set_rules('password','Password','matches[cpassword]|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','matches[password]|max_length[20]');
            $this->form_validation->set_rules('role','Role','trim|required|numeric');
            $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editOld($userId);
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('fname')));
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->input->post('mobile');
                
                $userInfo = array();
                
                if(empty($password))
                {
                    $userInfo = array('email'=>$email, 'roleId'=>$roleId, 'name'=>$name,
                                    'mobile'=>$mobile, 'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
                }
                else
                {
                    $userInfo = array('email'=>$email, 'password'=>getHashedPassword($password), 'roleId'=>$roleId,
                        'name'=>ucwords($name), 'mobile'=>$mobile, 'updatedBy'=>$this->vendorId, 
                        'updatedDtm'=>date('Y-m-d H:i:s'));
                }
                
                $result = $this->user_model->editUser($userInfo, $userId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect('userListing');
            }
        }
    }


    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $userId = $this->input->post('userId');
            $userInfo = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            
            $result = $this->user_model->deleteUser($userId, $userInfo);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
    
    /**
     * This function is used to load the change password screen
     */
    function loadChangePass()
    {
        $this->global['pageTitle'] = 'The Holidays Clubs : Change Password';
        
        $this->loadViews("changePassword", $this->global, NULL, NULL);
    }
    
    
    /**
     * This function is used to change the password of the user
     */
    function changePassword()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('oldPassword','Old password','required|max_length[20]');
        $this->form_validation->set_rules('newPassword','New password','required|max_length[20]');
        $this->form_validation->set_rules('cNewPassword','Confirm new password','required|matches[newPassword]|max_length[20]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->loadChangePass();
        }
        else
        {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');
            
            $resultPas = $this->user_model->matchOldPassword($this->vendorId, $oldPassword);
            
            if(empty($resultPas))
            {
                $this->session->set_flashdata('nomatch', 'Your old password not correct');
                redirect('loadChangePass');
            }
            else
            {
                $usersData = array('password'=>getHashedPassword($newPassword), 'updatedBy'=>$this->vendorId,
                                'updatedDtm'=>date('Y-m-d H:i:s'));
                
                $result = $this->user_model->changePassword($this->vendorId, $usersData);
                
                if($result > 0) { $this->session->set_flashdata('success', 'Password updation successful'); }
                else { $this->session->set_flashdata('error', 'Password updation failed'); }
                
                redirect('loadChangePass');
            }
        }
    }
    
    function webusersList()
    {
            $this->load->model('user_model');
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            $this->load->library('pagination');
            $count = $this->user_model->userListingCount($searchText);
            //$returns = $this->paginationCompress ( "webusersList/", $count, 5 );
            $data['webuserRecords'] = $this->user_model->webuserList();
            $this->global['pageTitle'] = 'The Holidays Clubs :Website User List';
            $this->loadViews("webusers", $this->global, $data, NULL);
    }
    
    function webuserEditPage($webId = NULL)
    {
        if($webId == null)
            {
                redirect('webusersList');
            }
            $data['userInfo'] = $this->user_model->getwebUserInfo($webId);
            $this->global['pageTitle'] = 'The Holidays Clubs : Edit Web User';
            $this->loadViews("editwebuser", $this->global, $data, NULL);
    }
    function memberEdit($webId = NULL)
    {
        if($webId == null)
            {
                redirect('memberList');
            }
            $data['userInfo'] = $this->user_model->getmemberInfo($webId);
            $this->global['pageTitle'] = 'The Holidays Clubs : Edit Web User';
            $this->loadViews("memberEdit", $this->global, $data, NULL);
    }
    
    function updateMember($webId = NULL)
    {
        $userId = $this->input->post('memberId');
        $memberShip = $this->input->post('memberShip');
        $ano = $this->input->post('ano');
        $Mname = $this->input->post('Mname');
        $dob1 = $this->input->post('dob1');
        $Cname = $this->input->post('Cname');
        $dob2 = $this->input->post('dob2');
        $address = $this->input->post('address');
        $city = $this->input->post('city');
        $pin = $this->input->post('pin');
        $mob1 = $this->input->post('mob1');
        $mob2 = $this->input->post('mob2');
        $rno = $this->input->post('rno');
        $email = $this->input->post('email');
        $doj = $this->input->post('doj');
        $tenure = $this->input->post('tenure');
        $vdate = $this->input->post('vdate');
        $ctype = $this->input->post('ctype');
        $apartment = $this->input->post('apartment');
        $occupancy = $this->input->post('occupancy');
        $pamount = $this->input->post('pamount');
        $aamount = $this->input->post('aamount');
        $tamount = $this->input->post('tamount');
        $ipayment = $this->input->post('ipayment');
        $mop = $this->input->post('mop');
        $bal = $this->input->post('bal');
        $bpm = $this->input->post('bpm');
        $nemi = $this->input->post('nemi');
        $eamount = $this->input->post('eamount');
        $edate = $this->input->post('edate');
        $amc = $this->input->post('amc');
        $ename = $this->input->post('ename');
        $mname = $this->input->post('mname');
        $dsa = $this->input->post('dsa');
        $moffer = $this->input->post('moffer');
        $dsa_id = $this->input->post('dsa_id');
        
        $memberInfo = array('memberShipid'=>$memberShip, 'a_no'=>$ano, 'm_name'=>$Mname, 'dob1'=>$dob1, 'c_name'=>$Cname, 'dob2'=>$dob2, 
        'address'=>$address, 'city'=>$city, 'pin'=>$pin, 'mob1'=>$mob1, 'mob2'=>$mob2, 'r_no'=>$rno, 'email'=>$email, 'doj'=>$doj, 'tenure'=>$tenure, 'vdate'=>$vdate, 'ctype'=>$ctype, 'apartment'=>$apartment, 'occupancy'=>$occupancy, 'purchase_amount'=>$pamount, 'admin_amount'=>$aamount, 'total_amount'=>$tamount, 'initial_payment'=>$ipayment, 'mode_of_payment'=>$mop, 'bal'=>$bal, 'bal_payment'=>$bpm, 'no_of_emi'=>$nemi, 'emi_amount'=>$eamount, 'emi_start_date'=>$edate, 'amc'=>$amc, 'excutive_name'=>$ename, 'manager_name'=>$mname, 'dsa_id'=>$dsa_id,'dsa_name'=>$dsa ,'member_offer'=>$moffer);
        
        $this->user_model->updateMember($memberInfo, $userId);
        redirect('membersList');
    
    }
    
    function webuserEdit($webId = NULL)
    {
        $userId = $this->input->post('userId');
        $name = $this->input->post('fname');    
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $mobile = $this->input->post('mobile');
        $status = $this->input->post('status');
        $pass = array();
        if($password){
            $pass = array('password'=>$password);
        }
        $userInfo = array('email'=>$email, 'name'=> $name, 'phone'=>$mobile, 'createDete'=>date('Y-m-d H:i:s'), 'status'=>$status);
        $userfullInfo = array_merge($userInfo, $pass);
        
        $this->user_model->updateWebUser($userfullInfo, $userId);
        redirect('webusersList');
    
    } 
    
    function webuserAddPage()
    {
    
        $this->global['pageTitle'] = 'The Holidays Clubs : Web User Add Page';
        $this->loadViews("addwebuser", $this->global);
    } 
    
    function addMember()
    {
       $userId = $this->session->userdata('userId');

         $data['dsaInfo'] = $this->user_model->user_info($userId);

        $this->global['pageTitle'] = 'The Holidays Clubs : Web User Add Page';
        $this->loadViews("addMember", $this->global,$data,NULL);
    } 
    
    function membersList()
    {
        if($this->isTicketter() == FALSE)
            {
                   $this->loadThis();
            }
         else
         {
            $userId = $this->session->userdata('userId');

               if($userId == 1)
             {
               $this->load->model('user_model');
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            $this->load->library('pagination');
            //$count = $this->user_model->userListingCount($searchText);
            //$returns = $this->paginationCompress ( "webusersList/", $count, 5 );
            $data['webuserRecords'] = $this->user_model->adminMemberList();
            $this->global['pageTitle'] = 'The Holidays Clubs :Website User List';
            $this->loadViews("memberList", $this->global, $data, NULL);

             }   
             else
             {
                 $this->load->model('user_model');
                $searchText = $this->input->post('searchText');
                $data['searchText'] = $searchText;
                  $this->load->library('pagination');
                //$count = $this->user_model->userListingCount($searchText);
              //$returns = $this->paginationCompress ( "webusersList/", $count, 5 );
                $data['webuserRecords'] = $this->user_model->memberList($userId);
               $this->global['pageTitle'] = 'The Holidays Clubs :Website User List';
              $this->loadViews("memberList", $this->global, $data, NULL);
             }

         }
    }
    
    function insertMember()
    {   
        $memberShip = $this->input->post('memberShip');
        $ano = $this->input->post('ano');
        $Mname = $this->input->post('Mname');
        $dob1 = $this->input->post('dob1');
        $Cname = $this->input->post('Cname');
        $dob2 = $this->input->post('dob2');
        $address = $this->input->post('address');
        $city = $this->input->post('city');
        $pin = $this->input->post('pin');
        $mob1 = $this->input->post('mob1');
        $mob2 = $this->input->post('mob2');
        $rno = $this->input->post('rno');
        $email = $this->input->post('email');
        $doj = $this->input->post('doj');
        $tenure = $this->input->post('tenure');
        $vdate = $this->input->post('vdate');
        $ctype = $this->input->post('ctype');
        $apartment = $this->input->post('apartment');
        $occupancy = $this->input->post('occupancy');
        $pamount = $this->input->post('pamount');
        $aamount = $this->input->post('aamount');
        $tamount = $this->input->post('tamount');
        $ipayment = $this->input->post('ipayment');
        $mop = $this->input->post('mop');
        $bal = $this->input->post('bal');
        $bpm = $this->input->post('bpm');
        $nemi = $this->input->post('nemi');
        $eamount = $this->input->post('eamount');
        $edate = $this->input->post('edate');
        $amc = $this->input->post('amc');
        $ename = $this->input->post('ename');
        $mname = $this->input->post('mname');
        $dsa = $this->input->post('dsa');
        $moffer = $this->input->post('moffer');
        $dsa_id = $this->input->post('dsa_id');

        if($dob2 == '')
          {
            $dob2 = NULL;
          }  
        if($edate == '')
           {
              $edate = NUll;
           } 

        $memberInfo = array('memberShipid'=>$memberShip, 'a_no'=>$ano, 'm_name'=>$Mname, 'dob1'=>$dob1, 'c_name'=>$Cname, 'dob2'=>$dob2, 
        'address'=>$address, 'city'=>$city, 'pin'=>$pin, 'mob1'=>$mob1, 'mob2'=>$mob2, 'r_no'=>$rno, 'email'=>$email, 'doj'=>$doj, 'tenure'=>$tenure, 'vdate'=>$vdate, 'ctype'=>$ctype, 'apartment'=>$apartment, 'occupancy'=>$occupancy, 'purchase_amount'=>$pamount, 'admin_amount'=>$aamount, 'total_amount'=>$tamount, 'initial_payment'=>$ipayment, 'mode_of_payment'=>$mop, 'bal'=>$bal, 'bal_payment'=>$bpm, 'no_of_emi'=>$nemi, 'emi_amount'=>$eamount, 'emi_start_date'=>$edate, 'amc'=>$amc, 'excutive_name'=>$ename, 'manager_name'=>$mname, 'dsa_id'=>$dsa_id,
            'dsa_name'=>$dsa,'member_offer'=>$moffer);
        

        
        $result = $this->user_model->addMember($memberInfo);
        if($result > 0)
            {
                $this->session->set_flashdata('success', 'New Member created successfully');
                redirect(base_url().'confirmMember/'.$result);
            }
            else
            {
                $this->session->set_flashdata('error', 'User creation failed');
            }
            redirect('addWebuser');
        
        
    }

    function confirmMember($lastmemberId)
    {
      $data['info']  = $this->user_model->confirmMember($lastmemberId);
      $this->global['pageTitle'] = 'The Holidays Clubs: Confirm Member';
        $this->loadViews('confirmMember',$this->global,$data,NUll);

    }
    
    function view_memberDetail($webId = NULL)
    {
        if($webId == null)
            {
                redirect('membersList');
            }
            $data['memberInfo'] = $this->user_model->getmemberInfo($webId);
            
            //print_r($data['memberInfo']);
            $this->global['pageTitle'] = 'The Holidays Clubs : Edit Web User';
            $this->loadViews("view_detail", $this->global, $data, NULL);
    }
    
    function addWebuser()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]|xss_clean');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|max_length[128]');
        $this->form_validation->set_rules('password','Password','required|max_length[20]');
        $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
        $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]|xss_clean');
        if($this->form_validation->run() == FALSE)
        {
            //$this->load->model('user_model');
            $data['roles'] = $this->user_model->getUserRoles();
            
            $this->global['pageTitle'] = 'The Holidays Clubs : Add New Web User';
            $this->loadViews("addWebuser", $this->global, $data, NULL);
        }
        else
        {
            $name = ucwords(strtolower($this->input->post('fname')));
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $mobile = $this->input->post('mobile');
            $status = $this->input->post('status');
            $userInfo = array('email'=>$email, 'password'=>md5($password), 'name'=> $name, 'phone'=>$mobile,  'createDete'=>date('Y-m-d H:i:s'), 'status'=>$status);
            
            //$this->load->model('user_model');
            $result = $this->user_model->addWebUser($userInfo);
            
            if($result > 0)
            {
                $this->session->set_flashdata('success', 'New User created successfully');
                redirect('webusersList');
            }
            else
            {
                $this->session->set_flashdata('error', 'User creation failed');
            }
            redirect('addWebuser');
        }
        
        
    }
    
    
    function view_detail($webId = NULL)
    {
        if($webId == null)
            {
                redirect('webusersList');
            }
            $data['userInfo'] = $this->user_model->getwebUserInfo($webId);
            $this->global['pageTitle'] = 'The Holidays Clubs : Edit Web User';
            $this->loadViews("view_detail", $this->global, $data, NULL);
    }
    
     function userRole()
     {
            $data['userRole'] = $this->user_model->getUserRoles();
            $this->global['pageTitle'] = 'CodeInsect :Users Role List';
            $this->loadViews("userRoles", $this->global, $data, NULL);
    }
    
    function addNewRole()
    {
            $this->global['pageTitle'] = 'CodeInsect :Website Add Role';
            $this->loadViews("addRoles", $this->global, NULL, NULL);
    }   
    function editRole($roleId = NULL)
    {
            if($roleId == null)
            {
                redirect('userRole');
            }
            $data['roleInfo'] = $this->user_model->getsingleRoles($roleId);
            $this->global['pageTitle'] = 'Edit User Role';
            $this->loadViews("editRole", $this->global, $data, NULL);
    }
    function updateRole()
    {
            $roleId = $this->input->post('roleId');
            $rname = $this->input->post('rname');
            $userRole = array('role'=>$rname);
            $result = $this->user_model->updateRole($userRole,$roleId);
            redirect('userRole');
    }
    function insertRole()
    {
            $rname = $this->input->post('rname');
            $userRole = array('role'=>$rname);
            $result = $this->user_model->addRole($userRole);
            redirect('userRole');
    }



 /*----Gift Vouchers-----*/
   /**
    * This function is used for view to add gift voucher
    */

    function giftVoucher()
    {
        if($this->isTicketter() == FALSE)
        {
            $this->loadThis();
        }
        else
        {   
           $userId = $this->session->userdata('userId');

          $this->global['pageTitle'] = 'The Holidays Clubs : Gift Voucher';

         $data['userInfo'] = $this->user_model->user_info($userId);

        $this->loadViews("giftVoucher",$this->global,$data,NULL);
        }    
    }

    /**
     * This function is used to add/insert gift voucher details
     */

    function addGiftVoucher()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('gname','User Name','trim|required|xss_clean|max_length[128]');
        $this->form_validation->set_rules('giftemail','User Email','trim|required|valid_email|xss_clean|max_length[128]');
        $this->form_validation->set_rules('mobno','Mobile Number','trim|required|numeric|max_length[12]');
        $this->form_validation->set_rules('address','Address','trim|required|alpha_numeric_spaces');


        if($this->form_validation->run() == FALSE)
         {
            $this->giftVoucher();
         }

         else{

            $name =$this->input->post('gname');
            $email = $this->input->post('giftemail');
            $mobno =  $this->input->post('mobno');
             $address = $this->input->post('address');
             $voucher_code = $this->input->post('vcode');
             $date_of_generation = $this->input->post('dog');
             $expiration_date = $this->input->post('edate');
             $dsaId = $this->input->post('dsaId');
             $dsaName = $this->input->post('dsaName');
             $location_id = $this->input->post('location');

             $giftVoucherinfo = ['name'=>$name,'email'=>$email,'mobno'=>$mobno,'address'=>$address,'voucher_code'=>$voucher_code,'date_of_generation'=>$date_of_generation,'expiration_date'=>$expiration_date,'dsaId'=>$dsaId,'dsaName'=>$dsaName,'location_id'=>$location_id];

             $giftId = $this->user_model->addGiftVoucher($giftVoucherinfo);

             redirect(base_url().'ThankYou/'.$giftId);

         }

        } 

        /**
         * This is used to create the thank you page after the gift voucher has been created 
         * @param number $giftId This is id of the gift voucher that is reccently created
         */

         function ThankYou($giftId)
         {
            if($this->isTicketter() == FALSE)
              {
                   $this->loadThis();
                }
            else
             {  
                $info = $this->user_model->ThankYou($giftId);
                $this->global['pageTitle'] = 'The Holidays Clubs : Thank You';
               $this->loadViews("ThankYouPage",$this->global,['info'=>$info],NULL);
                }
          }

        /**
         * This is used to list the voucher for admin and manager/dsa where admin can see all of the 
         * vouchers whereas the dsa/manager will be only to see that has been created by him.
         */  
        
        function vouchers()
        {
          if($this->isTicketter() == FALSE)
            {
                   $this->loadThis();
            }
         else
            {
               $userId = $this->session->userdata('userId');

               if($userId == 1)
               {
        
                   $searchText = $this->input->post('searchText');

                   $data['searchText'] = $searchText;
            
                   $this->load->library('pagination');
            
           // $count = $this->user_model->userListingCount($searchText);

            //$returns = $this->paginationCompress ( "userListing/", $count, 5 );
            
                  $data['vouchers'] = $this->user_model->adminVouchers($searchText);

                  $data['voucherLocations'] = $this->user_model->getActiveLocations();
            
                 $this->global['pageTitle'] = 'The Holidays Clubs : Vouchers Listing';
            
               $this->loadViews("vouchers", $this->global, $data, NULL);
               }

               else
               {

                   $this->load->model('user_model');
        
                   $searchText = $this->input->post('searchText');

                   $data['searchText'] = $searchText;
            
                   $this->load->library('pagination');
            
           // $count = $this->user_model->userListingCount($searchText);

            //$returns = $this->paginationCompress ( "userListing/", $count, 5 );
            
                  $data['vouchers'] = $this->user_model->vouchers($searchText,$userId);
            
                 $this->global['pageTitle'] = 'The Holidays Clubs : Vouchers Listing';
            
               $this->loadViews("vouchers", $this->global, $data, NULL);
             }
            
          }

        }

        /**
        * This function is use download pdf
        * @param number $voucherId : This is Id of the voucher.
        */

        function voucherDetails($voucherId)
        {
           $info= $this->user_model->ThankYou($voucherId);

           $html = $this->load->view('voucherDetails',['info'=>$info],true);

           $pdfFilePath = "giftVoucher.pdf";

            $this->load->library('m_pdf');

            $this->m_pdf->pdf->WriteHTML($html);

            $this->m_pdf->pdf->Output($pdfFilePath,"I");

        }

        /**
         * This function is used to delete the voucher
         * @param number $voucherId : This is Id of the voucher that needed to deleted
         */
        function deleteVoucher($voucherId)
        {
            if($this->isTicketter() == FALSE)
           {
               $this->loadThis();
           }
            else
            {

                 $this->user_model->deleteVoucher($voucherId);
  
                 redirect(base_url().'vouchers');
            }


        }
      /**
       * This function is used to list voucher by their location
       */

     function voucherByLocation()
     {
             $searchText = $this->input->post('searchText');

                   $data['searchText'] = $searchText;
            
             $locationId =  $this->input->post('locID');  

             $data['vouchers'] = $this->user_model->voucherByLocation($searchText,$locationId);

             $this->global['pageTitle'] = "The Holidays Clubs : Vouchers By Locations";

             $this->loadViews('voucherByLocation',$this->global,$data,NULL);

     }   

     /**
      * This function is used to view the profile of the owner of the voucher
      * @param number $voucherId This is id of the voucher
      */

     function voucherProfile($voucherId)
     {
        $data['profileInfo'] = $this->user_model->voucherProfile($voucherId);

        $this->global['pageTitle'] = "The Holidays Clubs: Voucher profile";

        $this->loadViews('voucherProfile',$this->global,$data,NUll);
     }

/*----End Of Gift Vouchers-----*/


   /*------Venues and Location----*/
   function venues($venId){
        if($venId == null)
            {
                redirect('locations');
            }
            
            
        $data['locations'] = $this->user_model->getAllvenue($venId);
        $data['locID'] = $venId;
        
        $this->global['pageTitle'] = 'venues List';
        $this->loadViews("venues", $this->global, $data, NULL);
    }
    function insertVenue(){
            $location = $this->input->post('location');
            $venue = $this->input->post('venue');
            $status = $this->input->post('status');
            $loc = array('locationName'=>$venue, 'parent_id'=>$location, 'status'=>$status);
            $result = $this->user_model->addlocation($loc);
            redirect('venues/'.$location);
    }
    function addvenue($locID){
        $data['locations'] = $this->user_model->getAllLocations();
        $data['locID'] = $locID;
        $this->global['pageTitle'] = 'Add New Venue';
        $this->loadViews("addvenue", $this->global, $data, NULL);
    }
    function updateVenue(){
        $venID = $this->input->post('venID');
        $location = $this->input->post('location');
        $venue = $this->input->post('venue');
        $status = $this->input->post('status');
        $venueinfo = array('locationName'=>$venue, 'parent_id'=>$location, 'status'=>$status);
        $result = $this->user_model->updatelocation($venueinfo,$venID);
        redirect('venues/'.$location);
    }
    
    function editvenues($venId = NULL)
    {
            if($venId == null)
            {
                redirect('venues');
            }
            $data['locations'] = $this->user_model->getAllLocations();
            $data['venData'] = $this->user_model->getsingleLocation($venId);
            $this->global['pageTitle'] = 'Edit Venue';
            $this->loadViews("editvenue", $this->global, $data, NULL);
    }
    
    
    function locations()
    {
        $data['locations'] = $this->user_model->getAllLocations();
        $this->global['pageTitle'] = 'Locations List';
        $this->loadViews("locations", $this->global, $data, NULL);
    }
    
    function editlocaion($locId = NULL)
    {
            if($locId == null)
            {
                redirect('locations');
            }
            $data['locData'] = $this->user_model->getsingleLocation($locId);
            $this->global['pageTitle'] = 'Edit Location';
            $this->loadViews("editlocation", $this->global, $data, NULL);
    }

    function addlocation()
    {
        
        $this->global['pageTitle'] = 'Add New Location';
        $this->loadViews("addlocation", $this->global, NULL, NULL);
    }
    
    function insertLoction()
    {
            $locationName = $this->input->post('locationName');
            $status = $this->input->post('status');
            $loc = array('locationName'=>$locationName, 'status'=>$status,'parent_id'=>0);
            $result = $this->user_model->addlocation($loc);
            redirect('locations');
    }   
        
    function updateLoction()
    {
        $locID = $this->input->post('locID');
        $locationName = $this->input->post('locationName');
        $venue = $this->input->post('venue');
        $status = $this->input->post('status');
        $locationinfo = array('locationName'=>$locationName, 'status'=>$status);
        $result = $this->user_model->updatelocation($locationinfo,$locID);
        redirect('locations');
    }
/*------End 0f Venues and Locations------*/



   /*-------Configuration-----*/
     function configuration()
     {
        $userId = $this->session->userdata('userId');

        $data['admin_info'] = $this->user_model->user_info(1);

        $data['site_info'] = $this->user_model->site_info();
 
        $this->global['pageTitle'] = 'The Holidays Clubs : Configuration';

        $this->loadViews("adminConfiguration",$this->global,$data,NULL);


     }


     function editConfiguration()
     {
        $data['admin_info'] = $this->user_model->user_info(1);

        $data['site_info'] = $this->user_model->site_info(1);
 
        $this->global['pageTitle'] = 'The Holidays Clubs : Configuration';

        $this->loadViews("editConfiguration",$this->global,$data,NULL);

     }


     function updateConfiguration()
     {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('userName');

        $this->form_validation->set_rules('userEmail');

        $this->form_validation->set_rules('mobile');

        $this->form_validation->set_rules('site_name');

        $this->form_validation->set_rules('admin_name');

        $this->form_validation->set_rules('amc_amount');

        if($this->form_validation->run() == FALSE)
          {
            $this->editConfiguration();
          } 

         else
         {
            $userName = $this->input->post('userName');

            $userEmail = $this->input->post('userEmail');

            $mobile = $this->input->post('mobile');

            $site_name = $this->input->post('site_name');

            $admin_amount = $this->input->post('admin_amount');

            $amc_amount = $this->input->post('amc_amount');

            $data = ['name'=>$userName,'email'=>$userEmail,'mobile'=>$mobile];

            $site_info = ['site_name'=> $site_name,'admin_amount' => $admin_amount,'amc_amount' => $amc_amount];

            $this->user_model->updateConfiguration($data,$site_info,1);

            $this->configuration();

         }  
     }
   /*-------End of Configuration------*/     
    
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'The Holidays Clubs : 404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }
}

?>