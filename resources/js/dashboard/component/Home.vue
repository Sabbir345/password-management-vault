<template>
  <div>
    <div class="flex flex-col">
      <div class="-mb-2 py-4 flex flex-wrap flex-grow justify-between">
        <div class="flex items-center py-2">
          <input
            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
            id="inline-searcg"
            type="text"
            placeholder="Search"
          />
        </div>
        <div class="flex items-center py-2">
          <a
          onclick="openItemModal()" class="inline-block px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline cursor-pointer"
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
                <th class="px-6 py-3 text-left font-medium">Name</th>
                <th class="px-6 py-3 text-left font-medium">Author</th>
                <th class="px-6 py-3 text-left font-medium">Slug</th>
                <th class="px-6 py-3 text-left font-medium">Status</th>
                <th class="px-6 py-3 text-left font-medium">Created</th>
              </tr>
            </thead>
            <!-- HEAD end -->
            <!-- BODY start -->
            <tbody class="bg-white">
              <tr>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                  <div class="text-sm leading-5 text-gray-900">Bro</div>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                  <div class="text-sm leading-5 text-gray-900">Sabbir Ahmad</div>
                </td>

                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                  <div class="text-sm leading-5 text-gray-900">fffs</div>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                  <span
                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"
                  >published</span>
                </td>
                <td
                  class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500"
                >dscdscsdcs</td>
              </tr>
            </tbody>
            <!-- BODY end -->
          </table>
        </div>
      </div>
    </div>
  </div>
</template>