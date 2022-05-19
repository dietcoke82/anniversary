

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.5">

        <title>분석 테스트</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

		<!--<script src="/sdb/assets/js/date-time/bootstrap-datepicker.min.js"></script>-->

		<link rel="stylesheet" href="{{ asset('css/assets/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/assets/css/ace.min2.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/assets/css/ace-skins.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/assets/css/font-awesome.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('sidaegosi_game/common/css/fontawesome/css/all.min.css') }}" />


		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<script src="{{ asset('js/jquery.js') }}"></script>
		<script src="{{ asset('js/jqueryui/jquery-ui.js') }}"></script>

        <script src="{{ asset('css/assets/js/ace.min.js') }}"></script>
        <script src="{{ asset('css/assets/js/ace-extra.min.js') }}"></script>
		<script src="{{ asset('css/assets/js/ace-elements.min.js') }}"></script>
		<script src="{{ asset('css/assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('css/assets/js/jquery.easypiechart.js') }}"></script>

		<link rel="stylesheet" href="{{ asset('../js/jQCloud/jqcloud/jqcloud.css') }}">

		<script src="{{ asset('js/mjx/MathJax.js?config=default') }}"></script>


    </head>

<body>
<style>
.compre_btn{
	margin-top:3px;
	border:1px solid #6FB3E0;
	padding:5px 10px 5px 10px;
	background:white;
	float:right;

}/*
textarea.autosize {
	min-height: 50px;
}*/

.common_div{
/*
	padding-left:5%;
	padding-right:5%; */
}
.first_div{
	padding-bottom:40px;
	margin-bottom:10px;
}
.compre_input{
	width:100%;
	height:145px;
	font-size:18px;
}
.result_div{
	height:250px;
	padding:5px 10px 5px 10px;
	border:1px solid #87B87F;
}

.result_reko_div{
	width:100%;
	height:600px;
	padding:5px 10px 5px 10px;
	border:1px solid #87B87F;
	overflow-y: scroll;

}
.css_textarea{
	width:50%;
	height:500px;
	padding:5px 10px 5px 10px;
	border:1px solid #87B87F;
	overflow-y: scroll;
}

.css_textarea_result{
	width:50%;
	height:500px;
	padding:5px 10px 5px 10px;
	border:1px solid #87B87F;
	overflow-y: scroll;

}
.left_div{
	width:50%;
	height:200px;
	padding:5px 10px 5px 10px;
	border:1px solid #87B87F;
	overflow-y: scroll;

}
.right_div{
	/* width:50%; */
	/* height:600px; */
	padding:5px 10px 5px 10px;
	border:1px solid #87B87F;
	overflow-y: scroll;

}
.not_half{
	width:98%;
	margin-left:2%;
	margin-bottom:20px;
}
.half {
	width:50%;
	float:left;
	/* margin-bottom:20px; */
}
/* 로딩화면 */
.sk-cube-grid {
  width: 300px;
  height: 300px;
}

.created2{
	background-color: #ffffcc;
}

.sk-cube-grid .sk-cube {
  width: 33%;
  height: 33%;
  background-color: #ffff00;
  float: left;
  -webkit-animation: sk-cubeGridScaleDelay 1.3s infinite ease-in-out;
          animation: sk-cubeGridScaleDelay 1.3s infinite ease-in-out;
}
.sk-cube-grid .sk-cube1 {
  -webkit-animation-delay: 0.2s;
          animation-delay: 0.2s; }
.sk-cube-grid .sk-cube2 {
  -webkit-animation-delay: 0.3s;
          animation-delay: 0.3s; }
.sk-cube-grid .sk-cube3 {
  -webkit-animation-delay: 0.4s;
          animation-delay: 0.4s; }
.sk-cube-grid .sk-cube4 {
  -webkit-animation-delay: 0.1s;
          animation-delay: 0.1s; }
.sk-cube-grid .sk-cube5 {
  -webkit-animation-delay: 0.2s;
          animation-delay: 0.2s; }
.sk-cube-grid .sk-cube6 {
  -webkit-animation-delay: 0.3s;
          animation-delay: 0.3s; }
.sk-cube-grid .sk-cube7 {
  -webkit-animation-delay: 0s;
          animation-delay: 0s; }
.sk-cube-grid .sk-cube8 {
  -webkit-animation-delay: 0.1s;
          animation-delay: 0.1s; }
.sk-cube-grid .sk-cube9 {
  -webkit-animation-delay: 0.2s;
          animation-delay: 0.2s; }

@-webkit-keyframes sk-cubeGridScaleDelay {
  0%, 70%, 100% {
    -webkit-transform: scale3D(1, 1, 1);
            transform: scale3D(1, 1, 1);
  } 35% {
    -webkit-transform: scale3D(0, 0, 1);
            transform: scale3D(0, 0, 1);
  }
}

@keyframes sk-cubeGridScaleDelay {
  0%, 70%, 100% {
    -webkit-transform: scale3D(1, 1, 1);
            transform: scale3D(1, 1, 1);
  } 35% {
    -webkit-transform: scale3D(0, 0, 1);
            transform: scale3D(0, 0, 1);
  }
}

.loading_div{
	position: absolute;
    left: 43%;
    top: 35%;
	display:none;
}

.compre_tab{
	display:none;
}
.reko_tab{
	display:none;
}
.class_tab{
	display:none;
}
.active{
	display:block;
}
.btns{
	padding-left:39%;
	margin-bottom:10px;
}
.btn_st{
	font-weight:bold;
	text-align:center;
	border:1px solid #87B87F;
	padding:5px 10px 5px 10px;
	background:white;
	font-size:12pt;
}
.search_input_text{
	height:20px;
	width:100px;
}

.textNum{
	font-weight:bold;
	border:1px solid #87B87F;
	padding:5px 10px 5px 10px;
	background:white;
	font-size:10pt;
}
.table>tbody>tr>td {
    width: 50%;
}
.sel{
	font-weight:bold;
	border:1px solid #87B87F;
	padding:5px 10px 5px 10px;
	background:white;
	font-size:10pt;


}

.line{
	border-style:solid;
	border-width : 2px;
	padding: 10px;
	font-size:14px;
}

.leftLine{
	border-style:solid;
	border-width : 2px;
	padding: 10px;
	<!--display:inline-block;-->
}
td.first{
  width:auto;
   border: 1px solid #000;
  }
 input[type="text"] {
     width: 100%;
     box-sizing: border-box;
     -webkit-box-sizing:border-box;
     -moz-box-sizing: border-box;
}
.selectedClova {
    text-decoration: none;
    font: menu;
    display: inline-block;
	cursor:pointer;
    padding: 2px 8px;
    background: ButtonFace;
    color: ButtonText;
    border-style: solid;
    border-width: 2px;
    border-color: ButtonHighlight ButtonShadow ButtonShadow ButtonHighlight;
}
</style>
<script type="text/javascript">
var aws_unselected_arr = [0,1];			//	아마존 치환
var naver_unselected_arr = [4,5];		//	네이버 치환


let changedText				=	[];		//	오른쪽 테이블에 나타날 문자배열
let changedTextStyle		=	[];
//let subtitleText			=	'';		//	수정가능 테이블
let totalCount				=	0;		//	문단개수
let dbText					=	"";		//	디비에 들어갈 실 텍스트
//let arrForLength			=	[];		//	문단 맞추기 위한 원문 텍스트
let isModify				=	"N";	//	새로등록 N / 수정 Y
let isMaxLengthError		=	"N";	//	아마존 10만자 넘는지 확인
let origin_memo				=	"";		//	수정시, 기존메모와 현재쓰인 메모가 다를경우 중복확인
let tb_id					=	0;
let isAllNew				=	"N";	//	수정시, 가장 상단의 textarea 로 입력시 이전 데이터 전부 수정 [cm_aud]
let process_ing 			=	"N";

