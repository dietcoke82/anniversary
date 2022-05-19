<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use App\Http\CommonLib;

class CompanyAdminController extends Controller
{
    //

    public function adminList(){

        $login          =   CommonLib::login_admin();

        $company_seq    =   $login['company_seq'];
        //$admin_seq      =   $login['admin_seq'];

        $list           =   DB::table('sd_admin AS ad')
                            ->leftJoin('sd_company_admin_role_link AS carl', 'ad.admin_seq', '=', 'carl.admin_seq')
                            ->select('carl.company_seq','ad.admin_seq', 'ad.id AS admin_id', 'ad.name AS admin_name', 'ad.email AS admin_email', 'ad.tel AS admin_tel', 'ad.auth_yn')
                            ->selectRaw('(SELECT CONCAT(f.path,f.physical_name) FROM sd_file AS f JOIN sd_admin_file_link AS afl ON f.file_seq = afl.file_seq AND afl.use_yn = "Y" WHERE afl.admin_seq = ad.admin_seq ORDER BY afl.mod_date DESC LIMIT 1) AS profile')
                            ->where(['ad.use_yn'=>'Y', 'carl.use_yn'=>'Y', 'carl.company_seq'=>$company_seq, 'carl.admin_role_seq'=>3])
                            ->orderBy('ad.admin_seq', 'asc')
                            //->groupBy('ad.admin_seq')
                            ->get(); 

        $data               =   array(
            'admin_list'     =>  $list
        );

        return view('company.admin.list', $data);
    }


    public function test(){

        $query          =   DB::table('sd_admin')
                            ->select('admin_seq','id','name','email','tel')
                            ->get();
      
        return view('company.admin.test');
    }

    public function adminInfo($admin_seq, Request $request){
        $login          =   CommonLib::login_admin();

        $company_seq    =   $login['company_seq'];
         
        $list           =   DB::table('sd_admin AS ad')
                                ->select('cal.use_yn AS calUseYn', 'ad.admin_seq', 'ad.id AS admin_id', 'ad.name AS admin_name', 'ad.email AS admin_email', 'ad.tel AS admin_tel', 'ad.auth_yn', 'ad.auth_date', 'ad.mod_date', 'f.file_seq','f.logical_name', DB::raw('CONCAT(f.path,f.physical_name) AS profile'))
                                ->join('sd_company_admin_role_link AS cal',function($join){
                                    $join->on('ad.admin_seq', '=', 'cal.admin_seq')
                                        ->where('cal.use_yn', 'Y');
                                })
                                ->leftJoin('sd_admin_file_link AS afl', function($join){
                                    $join->on('ad.admin_seq', '=', 'afl.admin_seq')
                                        ->select('admin_seq', 'file_seq')
                                        ->where('file_seq', DB::raw("(SELECT file_seq FROM sd_admin_file_link WHERE admin_seq = afl.admin_seq ORDER BY mod_date DESC LIMIT 1)"));
                                })                               
                                ->leftJoin('sd_file AS f' ,'afl.file_seq','f.file_seq') 
                                ->where('ad.use_yn', 'Y')
                                ->where('ad.admin_seq', $admin_seq)
                                ->where('cal.company_seq', $company_seq)
                                ->where('cal.admin_role_seq', 3)
                                ->first();
        $data           =   [
            'admin_info'        =>  $list
        ];
                             
        return view('company.admin.info', $data);
    }

    public function adminModify(Request $request){
        $admin_data         =   $request->input('admin_info');
        $result['message']  =   '수정이 완료되었습니다.';
        $result['result']   =   true;
        return $result;
    }

    // ajax json 형태로 전송
    public function checkDuplicate(Request $request){

        $result             =   array();

        $field              =   $request->input('field');
        $value              =   $request->input('value');




        $result['result']   =   false;
        $result['message']  =   '중복된 아이디가 존재합니다.'.$field.$value;
        return $result;

        /*$field              =   $data['field'];
        $value              =   $data['value'];   

        $is_duplicate       =   'N';
        if($field == 'admin_tel'){

        }
        if($field == 'admin_email'){

        }
        
        if(false){
            $result['result']       =   true;
            $result['message']      =   '사용가능한 아이디 입니다.';
        } else {
            $result['result']       =   false;
            $result['message']      =   '중복된 아이디가 존재합니다.';
        }

        return $result;*/
    }

   
}
