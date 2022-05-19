<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp;

class ProcessController extends Controller
{

    public function process_naver_laravel(Request $request){
        $paymentId      =   $request->get('paymentId');
        $resultCode     =   $request->get('resultCode');

        $client_id      =   'u86j4ripEt8LRfPGzQ8';
        $client_secret  =   '';

         if($resultCode == 'Success'){

            $response       =   Http::withHeaders([
                'X-Naver-Client-Id'     =>  $client_id,
                'X-Naver-Client-Secret' =>  $client_secret
            ])->post('https://dev.apis.naver.com/naverpay-partner/naverpay/payments/v2/apply/payment', [
                'paymentId'             =>  $paymentId
            ]);

            if($response->successful()){

                return $response;
                return view('payment.complete_naver', $response);
            }

            $response->throw();

            } else {

            $reuslt['message']      =   '오류';
            $result['result']       =   false;
            return $result;
        }
    }

    public function process_naver(Request $request){
        $paymentId      =   $request->get('paymentId');
        $resultCode     =   $request->get('resultCode');

        $client_id      =   'u86j4ripEt8LRfPGzQ8';      //db
        $client_secret  =   'e44KRTTnjR';

         if($resultCode == 'Success'){

            $header         =   array();

            $naver_url      =   'https://dev.apis.naver.com/naverpay-partner/naverpay/payments/v2/apply/payment';
            $header[]       =   'X-Naver-Client-Id:'.$client_id;
            $header[]       =   'X-Naver-Client-Secret:'.$client_secret;

            $post_data      =   array(
                'paymentId'             =>  $paymentId
            );

            $curlRequest        =   $this->initCurlRequest('POST', $naver_url, $post_data, $header);

            $return_header      =   $curlRequest['header'];
            $return_body        =   $curlRequest['body'];

            $http_code          =   $return_header['http_code'];
            $response           =   json_decode($return_body, true);


            $str0           =   explode('HTTP/1.1 ', $http_code);
            $result_code    =   substr($str0[1], 0, 3);

            if($result_code != '200'){
                echo 'api 요청 오류';
                exit;
            }

            $response           =   json_decode($return_body, true);

            if($response['code'] != 'Success'){
                echo '결제과정에서 오류가 발생했습니다.';
                exit;
            }

            $detail             =   $response['body']['detail'];
            return $response;
        }
    }

    public function cancel_naver(Request $request){
        $client_id          =   '';
        $client_secret      =   '';

        $paymentId          =   $request->paymentId;
        $cancelAmount       =   $request->cancelAmount;
        $cancelReason       =   '고객변심';
        $cancelRequester    =   $request->cancelRequest     ??  2;

        $header         =   array();

        $naver_url      =   'https://dev.apis.naver.com/naverpay-partner/naverpay/payments/v1/cancel';
        $header[]       =   'X-Naver-Client-Id:'.$client_id;
        $header[]       =   'X-Naver-Client-Secret:'.$client_secret;

        $post_data      =   array(
            'paymentId' =>  $paymentId,
            'cancelAmount'  =>  $cancelAmount,
            'cancelReason'  =>  $cancelReason,
            'cancelRequester'   =>  $cancelRequester
        );

        $curlRequest        =   $this->initCurlRequest('POST', $naver_url, $post_data, $header);
        $return_header      =   $curlRequest['header'];
        $return_body        =   $curlRequest['body'];

        $response           =   json_decode($return_body, true);
        return $response;
    }

