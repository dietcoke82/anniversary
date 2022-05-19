<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div id="app">

    
        <button v-on:click="getData">get user</button><br>

        <input type="text" name="firstname" id="firstname"><br>
        <input type="text" name="lastname" id="lastname"><br>
        <button v-on:click="insertData">insert data</button>
        <div>{{users}}</div><br>
        

        <div class="form">
        <form>
            제목 : <input type="text" name="subject" id="subject"><br>
            내용 : <textarea id="content" name="content" class="ckeditor"></textarea><br> 
            파일 : <input type="file" name="img_1" id="img_1">
            <button type="button" v-on:click="insertForm">insert form</button>
        </form>
        </div>
    </div>
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
   
    <!--<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script src="../node_modules/ckeditor4-vue/dist/ckeditor.js"></script>-->
    <script>

        new Vue({
            el : '#app',
            data : {
                users : [],
                msg : 'TGIF!'
            },
            methods : {
                insertForm : function(){
                    let frm         =   new FormData();
                    var img_1       =   document.getElementById('img_1');
                    var subject     =   $('#subject').val();
                    var content     =   $('#content').val();
                    
                    frm.append('img_1', img_1.files[0]);
                    frm.append('subject', subject);
                    frm.append('content', content);

                    axios({
                        headers: { 'Content-Type': 'multipart/form-data' },
                        method : 'post',
                        url : '/playground/axiosForm',
                        data : frm
                    })
                    .then(function(response){
                        console.log(response.data);
                    })
                    .catch(function(error){
                        console.error();
                    })
                },

                insertData : function(){
                   axios({
                       method : 'post',
                       url : '/playground/axiosReturn',
                       data : {
                           lastname : $('#lastname').val(),
                           firstname : $('input[name="firstname"]').val()
                       }
                   })
                   .then(function(response){
                        alert('success');
                        console.log(response.data);
                   })
                   .catch(function(error){
                        console.error();
                   });
                },

                getData : function(){
                    var vm = this;

                    // 통신을 가져오게 되면 this 사라짐 변수에 넣어주고 값 저장
                    axios.get('http://jsonplaceholder.typicode.com/users')
                    .then(function(response){
                        //console.log(response.data);
                        vm.users = response.data;

                        console.log(vm.users);
                    })
                    .catch(function(error){
                        console.error();
                    })
                }
            }
        });
           /* methods : {
                getData : function(){
                    var vm = this;

                    // 통신을 가져오게 되면 this 사라짐 변수에 넣어주고 값 저장
                    axios.get('http://jsonplaceholder.typicode.com/users')
                    .then(function(response){
                        //console.log(response.data);
                        vm.users = response.data;

                        console.log(vm.users);
                    })
                    .catch(function(error){
                        console.error();
                    })
                }
            }
        });*/
    </script>
</body>
</html>