<?php
if(isset($request_arr['tb_id'])){
?>
<?php
?>
isModify					=	"Y";	//	tb_id 존재시 modify
<?php } ?>


window.onload = function(){
	changeMethod();
	shortcuts();
	totalCount				=	$('.autosize').length;
}

//각 tr별로 바로가기 만들기
function shortcuts(){
	let tr_len = $("#leftTable").find("tr[id^='subtitleTr_']").length;
	let shortcuts_html = "※ 바로가기 : ";
	for(let i=0; i<tr_len; i++){
		shortcuts_html += "<a style='font-size:15px' type='button' href='#subtitleTr_"+i+"' class='selectedClova'><i class=\"fas fa-volume-up\"></i> "+(i+1)+"</a>";
	}

	$("#shortcuts").html(shortcuts_html);
}

// 치환목록
function checkbox_load(){
	var send_data = "method=info";
	$.ajax({
		type: "POST",
		url: "/rekodata/clovaVoice",
		data: send_data,
		dataType: "json",
		success: function (data) {
			let html_checkbox = "<table>";
			let unselected_arr = ($("select[name=aud_platform]").val() == "amazon") ? aws_unselected_arr : naver_unselected_arr;
			if(data.replace){
				html_checkbox		+= "<tr><td>";
				for(var i = 0 ; i < data.replace.length ; i ++){
					if(i != 0 && i % 20 == 0)html_checkbox		+= "</td><td>";
					let data_replace	=	data.replace[i];
						html_checkbox		+=	"<input class='replace_check' type='checkbox' name='replace_check[]' value='"+data_replace.cm_aud_repa+'/'+data_replace.cm_aud_repb+"' ";
						html_checkbox		+=  (jQuery.inArray( i, unselected_arr ) > -1) ? "" : " checked ";
						html_checkbox		+=	"/>";
						html_checkbox		+=  data_replace.cm_aud_repa+' -> '+data_replace.cm_aud_repb+'<br>';

				}
				html_checkbox		+= "</td></tr></table>";
				$("#replace_list").html(html_checkbox);
				}
		}
	});
}

function autosizeTextarea(){
	var txtArea = $(".autosize");
    if (txtArea) {
        txtArea.each(function(){
            this.style.height = this.scrollHeight+2+"px";
        });
    }
}

// 치환목록보기 하단으로 나타냄
function toggle_replace_list(){
	if($("#replace_list").css("display") == "none"){
		$("#replace_list").css("display", "inline-block");
	}else{
		$("#replace_list").hide();
	}

}

// 왼쪽 스크롤 오른쪽 테이블 적용
$(document).ready(function(){

	$("#css_text").on("scroll", function(e){
		let css_text_result = document.getElementById('css_text_result');
		let css_text = document.getElementById('css_text');
		//css_text_result.scrollTop = css_text.scrollTop;
		//css_text_result.scrollLeft = css_text.scrollLeft;
	});

	autosizeTextarea();

});

// 오디오 삭제 [cm_audd_detail]
function pauseAudd(key){
	var subtitleTr			=	document.getElementById("subtitleTr_"+key);
	var audd_idx			=	subtitleTr.dataset.id;

	var send_data = "&method=pauseAudd&audd_idx="+audd_idx ;
	$.ajax({
		type: "POST",
		url: "/rekodata/clovaVoiceList",
		data: send_data,
		dataType: "json",
		success: function (data) {
				console.log(data.result);
				if(data.result == "200"){
					$('#subtitleTr_'+key).remove();
					totalCount--;							// totalCount 로 tr 구성되기 때문에 개수 제외
				} else {
					alert("삭제중 오류가 발생했습니다. 잠시후 다시 시도해주세요.")
				}
		}
	});
}

// kollus upload_key 업데이트 된 후에 자막 생성 가능
function createSrt(type = 0, idx = 0){
	var tb_id 		=	"";
	<?php if(isset($request_arr['tb_id'])){  ?>
	if(process_ing == "N"){
		process_ing 	=	"Y";
		tb_id 			=	"<?= $request_arr['tb_id']?>"
		var send_data 	= 	"&id="+tb_id;
		if(type == 1){
			send_data				=	"&id="+tb_id+"&audd_idx="+idx;
		}
		$('.loading_div').show();
		$.ajax({
			type: "POST",
			url: "/getNaverSttFile",
			data: send_data,
			dataType: "json",
			success: function (data) {
				console.log(data.message);
				alert(data.message);
				process_ing		=	"N";
				location.reload();
			}
		});
	}
	<?php  } else { ?>
		return false;
	<?php } ?>
}

