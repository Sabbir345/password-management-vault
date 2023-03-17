<template>
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="text-center">
                    <br>
                    <h4><b>E- Trade Licence</b> </h4>

                    <!-- <h5>First Year Bachelor (Honours) Admission 2018-2019</h5> -->

                </div>
                <div class="card fat brand">
                    <div class="card-body">
                        <h4 class="text-center"> Personal Details </h4>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <img style="width: 180px ; height: auto" alt="" :src="user_pic" class="img-responsive" />
                                </div>

                                <div class="col-md-9">

                                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">

                                        <tbody>
                                            <tr>
                                                <td>মালিকের নাম (বাংলা)</td>
                                                <td>{{ user.name_bangla}} </td>
                                            </tr>
                                            <tr>
                                                <td>Owner's Name (English) </td>
                                                <td>{{ user.name_english}} </td>
                                            </tr>
                                            <tr>
                                                <td>পিতার নাম (বাংলা) </td>
                                                <td>{{ user.father_bangla}} </td>

                                            </tr>
                                            <tr>
                                                <td>Father's Name(English)</td>
                                                <td>{{ user.father_english}} </td>

                                            </tr>
                                            <tr>
                                                <td>মাতার নাম (বাংলা ) </td>
                                                <td>{{ user.mother_bangla}} </td>
                                            </tr>
                                            <tr>
                                                <td>Mother's Name(English)</td>
                                                <td>{{user.mother_english }}</td>

                                            </tr>
                                            <tr>
                                                <td>মালিকের জন্ম তারিখ </td>
                                                <td>
                                                    {{moment(user.birth_date).format('DD-MM-YYYY')}}
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>মালিকের মোবাইল নং </td>
                                                <td>{{user.mobile }}</td>

                                            </tr>
                                            <tr>
                                                <td>মালিকের ইমেইল </td>
                                                <td>{{user.email }}</td>

                                            </tr>
                                            <tr>
                                                <td>মালিকের বর্তমান ঠিকানা </td>
                                                <td>{{ user.present_address}}</td>
                                            </tr>

                                            <tr>
                                                <td>মালিকের স্থায়ী ঠিকানা </td>
                                                <td>{{ user.permanent_address}}</td>
                                            </tr>
                                            <tr>
                                                <td>মালিকের জাতীয় পরিচয় পত্র নং</td>
                                                <td>{{user.nid }}</td>
                                            </tr>
                                            <tr>
                                                <td>TIN <br> Spouse Name Bangla <br> Spouse Name English  </td>
                                                <td>{{user.tin }} <br> {{user.spouse_name_bangla}}<br> {{user.spouse_name_english}}</td>
                                            </tr>
                                            <tr>
                                                <td> Present holding 
                                                    <br> Present road 
                                                    <br> Present ward 
                                                    <br> Present country 
                                                    <br> Present division 
                                                    <br> Present zilla 
                                                    <br> Present upazilla   
                                                    <br> Present postcode
                                                </td>
                                                <td>     {{user.present_holding }} 
                                                    <br> {{user.present_roadno}}
                                                    <br> {{user.present_ward}}
                                                    <br> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> Permanent holding 
                                                    <br> Permanent road 
                                                    <br> Permanent ward 
                                                    <br> Permanent country 
                                                    <br> Permanent division 
                                                    <br> Permanent zilla 
                                                    <br> Permanent upazilla   
                                                    <br> Permanent postcode
                                                </td>
                                                <td>     {{user.permanent_holding }} 
                                                    <br> {{user.permanent_roadno}}
                                                    <br> {{user.permanent_ward}}
                                                    <br> 
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                            <!-- <h4 class="text-center">Licence Details</h4>
                    <div class="row">
                        <table class="table table-striped table-bordered" cellspacing="0" width="100%">

                            <tbody>
                                <tr>
                                    <td>প্রতিষ্ঠানের নাম (বাংলা) </td>
                                    <td>{{business_name_bangla }}</td>
                                    <td>Business Name(English)</td>
                                    <td>{{business_name }}</td> 
                                </tr>
                                <tr>
                                    <td>প্রতিষ্ঠানের ঠিকানা (বাংলা)</td>
                                    <td>{{business_address_bangla }}</td>
                                    <td>Business Address(English) </td>
                                    <td>{{business_address }}</td>
                                </tr>
                                <tr>
                                    <td>প্রতিষ্ঠানের ফোন/মোবাইল নং </td>
                                    <td>{{mobile_2 }}</td>
                                    <td>Holding No(English)</td>
                                    <td>{{business_holding }}</td>
                                </tr>
                                <tr>
                                    <td>ওয়ার্ড</td>
                                    <td>{{ward }}</td>
                                    <td>ব্যবসা রোড নং   </td>
                                    <td>{{business_road }}</td>
                                </tr>
                                 <tr>
                                    <td>পোস্ট কোড</td>
                                    <td>{{business_postcode }}</td>
                                    <td>মার্কেটের নাম </td>
                                    <td>{{market_name }}</td>
                                </tr>
                                <tr>
                                    <td>শপ নং</td>
                                    <td>{{shop_no }}</td>
                                    <td>ফ্লোর নং</td>
                                    <td>{{floor_no }}</td>
                                </tr>
                                 <tr>
                                    <td>পুরাতন ট্রেড লাইসেন্স নম্বর </td>
                                    <td>{{old_tradelicence_no }}</td>
                                    <td>ব্যবসা শুরুর তারিখ </td>
                                    <td>
                                        {{moment(business_startdate).format('DD-MM-YYYY')}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>নবায়ন শুরুর তারিখ</td>
                                    <td>
                                        {{moment(nobayon_start_date).format('DD-MM-YYYY')}}
                                    </td>
                                    <td>নবায়ন শেষ তারিখ</td>
                                    <td>
                                        {{moment(nobayon_end_date).format('DD-MM-YYYY')}}
                                    </td>
                                </tr>
                                 <tr>
                                    <td>নিবন্ধনের প্রকৃতি </td>
                                    <td>
                                        <span v-if="business_category ==1"> কোম্পানী</span>
                                        <span v-if="business_category ==2"> অন্যান্য - একক</span>
                                        <span v-if="business_category ==3"> অন্যান্য - অংশীদারী </span>
                                    </td>
                                    <td>অনুমোদিত মূলধণ (ইংরেজি) </td>
                                    <td>{{authorized_capital }}</td>
                                </tr>
                                 <tr>
                                    <td>পরিশোধিত মূলধণ (ইংরেজি)</td>
                                    <td>{{paidup_capital }}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>ব্যবসায়ের উপ-ধরণ  </td>
                                    <td>{{business_subtypes }}</td>
                                    <td>{{business_subtypes2 }}</td>
                                    <td>{{business_subtypes3 }}</td>
                                </tr> -->
                            <!--  <tr>
                                    <td>ট্রেড লাইসেন্স ফি </td>
                                    <td>{{tradelicense_fee }}</td>
                                    <td>সার্ভিস চার্জ </td>
                                    <td>{{service_charge }}</td>
                                </tr>
                                <tr>
                                    <td>সাইনবোর্ড (ফিট-ইংরেজি) </td>
                                    <td>{{ signboard_fee}}</td>
                                    <td>বকেয়া</td>
                                    <td>{{arrear }}</td>
                                </tr>
                                <tr>
                                    <td>সারচার্জ </td>
                                    <td>{{ surcharge}}</td>
                                    <td>ভ্যাট</td>
                                    <td>{{vat }}</td>
                                </tr>
                                <tr>
                                    <td> সর্বমোট টাকা  </td>
                                    <td>{{ total_amount}}</td>
                                    <td></td>
                                    <td></td>
                                </tr> -->
                            <!--  <tr>
                                    <td>কারখানা কি না ?</td>
                                    <td>
                                        <span v-if="factory==1">হ্যা</span>
                                        <span v-if="factory==2">না</span>
                                    </td>
                                    <td>রাসায়নিক / বিস্ফোরক ?</td>
                                    <td>
                                        <span v-if="chemical==1">হ্যা</span>
                                        <span v-if="chemical==2">না</span>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>প্লটের প্রকার ? </td>
                                    <td>
                                        <span v-if="plot_type==1">সরকারী</span>
                                        <span v-if="plot_type==2">বেসরকারী</span>
                                    </td>
                                    <td>প্লটের ধরণ ?  </td>
                                    <td>
                                        <span v-if="plot_category==1">আবাসিক</span>
                                        <span v-if="plot_category==2">বাণিজ্যিক</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ব্যবসায়ের স্থান </td>
                                    <td>
                                        <span v-if="business_place_type==1">ভাড়া</span>
                                        <span v-if="business_place_type==2">নিজস্ব</span>
                                    </td>
                                    <td>কার্যক্রমের ধরণ  </td>
                                    <td>
                                        <span v-if="business_sale_type==1">অন্যান্য</span>
                                        <span v-if="business_sale_type==2">খুচরা</span>
                                        <span v-if="business_sale_type==3">পাইকারী</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Passport</td>
                                    <td><a :href="passport" target="_blank" style="color:blue">Passport</a></td>
                                    <td>NID</td>
                                    <td> <a :href="nid" target="_blank" style="color:blue">NID</a></td>
                                </tr>

                            </tbody>
                        </table>

                    </div> -->
                            <!-- <h4 class="text-center">Licence Details</h4> -->
                            <!--  <div class="row">
                        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                              <td>আর্থিক বিবরন: </td>
                            <td class="cstbl_padding"> -->
                            <!-- <table class="table table-condensed total_amt">
                                    <tr>
                                        <th class="text-left">আদায়ের বিবরন</th>
                                        <th class="text-right">টাকা</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            ট্রেড লাইসেন্স/নবায়ন ফি
                                        </td>
                                        <td class="text-right">
                                            {{ tradelicense_fee }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            সাইনবোর্ড কর
                                        </td>
                                        <td class="text-right">
                                            {{signboard_fee }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            বকেয়া
                                        </td>
                                        <td class="text-right">
                                            {{ arrear}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            ভ্যাট
                                        </td>
                                        <td class="text-right">
                                            {{ vat}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            সারচার্জ
                                        </td>
                                        <td class="text-right">
                                            {{ surcharge}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            সার্ভিস চার্জ
                                        </td>
                                        <td class="text-right">
                                            {{ service_charge }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            ইনকাম ট্যাক্স
                                        </td>
                                        <td class="text-right">
                                            {{ billTableData.ait }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-left">
                                            মোট
                                        </th>
                                        <th class="text-right">
                                            {{ tradelicense_fee + signboard_fee + arrear + vat + surcharge + service_charge + billTableData.ait}}
                                        </th>
                                    </tr>
                                    <tr>
                                        <td class="text-left  total_borderless_cls">
                                            (কথায়): {{ taka }}
                                            </th>
                                            <td class="text-right  total_borderless_cls_lt">

                                            </td>
                                    </tr>
                                </table> -->

                            <!-- </td> -->
                            <!-- </table> -->
                            <!-- </div> -->

                            <!-- </div> -->
                            <hr/>

                            <div class="text-center hide-print printPageButton">
                                <button class="btn btn-info" style="font-size:14px;" @click="handleBack()"><i class="fa fa-backward" aria-hidden="true"></i> Back</button>

                                <a href="#" onclick="window.print(); return false;" class="btn btn-success" style="font-size:14px;"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data() {

                return {

                    submitted: false,
                    user: {},
                    passport: '',
                    nid: '',
                    user_pic: '',
                    // taka:'',
                    // billTableData:{},
                }
            },

            mounted() {

                let id = this.$route.params.tradeId;
                axios.get('/admin/user-edit/' + id)
                    .then((response) => {
                        this.user = response.data.user;
                        // this.billTableData  = response.data.billTableData;
                        // this.taka  = response.data.taka;

                        this.passport = '/uploads/users/' + this.user.id + '/' + this.user.passport_scan
                        this.nid = '/uploads/users/' + this.user.id + '/' + this.user.nid_scan
                        this.user_pic = '/uploads/users/' + this.user.id + '/' + this.user.photo

                        this.$loading().close();
                    })
                    .catch((error) => {

                        this.$loading().close();

                    })
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

                    handleBack() {
                        return this.$router.push({
                            'name': 'userlist',
                        });

                    },

            }
    }
</script>

<style>
    .cell {
        display: flex;
    }
    
    .el-table th {
        text-align: center
    }
    
    .el-table td {
        text-align: center
    }
    
    p {
        margin-bottom: 0 !important;
    }
</style>