    public function process_kakao(Request $request){

        $item_name          =   $request->item_name;
        $partner_order_id   =   $request->partner_order_id;
        $partner_user_id    =   $request->partner_user_id;
        $quantity           =   $request->quantity;
        $total_amount       =   $request->total_amount;
        $tax_free_amount    =   0;

        $APP_ADMIN_KEY      =   '1499cdd1a65423b76d25e0644044c2ce';     //db
        $cid                =   'TC0ONETIME';                           //db


        $approval_url       =   'http://localhost/payment/complete_kakao?result=approve&order_id='.$partner_order_id;
        $cancel_url         =   'http://localhost/payment/pay_kakao';
        $fail_url           =   'http://localhost/payment/pay_kakao';

        $kakao_url          =   'https://kapi.kakao.com/v1/payment/ready';

        $header[]           =   'Authorization: KakaoAK '.$APP_ADMIN_KEY;
        $header[]           =   'Host: kapi.kakao.com';
        $header[]           =   'Content-type: application/x-www-form-urlencoded;charset=utf-8';

        $post_data          =   array(
            'cid'           =>  $cid,
            'partner_order_id'  =>  $partner_order_id,
            'partner_user_id'   =>  $partner_user_id,
            'item_name'     =>  $item_name,
            'quantity'      =>  $quantity,
            'total_amount'  =>  $total_amount,
            'tax_free_amount'   =>  $tax_free_amount,
            'approval_url'  =>  $approval_url,
            'cancel_url'    =>  $cancel_url,
            'fail_url'      =>  $fail_url
        );

        $curlRequest        =   $this->initCurlRequest('POST', $kakao_url, $post_data, $header);

        $return_header      =   $curlRequest['header'];
        $return_body        =   $curlRequest['body'];


        $http_code          =   $return_header['http_code'];
        $response           =   json_decode($return_body, true);



        $str0           =   explode('HTTP/1.1 ', $http_code);
        $result_code    =   substr($str0[1], 0, 3);

        if($result_code != '200'){
            $error      =   array(
                'order_code'        =>  $partner_order_id,
                'mb_id'             =>  $partner_user_id,
                'approve'           =>  'N',
                'log'               =>  $response
            );
            echo 'api 요청 오류';
            exit;
        }


        $tid                            =   $response['tid'];
        $next_redirect_app_url          =   $response['next_redirect_app_url'];     // 앱사용안하기때문에 필요없음
        $next_redirect_mobile_url       =   $response['next_redirect_mobile_url'];
        $next_redirect_pc_url           =   $response['next_redirect_pc_url'];
        $android_app_scheme             =   $response['android_app_scheme'];
        $ios_app_scheme                 =   $response['ios_app_scheme'];
        $created_at                     =   $response['created_at'];

        $mobile_agent = "/(iPod|iPhone|Android|BlackBerry|SymbianOS|SCH-M\d+|Opera Mini|Windows CE|Nokia|SonyEricsson|webOS|PalmOS)/";

        $next_redirect_url              =   $next_redirect_pc_url;
        if(preg_match($mobile_agent, $_SERVER['HTTP_USER_AGENT'])){
            $next_redirect_url          =   $next_redirect_mobile_url;
            /*if(preg_match("/(iPod|iPhone)/", $_SERVER['HTTP_USER_AGENT'])){
                $next_redirect_url      =   $ios_app_scheme;
            }
            if(preg_match("/(Android)/", $_SERVER['HTTP_USER_AGENT'])){
                $next_redirect_url      =   $android_app_scheme;
            }*/
        }

        session_start();
        $return_data                     =   array(
            'tid'                       =>  encrypt($tid),
            'partner_order_id'          =>  encrypt($partner_order_id),
            'partner_user_id'           =>  encrypt($partner_user_id)
        );

        $_SESSION['return_data']        =   $return_data;

        echo "<script>";
        echo "var win = window.open('','','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=540,height=700,left=100,top=100');";
        echo "win.document.write('<iframe width=100%, height=650 src=".$next_redirect_url." frameborder=0 allowfullscreen></iframe>')";
        echo "</script>";
        exit;

    }

