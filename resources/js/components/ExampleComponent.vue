<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">EXAMPLE COMPONENT</div>

                    <div>
                        {{ value }}
                    </div>

                    <div>
                        {{ doubleValue }}
                    </div>

                    <button v-on:click="plus">click_me_1</button>


                    <button v-on:click="toggle">click_me_2</button>
                    <div v-if="show">
                        showshowshow
                    </div>



                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        mounted() {
            console.log('Component mounted.')
        },
        
        data :  function(){
            return {
                show    :   false,
                value   :   10
            }
        },
        methods :   {
            plus    :   function(){
                this.value++
            },
            toggle  :   function(){
                this.show   =   !this.show
            }
        },

        //  data 에 속해있는 값이 변경될때 실행됨
        computed    :   {
            doubleValue     :   function(){
                return this.value*2
            }
        }
       
    }
</script>