// 음성파일만들기
function clova_start(key){


	let dbTextAll		=	"";
	let apiTextAll		=	"";
	let titleAll		=	"";

	let aud_name		=	$('[name=aud_cat_id]').val();
	let aud_name_sub	=	$('[name=aud_name_sub]').val();
	let aud_memo		=	$('[name=aud_memo]').val();
	let aud_name_sub_select	=	$(".aud_name_sub_select option:selected").val();
	let aud_type		=	$(".aud_type option:selected").val();
	let memoDuplicate	=	0;					// 중복되는 메모갯수

	var selectedClova		=	$(".selectedClova");
	var clova_input_content = document.getElementById('clova_input_content');

	// 네이버일 경우 문장초과 제한
	var isError			=	$("#right_div").find(".errorSpan");
	if(isError.length > 0){
		alert("초과된 문장을 확인해주세요.(마침표사용)");
		return false;
	}

	// 메모 검사 (수정시에는 기존메모와 다를 경우에만 확인)
	if(aud_memo.trim() == ''){
			alert('메모를 입력해주세요.');
			$('[name=aud_memo]').focus();
			return false;
	}

	if((isModify == "Y" && aud_memo != origin_memo) || isModify == "N"){
		var send_data = "method=duplicateMemo&aud_memo="+aud_memo;

		if(isModify == "Y"){
			selectedClova.disabled = true;
		} else {
			clova_input_content.disabled = true;
		}

		$.ajax({
			type: "POST",
			url: "/rekodata/clovaVoiceList",
			data: send_data,
			async: false,				// 실행된 후에 다음 ajax 실행하기 위해 false
			dataType: "json",
			success: function (data) {
				if(isModify == "Y"){
					selectedClova.disabled = false;
				} else {
					clova_input_content.disabled = false;
				}
				memoDuplicate	=	data.result;
				/*
				if(memoDuplicate > 0){
					alert("중복된 메모가 존재합니다.");
					$('[name=aud_memo]').focus();
					return false;
				}
				*/
			}
		});
	}

	if(isModify == "Y" && isAllNew == "N"){				// isAllNew == Y 일경우 생성과 같기 때문에 조건 추가함

		//audd_idx를 가져오는 과정 this를 이용하는 방식으로 변경 sd_xavier

		var subtitleTr			=	$(key).closest("tr");
		var audd_idx			=	$(subtitleTr).attr("data-id");

		/*
		apiTextNum				=	$('#leftTable > tbody > tr:eq('+key+') td:eq(1) p').length;
		for(var i = 0 ; i < apiTextNum ; i ++){
			var tempApiText		=	$("#line_"+key).html();
			tempApiText			=	tempApiText.replaceAll("<br>", "\r\n");
			apiTextAll			+=	tempApiText+"♥";
		}
		*/
		apiTextNumList			=  $('#leftTable > tbody > [data-id='+audd_idx+']');
		$(apiTextNumList).each(function(){
			var tempApiText		=	$(this).find(".line").html();
			var tempdbText		=	$(this).find("textarea").val().replaceAll("\n", "\r\n");
			tempApiText			=	tempApiText.replaceAll("<br>", "\r\n");
			apiTextAll			+=	tempApiText+"♥";
			dbTextAll			+=  tempdbText;
			titleAll			+=	$(this).find("input").val()+"^";
		});

		$("#audd_idx").val(audd_idx);
		/*
		var titleNum			=	$('#leftTable > tbody > tr:eq('+key+') td:eq(1) input').length;
		var titleStr			=	$('#leftTable > tbody > tr:eq('+key+') td:eq(1) input').val();

		for(var i = 0 ; i < titleNum ; i ++){
			titleAll			+=	$('#leftTable > tbody > tr:eq('+key+') td:eq(1) input:eq('+i+')').val()+"^";
		}
		*/
	} else {
		totalCount		=	$("textarea[id^='subText_']").length; 			// 재선언 필요 갯수만큼 못가져옴
		for(var i = 0 ; i < totalCount ; i ++){
			var dbResult	=	$("#subText_"+i).val();
			var tempResult0	=	dbResult.replaceAll("\n", "\r\n");
			var tempResult	=	tempResult0.replaceAll("^", "");
			dbTextAll		+=	tempResult+"^";
		}

		$('.line').each(function(){
			var apiResult	=	$(this).html();
			var tempResult	=	apiResult.replaceAll("<br>", "\r\n");
			apiTextAll		+=	tempResult+"♥";
		});

		$('.audd_title').each(function(){
			var titleResult	=	$(this).val();
			titleAll		+=	titleResult+"^"
		});
	}

	console.log(dbTextAll);
	console.log(apiTextAll);
	console.log(titleAll);

	$('#dbResult').val(dbTextAll);
	$('#apiResult').val(apiTextAll);
	$('#titleResult').val(titleAll);



	if($("select[name=aud_platform]").val() == "naver"){
		$("#method").val("css");
	}else{
		$("#method").val("polly");
	}

	$('#result_div').html('<p>파일을 생성중입니다.</p>');

	if(isModify == "Y"){
		selectedClova.disabled = true;					// 수정버튼 disabled
	} else {
		clova_input_content.disabled = true;			// 음성파일만들기 버튼 disabled
	}

	$('.loading_div').show();
	$.ajax({
		type: "POST",
		url: "/rekodata/clovaVoice",
		data: new FormData($("#clova_form")[0]),
		dataType: "json",
		//async: false,
		contentType:false,
		processData:false,
		success: function (data) {
			$('.loading_div').hide();
			var result_html			=	'';
			if(data.result == true){
				var aud_idx				=	data.aud_idx;
				var tb_id				=	$("#tb_id").val();
				var returnUrl			=	"";
				<?php if(isset($request_arr['aud_idx'])){ ?>
					aud_idx				=	"<?= $request_arr['aud_idx']?>";
				<?php } ?>

				if(tb_id > 0){
					returnUrl			=	"https://ecai.sdedu.co.kr/clovaVoice/"+tb_id+"?route=lecture"			// 시차관리페이지
				} else {
					returnUrl			=	"https://ecai.sdedu.co.kr/clovaVoice/"+aud_idx							// 오디오파일페이지
				}

				location.replace(returnUrl);

			} else {
				result_html			+=	'<p>오류가 발생했습니다. 솔루션 개발팀으로 문의해주세요.</p>';
			}
			$('#result_div').html(result_html);
			if(isModify == "Y"){
				selectedClova.disabled = false;
			} else {
				clova_input_content.disabled = false;
			}

		}
	});
}

// 플랫폼 수정시 작동
function changeMethod(){
	var aud_platform	=	$("select[name=aud_platform]").val();
	if(aud_platform == 'naver'){
		$('#method').val('css');
		$("select[name=aud_text_divide]").val("600");
		$("select[name=aud_hanja]").val("Y");
		$("select[name=aud_date_format]").val("Y");
		$("#naver_tab").show();
	}else{
		$('#method').val('polly');
		$("select[name=aud_text_divide]").val("90000");
		$("select[name=aud_hanja]").val("N");
		$("select[name=aud_date_format]").val("N");
		$("#naver_tab").hide();
	}

	if(isModify == "N"){
		createTable();
		$("#clova_input_content").show();
	} else {
		$("#clova_input_content").hide();
	}

	checkbox_load();

}


// 치환적용
/*function changeMe(type, subtitleText){
		let text_arr            =   [];
		text_arr				=	subtitleText.split("\n");
		console.log(text_arr);
		var aud_hanja		=	$("select[name=aud_hanja]").val();
		var aud_date_format	=	$("select[name=aud_date_format]").val();

		for(var i = 0 ; i < text_arr.length ; i ++){
			if(aud_hanja == 'N'){
				var temp	=	text_arr[i];
				tempText	=	temp.replaceAll(/\([\u2e80-\u2eff\u31c0-\u31ef\u3200-\u32ff\u3400-\u4dbf\u4e00-\u9fbf\uf900-\ufaff]+\)/g, '');
				text_arr[i]	=	tempText;
		}

		if(aud_date_format == 'N'){
			text_arr[i]	=	text_arr[i].replaceAll(/(\d{4})\.\s?([1-9]|1[012]|0[1-9])\.\s?([1-9]|0[1-9]|[12][0-9]|3[0-1])\./g,function convert(match, p1, p2, p3, offset, string){
				return p1+"년 "+p2+"월 "+p3+"일";
			});
		}

		}


	if(type == 1){				// 치환목록 체크박스
		$('input[name="replace_check[]"]:checked').each(function() {
		var valueCom		=	$(this).val();
		var valueArr		=	valueCom.split('/');
		var tempText		=	'';

		for(var i = 0 ; i < text_arr.length ; i ++){
			var temp		=	text_arr[i];
			tempText		=	temp.replaceAll(valueArr[0], valueArr[1]);
			text_arr[i]		=	tempText;
		}
		});

	} else
		if (type == 2){		// 현재쓰이고 있지 않음 (직접치환 input)
		let origin      =   $('#origin_sentence').val();
		let result      =   $('#result_sentence').val();

			for(var i = 0 ; i < text_arr.length ; i ++){
				var temp		=	text_arr[i];
				var tempText	=	temp.replaceAll(origin, result);
				text_arr[i]		=	tempText;
			}
		}
		changedText = text_arr;

}*/

// 차시제목만 수정시
function updateTitle(key, tb_id, audd_idx){
	var title		=	$("#title_"+key+"_0").val();
	var send_data	=	"&method=updateTitle&audd_idx="+audd_idx+"&tb_id="+tb_id+"&title="+title;

	$.ajax({
		type: "POST",
		url: "/rekodata/clovaVoiceList",
		data: send_data,
		dataType: "json",
		success: function (data) {
				var title			=	data.title;
				alert("제목이 수정되었습니다.");
				$("#title_"+key+"_0").val(title);
		}
	});

}


