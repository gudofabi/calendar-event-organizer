<template>
  <div class="bg-white rounded-lg shadow-sm mt-14 pt-5 pb-3 px-4 mx-auto w-6/12 text-center">
      <h1 class="text-lg font-semibold">All available links are redirecting to the coding challenge that all of you provide for me, Choose the right company and check what I did on the coding challenge.</h1>
      <h3 class="text-md">Thank you and have nice day!</h3>
      <nav class="mt-8 mb-3 border-gray-100 border rounded-md py-4 px-2">
          <ul class="flex ">
              <li class="">
                  <router-link 
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 rounded-md"
                    to="/appetiser">Appetiser</router-link>
              </li>
              <li class="">
                  <router-link 
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 rounded-md"
                    to="/co-foundry">CoFoundry</router-link>
              </li>
          </ul>
      </nav>
  </div>
</template>

<script>
export default {
    name: 'Home'
}
</script>

<style>

</style>