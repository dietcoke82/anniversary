<template>
  <main class="md:ml-52">
    <div class="container max-w-screen-lg m-auto p-4 md:p-6">

      <!-- Breadcrumb : ST -->
      <div class="mb-4">
        <nav aria-label="breadcrumb"> 
          <ol class="breadcrumb flex text-sm">
            <li class="breadcrumb-item text-gray-600"><router-link to="/admin" class="text-gray-600 hover:text-blue-700 mx-2">관리자 관리</router-link></li>
            <li><i class="fas fa-chevron-right text-gray-300"></i></li>
            <li class="breadcrumb-item active text-blue-700 hover:text-blue-700 mx-2" aria-current="page">관리자 목록</li> 
          </ol>
        </nav>
      </div><!-- Breadcrumb : ED -->

      <!--// Board 2 Style : ST -->
      <div class="my-4">
        <div class="grid grid-cols-12 gap-4"><!--// Card Col : ST -->

          <!--// Table : ST -->
          <div class="col-span-12">
            <div class="flex flex-col rounded min-w-full p-4 bg-white shadow-sm">

              <!--// Table Title : ST -->
              <div class="flex flex-row grid grid-cols-6 items-baseline">
                <div class="col-span-3 text-lg font-bold">
                  관리자 목록
                </div>
                <div class="grid col-span-3 text-sm justify-items-end leading-6">
                  <router-link to="/admin/create" class="rounded flex shadow bg-blue-500 px-6 py-1 text-white hover:bg-blue-600">관리자 등록</router-link>
                </div>
              </div>
              <div class="flex flex-row grid grid-cols-6 my-2 items-baseline">
                <input type="text" class="placeholder-gray-400 rounded w-full py-1 px-4 text-base font-light border border-gray-400" v-model="searchStx" name="search_word" placeholder="관리자명 검색"/>
                <!-- <input type="button" class="rounded bg-blue-500 py-1 px-6 cursor-pointer text-white w-20 ml-2 hover:bg-blue-600" value="검색"/> -->
              </div><!--// Table Title : ED -->
              <table class="">
                <thead>
                  <tr class="text-sm text-gray-600 bg-gray-200 rounded">
                    <th class="p-2 rounded-tl rounded-bl"></th>
                    <th class="p-2">프로필 사진</th>
                    <th class="p-2">관리자 이름(아이디)</th>
                    <th class="p-2">이메일</th>
                    <th class="p-2">전화번호</th>
                    <th class="p-2 rounded-tr rounded-br">등록일</th>
                  </tr>
                </thead>
                <tbody class="text-sm font-bold text-gray-600 text-center">
                  <tr class="border-b hover:bg-gray-100 h-14" v-if="paginate.length==0">
                    <td class="py-10" colspan="6">표시할 자료가 없습니다</td>
                  </tr>
                  <tr class="border-b hover:bg-gray-100 h-14" v-for="(admin, idx) in paginate" :key="idx">
                    <td class="p-2">{{((paging.page-1) * paging.perPage) + idx + 1 }}</td>
                    <td class="p-2">
                      <div class="flex items-center justify-center">
                        <div class="mr-2">
                          <img :src="'https://static2.isidae.com/'+admin.profile" class="w-10 rounded-full" onerror="this.src='/assets/images/user.png'"  style="height:40px;"/>
                        </div>
                      </div>
                    </td>
                    <td class="p-2">
                      <router-link :to="'/admin/'+admin.admin_seq" class="text-blue-500 hover:underline">{{admin.admin_name}}({{admin.admin_id}})</router-link>
                    </td>
                    <td class="p-2">
                      {{admin.admin_email}}
                    </td>
                    <td class="p-2">
                      {{admin.admin_tel}}
                    </td>
                    <td class="p-2">{{admin.mod_date}}</td>
                  </tr>
                  
                </tbody>
              </table>

              <!--// Pagination : ST -->
              <div class="flex items-center justify-center py-4">
                <ul class="flex text-sm">
                  <li class="mx-1 px-3 py-2" :class="(paging.itemsPages != 0) ? 'text-gray-700 hover:bg-gray-700 hover:text-gray-200 rounded' : 'text-gray-200 rounded-lg'" @click="setPages('prev')">
                      <a class="flex items-center font-bold" href="#">
                          <span class="mx-1">previous</span>
                      </a>
                  </li>
                  <li class="mx-1 px-3 py-2 hover:bg-gray-700 hover:text-gray-200 rounded" v-for="pageNumber in totalPages" :key="pageNumber" @click="setPage(pageNumber)"
                  :class="{'bg-gray-700 text-gray-200 ':(pageNumber == paging.page)}">
                      <a class="font-bold" href="#">{{pageNumber}}</a>
                  </li>
                  <li class="mx-1 px-3 py-2" 
                  :class="(paging.itemsPages + paging.itemsPerPage < Math.ceil(paging.resultCount / paging.perPage)) ? 'text-gray-700 hover:bg-gray-700 hover:text-gray-200 rounded' : 'text-gray-200 rounded-lg'" @click="setPages('next')">
                      <a class="flex items-center font-bold" href="#">
                          <span class="mx-1">Next</span>
                      </a>
                  </li>
                </ul>
              </div><!--// Pagination : ED -->
            </div>
          </div><!--// Table : ED -->

          </div><!--// Card Col : ED -->
        </div><!--// Board 2 Style : ED -->

    </div>
  </main>
</template>

<script>
import { apiAdminList } from '@/api'

export default {
  name: 'adminList',
  data() {
    return {
      adminList: [],
      paging:{
        page:1,             //현재 페이지
        perPage:10,          //보여줄 페이지
        itemsPerPage:5,     //페이지 넘버 길이
        itemsPages:0,       //현재 페이지 넘버
        resultCount:0       //총 페이지
      },
      searchStx:""
    }
  },
  methods: {
        setPage: function(pageNumber) {
          this.paging.page = pageNumber
        },
        setPages:function(setting){
          if(setting == "prev"){
            if(this.paging.itemsPages == 0)return;
            this.paging.itemsPages -=  this.paging.itemsPerPage;
          }else if(setting == "next"){
            let total = Math.ceil(this.paging.resultCount / this.paging.perPage);
            if(this.paging.itemsPages + this.paging.itemsPerPage >= total)return;
            this.paging.itemsPages +=  this.paging.itemsPerPage;
          }
        },
        searching(admin){
          if (this.searchStx.length === 0) {
            return true;
          } 
          return  (admin.admin_name.toLowerCase().indexOf(this.searchStx.toLowerCase()) > -1);
        },
        setTotal(list){
          if(this.paging.resultCount != list.length){
            this.paging.resultCount = list.length;
            this.paging.page = 1;
          }
        }

  },
  computed : {
    totalPages: function() {
      let total = Math.ceil(this.paging.resultCount / this.paging.perPage);
      let curPages = [];
      for(let i=0; i<this.paging.itemsPerPage; i++){
        if(total > this.paging.itemsPages + i){
          curPages.push(this.paging.itemsPages+i+1);
        }
      }
      return curPages;
    },
    paginate: function() {
        if (!this.adminList || this.adminList.length != this.adminList.length) {
            return;
        }
        let list = this.adminList.filter(this.searching);
        this.setTotal(list);
        
        let index = this.paging.page * this.paging.perPage - this.paging.perPage
        return list.slice(index, index + this.paging.perPage);
    }
  },
  created() {
    apiAdminList(this.$axios)
    .then(res => {
      const apiData = res.data
      if( apiData.result ){
        this.adminList = apiData.data
        this.paging.resultCount = this.adminList.length
      }
    })
  
  }
  
}
</script>
