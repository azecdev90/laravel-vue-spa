<template>
 <p v-if="hasError">
    <li v-for="error in errors">
    {{ error[0] }}
  </li> 
 </p>

<form>
  <label for="fname">Title</label>
  <input type="text" name="title" v-model="title"><br>
  <label for="lname">First name:</label>
  <input type="text"  name="firstname" v-model="firstname"><br>
  <label for="lastname">Last name:</label>
  <input type="text"  name="lastname" v-model="lastname"><br>
  <label for="jobtitle">Job title:</label>
  <input type="text"  name="jobtitle" v-model="jobtitle"><br>
  <button @click.stop.prevent="cre">Submit</button>
</form>
 <h1 v-if="success">Vue is awesome! You just created your first employee</h1>
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
        }
    },
    methods: {
         cre() {
              window.axios.post('api/employees', {title:this.title, firstname:this.firstname, lastname:this.lastname, jobtitle:this.jobtitle}).then(response=>{
            var object = response.data
            if(object.hasOwnProperty('errors')){
                this.errors = response.data.errors
                this.hasError = true
            } else {
                 this.hasError = false,
                    this.success = true,

                    this.title = null,
                    this.firstname = null,
                    this.lastname = null,
                    this.jobtitle = null

            }   
        })
    
         
         }
    }
}
</script>
