<template>
  <div class="container flex justify-center mx-auto my-5">
    <div class="flex flex-col">
      <div class="w-full">
        <div class="border-b border-gray-200 shadow">
          <table>
            <thead class="bg-gray-50">
              <tr>
                <th class="px-6 py-2 text-xs text-gray-500">ID</th>
                <th class="px-6 py-2 text-xs text-gray-500">Title</th>
                <th class="px-6 py-2 text-xs text-gray-500">Firstname</th>
                <th class="px-6 py-2 text-xs text-gray-500">Lastname</th>
                <th class="px-6 py-2 text-xs text-gray-500">Jobtitle</th>
                <th class="px-6 py-2 text-xs text-gray-500">Edit</th>
                <th class="px-6 py-2 text-xs text-gray-500">Delete</th>
              </tr>
            </thead>
            <tbody class="bg-white">
              <tr class="whitespace-nowrap" v-for="data in currentData" v-bind:key="data">
                <td class="px-6 py-4 text-sm text-gray-500">
                  {{ data.id }}
                </td>
                <td class="px-6 py-4 text-sm text-gray-500">
                  {{ data.title }}
                </td>
                <td class="px-6 py-4">
                  <div class="text-sm text-gray-900">
                    {{ data.firstname }}
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div class="text-sm text-gray-900">
                    {{ data.lastname }}
                  </div>
                </td>
                <td class="px-6 py-4 text-sm text-gray-500">
                  {{ data.jobtitle }}
                </td>
                <td class="px-6 py-4">
                  <router-link
                    class="px-4 py-1 text-sm text-white bg-blue-400 rounded"
                    :to="{ name: 'edit', params: { id: data.id } }"
                    tag="button"
                    >Edit</router-link
                  >
                </td>
                <td class="px-6 py-4">
                  <button
                    class="px-4 py-1 text-sm text-white bg-red-400 rounded"
                    @click="del(data.id)"
                  >
                    Delete
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="w-1/2 mx-auto">
  <div class="w-1/2 mx-auto">
    <a @click="currentPage = firstPage">First page</a>

<a v-for="n in totalPage" v-bind:key="n" @click="setCurrent(n)">{{ n }}</a>
<a @click="currentPage = lastPage">Last page</a>
      </div>
    </div>
  <div class="flex items-center justify-center">
    <h1 v-if="success">Vue is awesome! You just deleted employee</h1>
  </div>

  <div>


    </div>
</template>
<script>
export default {
  data() {
    return {
      data: [],
      success: null,
      currentPage: 1,
      firstPage: 1,
      lastPage: null,
      perPage: 5,
    };
  },
computed: {
numberOfItems: function(){
return this.data.length
},
offset: function(){
  return (this.currentPage-1) * this.perPage
},
offsetend: function(){
    return this.offset + this.perPage
},
last: function(){
  return this.currentPage + 2
},
currentData: function(){
return this.data.slice(this.offset, this.offsetend)
},

totalPage: function(){
  return Math.ceil(this.numberOfItems / this.perPage)
  }
},created() {
    window.axios.get("api/employees").then((response) => {
      this.data = response.data.data;
    });
    return this.lastPage = this.totalPage
  },
  methods: {
    del(id) {
      window.axios.delete("api/employees/" + id).then((response) => {
        window.axios.get("api/employees").then((response) => {
          this.data = response.data.data;
          this.success = true;
          setTimeout(() => (this.success = null), 2000);
        });
      });
    },
setCurrent(id) {
  return this.currentPage = id
},
dada(){
  console.log(this.data)
}
},
};
</script>

