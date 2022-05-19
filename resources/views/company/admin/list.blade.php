
@extends('layouts.app')

@section('content')

<div class="container">
<table class="table table-hover" id="admin-table">
    <thead>
    <th scope="col" class="text-center">admin_seq</th>
    <th scope="col" class="text-center">admin_id</th>
    <th scope="col" class="text-center">admin_name</th>
    <th scope="col" class="text-center">admin_email</th>
    <th scope="col" class="text-center">admin_tel</th>
    <th scope="col" class="text-caenter">auth_yn</th>
    <th scope="col" class="text-center">상세보기</th>
    </thead>
    <tbody>
        @foreach($admin_list as $admin) 
        <tr>
            <td style="width: 10%;" class="text-center">{{$admin->admin_seq}}</td>
            <td style="width: 10%;" class="text-center">{{$admin->admin_id}}</td>
            <td style="width: 10%;" class="text-center">{{$admin->admin_name}}</td>
            <td style="width: 10%;" class="text-center">{{$admin->admin_email}}</td>
            <td style="width: 10%;" class="text-center">{{$admin->admin_tel}}</td>
            <td style="width: 10%;" class="text-center">{{$admin->auth_yn}}</td>
            <td style="width: 10%;" class="text-center"><a href="/company/admin/info/{{$admin->admin_seq}}"><button type="button" class="btn btn-secondary">상세</button></a></td>
        </tr>
        @endforeach
    </tbody>
</table>


</div>
<div id="app"></div>
@endsection
