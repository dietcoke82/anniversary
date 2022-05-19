@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               <!-- <div class="card-header">{{ __('Reset Password') }}</div>-->

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="/company/admin/modify" name="admin_info">
                        @method('PUT')
                        @csrf
                    
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">아이디</label>

                            <div class="col-md-6">
                                <input id="admin_id" name="admin_id" class="form-control" name="admin_id" value="{{$admin_info->admin_id}}" readonly>
                                <!--
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                -->
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">전화번호</label>
                            <div class="col-md-6 input-group">
                                <input id="admin_tel" class="form-control" name="admin_tel" value="{{$admin_info->admin_tel}}">
                                <span class="input-group-btn">
                                    <button class="btn btn-outline-secondary" type="button" onclick="check_duplicate('admin_tel');">중복확인</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">이메일</label>
                            <div class="col-md-6 input-group">
                                <input id="admin_email" type="email" class="form-control @error('email') is-invalid @enderror" name="admin_email" value="{{$admin_info->admin_email}}" required autocomplete="email">
                                <span class="input-group-btn">
                                    <button class="btn btn-outline-secondary" type="button" onclick="check_duplicate('admin_email');">중복확인</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">이름</label>
                            <div class="col-md-6">
                                <input id="admin_name" class="form-control" name="admin_name" value="{{$admin_info->admin_name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">승인여부</label>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">승인</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">미승인</label>
                                </div>
                            </div>
                        </div>
                       
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    SAVEEEEEEEEEEEEEEEEEEEEEE
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">

    /*$.ajaxSetup({
        headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });*/
    function check_duplicate(type){
       var value       =   document.getElementById(type).value;

        $.ajax({
            headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type  :   'post',
            url     :   '/company/admin/duplicate',
            dataType    :   "json",
            data    :   {
                field     :   type,
                value     :   value   
            },

            //contentType :   "json/application",
            success :   function(data){
                alert(data.message);


            },
            error   :   function(request, status, error){
                alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                console.log('error'+data);
            }
            });
    }


</script>
@endsection

