<template>
  <div
    id="small-modal"
    tabindex="-1"
    class="itemExport hidden fixed z-[9999] top-0 left-0 w-full h-full pt-8 lg:py-6 4xl:py-10 flex items-end lg:items-start justify-center bg-black bg-opacity-90 lg:overflow-y-auto"
  >
    <div class="relative w-full h-full max-w-md md:h-auto">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
          <h3 class="text-xl font-medium text-gray-900 dark:text-white">Export Item</h3>
          <button
            type="button"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
            data-modal-hide="small-modal"
            onclick="closeItemExportModal()"
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
              <div class="w-full px-3 mb-2 text-center">
                <p class="pb-3 text-base font-bold">Export your data in CSV format.</p>

                <button
                  class="inline-block px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-100 focus:outline-none focus:shadow-outline cursor-pointer"
                  @click="handleDownload"
                >Download</button>

                
              </div>
            </div>
          </form>
        </div>
        <!-- Modal footer -->
        <div
          class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600"
        >
          <button
            data-modal-hide="small-modal"
            type="button"
            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
            onclick="closeItemExportModal()"
          >Cancel</button>
        </div>
      </div>
    </div>
  </div>
</template>
  
  <script>
export default {
  data() {
    return {
      file: null
    };
  },
  methods: {
    handleDownload() {
      axios
        .get("/items-export", { responseType: "blob" })
        .then(response => {
          console.log(response);
          // const blob = new Blob([response.data], { type: 'text/csv;charset=utf-8' });
          // const link = document.createElement("a");
          // link.href = window.URL.createObjectURL(blob);
          // link.download = "items.csv";
          // link.click();
          //     this.$message.success(response.data.message);
          //   this.$emit("closeItemExportModal", "itemExport");
          const filename = response.headers["content-disposition"].split(
            "="
          )[1];
          const url = window.URL.createObjectURL(new Blob([response.data]));
          const link = document.createElement("a");
          link.href = url;
          link.setAttribute("download", filename);
          document.body.appendChild(link);
          link.click();
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