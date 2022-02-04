<template>
  <div class="container w-1/2 mx-auto bg-red-400 py-1">
    <form>
      <div>
        <label class="block"> Title </label>
      <input type="text" class="w-1/3 mx-0 border border-gray-300 outline-none focus:border-gray-400">d
      </div>
      </form>
</div>

<form>
  <label for="fname">Title</label>
  <input type="text" name="title" v-model="title"><br>
  <label for="lname">First name:</label>
  <input type="text"  name="firstname" v-model="firstname"><br>
  <label for="lastname">Last name:</label>
  <input type="text"  name="lastname" v-model="lastname"><br>
  <label for="jobtitle">Job title:</label>
  <input type="text"  name="jobtitle" v-model="jobtitle"><br>
  <button @click.stop.prevent="upd">Submit</button>
</form>

</template>
<script>
export default {
data() {
  return {
          title: null,
          firstname: null,
          lastname: null,
          jobtitle: null,
  }
},
created() {
    window.axios.get('/api/employees/'+this.$route.params.id).then(response => {
      this.title = response.data.data.title
      this.firstname = response.data.data.firstname
      this.lastname = response.data.data.lastname
      this.jobtitle = response.data.data.jobtitle
    })
  }, methods: {
    upd() {
     var formData = {'title':this.title,'firstname':this.firstname,'lastname':this.lastname,'jobtitle':this.jobtitle}
      window.axios.put('/api/employees/'+this.$route.params.id, formData ).then(response => {
                    
      })
    }
  }

}
</script>