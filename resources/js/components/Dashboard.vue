<template>
 <ol>
    <li v-for="data in data">
    {{ data.title }}
    {{ data.firstname }}
    {{ data.lastname}}
    {{ data.jobtitle }}
    <router-link :to="{name: 'edit', params: {id: data.id } }" tag="button">Edit</router-link>
    <button @click="del(data.id)">Delete</button>
    </li>
    </ol>
 <h1 v-if="success">Vue is awesome! You just deleted employee</h1>

</template>
<script>
export default {
    data () {
        return {
            data: [],
            success: null,
        }
    },
    created() {
        window.axios.get('api/employees').then(response => {
            this.data = response.data.data
        })
    },
    methods: {
        del(id) {
            window.axios.delete('api/employees/'+id).then(response =>{
                 window.axios.get('api/employees').then(response => {
                 this.data = response.data.data
                 this.success = true
                 setTimeout(() => this.success = null, 2000)
        })

            })
        }
    }
}
</script>

