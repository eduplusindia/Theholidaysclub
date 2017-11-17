<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
function userListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, BaseTbl.locID,Role.role');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%'
                            OR  BaseTbl.mobile  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->where('BaseTbl.roleId !=', 1);
        $query = $this->db->get();
        
        return count($query->result());
    }
    
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
function userListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, BaseTbl.locID, Role.role');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%'
                            OR  BaseTbl.mobile  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->where('BaseTbl.roleId !=', 1);
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    /**
     * This function is used to get the user roles information
     * @return array $result : This is result of the query
     */
    /*--------Roles-------*/
function getUserRoles()
    {
        $this->db->select('roleId, role');
        $this->db->from('tbl_roles');
        $this->db->where('roleId !=', 1);
        $query = $this->db->get();
        
        return $query->result();
    }
function getsingleRoles($roleId)
    {
        $this->db->select('roleId, role');
        $this->db->from('tbl_roles');
		$this->db->where('roleId', $roleId);
        $query = $this->db->get();
        return $query->result();
    }
function addRole($userRole){
		$this->db->trans_start();
        $this->db->insert('tbl_roles', $userRole);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id; 
	 }
	 
function updateRole($roleInfo, $roleId)
	{
		$this->db->where('roleId', $roleId);
		$this->db->update('tbl_roles', $roleInfo);
		return TRUE;
	}

  /*--------End of Roles------*/  
    /**
     * This function is used to check whether email id is already exist or not
     * @param {string} $email : This is email id
     * @param {number} $userId : This is user id
     * @return {mixed} $result : This is searched result
     */
function checkEmailExists($email, $userId = 0)
    {
        $this->db->select("email");
        $this->db->from("tbl_users");
        $this->db->where("email", $email);   
        $this->db->where("isDeleted", 0);
        if($userId != 0){
            $this->db->where("userId !=", $userId);
        }
        $query = $this->db->get();

        return $query->result();
    }
    
    
    /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
function addNewUser($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_users', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
function getUserInfo($userId)
    {
        $this->db->select('userId, name, email, mobile, roleId,locID');
        $this->db->from('tbl_users');
        $this->db->where('isDeleted', 0);
		$this->db->where('roleId !=', 1);
        $this->db->where('userId', $userId);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    
    /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
function editUser($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo);
        return TRUE;
    }
    
    
    
    /**
     * This function is used to delete the user information
     * @param number $userId : This is user id
     * @return boolean $result : TRUE / FALSE
     */
function deleteUser($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo);
        
        return $this->db->affected_rows();
    }


    /**
     * This function is used to match users password for change password
     * @param number $userId : This is user id
     */
