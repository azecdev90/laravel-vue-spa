<template>

<div class="container max-w-3xl mx-auto my-5">
    <p v-if="hasError">
    <li v-for="error in errors">
      {{ error[0] }}
    </li>
  </p>

<form class="bg-white shadow-md  px-8 pt-6 pb-8 mb-4">
<div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
        Title
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="title" type="text" placeholder="title" v-model="title">
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="firstname">
        Firstname
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="firstname" type="text" placeholder="firstname" v-model="firstname">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="lastname">
        Lastname
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="lastname" type="text" placeholder="lastname" v-model="lastname">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="jobtitle">
        Jobtitle
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="jobtitle" type="text" placeholder="jobtitle" v-model="jobtitle">
    </div>

    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" @click.stop.prevent="cre">
        Create
      </button>
  
  </form>
  <h1 v-if="success">Vue is awesome! You just created your first employee</h1>

</div>

</template>
<script>
export default {
  data() {
    return {
      title: null,
      firstname: null,
      lastname: null,
      jobtitle: null,
      success: null,
      hasError: null,
      errors: [],
    };
  },
  methods: {
    cre() {
      window.axios
        .post("api/employees", {
          title: this.title,
          firstname: this.firstname,
          lastname: this.lastname,
          jobtitle: this.jobtitle,
        })
        .then((response) => {
          var object = response.data;
          if (object.hasOwnProperty("errors")) {
            this.errors = response.data.errors;
            this.hasError = true;
          } else {
            (this.hasError = false),
              (this.success = true),
              (this.title = null),
              (this.firstname = null),
              (this.lastname = null),
              (this.jobtitle = null);
            setTimeout(() => (this.success = null), 2000);
          }
        });
    },
  },
};
</script>