    public function complete_kakao(Request $request){
        $pg_token           =   $request->get('pg_token');
        $partner_order_id   =   $request->get('order_id');

        if(!$pg_token){
            echo '토큰값누락';
            exit;
        }

        session_start();
        if($_SESSION['return_data']){
            $return_data        =   $_SESSION['return_data'];

            unset($_SESSION['return_data']);
            session_destroy();

            $tid                =   decrypt($return_data['tid']);
            $partner_order_id   =   decrypt($return_data['partner_order_id']);
            $partner_user_id    =   decrypt($return_data['partner_user_id']);

            $APP_ADMIN_KEY      =   '1499cdd1a65423b76d25e0644044c2ce';     //db
            $cid                =   'TC0ONETIME';

            $kakao_url          =   'https://kapi.kakao.com/v1/payment/approve';

            $header[]           =   'Authorization: KakaoAK '.$APP_ADMIN_KEY;
            $header[]           =   'Host: kapi.kakao.com';
            $header[]           =   'Content-type: application/x-www-form-urlencoded;charset=utf-8';

            $post_data          =   array(
                'cid'           =>  $cid,
                'tid'           =>  $tid,
                'partner_order_id'  =>  $partner_order_id,
                'partner_user_id'   =>  $partner_user_id,
                'pg_token'      =>  $pg_token
            );


            $curlRequest        =   $this->initCurlRequest('POST', $kakao_url, $post_data, $header);

            $return_header      =   $curlRequest['header'];
            $return_body        =   $curlRequest['body'];


            $http_code          =   $return_header['http_code'];
            $response           =   json_decode($return_body, true);



            $str0           =   explode('HTTP/1.1 ', $http_code);
            $result_code    =   substr($str0[1], 0, 3);

            if($result_code != '200'){
                $error      =   array(
                    'order_code'        =>  $partner_order_id,
                    'mb_id'             =>  $partner_user_id,
                    'approve'           =>  'N',
                    'log'               =>  $response
                );
                echo 'api 요청 오류';
                exit;
            }

            $payment_method_type        =   $response['payment_method_type'];   //CARD/MONEY
            if($payment_method_type == 'CARD'){                                 //카드결제일 경우만해당
                $purchase_corp          =   $response['card_info']['purchase_corp'];
            }

            return $response;
            exit;
        } else {
            session_destroy();
            echo '세션값 누락 오류';
            exit;
        }

    }



    public function complete_kakao_session(Request $request){
        $pg_token           =   $request->get('pg_token');
        if(!$pg_token){
            echo '토큰값누락';
            exit;
        }

        session_start();
        if($_SESSION['return_data']){
            $return_data        =   $_SESSION['return_data'];

            unset($_SESSION['return_data']);
            session_destroy();

            $tid                =   decrypt($return_data['tid']);
            $partner_order_id   =   decrypt($return_data['partner_order_id']);
            $partner_user_id    =   decrypt($return_data['partner_user_id']);

            $APP_ADMIN_KEY      =   '1499cdd1a65423b76d25e0644044c2ce';     //db
            $cid                =   'TC0ONETIME';

            $kakao_url          =   'https://kapi.kakao.com/v1/payment/approve';

            $header[]           =   'Authorization: KakaoAK '.$APP_ADMIN_KEY;
            $header[]           =   'Host: kapi.kakao.com';
            $header[]           =   'Content-type: application/x-www-form-urlencoded;charset=utf-8';

            $post_data          =   array(
                'cid'           =>  $cid,
                'tid'           =>  $tid,
                'partner_order_id'      =>  $partner_order_id,
                'partner_user_id'       =>  $partner_user_id,
                'pg_token'      =>  $pg_token
            );


            $curlRequest        =   $this->initCurlRequest('POST', $kakao_url, $post_data, $header);

            $return_header      =   $curlRequest['header'];
            $return_body        =   $curlRequest['body'];


            $http_code          =   $return_header['http_code'];
            $response           =   json_decode($return_body, true);



            $str0           =   explode('HTTP/1.1 ', $http_code);
            $result_code    =   substr($str0[1], 0, 3);

            if($result_code != '200'){
                $error      =   array(
                    'order_code'        =>  $partner_order_id,
                    'mb_id'             =>  $partner_user_id,
                    'approve'           =>  'N',
                    'log'               =>  $response
                );
                echo 'api 요청 오류';
                exit;
            }

            $payment_method_type        =   $response['payment_method_type'];   //CARD/MONEY
            if($payment_method_type == 'CARD'){                                 //카드결제일 경우만해당
                $purchase_corp          =   $response['card_info']['purchase_corp'];
            }

            return $response;
            exit;
        } else {
            session_destroy();
            echo '세션값 누락 오류';
            exit;
        }

    }