// 1. textarea 등록시 첫번째로 실행
function createTable(type = 0, event){
	$(".srtButton").hide();
	// 211027 heejae
	$("#isAllNew").val("Y");
	isAllNew		=	"Y";
	$("#clova_input_content").show();
	if(isModify == "Y"){
		$("#clova_input_content").show();
		isModify				=	"N";
	}

	var aud_text_divide		=	$("select[name=aud_text_divide]").val();

	let subtitle			=	[];
	let origin_text			=	"";
	let origin_div			=   [];
	if(type == 0){
		origin_text         =   $('#css_text').val();
	} else {

		for(var i = 0 ; i < totalCount ; i ++){
			origin_text		+=	$("#subText_"+i).val();
			origin_text		+=	"\n";
			origin_div[i] = $("#subText_"+i).val().split("\n");
		}
	}

	if(origin_text.length < 1){
		return;
	}
	subtitle				=   origin_text.split("\n");


	var subtitledivarr		=	[];
	j = 0; txtdivcnt = 0;

	let subtitle_arr		=	[];
	var k = 0;
	for(var i = 0 ; i < subtitle.length ; i ++){
		if(subtitle[i].length < 1) continue;
		subtitle_arr[k]		=	subtitle[i];
		k++;
	}

	var isNew			=	"N";
	for(var i = 0 ; i < subtitle_arr.length ; i ++){
		if(subtitle_arr[i].length < 1) continue;
		var icnt			=	countTextToByte(subtitle_arr[i]);

		subtitledivarr[j]	=	(subtitledivarr[j]) ? subtitledivarr[j] : '';

		let isdivide = false;

		if(txtdivcnt > aud_text_divide || (i > 0 && subtitle_arr[i-1].indexOf("^") != -1)){
			j++;
			subtitledivarr[j]	=	"";
			subtitledivarr[j]	+=	subtitle_arr[i]+"\n";
			txtdivcnt			=	icnt;
			isNew				=	"Y";
			isdivide = true;

		} else {
			subtitledivarr[j]	+=	subtitle_arr[i]+"\n";
			/*if(isNew == "N"){
				subtitledivarr[j]	+=	"\n";
			}*/
			txtdivcnt			+= icnt;
			isNew				=	"N";
		}

		for(var h = 0 ; h < origin_div.length ; h ++){
			if(origin_div[h][origin_div[h].length-1] == subtitle_arr[i])j++;
			isdivide = false;
		}

	}

	if(totalCount != subtitledivarr.length || isModify == "N"){


	let table_html		=	'<table class="table" id="leftTable">';
	table_html			+	'<thead>';
	table_html			+=	'	<th>원본(자막용)</th>';
	table_html			+=	'	<th>치환(읽기용)</th>';
	table_html			+	'</thead>';
	table_html			+	'<tbody id="leftTableBody">';


	for( var k = 0; k < subtitledivarr.length; k++){
		cnt					=	countTextToByte(subtitledivarr[k]);
		table_html			+=	"	<tr id='subtitleTr_"+k+"'>";
		table_html			+=	"		<td id='subtitle_"+k+"'><p class='leftLine'><textarea style='width:100%;height:400px;' id='subText_"+k+"' onkeyup='whichFunction(event,1)' class='autosize'>"+subtitledivarr[k]+"</textarea></p>";
		table_html			+=	"</td>";
		table_html			+=	"		<td></td>";
		table_html			+=	"	</tr>";
	}
	totalCount				=	subtitledivarr.length;
	table_html			+=	'</tbody>';
	table_html			+=	'</table>';

	$("#right_div").html(table_html);
	}
	shortcuts();
	cutMe(null, '');
}

// 왼쪽 textarea 사용시, 문단자르는 기능으로 갈지, 단순 텍스트만 수정하는 기능으로 갈지 확인해줌
function whichFunction(event,type=0){
	var aud_text_divide		=	$("select[name=aud_text_divide]").val();
	var subTitleText		=	"";
	var isMaxLength			=	"N";
	for(var i = 0 ; i < totalCount ; i ++){
		var temp_text	=	$("#subText_"+i).val();
		if(countTextToByte(temp_text) > parseInt(aud_text_divide + 400)){
			isMaxLength		=	"Y";
		}
		subTitleText	+=	temp_text+"\n";
	}
	//cutMe(null, 3)
	if(((event.keyCode == 8 || event.keyCode == 54) || subTitleText.indexOf("^") != -1 || isMaxLength == "Y") && type==1){
		createTable2(event);
	}else if(((event.keyCode == 8 || event.keyCode == 54) || subTitleText.indexOf("^") != -1 || isMaxLength == "Y")){			// ^ 입력시,textarea(왼) ^ 포함된경우, 문단길어졌을경우
		createTable(1, event);
	}else {
		cutMe(event, 3)
	}
}

//문단단위로 잘라내기
function createTable2(event){
	$(".srtButton").hide();
	if(!$(event.target))return;

	if(isModify == "Y"){
		$("#clova_input_content").show();
	}

	var aud_text_divide		=	$("select[name=aud_text_divide]").val();

	let subtitle			=	[];
	let origin_text			=	"";

	origin_text		=	$(event.target).val();

	if(origin_text.length < 1){
		return;
	}
	subtitle				=   origin_text.split("\n");

	var subtitledivarr		=	[];
	j = 0; txtdivcnt = 0;

	let subtitle_arr		=	[];
	var k = 0;
	for(var i = 0 ; i < subtitle.length ; i ++){
		if(subtitle[i].length < 1) continue;
		subtitle_arr[k]		=	subtitle[i];
		k++;
	}

	var isNew			=	"N";
	for(var i = 0 ; i < subtitle_arr.length ; i ++){
		if(subtitle_arr[i].length < 1) continue;
		var icnt			=	countTextToByte(subtitle_arr[i]);

		subtitledivarr[j]	=	(subtitledivarr[j]) ? subtitledivarr[j] : '';

		if(txtdivcnt > aud_text_divide || (i > 0 && subtitle_arr[i-1].indexOf("^") != -1)){
			j++;
			subtitledivarr[j]	=	"";
			subtitledivarr[j]	+=	subtitle_arr[i]+"\n";
			txtdivcnt			=	icnt;
			isNew				=	"Y";

		} else {
			subtitledivarr[j]	+=	subtitle_arr[i]+"\n";
			/*if(isNew == "N"){
				subtitledivarr[j]	+=	"\n";
			}*/
			txtdivcnt			+= icnt;
			isNew				=	"N";
		}

	}
	if(totalCount != subtitledivarr.length || isModify == "N"){

		var audd_idx = $(event.target).closest("tr").attr("data-id");

		var table_html = "";
		for( var k = 0; k < subtitledivarr.length; k++){
			cnt					=	countTextToByte(subtitledivarr[k]);
			table_html			+=	"	<tr id='subtitleTr_"+k+"' data-id='"+audd_idx+"' class='created2'>";
			table_html			+=	"		<td id='subtitle_"+k+"'><p class='leftLine'><textarea style='width:100%;height:400px;' id='subText_"+k+"' onkeyup='whichFunction(event, 1)' class='autosize created2'>"+subtitledivarr[k]+"</textarea></p>";
			if(k == subtitledivarr.length-1)table_html += "<a  href=\"javascript:void(0)\" onclick=\"clova_start(this)\" class=\"selectedClova\">오디오수정</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  href=\"javascript:void(0)\" onclick=\"location.reload();\" class=\"selectedClova\">오디오수정취소(새로고침)</a>";
			table_html			+=	"</td>";
			table_html			+=	"		<td></td>";
			table_html			+=	"	</tr>";
		}
		totalCount				=	subtitledivarr.length;

		//테이블이 새로 생성될 경우 수정대상이 아닌 textarea 수정 못하도록 처리, 수정버튼 disabled 처리
		if(totalCount > 1){
			$("#leftTable").find("tr[id^='subtitleTr_']").not(".created2").find("textarea[id^='subText_']").attr("disabled", "disabled");
			$("#leftTable").find("tr[id^='subtitleTr_']").not(".created2").find(".modify_btn").attr("disabled", "disabled");
		}

		$(event.target).closest("tr").after(table_html);
		$(event.target).closest("tr").remove();
		$("textarea[id^='subText_']").each(function(i,e){
			$(this).attr("id", "subText_"+i);
			$(this).closest("td").attr("id", "subtitle_"+i);
			$(this).closest("tr").attr("id", "subtitleTr_"+i);
		});
	}
	shortcuts();
	cutMe(event, '4');
}

