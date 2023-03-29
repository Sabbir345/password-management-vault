<template>
  <div
    tabindex="-1"
    aria-hidden="true"
    class="createItemModal fixed z-[9999] top-0 left-0 w-full h-full pt-8 lg:py-6 4xl:py-10 flex items-end lg:items-start justify-center bg-black bg-opacity-90 lg:overflow-y-auto"
  >
    <div class="relative w-full h-full max-w-2xl md:h-auto">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ myItem.title }}</h3>
          <button
            type="button"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
            data-modal-hide="defaultModal"
            @click="close"
          >
            <svg
              aria-hidden="true"
              class="w-5 h-5"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"
              />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="p-6 space-y-6">
          <form class="w-full">
            <div class="flex flex-wrap -mx-3">
              <div class="w-full md:w-2/2 px-3 mb-6 mb-2">
                <label
                  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-state"
                >What type of item is this?</label>
                <div class="relative">
                  <select v-model="myItem.login_type" name="privacy" class="input-field">
                    <option value="1">Login</option>
                  </select>
                  <span class="select-arrow"></span>
                </div>
              </div>
              <div class="w-full md:w-1/2 px-3 mb-6 mb-2">
                <label
                  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-first-name"
                >Name</label>
                <input
                  id="grid-first-name"
                  v-model="myItem.name"
                  class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                  type="text"
                  placeholder
                />
              </div>
              <div class="w-full md:w-1/2 px-3 mb-2">
                <label
                  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-last-name"
                >Folder</label>
                <select
                  v-model="myItem.folder_id"
                  name="folder"
                  class="input-field w-full appearance-none"
                >
                  <option value>Select</option>
                  <option
                    v-for="(item,index) in folders"
                    :value="item.id"
                    :key="index"
                  >{{ item.name }}</option>
                </select>
                <span class="select-arrow"></span>
              </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full md:w-1/2 px-3">
                <label
                  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="username"
                >Username</label>
                <input
                  id="username"
                  v-model="myItem.login_username"
                  class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                  type="text"
                />
              </div>
              <div class="w-full md:w-1/2 px-3">
                <label
                  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-password"
                >Password</label>
                <input
                  id="grid-password"
                  v-model="myItem.login_password"
                  class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                  :type="passwordVisible ? 'password' : 'text'"
                />
                <span
                  v-if="passwordVisible"
                  class="float-right relative z-10 -mt-10 pr-3 cursor-pointer"
                  @click="passwordVisible = !passwordVisible"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="16"
                    height="16"
                    fill="currentColor"
                    class="bi bi-eye"
                    viewBox="0 0 16 16"
                  >
                    <path
                      d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"
                    />
                    <path
                      d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"
                    />
                  </svg>
                </span>
                <span
                  v-if="!passwordVisible"
                  class="float-right relative z-10 -mt-10 pr-3 cursor-pointer"
                  @click="passwordVisible = !passwordVisible"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="16"
                    height="16"
                    fill="currentColor"
                    class="bi bi-eye-slash"
                    viewBox="0 0 16 16"
                  >
                    <path
                      d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"
                    />
                    <path
                      d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"
                    />
                    <path
                      d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"
                    />
                  </svg>
                </span>
              </div>
            </div>
            <div
              v-for="(item , index) in myItem.uris"
              :key="index"
              class="flex flex-wrap -mx-3 mb-6"
            >
              <div class="w-full md:w-1/2 px-3">
                <label
                  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="username"
                >URI {{ index+1 }}</label>
                <input
                  class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                  id="username"
                  type="text"
                  v-model="item.uri"
                />
              </div>
              <div>
                <div class="flex items-center p-6 space-x-2 rounded-b dark:border-gray-600">
                  <br />
                  <br />
                  <svg
                    v-if="(myItem.uris.length - 1) === index"
                    xmlns="http://www.w3.org/2000/svg"
                    width="16"
                    height="16"
                    fill="currentColor"
                    class="bi bi-plus-circle w-6 h-6 cursor-pointer"
                    viewBox="0 0 16 16"
                    @click="addUri"
                  >
                    <path
                      d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                    />
                    <path
                      d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"
                    />
                  </svg>
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="16"
                    height="16"
                    fill="currentColor"
                    class="bi bi-dash-circle w-6 h-6 cursor-pointer"
                    viewBox="0 0 16 16"
                    @click="handleUriRemove(index)"
                  >
                    <path
                      d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                    />
                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                  </svg>
                </div>
              </div>
            </div>
            <div class="flex flex-wrap mb-4">
              <label
                class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                for="username"
              >Select Category</label>
              <a-select
                mode="tags"
                label-in-value
                :value="selectedCategory"
                placeholder="Select categories"
                :show-arrow="false"
                style="width: 100%"
                :filter-option="false"
                :not-found-content="fetching ? undefined : null"
                :size="'large'"
                @change="handleChange"
              >
                <a-spin v-if="fetching" slot="notFoundContent" size="small" />
                <a-select-option v-for="item in categories" :key="item.id.toString()">
                  <p class="text-black">{{ item.name }}</p>
                </a-select-option>
              </a-select>
            </div>
            <div class="flex flex-wrap -mx-3 mb-2">
              <div class="w-full px-3 mb-6 md:mb-0">
                <label
                  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-city"
                >Notes</label>

                <textarea
                  class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                  v-model="myItem.notes"
                ></textarea>
              </div>
            </div>
          </form>
        </div>
        <!-- Modal footer -->
        <div
          class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600"
        >
          <button
            data-modal-hide="defaultModal"
            type="button"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            @click="handleSave"
          >Save</button>
          <button
            data-modal-hide="defaultModal"
            type="button"
            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
            @click="close"
          >Cancel</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    item: {
      type: Object,
      default: Object,
      required: true
    },
    categories: {
      type: Array,
      default: Array,
      required: true
    },
    folders: {
      type: Array,
      default: Array,
      required: true
    }
  },
  data() {
    return {
      myItem: {},
      singleUri: {
        uri: ""
      },
      selectedCategory: [],
      fetching: false,
      furifyUris: [],
      passwordVisible: true
    };
  },
  created() {
    this.myItem = { ...this.item };
    this.selectedCategory = [...this.item.selectedCategory];
    this.fetching = false;
  },
  methods: {
    validateFormData() {
      if (this.myItem.name === "") {
        this.$message.error("Item name is required");
        return false;
      }

      return true;
    },
    handleSave() {
      const form = this.validateFormData();

      if (form) {
        const categoryIds = [];
        this.selectedCategory.map(item => {
          return categoryIds.push(item.key);
        });
        this.myItem.categories = categoryIds;
        let uri = "";
        if (!this.myItem.id) {
          uri = "/item";
        } else {
          uri = "/item/update";
        }
        axios
          .post(uri, this.myItem)
          .then(response => {
            this.handleFormClear();
            this.$message.success(response.data.message);
            this.$emit("closeItemModal", "createItemModal");
          })
          .catch(error => {
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
      }
    },
    addUri() {
      this.myItem.uris.push(structuredClone(this.singleUri));
    },
    handleUriRemove(index) {
      this.myItem.uris.splice(index, 1);
      this.$forceUpdate();
    },
    handleFormClear() {
      this.myItem.login_type = 1;
      this.myItem.name = "";
      this.myItem.folder_id = "";
      this.myItem.login_username = "";
      this.myItem.login_password = "";
      this.myItem.uris.uri = "";
      this.myItem.notes = "";
      this.selectedCategory = [];
    },
    handleChange(value) {
      this.selectedCategory = value;
    },
    close() {
      this.$emit("closeItemModal", "createItemModal");
    }
  }
};
</script>