function matchOldPassword($userId, $oldPassword)
    {
        $this->db->select('userId, password');
        $this->db->where('userId', $userId);        
        $this->db->where('isDeleted', 0);
        $query = $this->db->get('tbl_users');
        
        $user = $query->result();

        if(!empty($user)){
            if(verifyHashedPassword($oldPassword, $user[0]->password)){
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }
	
	
function addMember($memberInfo){
		$this->db->trans_start();
        $this->db->insert('tbl_member_data', $memberInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
	}
function adminMemberList(){
		 $query = $this->db->get('tbl_member_data');
		return  $query->result();
		
	}
  function memberList($userId)
  {
         $query = $this->db->get_where('tbl_member_data',['dsa_id'=>$userId]);
        return  $query->result();
        
    }  
function getmemberInfo($webID)
    {
        $this->db->select('id, memberShipid, a_no, m_name, dob1, c_name, dob2, address, city, pin, mob1, mob2, r_no, email, doj, tenure, vdate, ctype, apartment, occupancy, purchase_amount, admin_amount, total_amount, initial_payment, mode_of_payment, bal, bal_payment,no_of_emi, emi_amount, emi_start_date, amc, excutive_name, manager_name, dsa_id, member_offer');
        $this->db->from('tbl_member_data');
        $this->db->where('id', $webID);
        $query = $this->db->get();
        return $query->result();
    }
    
    /**
     * This function is used to change users password
     * @param number $userId : This is user id
     * @param array $userInfo : This is user updation info
     */
function changePassword($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->where('isDeleted', 0);
        $this->db->update('tbl_users', $userInfo);
        return $this->db->affected_rows();
    }
	
function webuserList(){
		 $query = $this->db->get('tbl_webusers');
		return  $query->result();
		
	}
function getwebUserInfo($webID)
    {
        $this->db->select('id, name, email, phone, status');
        $this->db->from('tbl_webusers');
        $this->db->where('id', $webID);
        $query = $this->db->get();
        return $query->result();
    }
	
	
	
	
function getwebUser_txn($webID)
    {
        $this->db->select('lead_id, payType, creaditBalance, remainBalance');
        $this->db->from('tbl_mamberpayment');
        $this->db->where('member_id', $webID);
        $query = $this->db->get();
        return $query->result();
    }
	
function addWebUser($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_webusers', $userInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
function updateWebUser($userfullInfo, $userId)
    {
        $this->db->where('id', $userId);
        $this->db->update('tbl_webusers', $userfullInfo);
        return TRUE;
    }
	
function updateMember($userfullInfo, $userId)
    {
        $this->db->where('id', $userId);
        $this->db->update('tbl_member_data', $userfullInfo);
        return TRUE;
    }

 function confirmMember($lastMemberId)
 {
     $this->db->select('id, memberShipid, a_no, m_name, dob1, c_name, dob2, address, city, pin, mob1, mob2, r_no, email, doj, tenure, vdate, ctype, apartment, occupancy, purchase_amount, admin_amount, total_amount, initial_payment, mode_of_payment, bal, bal_payment,no_of_emi, emi_amount, emi_start_date, amc, excutive_name, manager_name, dsa_id, member_offer');
        $this->db->from('tbl_member_data');
        $this->db->where('id', $lastMemberId);
        $query = $this->db->get();

        return $query->result();
 }   




    /*------Venues and Locations-----*/

    function getAllLocations()
    {
        $this->db->select('id, locationName, parent_id, status');
        $this->db->from('tbl_locations');
        $this->db->where('parent_id', 0);
        $query = $this->db->get();
        return $query->result();
    }
    function getActiveLocations()
    {
        $this->db->select('id, locationName');
        $this->db->from('tbl_locations');
        $this->db->where('parent_id', '0');
        $this->db->where('status', '1');
        $query = $this->db->get();
        return $query->result();
    }
    
    function getAllvenue($locID)
    {
        $this->db->select('id, locationName, parent_id, status');
        $this->db->from('tbl_locations');
        //$this->db->where('parent_id !=', 0);
        $this->db->where('parent_id', $locID);
        $query = $this->db->get();
        return $query->result();
    }
    
    function getActivevenue($locID)
    {              
        $this->db->select('id, locationName');
        $this->db->from('tbl_locations');
        $this->db->where('parent_id', $locID);
        $this->db->where('status', '1');
        $query = $this->db->get();
        return $query->result();
    }
    function getsingleLocation($locID)
    {
        $this->db->select('id, locationName, parent_id, status');
        $this->db->from('tbl_locations');
        $this->db->where('id', $locID);
        $query = $this->db->get();
        return $query->result();
    }
    
    function addlocation($locinfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_locations', $locinfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    function updatelocation($locinfo, $locID)
    {
        $this->db->where('id', $locID);
        $this->db->update('tbl_locations', $locinfo);
        return TRUE;
    }

   /*------End of Venues and Locations-----*/ 

/*-----Gift Vouchers------*/
function addGiftVoucher($giftVocherinfo)
 {
        $this->db->insert('giftvoucher',$giftVocherinfo);
        return $this->db->insert_id();

    }

function ThankYou($giftId)
    {
        $query = $this->db->get_where('giftvoucher',['id'=>$giftId]);
        $result = $query->result();
        return $result;
    }

 function adminVouchers($searchText = '')
   {
    
      $this->db->select('gf.id,gf.voucher_code,gf.name,gf.email,gf.mobno,gf.address,gf.dsaId,gf.dsaName,gf.date_of_generation,gf.expiration_date,gf.location_id,gl.locationName');
        $this->db->from('giftvoucher as gf');
        $this->db->join('tbl_locations as gl', 'gl.id = gf.location_id','left');
        if(!empty($searchText)) {
            $likeCriteria = "(email  LIKE '%".$searchText."%'
                            OR  name  LIKE '%".$searchText."%'
                            OR  mobno LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
    
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;

    }

function vouchers($searchText = '',$userId)
    {
        
        $this->db->select('gf.id,gf.voucher_code,gf.name,gf.email,gf.mobno,gf.address,gf.dsaId,gf.dsaName,gf.date_of_generation,gf.expiration_date,gf.location_id,gl.locationName');
        $this->db->from('giftvoucher as gf');
        $this->db->join('tbl_locations as gl', 'gl.id = gf.location_id','left');
        if(!empty($searchText)) {
            $likeCriteria = "(email  LIKE '%".$searchText."%'
                            OR  name  LIKE '%".$searchText."%'
                            OR  mobno LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }

        $this->db->where('dsaId',$userId);
    
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;

    }

    function deleteVoucher($voucherId)
    {
        $this->db->delete('giftvoucher',['id'=>$voucherId]);
       
       return true; 

    }

    function getGiftVouchersLocations()
    {
        $this->db->select('id, locationName');

        $this->db->from('tbl_gift_vouchers_locations');

        $this->db->where('parent_id', '0');

        $this->db->where('status', '1');

        $query = $this->db->get();

        return $query->result();

    }

    function voucherByLocation($searchText = '',$locationId)
    {
         $this->db->select('gf.id,gf.voucher_code,gf.name,gf.email,gf.mobno,gf.address,gf.dsaId,gf.dsaName,gf.date_of_generation,gf.expiration_date,gf.location_id,gl.locationName');
        $this->db->from('giftvoucher as gf');
        $this->db->join('tbl_locations as gl', 'gl.id = gf.location_id','left');
        if(!empty($searchText)) {
            $likeCriteria = "(email  LIKE '%".$searchText."%'
                            OR  name  LIKE '%".$searchText."%'
                            OR  mobno LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }

        $this->db->where('location_id',$locationId);
    
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
        
        
    }

    function voucherProfile($voucherId)
    {
          $this->db->select('gf.id,gf.voucher_code,gf.name,gf.email,gf.mobno,gf.address,gf.dsaId,gf.dsaName,gf.date_of_generation,gf.expiration_date,gf.location_id,gl.locationName');
        $this->db->from('giftvoucher as gf');
        $this->db->join('tbl_locations as gl', 'gl.id = gf.location_id','left');
        if(!empty($searchText)) {
            $likeCriteria = "(email  LIKE '%".$searchText."%'
                            OR  name  LIKE '%".$searchText."%'
                            OR  mobno LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }

        $this->db->where('gf.id',$voucherId);
    
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
       
    }

  /*-------End of Gift Vouchers--------*/
  

  /*------Configuration------*/
    function user_info($userId)
    {
        $this->db->select('userId,email,name,mobile,roleId,locID');
        
        $this->db->from('tbl_users');

        $this->db->where('userId',$userId);

        $query = $this->db->get();

        $result = $query->result();

        return $result;
    }

    function site_info()
    {
        $this->db->select('admin_id,site_name,admin_amount,amc_amount');

        $this->db->from('tbl_admin');

       // $this->db->where('admin_id',$adminId);

        $query = $this->db->get();

        $result = $query->result();

        return $result;
    }

    function site_name()
    {
        $this->db->select('site_name');

        $this->db->from('tbl_admin');

        $query = $this->db->get();

        return $query->result();
    }

    function updateConfiguration($data,$site_info,$userId)
    {
        $this->db->update('tbl_users',$data,['userId'=>$userId]);

        $this->db->update('tbl_admin',$site_info,['admin_id'=>$userId]);
    }

    /*-------End Of Configuration-------*/

}

  