    public function cancel_kakao(Request $request){
        /*$partner_order_id   =   $request->partner_order_id;
        $partner_user_id    =   $request->partner_user_id;
        $tid                =   $request->tid;
        $cancel_amount      =   $request->cancel_amount;
        $cancel_tax_free_amount         =   $request->cancel_tax_free_amount;*/

        $partner_order_id   =   'A0001';
        $partner_user_id    =   'sd_phj';
        $tid                =   'T2893184494645068925';
        $cancel_amount      =   500;
        $cancel_tax_free_amount         =   0;

        $APP_ADMIN_KEY      =   '1499cdd1a65423b76d25e0644044c2ce';     //db
        $cid                =   'TC0ONETIME';

        $kakao_url          =   'https://kapi.kakao.com/v1/payment/cancel';

        $header[]           =   'Authorization: KakaoAK '.$APP_ADMIN_KEY;
        $header[]           =   'Host: kapi.kakao.com';
        $header[]           =   'Content-type: application/x-www-form-urlencoded;charset=utf-8';

        $post_data          =   array(
           'cid'            =>  $cid,
           'tid'            =>  $tid,
           'cancel_amount'  =>  $cancel_amount,
           'cancel_tax_free_amount'     =>  $cancel_tax_free_amount
        );

        $curlRequest        =   $this->initCurlRequest('POST', $kakao_url, $post_data, $header);

        $return_header      =   $curlRequest['header'];
        $return_body        =   $curlRequest['body'];

        $http_code          =   $return_header['http_code'];
        $response           =   json_decode($return_body, true);

        $str0               =   explode('HTTP/1.1 ', $http_code);
        $result_code        =   substr($str0[1], 0, 3);

        if($result_code != '200'){
            $error      =   array(
                'order_code'        =>  $partner_order_id,
                'mb_id'             =>  $partner_user_id,
                'approve'           =>  'N',
                'log'               =>  $response
            );
            echo 'api 요청 오류';
            exit;
        }

        return $response;
    }

    // 주문조회
    function result_kakao($tid){
        $APP_ADMIN_KEY      =   '1499cdd1a65423b76d25e0644044c2ce';     //db
        $cid                =   'TC0ONETIME';


        $kakao_url          =   'https://kapi.kakao.com/v1/payment/order';

        $header[]           =   'Authorization: KakaoAK '.$APP_ADMIN_KEY;
        $header[]           =   'Host: kapi.kakao.com';
        $header[]           =   'Content-type: application/x-www-form-urlencoded;charset=utf-8';

        $post_data          =   array(
           'cid'            =>  $cid,
           'tid'            =>  $tid
        );

        $curlRequest        =   $this->initCurlRequest('POST', $kakao_url, $post_data, $header);

        $return_header      =   $curlRequest['header'];
        $return_body        =   $curlRequest['body'];

        $http_code          =   $return_header['http_code'];
        $response           =   json_decode($return_body, true);

        //$response->tid;
        $result             =   array(
            '카카오 주문번호'       =>  $response['tid'],
            '상태'                  =>  $response['status'],
            '시대고시 주문번호'     =>  $response['partner_order_id'],
            '회원 아이디'           =>  $response['partner_user_id'],
            '총 결제금액'           =>  $response['amount']['total'],
            '부가세'                =>  $response['amount']['vat'],
            '취소금액'              =>  $response['canceled_amount']['total'],
            '취소가능금액'          =>  $response['cancel_available_amount']['total']
        );
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    function initCurlRequest($reqType, $reqURL, $reqBody = '', $headers = array()){
        if(!in_array($reqType, array('GET', 'POST', 'PUT', 'DELETE'))){
            return '데이터 요청 방식 오류';
        }

        $reqBody            =   http_build_query($reqBody);
        $ch                 =   curl_init();

        curl_setopt($ch, CURLOPT_URL, $reqURL);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $reqBody);

        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);    //ssl인증여부 끔
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        if(curl_errno($ch)){
            return curl_error($ch);
        }

        $body               =   curl_exec($ch);

        $headerSize         =   curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header             =   substr($body, 0, $headerSize);
        $header             =   $this->getHeaders($header);
        $body               =   substr($body, $headerSize);

        curl_close($ch);

        $result             =   array(
            'header'        =>  $header,
            'body'          =>  $body
        );
        return $result;
    }

    function getHeaders($respHeaders){
        $headers            =   array();
        $headerText         =   substr($respHeaders, 0, strpos($respHeaders, "\r\n\r\n"));

        foreach(explode("\r\n", $headerText) as $i => $line){
            if ($i === 0) {
                $headers['http_code']       =   $line;
            } else {
                list ($key, $value)         =   explode(': ', $line);

                $headers[$key]              =   $value;
            }
        }

        return $headers;
    }

    public function calculationSalary(){

    }
}
