<?php

namespace App\Http\Controllers\Clova;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\DB;
use App\Http\CommonLib;
use Illuminate\Support\Facades\Storage;

class ClovaController extends Controller
{
    // 네이버 얼굴인식

    public function upload(){
      $temp     = '{
        "result":"COMPLETED",
        "message":"Succeeded",
        "token":"5a3ebb28cc734f7abed3ffff74e3e62e",
        "version":"ncp_v2_677fde9_1ef245f_20201222_",
        "params":
          {	"service":"ncp",
            "domain":"general",
            "lang":"ko",
            "completion":"sync",
            "diarization":
              {	"enable":true,
                "speakerCountMin":-1,
                "speakerCountMax":-1
              },
            "sttEnable":true,
            "boostings":[],
            "forbiddens":"",
            "script":"",
            "wordAlignment":true,
            "fullText":true,
            "keywordExtraction":
              {	"enable":false,
                "context":[]
              },
            "priority":0,
            "userdata":
              {	"_ncp_DomainCode":"stt-test",
                "_ncp_DomainId":716,
                "_ncp_TaskId":430010,
                "_ncp_TraceId":"57613161b30f41ddb91c92723f6864b8"
              },
            "groupByAudio":false
          },
        "progress":100,
        "keywords":{},
        "segments":
          [
            {"start":15140,"end":15560,"text":"","confidence":0.0,"diarization":{"label":"1"},"speaker":{"label":"1","name":"A","edited":false},"textEdited":""},
            {"start":22650,"end":23230,"text":"하아","confidence":0.5,"diarization":{"label":"1"},"speaker":{"label":"1","name":"A","edited":false},"words":[[22651,23050,"하아"]],"textEdited":"하아"},
            {"start":24480,"end":25120,"text":"","confidence":0.0,"diarization":{"label":"1"},"speaker":{"label":"1","name":"A","edited":false},"textEdited":""},
            {"start":25520,"end":26600,"text":"","confidence":0.0,"diarization":{"label":"1"},"speaker":{"label":"1","name":"A","edited":false},"textEdited":""},
            {"start":29480,"end":30070,"text":"","confidence":0.0,"diarization":{"label":"1"},"speaker":{"label":"1","name":"A","edited":false},"textEdited":""},
            {"start":30990,"end":33990,"text":"","confidence":0.0,"diarization":{"label":"1"},"speaker":{"label":"1","name":"A","edited":false},"textEdited":""},
            {"start":36610,"end":37990,"text":"오케이","confidence":0.0,"diarization":{"label":"1"},"speaker":{"label":"1","name":"A","edited":false},"words":[[37010,37610,"오케이"]],"textEdited":"오케이"}
          ],
        "text":"하아 오케이",
        "confidence":0.2,
        "speakers":[{"label":"1","name":"A","edited":false}]
      }';

      $temp_json      = json_decode($temp, true);
      return $temp_json['text'];


    }

    public function voiceFileUpload(Request $request){

    }

    public function faceFileUpload(Request $request){
      //$max_time   = ini_get('max_execution_time');
      set_time_limit(1000);
      //return $max_time;
        $client_id      =   'ygwmy6kf5y';
        $client_secret  =   '1cXYWBfOQp8VC2IityN6xDOZycEsAbpCSJ1CUBTc';

        $result         = array();

        if($request->faceImg){
          Storage::putFileAs('/img', $request->file('faceImg'), $_FILES['faceImg']['name'], 'public');
          $fileUrl    = asset('img/'.$_FILES['faceImg']['name']);

        } else {
          return $result['message']   = 'image upload error';
        }

        $filename       = $_FILES['faceImg']['name'];
        $ext            = $ext = preg_replace('/^.*\.([^.]+)$/D', '$1', $filename);

        $url            = "https://naveropenapi.apigw.ntruss.com/vision/v1/celebrity";
        $ch             = curl_init();
        $filesize       = filesize($request->file('faceImg'));

        if($filesize > 2*1024*1024) {
            return $result['message'] = '2MB 이하의 이미지를 올려주세요.';
        }

        $cfile    = curl_file_create($fileUrl, $ext, $filename);
        $postvars = array("filename" => $filename, "image" => $cfile);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_INFILESIZE, $filesize);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);    //ssl인증여부 끔
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $headers = array();
        $headers[] = "X-NCP-APIGW-API-KEY-ID: ".$client_id;
        $headers[] = "X-NCP-APIGW-API-KEY: ".$client_secret;
        $headers[] = "Content-Type:multipart/form-data";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec ($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        // 헤더 내용 출력
        $headerSent = curl_getinfo($ch, CURLINFO_HEADER_OUT );
        curl_close ($ch);
        if($status_code == 200) {
          return $result['message']     = $headerSent.$response.$status_code;
        } else {
          return $resul['message']   = $headerSent.$response.$status_code;
        }

    }

    public function faceRecognition(){

    }


}
?>
