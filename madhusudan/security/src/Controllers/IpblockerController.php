<?php

namespace madhusudan\security\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use madhusudan\security\Models\Ipblocker;

class IpblockerController extends Controller
{
    // this controller manage whole functionality like add,edit,view 
    /*
    * called base controller custructor
    */
    function __custructor() 
    {
        parent::__custructor();
    }
    
    // view file data
       public $viewData = array();
    
    /*
     * this  function load view file 
     */
    public function index()
    {
        $records = Ipblocker::first();
        $this->viewData['ips'] =  $records;
        return view("security::ipblocker",$this->viewData);
    }
    
    /**
     * this function save ip record ; 
     */
    public function save(Request $request) 
    {
        $saveData  =  array();
        $ipblockerObj = new Ipblocker;
        $numOfRecords = $ipblockerObj->count();
       
        $saveData['ips'] = $request['ips'];
        if($numOfRecords == 0 || empty($numOfRecords)) {
            $ipblockerObj->create($saveData);
        } else {
            $ipblockerObj = $ipblockerObj->first();
            $ipblockerObj->ips = $saveData['ips'];
            $ipblockerObj->where("id",$ipblockerObj->id);
            $ipblockerObj->save();
        }
        $this->viewData['ips'] =  $ipblockerObj;
        return view("security::ipblocker",$this->viewData);
    }
}
