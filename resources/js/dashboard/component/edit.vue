<template>
  <div class="container">
    <div class="col-md-12">
      <div class="col-md-10 offset-md-1">
        <div class="card-wrappersign">
          <div class="card fat brand">
            <div class="card-body">
              <h2 class></h2>

              <!--  <footer class="blockquote-footer">নতুন / নবায়ন ট্রেড লাইসেন্স এর তথ্য:</footer> -->
              <br />
              <span v-if="licence">
                <div
                  class="text-center"
                  v-if="(licence.licenceoperator_status == 1 && admin_permission == 8) ||
                                    (licence.licenceoperator_status == 1 && admin_permission == 7)"
                >
                  <h3 class="field_required">এই গ্রাহকের তথ্য এখন পরিবর্তন করা যাবে না।</h3>
                </div>
              </span>

              <br />
              <div class="form-group row" v-if="admin_permission != 31">
                <label for="example-text" class="col-lg-3 col-form-label">
                  লাইসেন্স নাম্বার
                  <span class="field_required">*</span>
                </label>
                <div class="col-lg-9">
                  <span v-for="singleuser in licenceusers">
                    <input
                      type="radio"
                      :value="singleuser.tradelicence_id"
                      v-model="licence_number"
                    />
                    {{ singleuser.tradelicence_id }}
                    <br />
                  </span>
                </div>
              </div>

              <div class="form-group row">
                <label for="example-text" class="col-lg-3 col-form-label">
                  মালিকের নাম (বাংলা)
                  <span class="field_required">*</span>
                </label>
                <div class="col-lg-9">
                  <input
                    class="form-control"
                    type="text"
                    v-model="apply.name_bangla"
                    id="example-text"
                    placeholder="পূর্ণ নাম (বাংলা )"
                    required
                  />
                </div>
              </div>
              <div class="form-group row">
                <label for="example-text-input1" class="col-lg-3 col-form-label">
                  Owner's Name (English)
                  <span class="field_required">*</span>
                </label>
                <div class="col-lg-9">
                  <input
                    class="form-control"
                    type="text"
                    v-model="apply.name_english"
                    id="example-text-input1"
                    placeholder="Owner's Name (English)"
                  />
                </div>
              </div>
              <div class="form-group row">
                <label for="example-text-input1" class="col-lg-3 col-form-label">
                  পিতা/স্বামীর নাম (বাংলা)
                  <span class="field_required">*</span>
                </label>
                <div class="col-lg-9">
                  <input
                    class="form-control"
                    type="text"
                    v-model="apply.father_bangla"
                    id="example-text-input1"
                    placeholder="পিতার নাম (বাংলা )"
                  />
                </div>
              </div>
              <div class="form-group row">
                <label for="example-text-input1" class="col-lg-3 col-form-label text-nowrap">
                  Father/Husband
                  Name(English)
                </label>
                <div class="col-lg-9">
                  <input
                    class="form-control"
                    type="text"
                    v-model="apply.father_english"
                    id="example-text-input1"
                    placeholder="পিতার নাম (ইংরেজি )"
                  />
                </div>
              </div>
              <div class="form-group row">
                <label for="example-text-input1" class="col-lg-3 col-form-label">
                  মাতার নাম (বাংলা )
                  <span class="field_required">*</span>
                </label>
                <div class="col-lg-9">
                  <input
                    class="form-control"
                    type="text"
                    v-model="apply.mother_bangla"
                    id="example-text-input1"
                    placeholder="মাতার নাম (বাংলা )"
                  />
                </div>
              </div>
              <div class="form-group row">
                <label for="example-text-input1" class="col-lg-3 col-form-label">
                  Mother's
                  Name(English)
                </label>
                <div class="col-lg-9">
                  <input
                    class="form-control"
                    type="text"
                    v-model="apply.mother_english"
                    id="example-text-input1"
                    placeholder="মাতার নাম (ইংরেজি )"
                  />
                </div>
              </div>
              <div class="form-group row">
                <label for="example-text-input1" class="col-lg-3 col-form-label">
                  মালিকের জন্ম তারিখ
                  <span class="field_required">*</span>
                </label>
                <div class="col-lg-9">
                  <input
                    class="form-control"
                    type="text"
                    v-model="apply.birth_date"
                    id="birth_datepicker"
                    placeholder="জন্ম তারিখ"
                    readonly
                  />
                </div>
              </div>
              <div class="form-group row">
                <label for="example-text-input1" class="col-lg-3 col-form-label">
                  মালিকের মোবাইল নং
                  <span class="field_required">*</span>
                </label>
                <div class="col-lg-9">
                  <input
                    class="form-control"
                    type="number"
                    v-model="apply.mobile"
                    id="example-text-input1"
                    placeholder="মোবাইল নং"
                  />
                </div>
              </div>
              <div class="form-group row">
                <label for="text-email" class="col-lg-3 col-form-label">
                  মালিকের ইমেইল
                  <span class="field_required">*</span>
                </label>
                <div class="col-lg-9">
                  <input
                    class="form-control"
                    type="text"
                    v-model="apply.email"
                    id="text-email"
                    placeholder="ইমেইল"
                  />
                </div>
              </div>
              <div class="form-group row">
                <label
                  for="example-text-input1"
                  class="col-lg-3 col-form-label"
                >মালিকের পাসপোর্ট নম্বর</label>
                <div class="col-lg-9">
                  <input
                    class="form-control"
                    type="text"
                    v-model="apply.passport"
                    id="example-text-input1"
                    placeholder="পাসপোর্ট নম্বর "
                  />
                </div>
              </div>
              <div class="form-group row">
                <label
                  for="example-text-input1"
                  class="col-lg-3 col-form-label"
                >মালিকের জন্মনিবন্ধন নম্বর</label>
                <div class="col-lg-9">
                  <input
                    class="form-control"
                    type="number"
                    v-model="apply.birthreg"
                    id="example-text-input1"
                    placeholder="জন্মনিবন্ধন নম্বর "
                  />
                </div>
              </div>

              <div class="form-group row">
                <label for="example-text-input" class="col-lg-3 col-form-label">
                  জাতীয় পরিচয় পত্র নং
                  <span class="field_required">*</span>
                </label>
                <div class="col-lg-9">
                  <input
                    class="form-control"
                    type="number"
                    v-model="apply.nid"
                    id="example-text-input1"
                    placeholder="জাতীয় পরিচয় পত্র নং"
                  />
                </div>
              </div>

              <div class="form-group row">
                <label for="example-text-input" class="col-lg-3 col-form-label">টিআইএন নং</label>
                <div class="col-lg-9">
                  <input
                    class="form-control"
                    type="number"
                    v-model="apply.tin"
                    id="example-text-input1"
                    placeholder="টিআইএন নং"
                  />
                </div>
              </div>
              <div class="form-group row">
                <label for="example-text-input" class="col-lg-3 col-form-label">স্পাউস (বাংলা)</label>
                <div class="col-lg-9">
                  <input
                    class="form-control"
                    type="text"
                    v-model="apply.spouse_name_bangla"
                    id="example-text-input1"
                    placeholder="স্পাউস (বাংলা)"
                  />
                </div>
              </div>
              <div class="form-group row">
                <label for="example-text-input" class="col-lg-3 col-form-label">Spouse (english)</label>
                <div class="col-lg-9">
                  <input
                    class="form-control"
                    type="text"
                    v-model="apply.spouse_name_english"
                    id="example-text-input1"
                    placeholder="Spouse (english)"
                  />
                </div>
              </div>

              <h4 class="text-center mt-4 mb-3">বর্তমান ঠিকানা</h4>
              <hr />

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <label for="example-text-input" class="col-lg-3 col-form-label">
                      বর্তমান
                      ঠিকানা (বাংলা)
                      <span class="field_required">*</span>
                    </label>
                    <div class="col-lg-9">
                      <input
                        class="form-control"
                        type="text"
                        v-model="apply.present_address"
                        id="example-text-input1"
                        placeholder="বর্তমান ঠিকানা (বাংলা)"
                      />
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group row">
                    <label
                      for="example-text-input"
                      class="col-lg-3 col-form-label"
                    >Present address (English)</label>
                    <div class="col-lg-9">
                      <input
                        class="form-control"
                        type="text"
                        v-model="apply.present_address_english"
                        id="example-text-input1"
                        placeholder="Present address (english)"
                      />
                    </div>
                  </div>
                </div>

                <div class="col-md-3">
                  <fieldset class="form-group">
                    <label class="form-lbl">হোল্ডিং নং</label>
                    <input
                      class="form-control"
                      type="number"
                      v-model="apply.present_holding"
                      id="example-text-input1"
                      placeholder="হোল্ডিং নং"
                    />
                  </fieldset>
                </div>
                <div class="col-md-3">
                  <fieldset class="form-group">
                    <label class="form-lbl">রোড নং</label>
                    <input
                      class="form-control"
                      type="number"
                      v-model="apply.present_roadno"
                      id="example-text-input1"
                      placeholder="রোড নং"
                    />
                  </fieldset>
                </div>
                <div class="col-md-3">
                  <fieldset class="form-group">
                    <label class="form-lbl">ডাকঘর (English)</label>
                    <input
                      class="form-control"
                      type="text"
                      v-model="apply.present_postoffice"
                      id="example-text-input1"
                      placeholder="ডাকঘর"
                    />
                  </fieldset>
                </div>
                <div class="col-md-3">
                  <fieldset class="form-group">
                    <label class="form-lbl">ডাকঘর (বাংলা)</label>
                    <input
                      class="form-control"
                      type="text"
                      v-model="apply.present_postoffice_bangla"
                      id="example-text-input1"
                      placeholder="ডাকঘর"
                    />
                  </fieldset>
                </div>
                <div class="col-md-3">
                  <fieldset class="form-group">
                    <label class="form-lbl">পোস্ট কোড</label>
                    <input
                      class="form-control"
                      type="text"
                      v-model="apply.present_postcode"
                      id="example-text-input1"
                      placeholder="পোস্ট কোড"
                    />
                  </fieldset>
                </div>

                <div class="col-md-3">
                  <fieldset class="form-group">
                    <label class="form-lbl">দেশ</label>
                    <select v-model="apply.present_country_id" class="custom-select">
                      <option value>Select</option>
                      <option
                        v-for="(item,index) in countries"
                        :key="index"
                        :value="item.id"
                      >{{item.name_bangla}}</option>
                    </select>
                  </fieldset>
                </div>

                <div class="col-md-3">
                  <fieldset class="form-group">
                    <label class="form-lbl">বিভাগ</label>
                    <select
                      class="custom-select"
                      v-model="apply.present_division_name"
                      @change="getDistrict('present')"
                    >
                      <option value>Select</option>
                      <option
                        v-for="(item,index) in divisions"
                        :key="index"
                        :value="item.id"
                      >{{item.name_bangla}}</option>
                    </select>
                  </fieldset>
                </div>

                <div class="col-md-3">
                  <fieldset class="form-group">
                    <label class="form-lbl">জেলা</label>
                    <select
                      v-model="apply.present_zilla"
                      class="custom-select"
                      @change="getUpazila('present')"
                    >
                      <option value>Select</option>
                      <option
                        v-for="(item,index) in presentDistricts"
                        :key="index"
                        :value="item.id"
                      >{{item.name}}</option>
                    </select>
                  </fieldset>
                </div>

                <div class="col-md-3">
                  <fieldset class="form-group">
                    <label class="form-lbl">উপজেলা</label>
                    <select v-model="apply.present_upazila" class="custom-select">
                      <option value>Select</option>
                      <option
                        v-for="(item,index) in presentUpazilas"
                        :key="index"
                        :value="item.id"
                      >{{item.name}}</option>
                    </select>
                  </fieldset>
                </div>
                <div class="col-md-3">
                  <fieldset class="form-group">
                    <label class="form-lbl">ওয়ার্ড</label>
                    <select v-model="apply.present_ward" class="custom-select">
                      <option value>Select</option>
                      <option
                        v-for="(item,index) in wards"
                        :key="index"
                        :value="item.id"
                      >{{item.id}}</option>
                    </select>
                  </fieldset>
                </div>
              </div>

              <h4 class="text-center mt-4 mb-3">স্থায়ী ঠিকানা</h4>
              <hr />

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <label for="example-text-input" class="col-lg-3 col-form-label">
                      স্থায়ী
                      ঠিকানা (বাংলা)
                      <span class="field_required">*</span>
                    </label>
                    <div class="col-lg-9">
                      <input
                        class="form-control"
                        type="text"
                        v-model="apply.permanent_address"
                        id="example-text-input1"
                        placeholder="স্থায়ী ঠিকানা (বাংলা)"
                      />
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group row">
                    <label
                      for="example-text-input"
                      class="col-lg-3 col-form-label"
                    >Permanent address (English)</label>
                    <div class="col-lg-9">
                      <input
                        class="form-control"
                        type="text"
                        v-model="apply.permanent_address_english"
                        id="example-text-input1"
                        placeholder="Permanent address (english)"
                      />
                    </div>
                  </div>
                </div>

                <div class="col-md-3">
                  <fieldset class="form-group">
                    <label class="form-lbl">হোল্ডিং নং</label>
                    <input
                      class="form-control"
                      type="text"
                      v-model="apply.permanent_holding"
                      id="example-text-input1"
                      placeholder="হোল্ডিং নং"
                    />
                  </fieldset>
                </div>
                <div class="col-md-3">
                  <fieldset class="form-group">
                    <label class="form-lbl">রোড নং</label>
                    <input
                      class="form-control"
                      type="text"
                      v-model="apply.permanent_roadno"
                      id="example-text-input1"
                      placeholder="রোড নং"
                    />
                  </fieldset>
                </div>
                <div class="col-md-3">
                  <fieldset class="form-group">
                    <label class="form-lbl">ডাকঘর (English)</label>
                    <input
                      class="form-control"
                      type="text"
                      v-model="apply.permanent_postoffice"
                      id="example-text-input1"
                      placeholder="ডাকঘর"
                    />
                  </fieldset>
                </div>
                <div class="col-md-3">
                  <fieldset class="form-group">
                    <label class="form-lbl">ডাকঘর (বাংলা)</label>
                    <input
                      class="form-control"
                      type="text"
                      v-model="apply.permanent_postoffice_bangla"
                      id="example-text-input1"
                      placeholder="ডাকঘর"
                    />
                  </fieldset>
                </div>
                <div class="col-md-3">
                  <fieldset class="form-group">
                    <label class="form-lbl">পোস্ট কোড</label>
                    <input
                      class="form-control"
                      type="text"
                      v-model="apply.permanent_postcode"
                      id="example-text-input1"
                      placeholder="পোস্ট কোড"
                    />
                  </fieldset>
                </div>

                <div class="col-md-3">
                  <fieldset class="form-group">
                    <label class="form-lbl">দেশ</label>
                    <select v-model="apply.permanent_country_id" class="custom-select">
                      <option value>Select</option>
                      <option
                        v-for="(item,index) in countries"
                        :key="index"
                        :value="item.id"
                      >{{item.name_bangla}}</option>
                    </select>
                  </fieldset>
                </div>

                <div class="col-md-3">
                  <fieldset class="form-group">
                    <label class="form-lbl">বিভাগ</label>
                    <select
                      v-model="apply.permanent_division_name"
                      class="custom-select"
                      @change="getDistrict('permanent')"
                    >
                      <option value>Select</option>
                      <option
                        v-for="(item,index) in divisions"
                        :key="index"
                        :value="item.id"
                      >{{item.name_bangla}}</option>
                    </select>
                  </fieldset>
                </div>

                <div class="col-md-3">
                  <fieldset class="form-group">
                    <label class="form-lbl">জেলা</label>
                    <select
                      v-model="apply.permanent_zilla"
                      class="custom-select"
                      @change="getUpazila('permanent')"
                    >
                      <option value>Select</option>
                      <option
                        v-for="(item,index) in permanentDistricts"
                        :key="index"
                        :value="item.id"
                      >{{item.name}}</option>
                    </select>
                  </fieldset>
                </div>

                <div class="col-md-3">
                  <fieldset class="form-group">
                    <label class="form-lbl">উপজেলা</label>
                    <select v-model="apply.permanent_upazila" class="custom-select">
                      <option value>Select</option>
                      <option
                        v-for="(item,index) in permanentUpazilas"
                        :key="index"
                        :value="item.id"
                      >{{item.name}}</option>
                    </select>
                  </fieldset>
                </div>
                <div class="col-md-3">
                  <fieldset class="form-group">
                    <label class="form-lbl">ওয়ার্ড</label>
                    <select v-model="apply.permanent_ward" class="custom-select">
                      <option value>Select</option>
                      <option
                        v-for="(item,index) in wards"
                        :key="index"
                        :value="item.id"
                      >{{item.id}}</option>
                    </select>
                  </fieldset>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">
                  গ্রাহকের ছবি
                  <span class="field_required">*</span>
                </label>
                <div class="col-lg-6">
                  <input
                    class="form-control"
                    type="file"
                    value
                    id="example-text-input1"
                    @change="onUpload($event, 'applicantImage')"
                    placeholder
                  />
                </div>
                <div class="col-lg-3">
                  <img
                    style="width: 40px ; height: auto"
                    alt
                    :src="user_pic"
                    class="img-responsive"
                  />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">পাসপোর্ট কপি</label>
                <div class="col-lg-6">
                  <input
                    class="form-control"
                    type="file"
                    value
                    id="example-text-input1"
                    @change="onUpload($event, 'passportImage')"
                    placeholder
                  />
                </div>
                <div class="col-lg-3">
                  <img
                    style="width: 40px ; height: auto"
                    alt
                    :src="passport"
                    class="img-responsive"
                  />
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">জাতীয় পরিচয়পত্র কপি</label>
                <div class="col-lg-6">
                  <input
                    class="form-control"
                    type="file"
                    value
                    id="example-text-input1"
                    @change="onUpload($event, 'nationalIdImage')"
                    placeholder
                  />
                </div>
                <div class="col-lg-3">
                  <img style="width: 40px ; height: auto" alt :src="nid" class="img-responsive" />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">জন্ম নিবন্ধন কপি</label>
                <div class="col-lg-6">
                  <input
                    class="form-control"
                    type="file"
                    value
                    id="example-text-input1"
                    @change="onUpload($event, 'birthRegImage')"
                    placeholder
                  />
                </div>
                <div class="col-lg-3">
                  <img
                    style="width: 40px ; height: auto"
                    alt
                    :src="birthreg_pic"
                    class="img-responsive"
                  />
                </div>
              </div>

              <div class="form-group row" v-if="admin_permission != 31">
                <label class="col-lg-3 col-form-label">সংশোধনী বিল</label>
                <div class="col-lg-9">
                  <input type="checkbox" id="checkbox" v-model="apply.correction_checked" />
                </div>
              </div>
              <div class="form-group row" v-if="admin_permission != 31">
                <label class="col-lg-3 col-form-label">সংশোধনী ডকুমেন্ট</label>
                <div class="col-lg-9">
                  <input
                    class="form-control"
                    type="file"
                    value
                    id="example-text-input1"
                    @change="onUpload($event, 'correctionImage')"
                    placeholder
                  />
                </div>
              </div>
              <div class="form-group row" v-if="admin_permission != 31">
                <label class="col-lg-3 col-form-label">
                  <span class="field_required">*</span> কি সংশোধিত
                  হয়েছেঃ
                </label>
                <div class="col-lg-9">
                  <input class="form-control" type="text" v-model="apply.modify_list" />
                </div>
              </div>

              <hr />

              <!-- v-if="(licence.licenceoperator_status != 1 && licence.admin_id == admin_user) ||
      (licence.licenceoperator_status == 1 && licence.licenceinspector_status != 1) ||
              (licence.licenceoperator_status == 1 && licence.licenceinspector_status == 1 && admin_permission == 6)"-->

              <div class="checkbox">
                <label>
                  <span class="field_required">*</span>
                  <input type="checkbox" value="One" v-model="picked" />
                  আমি ঘোষনা করিতেছি যে, উল্লেখিত বিবরণ আমার জ্ঞানমতে নির্ভুল ও সত্য। উপরোক্ত বিবরণের মধ্যে
                  যদি কোন অসত্য থেকে থাকে অথবা অসম্পূর্ণ বিবরণ প্রমাণিত হয় তবে উক্ত লাইসেন্স বাতিলের যে
                  কোন ব্যবস্থা সিলেট সিটি কর্পোরেশন গ্রহন করিতে পারিবে। আমি অঙ্গীকার করিতেছি যে, সিলেট
                  সিটি কর্পোরেশন এর আইন, বিধি, প্রবিধি এবং নির্দেশ মানিতে বাধ্য থাকিব। আমি সিলেট সিটি
                  কর্পোরেশন এর ট্রেড লাইসেন্স সম্পর্কিত প্রদত্ত শর্তাবলী মানিয়া চলিতে বাধ্য থাকিব।
                </label>
              </div>

              <div class="form-group text-center no-margin" v-if="picked">
                <button
                  class="btn btn-primary btn-md"
                  id="submit_prog"
                  @click="sendApplication()"
                  :disabled="submitted"
                >
                  <i class="fa fa-paper-plane-o" aria-hidden="true"></i> Save
                </button>

                <!-- <input type="submit"  value=" " > -->
              </div>
              <!-- </form> -->
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
      picked: "",
      apply: {
        correction_checked: true,
        modify_list: ""
      },
      passport: "",
      nid: "",
      user_pic: "",
      birthreg_pic: "",
      licenceusers: [],
      licence_number: "",
      admin_permission: "",
      licence: {},
      admin_user: "",
      countries: [],
      divisions: [],
      presentDistricts: [],
      permanentDistricts: [],
      presentUpazilas: [],
      permanentUpazilas: [],
      wards: []
    };
  },
  mounted() {
    // this.pleaseWaitLoading();

    let id = this.$route.params.tradeId;

    axios
      .get("/admin/user-edit/" + id)
      .then(response => {
        this.licence = response.data.licence;
        this.admin_user = response.data.admin_user;
        this.apply = response.data.user;
        this.licenceusers = response.data.licenceuser;
        this.admin_permission = response.data.admin_permission;

        this.apply.correction_checked = true;
        this.apply.modify_list = "";

        this.passport =
          "https://tradelicence.scc.gov.bd/uploads/users/" +
          this.apply.id +
          "/" +
          this.apply.passport_scan;
        this.nid =
          "https://tradelicence.scc.gov.bd/uploads/users/" +
          this.apply.id +
          "/" +
          this.apply.nid_scan;
        this.user_pic =
          "https://tradelicence.scc.gov.bd/uploads/users/" +
          this.apply.id +
          "/" +
          this.apply.photo;
        this.birthreg_pic =
          "https://tradelicence.scc.gov.bd/uploads/users/" +
          this.apply.id +
          "/" +
          this.apply.birthreg_scan;

        // window.location = "/admin/user/list";
        this.getCountries();
        this.getDivisions();
        this.getWards();
      })
      .catch(error => {
        this.submitted = false;
      });
    this.Date();
  },
  methods: {
    pleaseWaitLoading() {
      const loading = this.$loading({
        lock: true,
        text: "Please Wait",
        spinner: "el-icon-loading",
        background: "rgba(0, 0, 0, 0.7)"
      });
    },
    getWards() {
      axios
        .get("/admin/get-wards")
        .then(res => {
          if (res.status) {
            this.wards = res.data.wards;
            this.loading = false;
          }
        })
        .catch(error => {
          // eslint-disable-next-line no-console
          if (error.response.data.code === 422) {
            // eslint-disable-next-line no-unused-vars
            for (const [key, value] of Object.entries(
              error.response.data.data
            )) {
              this.$message.error(value);
            }
          } else {
            this.$message.error(error.response.data.message);
          }
        });
    },
    getCountries() {
      axios
        .get("/admin/get-countries")
        .then(res => {
          if (res.status) {
            this.countries = res.data.countries;
            this.loading = false;
          }
        })
        .catch(error => {
          // eslint-disable-next-line no-console
          if (error.response.data.code === 422) {
            // eslint-disable-next-line no-unused-vars
            for (const [key, value] of Object.entries(
              error.response.data.data
            )) {
              this.$message.error(value);
            }
          } else {
            this.$message.error(error.response.data.message);
          }
        });
    },
    getDivisions() {
      axios
        .get("/admin/get-divisions")
        .then(res => {
          if (res.status) {
            this.divisions = res.data.divisions;
            this.getDistrict("present");
            this.getDistrict("permanent");
            this.loading = false;
          }
        })
        .catch(error => {
          // eslint-disable-next-line no-console
          if (error.response.data.code === 422) {
            // eslint-disable-next-line no-unused-vars
            for (const [key, value] of Object.entries(
              error.response.data.data
            )) {
              this.$message.error(value);
            }
          } else {
            this.$message.error(error.response.data.message);
          }
        });
    },
    getDistrict(type) {
      const id =
        type === "present"
          ? this.apply.present_division_name
          : this.apply.permanent_division_name;
      axios
        .get(`/admin/get-districts/${id}`)
        .then(res => {
          if (res.status) {
            if (type === "present") {
              this.presentDistricts = res.data.districts;
            } else if (type === "permanent") {
              this.permanentDistricts = res.data.districts;
            }

            this.getUpazila("present");
            this.getUpazila("permanent");

            this.loading = false;
          }
        })
        .catch(error => {
          // eslint-disable-next-line no-console
          if (error.response.data.code === 422) {
            // eslint-disable-next-line no-unused-vars
            for (const [key, value] of Object.entries(
              error.response.data.data
            )) {
              this.$message.error(value);
            }
          } else {
            this.$message.error(error.response.data.message);
          }
        });
    },
    getUpazila(type) {
      const id =
        type === "present"
          ? this.apply.present_zilla
          : this.apply.permanent_zilla;
      axios
        .get(`/admin/get-upazila/${id}`)
        .then(res => {
          if (res.status) {
            if (type === "present") {
              this.presentUpazilas = res.data.upazillas;
            } else if (type === "permanent") {
              this.permanentUpazilas = res.data.upazillas;
            }
            this.loading = false;
            this.pageLoading = false;
          }
        })
        .catch(error => {
          // eslint-disable-next-line no-console
          if (error.response.data.code === 422) {
            // eslint-disable-next-line no-unused-vars
            for (const [key, value] of Object.entries(
              error.response.data.data
            )) {
              this.$message.error(value);
            }
          } else {
            this.$message.error(error.response.data.message);
          }
        });
    },
    handleClickInput() {},
    Date() {
      let self = this;

      $("#birth_datepicker").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "1930:2012",
        dateFormat: "yy-mm-dd",
        defaultDate: "1990-01-01",
        onSelect: function(selectedDate, datePicker) {
          self.apply.birth_date = selectedDate;
        }
      });
    },
    onUpload(event, key) {
      this.apply[key] = event.target.files[0];
    },
    sendApplication() {
      this.submitted = true;

      if (this.admin_permission != 31 && this.licence_number == "") {
        this.submitted = false;
        return this.$notify.error({
          title: "Error",
          message: "লাইসেন্স নাম্বার সিলেক্ট করুন।"
        });
      }
      if (this.admin_permission != 31 && this.apply.modify_list == "") {
        this.submitted = false;
        return this.$notify.error({
          title: "Error",
          message: "কি সংশোধিত হয়েছে তথ্য দিন।"
        });
      }

      this.apply.licence_number = this.licence_number;

      if (
        this.apply.correction_checked == true &&
        typeof this.apply["correctionImage"] == "undefined"
      ) {
        this.submitted = false;

        return this.$notify.error({
          title: "Error",
          message: "সংশোধনী ডকুমেন্ট জমা দিন।"
        });
      }

      const formData = new FormData();
      if (this.apply["applicantImage"] != undefined) {
        formData.append(
          "applicantImage",
          this.apply.applicantImage,
          this.apply.applicantImage.name
        );
      }
      if (this.apply["passportImage"] != undefined) {
        formData.append(
          "passportImage",
          this.apply.passportImage,
          this.apply.passportImage.name
        );
      }
      if (this.apply["nationalIdImage"] != undefined) {
        formData.append(
          "nationalIdImage",
          this.apply.nationalIdImage,
          this.apply.nationalIdImage.name
        );
      }
      if (this.apply["birthRegImage"] != undefined) {
        formData.append(
          "birthRegImage",
          this.apply.birthRegImage,
          this.apply.birthRegImage.name
        );
      }

      for (let key in this.apply) {
        formData.append(key, this.apply[key]);
      }

      let id = this.$route.params.tradeId;

      axios
        .post("/admin/user-update/" + id, formData)
        .then(response => {
          this.$toast.success({
            title: "Notification",
            message: "আপনার তথ্য পরিবর্তন হয়েছে।"
          });
          window.location = "/admin/user/list";
        })
        .catch(error => {
          this.submitted = false;
          // console.log(error);
          // this.$toast.error({
          //         title:'Notification',
          //         message:'সকল প্রয়োজনীয় তথ্য টাইপ করুন।'
          // })
          for (let key in error.response.data.errors) {
            setTimeout(() => {
              this.$notify.error({
                title: "Error",
                message: error.response.data.errors[key][0]
              });
            });
          }
          $("html, body").animate({ scrollTop: 0 }, "slow");
        });
    },
    reset() {}
  }
};
</script>






<style>
.cell {
  display: flex;
}

.el-table th {
  text-align: center;
}

.el-table td {
  text-align: center;
}

p {
  margin-bottom: 0 !important;
}

.field_required {
  color: red;
  font-weight: bold;
}
</style>