<template>
    <div class="mx-auto max-w-7xl justify-center">
        <div>
            <label for="">Username</label>
            <input v-model="credentials.email" type="text"/>
        </div>
        <div>
            <label for="">paswword</label>
            <input v-model="credentials.password" type="password"/>
        </div>
        <div>
            <button @click="login">Login</button>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    setup () {


        return {}
    },
    data() {
        return {
            credentials: {
                email: '',
                password: ''
            }
        }
    },
    methods: {
        login() {
            axios.post('login', this.credentials).then(response => {
                this.$router.push('/');
            }).catch(error => {
                console.log('error')
            });
        }
    }
}
</script>

<style lang="scss" scoped>

</style>