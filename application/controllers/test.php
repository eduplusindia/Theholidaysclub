<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Test extends BaseController
{

   public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn(); 
    }

    public function index()
    {
    	$this->global['pageTitle'] = "The Holidays Clubs: Confirm Member";
    	$this->loadViews('confirmMember',$this->global,NUll,NUll);
    }

    public function string()
    {
        echo random_string('alnum', 16);
    }
    


}
