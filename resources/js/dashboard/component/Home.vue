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
            onclick="openItemModal()"
            class="inline-block px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-100 focus:outline-none focus:shadow-outline cursor-pointer"
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
                  <div v-if="item.folder" class="text-sm leading-5 text-gray-900">{{ item.folder.name }}</div>
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
import { emit } from "process";

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
  methods: {}
};
</script>