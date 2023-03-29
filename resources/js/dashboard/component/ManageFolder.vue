<template>
  <div
    id="small-modal"
    tabindex="-1"
    class="createFolderModal fixed z-[9999] top-0 left-0 w-full h-full pt-8 lg:py-6 4xl:py-10 flex items-end lg:items-start justify-center bg-black bg-opacity-90 lg:overflow-y-auto"
  >
    <div class="relative w-full h-full max-w-md md:h-auto">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
          <h3 class="text-xl font-medium text-gray-900 dark:text-white">Folder</h3>
          <button
            type="button"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
            data-modal-hide="small-modal"
            @click="closeModal"
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
              <div class="w-full px-3 mb-2">
                <label
                  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-first-name"
                >Name</label>
                <input
                  class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                  id="grid-first-name"
                  type="text"
                  v-model="folder.name"
                  placeholder
                />
              </div>
            </div>
          </form>
        </div>
        <!-- Modal footer -->
        <div
          class="flex justify-between p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600"
        >
          <div class>
            <button
              data-modal-hide="small-modal"
              type="button"
              class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
              @click="handleSave"
            >Save</button>
            <button
              data-modal-hide="small-modal"
              type="button"
              class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
              @click="closeModal"
            >Cancel</button>
          </div>
          <div v-if="folder.id">
            <a-popconfirm
              title="Are you sure delete this folder?"
              ok-text="Yes"
              cancel-text="No"
              @confirm="deleteFolder"
              @cancel="closeModal"
            >
              <button
                class="rounded-lg px-4 py-2 border-2 border-red-600 text-red-600 hover:bg-red-600 hover:text-red-100 duration-300"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  fill="currentColor"
                  class="bi bi-trash"
                  viewBox="0 0 16 16"
                >
                  <path
                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"
                  />
                  <path
                    fill-rule="evenodd"
                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"
                  />
                </svg>
              </button>
            </a-popconfirm>
          </div>
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
    }
  },
  data() {
    return {
      folder: this.item
    };
  },
  created() {
    this.folder = this.item;
    this.fetching = false;
  },
  methods: {
    closeModal() {
      this.clearFormData()
      this.$emit("closeFolderModal", "createFolderModal");
    },
    clearFormData(){
      this.folder.name = "";
      this.folder.id = "";
    },
    handleSave() {
      if (this.folder.name === "") {
        return "Folder name is required";
      }
      axios
        .post("/folder", this.folder)
        .then(response => {
          this.clearFormData()
          this.$message.success(response.data.message);
          this.$emit("closeFolderModal", "createFolderModal");
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
    deleteFolder() {
      if (this.folder.id === "") {
        return "Folder id is required";
      }
      axios
        .post("/folder-delete", { id: this.folder.id })
        .then(response => {
          this.$message.success(response.data.message);
          this.$emit("closeFolderModal", "createFolderModal");
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
  }
};
</script>