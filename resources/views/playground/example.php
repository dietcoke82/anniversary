<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>example</title>

    <!-- 로딩되는 시간 동안 타임 이미지 -->
    <style>
        [v-cloak]::before{
            content:'⏳⏳⏳⏳⏳⏳⏳⏳⏳..'
        }
        [v-cloak]>*{
            display:none;
        }
    
    </style>
</head>
<body>

    <div id="app">
    <div v-cloak>
        <div class="model" v-show="false">
            model : <input type="text" v-model="msg">
            <div>{{msg}}</div>
        </div>

        <div class="show" v-show="isShow">{{msg}}</div>

        <div class="for" v-show="false">
            <ul>
                <li v-for="(flavor, i) in icecream">{{i+1}} - {{flavor}}</li>
            </ul>
        </div>

        <div class="keyup" v-show="false">
            <input type="text" placeholder="아이디를 입력해주세요." v-model="id" @keyup="sendId"><br>
            <p id="warningMsg"></p>
            <button @click="sendId">search</button>
        </div>

        <div class="emit" v-show="false">
            <button v-on:click="doAction">emit send</button>
            <p>{{emitMessage}}</p>
        </div>


        <div class="select">
            <h1>💙히재네 과일가게💙</h1>
            <select v-model="selectedFruit" @change="onChange($event)">
                <option v-for="(kind, idx) in fruit" :value="idx" :key="idx">
                    {{kind.text}} (+{{kind.price}}원)
                </option>
            </select>
            <div id="optionList"></div>
            <div id="total"></div>
        </div>

    </div>
    </div>
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>

        setTimeout(function (){
            const v = new Vue({
            el : '#app',
            data : {
                msg : 'TGIF!',
                isShow : false,
                icecream : ['mint','vanilla','strawberry'],
                selectedFruit : '',
                fruit : [
                            {text:'사과🍎', value:'apple', price:'1000'},
                            {text:'블루베리🍇', value:'blueberry', price:'500'},
                            {text:'바나나 🍌', value:'banana', price:'100'}
                        ],
                id : '',
                emitMessage : '',
                total : 0,
                optionArr : []
            },
            methods : {
              onChange : function(event){
                this.$emit('calculation', event.target.value)
              },

              sendId : function(){          //keyup 아이디 확인시 사용
                var warning         =   '더 입력!!';
                var idText          =   this.id;
                if(idText.length > 5){
                    warning         =   'stop!';
                } 
                $('#warningMsg').html(warning);
              },

              doAction : function(){
                  this.$emit('sendMsg', 'Hi jaki');     //('이벤트이름', 보내는값)
                
              },
            },
                created(){                              // emit 에서 이벤트이름이 같은 경우 실행됨
                    this.$on('sendMsg', (paramMsg) => {
                        alert(paramMsg);
                        this.emitMessage = paramMsg;
                        console.log(this.emitMessage);
                    });

                    this.$on('calculation', (idx) => {

                        var fruitArr        =   this.fruit;
                        var price           =   fruitArr[idx]['price'];
                        var optionArr       =   this.optionArr;
                       
                        if(optionArr.indexOf(idx) != -1){
                            alert('이미 선택된 옵션입니다 ✪‿✪');
                            return;
                        }

                        this.total          += Number(price);
                        optionArr.push(idx);
                        
                        $('#optionList').append('+'+fruitArr[idx]['text']+'('+price+'원) <a href="javascript:deleteOption('+idx+')">❌</a><br>');
                        $('#total').html('💰 : '+this.total+'원');
                        console.log(optionArr);
                    });
            }

        });

        console.log(v.msg);                 //vue 안 객체접근

        }, 500);
    </script>
</body>
</html>