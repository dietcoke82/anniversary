<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <input type="button" id="naverPayBtn" value="네이버페이 결제 버튼">

    <script src="https://nsp.pay.naver.com/sdk/js/naverpay.min.js"></script>  
    <script>  
     var oPay = Naver.Pay.create({
          "mode" : "production", // development or production
          "clientId": "u86j4ripEt8LRfPGzQ8" // clientId
      });

    //직접 만든 네이버페이 결제 버튼에 click 이벤트를 할당하세요.
    var elNaverPayBtn = document.getElementById("naverPayBtn");
    elNaverPayBtn.addEventListener("click", function() {

    oPay.open({
          "merchantUserKey": "가맹점사용자식별키",
          "merchantPayKey": "u86j4ripEt8LRfPGzQ8",
          "productName": "상품명을 입력하세요",
          "totalPayAmount": "1000",
          "taxScopeAmount": "1000",
          "taxExScopeAmount": "0",
          "returnUrl": "사용자 결제 완료 후 결제 결과를 받을 URL"
        });
   });
</script>  
</body>
</html>