function autoChangeMe(subTitleText){
		var aud_hanja		=	$("select[name=aud_hanja]").val();
		var aud_date_format	=	$("select[name=aud_date_format]").val();

		var tempText0		=	"";
		var tempText1		=	"";
		var tempText2		=	"";

		/*if(aud_hanja == 'N'){
			tempText0	=	subTitleText.replaceAll(/\([\u2e80-\u2eff\u31c0-\u31ef\u3200-\u32ff\u3400-\u4dbf\u4e00-\u9fbf\uf900-\ufaff]+\)/g, '');
		}

		if(aud_date_format == 'N'){
			tempText1	=	tempText0.replaceAll(/(\d{4})\.\s?([1-9]|1[012]|0[1-9])\.\s?([1-9]|0[1-9]|[12][0-9]|3[0-1])\./g,function convert(match, p1, p2, p3, offset, string){
				return p1+"년 "+p2+"월 "+p3+"일";
			});
		}*/

		tempText0	=	subTitleText.replaceAll(/\([\u2e80-\u2eff\u31c0-\u31ef\u3200-\u32ff\u3400-\u4dbf\u4e00-\u9fbf\uf900-\ufaff]+\)/g, '');
		tempText1	=	tempText0.replaceAll(/(\d{4})\.\s?([1-9]|1[012]|0[1-9])\.\s?([1-9]|0[1-9]|[12][0-9]|3[0-1])\./g,function convert(match, p1, p2, p3, offset, string){
				return p1+"년 "+p2+"월 "+p3+"일";
		});

		var key					=	0;
		$('input[name="replace_check[]"]:checked').each(function() {
			var valueCom		=	$(this).val();
			var valueArr		=	valueCom.split('/');
			tempText2			=	tempText1.replaceAll(valueArr[0], valueArr[1]);
			tempText1			=	tempText2;
		});

		// 211027 heejae
		var finalText		=	tempText1;
		changedText			=	finalText.split("\n");
		return true;

}
// 2. 왼쪽 테이블 생성 후 실행
function cutMe(event, type){
	var aud_text_divide	=	$("select[name=aud_text_divide]").val();
	var isFinish		=	false;
	let subTitleText	=	'';

	for(var i = 0 ; i < totalCount ; i ++){
		var temp_text	=	$("#subText_"+i).val();
		subTitleText	+=	temp_text+"\n";
	}

	var subtitleForNum	=	subTitleText;
	var textNum			=	countTextToByte(subtitleForNum);
	var returnMin		=	calculationTime(textNum);
	var addNumStr		=	"글자수 : "+textNum;

	addNumStr			+=	"	(예상소요시간 : "+returnMin+" 분)";
	isMaxLengthError	=	"N";

	$("#textNum").html(addNumStr);

	var isFinish		=	autoChangeMe(subTitleText);


	if(isFinish == true){

	let text			=	[];
	text				=	changedText;

	if(text.length == 0)return;

	let text_arr		=	[];
	var k				=	0;
	for(var i = 0 ; i < text.length ; i ++){
		if(text[i].length < 1) continue;
		text_arr[k]		=	text[i];
		k++;
	}
	txtdivstyle=[]; txtdivarr = []; j =0; txtdivcnt = 0; xcnt= 0;

	var tableNum = (type == '4') ? parseInt($(event.target).attr("id").replace("subText_", "")) : 0;

	var audd_idx = (type == '4') ? $(event.target).closest("tr").attr("data-id") : 0;

	for(var i = tableNum ; i < totalCount+tableNum ; i ++){
		var tempText				=	$("#subText_"+i).val();
		var	tempArr					=	tempText.split("\n");
		tempArr						=	tempArr.filter(function(item){
			return item !== "" && item !== "</p>";
		});
		var tempLength				=	tempArr.length;		// 문장수
		txtdivarr[i-tableNum]				=	"";
		for(var k = j ; k < tempLength+j ; k ++){
			// 211027 heejae
			var finalText			=	changeString(tempArr[k]);
			tempLastText			=	finalText.trim();
			lastText				=	tempLastText.substr(tempLastText.length-1, 1);

			txtdivarr[i-tableNum]	+=	finalText;
			if(lastText != "." && lastText != "."){
				console.log(txtdivarr[i-tableNum]);
				txtdivarr[i-tableNum]	+=	".";
			}
			txtdivarr[i-tableNum]	+=	"<br>";
		}
	}
	changedText = txtdivarr;
	changedTextStyle = txtdivstyle;
	sendText(txtdivarr, txtdivstyle, aud_text_divide, tableNum, audd_idx);

	}
}

// 211027 heejae
// 문장 가공해서 그대로 리턴 string -> string
// cutme 에서 autochange 에서 가공되서 돌아오는 값을 사용하지 않고 있음
function changeString(subTitleText){
	var aud_hanja		=	$("select[name=aud_hanja]").val();
	var aud_date_format	=	$("select[name=aud_date_format]").val();

	var tempText0		=	"";
	var tempText1		=	"";
	var tempText2		=	"";

	tempText0			=	subTitleText.replaceAll(/\([\u2e80-\u2eff\u31c0-\u31ef\u3200-\u32ff\u3400-\u4dbf\u4e00-\u9fbf\uf900-\ufaff]+\)/g, '');
	tempText1			=	tempText0.replaceAll(/(\d{4})\.\s?([1-9]|1[012]|0[1-9])\.\s?([1-9]|0[1-9]|[12][0-9]|3[0-1])\./g,function convert(match, p1, p2, p3, offset, string){
			return p1+"년 "+p2+"월 "+p3+"일";
	});

	$('input[name="replace_check[]"]:checked').each(function() {
		var valueCom		=	$(this).val();
		var valueArr		=	valueCom.split('/');
		tempText2			=	tempText1.replaceAll(valueArr[0], valueArr[1]);
		tempText1			=	tempText2;
	});

	return tempText1;
}

// 3. 마지막으로 실행되는 기능 오른쪽에 텍스트 뿌려줌
function sendText(textdiv, txtdivstyle, aud_text_divide, tableNum, audd_idx){
	// 211027 heejae
	if(isAllNew == "Y"){
		tableNum++;
	}

	for(var k = 0 ; k < textdiv.length ; k ++){
		var textStr		=	textdiv[k].replaceAll("^", "");
		var pTag		=	"";
		pTag			+=	"<input type='text' class='audd_title modified_title' placeholder='차시제목을 입력해주세요'></input><p class='line' id='line_"+k+"'>"+textStr+"</p>";
		//if(k==textdiv.length-1)pTag			+= "<a  href=\"javascript:void(0)\" onclick=\"clova_start('"+k+"')\" class=\"selectedClova\">수정</a>";

		$('#leftTable > tbody > tr:eq('+tableNum+') td:eq(1)').html(pTag);
		$("p[id^=line_]").each(function(i,e){
			$(this).attr("id", "line_"+i);
		});

		tableNum++;
	}

	autosizeTextarea();
}


