<template>
<form method="POST">
  <label for="fname">Title</label>
  <input type="text" name="title" v-model="title"><br>
  <label for="lname">First name:</label>
  <input type="text"  name="firstname" v-model="firstname"><br>
  <label for="lastname">Last name:</label>
  <input type="text"  name="lastname" v-model="lastname"><br>
   <label for="jobtitle">Job title:</label>
  <input type="text"  name="jobtitle" v-model="jobtitle"><br>
  <button @click.stop.prevent="">Submit</button>
</form>
</template>
<script>
export default {
data() {
    
} 
}
</script>