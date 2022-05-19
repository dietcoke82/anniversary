@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="/payment/cancel_kakao">
    @csrf    
        상품명 : <input type="text" name="item_name" value="민트초코"><br>
        주문 아이디 : <input type="text" name="partner_order_id" value="A0001"><br>
        주문자 아이디 :<input type="text" name="partner_user_id" value="sd_phj"><br>
        수량 : <input type="text" name="quantity" value="1"><br>
        총 금액 : <input type="text" name="total_amount" value="1000"><br>
        <button type="submit">보냇</button>
    </form>
</div>
@endsection