<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class PlayGroundController extends Controller
{
  
    public function props(){
                              
        return view('playground.props');
    }

    public function event(){
                              
        return view('playground.event');
    }

    public function router(){
                              
        return view('playground.router');
    }

    public function axios(){
                              
        return view('playground.axios');
    }

    public function axiosReturn(Request $request){
        $result             =   array();
        $firstname          =   $request->input('firstname');
        $lastname           =   $request->input('lastname');

        $result             =   [
            'firstname'     =>  $firstname,
            'lastname'      =>  $lastname
        ];
        return $result;
    }

    public function axiosForm(Request $request){
        $file_name              =   NULL;
        $file_serve             =   NULL;
        
        $subject                =   $request->subject;
        $content                =   $request->content;

        if($request->hasFile('img_1') && $request->img_1->isValid()){
            $file_name          =   $request->file('img_1')->getClientOriginalName();
            $ext                =   $ext    =   preg_replace('/^.*\.([^.]+)$/D', '$1', $file_name);
            $file_serve         =   round(microtime(true)).".".$ext;
        }

        try{

            DB::table('board')->insert(
                [
                    'file'          =>  $file_name,
                    'file_server'   =>  $file_serve,
                    'subject'       =>  $subject,
                    'content'       =>  $content
                ]
            );
            
            $result                 =   array(
                'message'           =>  '등록되었습니다.',
                'data'              =>  true
            );     
            return $result;
                
        } catch(Exception $e){
            $result                 =   array(
                'message'           =>  $e,
                'data'              =>  false
            );
            return $result;
        }
    } 
    
    public function axiosGet($idx){
        $result         =   array();

        $list           =   DB::table('board')
                            ->select('idx','id',)
                            ->where(['idx'=>$idx])
                            ->first();
        $result['data'] =   $list;
        return $result;

    }
  
}