// 한 문장이 200자 초과할 경우 스타일 표식 지정해서 리턴
function checkSentnBreakArr(snt){
	let aud_platform	=	$('[name=aud_platform]').val();
	snt_arr				=	snt.split("\n");
	var returnStr		=	"";
	for(var i = 0 ; i < snt_arr.length ; i ++){
		var snt_arr2		=	snt_arr[i].split(".");
		for(var k = 0 ; k < snt_arr2.length ; k ++){
			icnt		=	countTextToByte(snt_arr2[k]);
			if(icnt > 150){
				returnStr		+=	"<span class='errorSpan' onmouseover=\"javascript: $(this).attr('title', $(this).text().length); \" style='border: solid 1px black; background-color: yellow; '>"+snt_arr2[k]+"</span>";
			} else {
				returnStr		+=	snt_arr2[k];
			}
			if(k != (snt_arr2.length-1)){
				returnStr		+=	".";
			}
		}
		returnStr			+=	"<br>";
	}
	return returnStr;
}

// 시간계산
function calculationTime(textNum){
	//1초에 40자 가능
	var time			=	1;
	var perMin			=	textNum / 40;
	var perMin0			=	Math.round(perMin);
	var perMin1			=	Math.round(perMin0 / 60);
	if(parseInt(perMin1)  > 0){
		time			=	perMin1;
	}
	return time;
}

// 한글 확인
function is_hangul_char(ch) {
	var c = ch.charCodeAt(0);
	if( 0x1100<=c && c<=0x11FF ) return true;
	if( 0x3130<=c && c<=0x318F ) return true;
	if( 0xAC00<=c && c<=0xD7A3 ) return true;
	return false;
}
// 한자 확인
function is_hanja_char(ch){

	if(ch.matche(/[\u2e80-\u2eff\u31c0-\u31ef\u3200-\u32ff\u3400-\u4dbf\u4e00-\u9fbf\uf900-\ufaff]/g)){
		return true;
	} else {
		return false;
	}
}

function errorMaxLength(span_text){
	var span_text_arr	=	span_text.split(" ");
	var change_text		=	'';
	var count			=	0;
	for(var j = 0 ; j < span_text_arr.length ; j ++){
		var span_text		=	span_text_arr[j];

		if(count < 150){
			change_text		+=	" "+span_text;
			count			+=	countTextToByte(span_text);
		} else {
			change_text		+=	span_text+". ";
			count			=	countTextToByte(span_text);
		}
		if(j == (span_text_arr.length-1)){
			change_text			+=	".";
		}
	}
	return change_text;
}

function checkSentnBreak(snt, k){ //한 문장이 200자 초과할 경우 스타일 표식 지정해서 리턴
	let aud_platform = $('[name=aud_platform]').val();
	snt_arr	=	snt.split("."); icnt = 0;			//"^ 도"
	for(var i = 0 ; i < snt_arr.length ; i ++){
		icnt = countTextToByte(snt_arr[i]);
		if(aud_platform == "naver"){
			if( icnt > 150) {		//100
				snt_arr[i] = errorMaxLength(snt_arr[i]);
				snt_arr[i] =  "<br><span id='overflow_"+k+"_"+i+"' title='"+icnt+"'  onmouseover=\"javascript: $(this).attr('title', $(this).text().length); \" style='border: solid 1px black; background-color: yellow; '>"+snt_arr[i]+"</span>";
			}
		}
	}
}

function checkSentnLimit(snt){  // 한 문장이 200자 초과할 경우 글자수 리턴, 아니면 0 리턴
	snt_arr	=	snt.split("."); icnt = 0;
	for(var i = 0 ; i < snt_arr.length ; i ++){
		icnt = countTextToByte(snt_arr[i]);
		if( icnt > 200) return icnt;
	}
	return 0;
}


function breakSentn(sentn, limit) {
	var words = 0;
	if ((sentn.match(/\S+/g)) != null) {
		words = sentn.match(/\S+/g).length;
	}
	if (words > limit) {		// Split the string on first  limit=100 words and rejoin on spaces
		var trimmed = sentn.split(/\s+/, limit).join(" ");		// Add a space at the end to make sure more typing creates new words
		$(this).val(trimmed + " ");
	}else {
		$('#display_count').text(words);
		$('#word_left').text(limit-words);
	}
}

function countTextToByte(val){
        let for_length      =   val;
        //for_length          =   for_length.replaceAll(/[~!@#$%^&*()_+|<>?:{}.,"']/g, '');
        //for_length          =   for_length.replaceAll(/\n/g, "");
		//for_length          =   for_length.replaceAll(/\r/g, "");
        //for_length          =   for_length.replaceAll("“","");
        //for_length          =   for_length.replaceAll("”","");

        var nbytes			= for_length.length;
        return nbytes;
}

// 특정버튼 눌렀을 경우 오디오/비디오가 특정 위치에서부터 재생되게 만듦
function setPlaySetup(id, url, start, end){

	var audio_file 			=	document.getElementById("audio_file");
	audio_file.setAttribute("src", url+" #t="+start+","+end);
}


/**
	220207 sd_phj
	차시 수정하기시, 기존파일 놔두고 새로운 오디오파일 추가 요청 많이 와서 만듦
	^ 표시로 추가 가능하지만  기존파일도 같이 보내기 때문에 불필요한 비용이 듦
*/
function addNewTr(){
	// table
	// 해당 tr 개수 가져와서
	// +html 로 추가해줌


	console.log("start!");

	// 추가해줄 trid 이름명 때문에 가져옴
	let final_tr_len		=	$("#leftTable").find("tr[id^='subtitleTr_']").length;
	final_tr_len--;
	let next_tr_len			=	final_tr_len+1;

	var append_html			=	"<tr id='subtitleTr_"+next_tr_len+"'>";
	append_html				+=	"	<td id='subtitle_"+next_tr_len+"'><p class='leftLine'><textarea style ='width:100%;height:400px;' id='subText_"+next_tr_len+"' onkeyup='whichFunction(event,1)' class='autosize'>.</textarea></p></td>";
	append_html				+=	"	</td>";
	append_html				+=	"	<td></td>";
	append_html				+=	"</tr>";

	$("#subtitleTr_"+final_tr_len).after(append_html);
	shortcuts();
	cutMe(null, '');

}

/**
	220227 sd_phj
	새로 생성한 오디오파일 따로 insert
*/
function insertNewTr(){
	let tb_id		=	"";
	let blank		=	"";
}




</script>

