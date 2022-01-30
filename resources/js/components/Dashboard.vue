<template>
    <ol>
    <li v-for="data in data">
    {{ data.title }}
    {{ data.firstname }}
    {{ data.lastname}}
    {{ data.jobtitle }}
    <router-link :to="{name: 'edit', params: {id: data.id } }" tag="button">Edit</router-link>
    </li>
    </ol>
</template>
<script>
export default {
    data () {
        return {
            data: []
        }

    },
    created() {
        window.axios.get('api/employees').then(response => {
            this.data = response.data.data

        })
    }
}
</script>