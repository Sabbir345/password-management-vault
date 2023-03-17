<template>
    <div class="container-fluid">
        
        <h4 class="margin">গ্রাহক তালিকা </h4>

        <div class="searchBox">
            <div class="row form-group col-md-6 offset-md-3 text-center">
                <div class="col-md-2"> </div>
                <input type="text" v-model="search"  class="form-control search-box-size" placeholder="Ex: Name,  Mobile , NID , User ID" @keyup.enter="handleSearch()">
                <button class="btn btn-primary" @click="handleSearch()">Search</button>
            </div>
        </div>
        
        <button class="btn btn-primary" @click="userAdd()">
          <i class="fa fa-plus" aria-hidden="true">
          </i>  Add User
        </button>
        <table class="table table-bordered table-striped">
           <thead>
            <tr>
              <th>#</th>
              <th>গ্রাহক আইডি</th>
              <th>মালিকের নাম বাংলা <br> Owner's Name (English) </th>
              <th>পিতার নাম</th>
              <th>মাতার নাম</th>
              <th>বর্তমান ঠিকানা  </th>
              <th>স্থায়ী ঠিকানা  </th>
              <th>মোবাইল <br>জন্ম তারিখ</th>
              <th>ক্রিয়া</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <tr v-for="(item, index) in userlist">
              <td>{{ (++index) + indexValueForPagination }}</td>
              <td>{{ item.id }}</td>
              <td>{{ item.name_bangla }} <br>{{ item.name_english }}</td>
              <td>{{ item.father_bangla }}</td>
              <td>{{ item.mother_bangla }}</td>
              <td>{{ item.present_address}}</td>
              <td>{{ item.permanent_address}}</td>
              <td>{{ item.mobile }} <br>
              {{moment(item.birth_date).format('DD-MM-YYYY')}}
             </td>
              <td>
                <button class="btn btn-primary" @click="handleView(item.id)"><i class="fa fa-eye" aria-hidden="true"></i> View</button>
                <button class="btn btn-warning" @click="handleEdit(item.id)" 
                v-if="admin_id == 8 || admin_id == 6 || admin_id == 1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                <!-- <button class="btn btn-danger" @click="handleDelete(item.id)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button> -->
              </td>
            </tr>
          </tbody>
        </table>

        <el-pagination
            background
            class="fix"
            @current-change="handleCurrentChange"
            :page-size="perPage"
            layout="total, prev, pager, next"
            :total="totalData">
        </el-pagination>
   </div>         
    </div>
</template>

<script>
   export default {
   
      data () {
   
        return {
          
          submitted: false,
          userlist:[],
          search:'',
          perPage: 20,
          totalData: 0,
          admin_id:'',
          indexValueForPagination: 0,
          
        }
      },
      watch: {
        search() {
          if (this.search.length == 0) {
            this.TableData();
          }
        }
      },
      methods: {
        
        pleaseWaitLoading() {
         const loading = this.$loading({
             lock: true,
             text: 'Please Wait',
             spinner: 'el-icon-loading',
             background: 'rgba(0, 0, 0, 0.7)'
         });
        },
        handleEdit(id){
            var url = "/admin/user/list#/edit/"+id;
            window.open(url,'_blank');
        },
        userAdd(){
            return this.$router.push({
                'name': 'userlist.add',
            });
        },
        handleView(id){
          
            var url = "/admin/user/list#/view/"+id;
            window.open(url,'_blank');

        },
        handleCurrentChange(next) {
          this.indexValueForPagination = 0;
          if (next == 1) return this.TableData(next);

          this.indexValueForPagination = ((next + this.indexValueForPagination) * this.perPage) - this.perPage;
          this.TableData(next);
        },
        handleSearch() {
          if (this.search.length > 0 || this.search.length == 0) {
          this.TableData();
          } else {
            this.$toast.error({
                title:'Notification',
                message:'The Search Length minimum more then 2 allowed'
            })
          }
        },
        TableData(nextPage = null){

            this.pleaseWaitLoading();

            let url = `/admin/alluser-list?per_page=${this.perPage}`;

            if(nextPage) {
                url += `&page=${nextPage}`;
            }
            if (this.search.length) {
                url += `&search=${this.search}`;
            }
            
            axios.get(url)
            .then((response) => {
               this.userlist   = response.data.userlist.data;
               this.totalData  = response.data.userlist.total;
               this.admin_id   = response.data.admin_id;
               
              this.$loading().close();
            })
            .catch((error) => {
              
              this.$loading().close();
            })
        },
        

      },
   
      mounted () {
            this.TableData();
        }
   
    }
    
</script>


<style>

   .table-bordered th, .table-bordered td {
    border: 1px solid #dee2e6 !important;
   }
   .margin{
     padding-top:33px;
   }
   p {
    margin-bottom: 0 !important;
   }
   .modal-width{
     width:160%;
     margin-left: -26%;
   }


</style>