<div id="container">
	<h2 style='text-align:center;'>Clova Voice(css)</h2>
	<div class='btns'>
	<!-- <button  class='btn_st' onClick='tab(1)'>COMPREHEND</button>
	<button  class='btn_st' onClick='tab(2)'>REKOGNITION</button>
	<button  class='btn_st' onClick='tab(3)'>CLASSFICATION</button>
	<button  class='btn_st' onClick='tab(4)'>CLOVA</button> -->
	</div class='btns'>

	<div class='common_div'>
		<div class='compre_tab'>
		<div style='width:100%;'>
			<button class='compre_btn'  onclick="comprehend();">분석</button>
		</div>
		<div class='not_half'>
			<textarea class='compre_input' placeholder='Input Text'></textarea>
		</div>
		<div class='result_div compre_rs half' style='margin-left:2%;'>
			<h4>Sentiment</h4>
		</div>
		<div class='result_div compre_rs2 half' style='margin-left:2%;'>
			<h4>Entities</h4>
		</div>
		<div class='result_div compre_rs3 half' style='width:98%; margin-left:2%;'>
			<h4>KeyPhrases</h4>
		</div>
		</div>
	</div>
	<div class='common_div'>
		<div class='reko_tab'>

		<div>
			<form id='reko_form' name='reko_form'>
				<input style='background:#667E99; color:white; display:inline-block;' type="file" onChange='readURL(this)' id='img_input' name="img">
				<input style='background:#87B87F; display:inline-block;' type="button" value='분석' onClick='insert_img()'>
			</form>
		</div>
		<div class='result_reko_div rekognition_rs'>
			<div class='reko_in'>
			</div>
		</div>
		</div>
	</div>
	<div class='common_div'>
		<div class='clova_tab'>
		<div>
			<form id='clova_form' name='clova_form'>
				<input type="hidden" name="audd_idx" value="" id="audd_idx">
				<input style="display:none;" type="hidden" name="method" class="method" value="polly" id="method">
				<!-- <input style='background:#667E99; color:white; display:inline-block;' type="file" id='wav_input' name="wav" class="clova_input_content">-->

				<div class="css_text">
				<div class="sel">
				<?php if(!isset($request_arr['tb_id'])){ ?>
				구분:
				<select name= "aud_type" class="aud_type">
					<option value="<?=$request_arr['aud_type']?>" selected><?=$request_arr['aud_type']?></option>
				</select>
				종목:	<select name= "aud_cat_id" class="aud_name">
							<option value="<?=$request_arr['aud_name']?>" selected><?=$request_arr['aud_name']?></option>
						</select>
				과목:	<select name= "aud_name_sub_select" class="aud_name_sub_select" onchange="get_aud_list(3);">
							<option value="<?=$request_arr['aud_name_sub']?>" selected><?=$request_arr['aud_name_sub']?></option>
				<?php } ?>
							<!-- <option value="new">[생성하기]</option>
						</select>-->
						<!-- <input type="text" name="aud_name_sub" maxlength="25" id="aud_name_sub" readonly> --><br>
				메모: <input type="text" style="width:85%;" name="aud_memo"  value="<?=isset($request_arr['aud_memo']) ? $request_arr['aud_memo'] : ""?>" placeholder="필요한 메모를 입력합니다. [오디오관리]에서만 확인 가능합니다. [차시관리]에서는 '관리자메모'를 별도로 이용할 수 있습니다."><br>
				플랫폼:
				<select name= "aud_platform" class="aud_platform" onchange="changeMethod();">
				<?php if(isset($request_arr["audd_idx"])){?>
					<option value="<?=$request_arr["aud_platform"]?>" selected><?=$request_arr["aud_platform"]?></option>
				<?php }else{?>
					<option value="amazon" selected>아마존</option>
					<option value="naver">네이버</option>
				<?php }?>
				</select>
				글자수:
				<select name= "aud_text_divide" class="aud_text_divide" onchange="createTable()">
				<?php if(isset($request_arr["audd_idx"])){?>
					<!-- <option value="<?=$request_arr["aud_text_divide"]?>" selected><?= $request_arr["aud_text_divide"]?></option> -->
					<option value="32000" <?php if($request_arr["aud_text_divide"] == "32000"){ ?> selected <?php } ?>>30,000 (자막가능)</option>
					<option value="90000" <?php if($request_arr["aud_text_divide"] == "90000"){ ?> selected <?php } ?>>90,000 (자막불가능)</option>
				<?php }else{?>
					<!-- <option value="600">600</option> -->
					<option value="32000">30,000 (자막가능)</option>
					<option value="90000">90,000 (자막불가능)</option>
				<?php }?>
				</select>
				한자:
				<select name= "aud_hanja" class="aud_hanja" onchange="cutMe(null, '');">
				<?php if(isset($request_arr["audd_idx"])){?>
					<option value="<?=$request_arr["aud_hanja"]?>" selected><?=($request_arr["aud_hanja"] == "Y") ? "유지" : "제거"?></option>
				<?php }else{?>
					<option value="Y" selected>유지</option>
					<option value="N">제거</option>
				<?php }?>
				</select>
				날짜:
				<select name= "aud_date_format" class="aud_date_format" onchange="cutMe(null, '');">
				<?php if(isset($request_arr["audd_idx"])){?>
					<option value="<?=$request_arr["aud_date_format"]?>" selected><?=($request_arr["aud_date_format"] == "Y") ? "유지" : (($request_arr["aud_date_format"] == "N") ? "치환" : "제거")?></option>
				<?php }else{?>
					<option value="Y" selected>유지</option>
					<option value="N">치환</option>
					<option value="D">제거</option>
				<?php }?>
				</select>
				<button type="button" style="background: yellow; display:inline-block;" onClick="toggle_replace_list()">치환목록보기◁</button>
				<div id="replace_list" style="position:absolute; z-index:9; background-color:yellow; display:none;">

				</div>
				<input onClick="cutMe(null, 1);" style="background:#87B87F; display:inline-block; " type="button" value="치환▷적용">
				<input style='background:#87B87F; display:inline-block;' type="button" value='음성파일만들기' onClick='clova_start()' class="clova_input_content" id="clova_input_content">
				<?php if(isset($request_arr["audd_idx"])){
						$is_upload			=	"Y";
						$audio_arr			=	$request_arr["audio_arr"];
						foreach($audio_arr AS $key => $audio){
							$upload_file_key 			=	$audio->upload_file_key;
							$media_content_key_audio	=	$audio->media_content_key_audio;

							if($upload_file_key == "" || $media_content_key_audio == ""){
								$is_upload				=	"N";
							}
						}
					if($is_upload == "Y"){
				?>
				<input onClick="createSrt();" style="background:#87B87F; display:inline-block; " type="button" value="자막파일일괄생성" class="srtButton">
				< > = +  - , " ' : ; 등의 특수기호는 자막에서 보이지 않습니다.
				<?php }
				}?>
				</div>
				<div class="sel" id="naver_tab">
				speaker:
				<select name= "clova_speaker" class="clova_speaker">
					<option value="nara">나라:한국어,여성음색</option>
					<option value="dara">아라:한국어,여성음색</option>
					<option value="mijin">미진:한국어,여성음색</option>
					<option value="jinho">진호:한국어,남성음색</option>
					<option value="clara">클라라:영어,여성음색</option>
					<option value="matt">매트:영어,남성음색</option>
				</select>
				volume:
				<select name= "clova_volume" class="clova_volume">
					<?php for($i = 5 ; $i >= 1 ; $i --){ ?>
						<option value="<?= '-'.$i?>"><?= '-'.$i?></option>
					<?php } ?>
						<option value="0" selected>0</option>
					<?php for($i = 1; $i <= 5 ; $i ++){ ?>
						<option value="<?= $i?>"><?= $i?></option>
					<?php } ?>
				</select>
				speed:
				<select name= "clova_speed" class="clova_speed">
					<?php for($i = 5 ; $i >= 1 ; $i --){ ?>
						<option value="<?= '-'.$i?>"><?= '-'.$i?></option>
					<?php } ?>
						<option value="0" selected>0</option>
					<?php for($i = 1; $i <= 5 ; $i ++){ ?>
						<option value="<?= $i?>"><?= $i?></option>
					<?php } ?>
				</select>
				pitch:
				<select name= "clova_pitch" class="clova_pitch">
					<?php for($i = 5 ; $i >= 1 ; $i --){ ?>
						<option value="<?= '-'.$i?>"><?= '-'.$i?></option>
					<?php } ?>
						<option value="0" selected>0</option>
					<?php for($i = 1; $i <= 5 ; $i ++){ ?>
						<option value="<?= $i?>"><?= $i?></option>
					<?php } ?>
				</select>
				format:
				<select name= "clova_format" class="clova_format">
					<option value="mp3" selected>mp3</option>
					<option value="wav">wav</option>
				</select> <br>
				</div>
				<p id="textNum" class="textNum">글자수 : 0 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp~!@#$%^&*()_+|<>?:{}.,"' 제외</p>

				<!-- <div id="css_text_result" name="css_text_result" class="css_textarea_result" style="position:relative;float:left"> -->
				</div>

				<?php

				if(isset($request_arr["audio_arr"])){
									$audio_arr			=	$request_arr["audio_arr"];
									$allText			=	"";
									foreach($audio_arr AS $key => $audio){
										$audd_text_origin			=	$audio->audd_text_origin;
										$text_origin				=	str_replace("\r\n", "\n", $audd_text_origin);
										$allText					.=	$text_origin."\n";
									}
								}

				?>
				<div>
					<div style="display:inline-block;">
						<textarea type="text" id="css_text" name="css_text" class="" placeholder="음성(wav)로 생성할 텍스트를 입력해주세요." style="height:50px; width:500px; display:inline-block;" ><?php if(isset($request_arr["audio_arr"])){ ?><?= $allText?><?php } ?></textarea>
					</div>
					<div style="display:inline-block;">
						<button type="button" style="background: lightblue; display:inline-block;" onClick="createTable();">입력</button>
					</div>
				</div>
				<div id="result_div">


				</div>

				<div id="shortcuts"></div>

				<div id="setPlay">
					<button type="button"> 해당위치로 가게 하자 </button>
				</div>


				<!--
				<div id="left_div" class="left_div" style="display: inline-block;">
					<input class='search_input_text' id='origin_sentence'  type = "text"/> ->
					<input class='search_input_text' id='result_sentence'  type = "text"/>
					<input onClick='cutMe(2);' style="background:#87B87F; display:inline-block; " type="button" value="직접치환">
					<br>
				</div> -->


				<div id="right_div" class="right_div" style="position:relative;">

					<table class="table" id="leftTable">
						<thead>
							<th>원본(자막용)</th>
							<th>치환(읽기용)</th>
						</thead>
						<tbody id="leftTableBody">
							<?php if(isset($request_arr["audio_arr"])){
									$audio_arr			=	$request_arr["audio_arr"];
									foreach($audio_arr AS $key => $audio){
										$audd_text_origin			=	$audio->audd_text_origin;
										$text_origin				=	str_replace("\r\n", "\n", $audd_text_origin);
										$subtitle_text 				=	"";
										$text						=	"";
										$style						=	"style='background-color:yellow'";
										if($audio->audd_api_success == "Y"){
											$style						=	"";
											$audd_text					=	$audio->audd_text;
											$text						=	str_replace("\r\n", "<br>", $audd_text);
											$audd_subtitle_use 			=	$audio->audd_subtitle_use;

											// kollus 에 업로드 된후 노출
											$upload_file_key 			=	$audio->upload_file_key;
											$media_content_key_audio	=	$audio->media_content_key_audio;
											$subtitle_text 				=	"자막파일생성";
											if($audd_subtitle_use == "Y"){
												$subtitle_text 			=	"자막파일삭제";
											}

										}

							?>
							<tr id='subtitleTr_<?=$key?>' data-id="<?=$audio->audd_idx?>" data-audio="<?= $audio->audd_file_uri?>" <?= $style?>>
								<td id='subtitle_<?= $key?>'>
								<p class='leftLine'><textarea style="width:100%;height:400px;" onkeyup='whichFunction(event, 1)' id="subText_<?= $key?>" class="autosize"><?= $text_origin?></textarea></p>
								<audio src="<?= $audio->audd_file_uri?>" id="audio_<?= $key?>" controls></audio>
								<a  href="javascript:void(0)" onclick="clova_start(this)" class="selectedClova">오디오수정</a>
								<a  href="javascript:void(0)" onclick="pauseAudd(<?= $key?>)" class="selectedClova">오디오삭제</a>
								<?php if($upload_file_key != "" && $media_content_key_audio != ""){ ?>
								<a  href="javascript:void(0)" onclick="createSrt(1,<?= $audio->audd_idx?>)" class="selectedClova"><?= $subtitle_text?></a>
								<?php } ?>
								</td>
								<td>차시제목 : <input style="width:85%;" type='text' class='audd_title' id="title_<?= $key?>_0" placeholder='차시제목을 입력해주세요' value='<?= $audio->audd_title?>'></input><button style="background: lightblue;margin-left:10px; font-size:15px" type="button" onclick="updateTitle(<?= $key?>, <?= $request_arr['tb_id']?>, <?=$audio->audd_idx?>);">수정</button><p class='line' id='line_<?= $key?>'><?= $text?></td>
							</tr>
							<?php }
							}?>
						</tbody>
					</table>
					<p id="addNewTr_pTag"><a href="javascript:addNewTr();">추가하기</a></p>

				</div>
				<!--<input onClick='cutText();' style="background:#87B87F; display:inline-block; float:left; " type="button" value="문자열자르기">-->
				<input type="hidden" type="text" name="titleResult" id="titleResult"/>
				<input type="hidden" type="text" name="apiResult" id="apiResult"/>
				<input type="hidden" type="text" name="dbResult" id="dbResult"/>
				<input type="hidden" type="text" name="isAllNew" id="isAllNew"/>
				<input type="hidden" type="text" name="tb_id" id="tb_id" <?php if(isset($request_arr['tb_id'])){ ?>value="<?= $request_arr['tb_id']?>" <?php } else {  ?> value="0" <?php } ?>/>
				</div>
			</form>
			<form id="deleteForm" action="post">
				<input type="hidden" name="access_token" value="db0lain6dzh3a23j"></input>
			</form>


		</div>

		</div>
		<!--<div class='result_reko_div rekognition_rs'>
			<div id='clova_in'>
			</div>
		</div>-->


		</div>
	</div>
	<div class='common_div'>
		<div class='class_tab'>
		</div>
	</div>
</div>
<!-- 로딩화면 -->
<div class="sk-cube-grid loading_div">
  <div class="sk-cube sk-cube1"></div>
  <div class="sk-cube sk-cube2"></div>
  <div class="sk-cube sk-cube3"></div>
  <div class="sk-cube sk-cube4"></div>
  <div class="sk-cube sk-cube5"></div>
  <div class="sk-cube sk-cube6"></div>
  <div class="sk-cube sk-cube7"></div>
  <div class="sk-cube sk-cube8"></div>
  <div class="sk-cube sk-cube9"></div>
</div>
</body>
</html>
<script>
function readURL(input) {
 if (input.files && input.files[0]) {
  var reader = new FileReader();

  reader.onload = function (e) {
   $('#image_section').attr('src', e.target.result);
  }

  reader.readAsDataURL(input.files[0]);
  }
}
</script>
