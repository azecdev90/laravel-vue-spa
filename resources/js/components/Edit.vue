<template>
  <div class="container max-w-3xl mx-auto py-1">
    <form>
      <div>
        <label class="block"> Title </label>
        <input
          type="text"
          class="
            w-1/3
            mx-0
            border border-gray-300
            outline-none
            focus:border-gray-400
          "
          name="title"
          v-model="title"
        />d
      </div>

      <div class="mb-4">
        <label
          class="block text-gray-700 text-sm font-bold mb-2"
          for="firstname"
        >
          Firstname
        </label>
        <input
          class="
            shadow
            appearance-none
            border
            rounded
            w-full
            py-2
            px-3
            text-gray-700
            leading-tight
            focus:outline-none focus:shadow-outline
          "
          name="firstname"
          type="text"
          placeholder="firstname"
          v-model="firstname"
        />
      </div>

      <div class="mb-4">
        <label
          class="block text-gray-700 text-sm font-bold mb-2"
          for="lastname"
        >
          Lastname
        </label>
        <input
          class="
            shadow
            appearance-none
            border
            rounded
            w-full
            py-2
            px-3
            text-gray-700
            leading-tight
            focus:outline-none focus:shadow-outline
          "
          name="lastname"
          type="text"
          placeholder="lastname"
          v-model="lastname"
        />
      </div>
      <div class="mb-4">
        <label
          class="block text-gray-700 text-sm font-bold mb-2"
          for="jobtitle"
        >
          Jobtitle
        </label>
        <input
          class="
            shadow
            appearance-none
            border
            rounded
            w-full
            py-2
            px-3
            text-gray-700
            leading-tight
            focus:outline-none focus:shadow-outline
          "
          name="jobtitle"
          type="text"
          placeholder="jobtitle"
          v-model="jobtitle"
        />
      </div>
      <button
        class="
          bg-blue-500
          hover:bg-blue-700
          text-white
          font-bold
          py-2
          px-4
          rounded
          focus:outline-none focus:shadow-outline
        "
        type="button"
        @click.stop.prevent="upd"
      >
        Edit
      </button>
    </form>
    <h1 v-if="success">Vue is awesome! You just updated your employee</h1>
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
    };
  },
  created() {
    window.axios
      .get("/api/employees/" + this.$route.params.id)
      .then((response) => {
        this.title = response.data.data.title;
        this.firstname = response.data.data.firstname;
        this.lastname = response.data.data.lastname;
        this.jobtitle = response.data.data.jobtitle;
      });
  },
  methods: {
    upd() {
      var formData = {
        title: this.title,
        firstname: this.firstname,
        lastname: this.lastname,
        jobtitle: this.jobtitle,
      };
      window.axios
        .put("/api/employees/" + this.$route.params.id, formData)
        .then((response) => {
          this.success = true;
          setTimeout(() => (this.success = null), 2000);
        });
    },
  },
};
</script>