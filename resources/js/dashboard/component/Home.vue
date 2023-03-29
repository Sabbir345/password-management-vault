<template>
  <div>
    <div class="flex flex-col">
      <div class="-mb-2 py-4 flex flex-wrap flex-grow justify-between">
        <div class="flex items-center py-2">
          <input
            id="inline-searcg"
            v-model="search"
            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
            type="text"
            placeholder="Search: name, username"
          />
        </div>
        <div class="flex items-center py-2">
          <a
            class="inline-block px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-100 focus:outline-none focus:shadow-outline cursor-pointer"
            @click="createItem"
          >New Item</a>
        </div>
      </div>
      <div class="-my-2 py-2 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div
          class="align-middle inline-block w-full shadow overflow-x-auto sm:rounded-lg border-b border-gray-200"
        >
          <table class="min-w-full">
            <!-- HEAD start -->
            <thead>
              <tr
                class="bg-gray-50 border-b border-gray-200 text-xs leading-4 text-gray-500 uppercase tracking-wider"
              >
                <th class="px-6 py-3 text-left font-medium">Type</th>
                <th class="px-6 py-3 text-left font-medium">Name</th>
                <th class="px-6 py-3 text-left font-medium">Username</th>
                <th class="px-6 py-3 text-left font-medium">Folder</th>
                <th class="px-6 py-3 text-left font-medium">Action</th>
              </tr>
            </thead>
            <!-- HEAD end -->
            <!-- BODY start -->
            <tbody v-if="items.length" class="bg-white">
              <tr v-for="(item , index) in items" :key="index">
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                  <div class="text-sm leading-5 text-gray-900">Login</div>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                  <div class="text-sm leading-5 text-gray-900">{{ item.name }}</div>
                </td>

                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                  <div class="text-sm leading-5 text-gray-900">{{ item.login_username }}</div>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                  <div
                    v-if="item.folder"
                    class="text-sm leading-5 text-gray-900"
                  >{{ item.folder.name }}</div>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                  <div class="text-sm leading-5 text-gray-900 inline-flex">
                    <!-- <a-popconfirm
                      title="Are you sure you want to delete？"
                      class="ml-2 text-xs items-center font-bold leading-sm px-3 py-1 bg-red-500 text-white rounded-full hover:text-white"
                      @confirm="handleDelete(item.id)"
                    >
                      <template #icon>
                        <question-circle-outlined style="color: red" />
                      </template>
                      <a>Delete</a>
                    </a-popconfirm>

                    <button
                      class="ml-2 text-xs items-center font-bold leading-sm px-3 py-1 bg-blue-500 text-white rounded-full"
                    >Edit</button>-->
                    <a-dropdown :trigger="['click']">
                      <a class="ant-dropdown-link" @click.prevent>
                        <svg width="19" height="19" viewBox="0 0 19 19" class="fill-current">
                          <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M9.98438 2.32812C10.3822 2.32813 10.7637 2.48616 11.045 2.76746C11.3263 3.04877 11.4844 3.4303 11.4844 3.82812C11.4844 4.22595 11.3263 4.60748 11.045 4.88879C10.7637 5.17009 10.3822 5.32812 9.98438 5.32812C9.58655 5.32812 9.20502 5.17009 8.92372 4.88879C8.64241 4.60748 8.48438 4.22595 8.48438 3.82812C8.48438 3.4303 8.64241 3.04877 8.92372 2.76746C9.20502 2.48616 9.58655 2.32813 9.98438 2.32812Z"
                          />
                          <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M9.98438 8.32813C10.3822 8.32813 10.7637 8.48616 11.045 8.76747C11.3263 9.04877 11.4844 9.4303 11.4844 9.82812C11.4844 10.2259 11.3263 10.6075 11.045 10.8888C10.7637 11.1701 10.3822 11.3281 9.98438 11.3281C9.58655 11.3281 9.20502 11.1701 8.92372 10.8888C8.64241 10.6075 8.48438 10.2259 8.48438 9.82812C8.48438 9.4303 8.64241 9.04877 8.92372 8.76747C9.20502 8.48616 9.58655 8.32812 9.98438 8.32813Z"
                          />
                          <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M9.98438 14.3281C10.3822 14.3281 10.7637 14.4862 11.045 14.7675C11.3263 15.0488 11.4844 15.4303 11.4844 15.8281C11.4844 16.2259 11.3263 16.6075 11.045 16.8888C10.7637 17.1701 10.3822 17.3281 9.98438 17.3281C9.58655 17.3281 9.20502 17.1701 8.92372 16.8888C8.64241 16.6075 8.48438 16.2259 8.48438 15.8281C8.48438 15.4303 8.64241 15.0488 8.92372 14.7675C9.20502 14.4862 9.58655 14.3281 9.98438 14.3281Z"
                          />
                        </svg>
                      </a>
                      <template #overlay>
                        <a-menu>
                          <a-menu-item key="0">
                            <a @click="copyPassword(item.login_password)">Copy Password</a>
                          </a-menu-item>
                          <a-menu-item key="1">
                            <a @click="handleEditModal(item)">Edit</a>
                          </a-menu-item>
                          <a-menu-divider />
                          <a-menu-item key="3">
                            <a-popconfirm
                              title="Are you sure you want to delete？"
                              @confirm="handleDelete(item.id)"
                            >
                              <template #icon>
                                <question-circle-outlined style="color: red" />
                              </template>
                              <a>Delete</a>
                            </a-popconfirm>
                          </a-menu-item>
                        </a-menu>
                      </template>
                    </a-dropdown>
                  </div>
                </td>
              </tr>
            </tbody>
            <!-- BODY end -->
          </table>

          <div v-if="!items.length">
            <p class="p-5 text-center">No records found!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    items: {
      type: Array,
      default: Array,
      required: true
    }
  },
  data() {
    return {
      search: ""
    };
  },
  watch: {
    search() {
      this.$emit("getNewItem", this.search);
    }
  },
  methods: {
    handleDelete(id) {
      axios
        .post("/item-delete", {
          id: id
        })
        .then(response => {
          this.$emit("getNewItem", "");
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
    },
    handleEditModal(data) {
      const uris = JSON.parse(data.uri);
      data["uris"] = uris;

      const selectedCategory = [];
      for (let i = 0; i < data.categories.length; i++) {
        selectedCategory.push({
          key: `${data.categories[i].id}`,
          label: data.categories[i].name
        });
      }
      data["selectedCategory"] = selectedCategory;
      (data["title"] = "Update a item"), this.$emit("itemModal", data);
    },
    createItem() {
      this.$emit("itemModal", {
        login_type: 1,
        folder_id: "",
        login_password: "",
        login_username: "",
        name: "",
        notes: "",
        title: "Create a item",
        uris: [
          {
            uri: ""
          }
        ]
      });
    },
    copyPassword(data) {
      if (data !== "" && data !== undefined && data !== null) {
        const textarea = document.createElement("textarea");
        textarea.value = data;
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand("copy");
        document.body.removeChild(textarea);
        this.$message.success("Password copied!");
      }
    }
  }
};
</script>