<template>
    <div class="mx-auto max-w-7xl justify-center mt-5 border">
        <div class="flex flex-col gap-3 flex-0 p-5">
            <div class="flex gap-2 justify-center">
                <label for="">Username</label>
                <input v-model="credentials.email" type="text" class="border rounded ">
            </div>
            <div class="flex gap-2 justify-center">
                <label for="">paswword</label>
                <input v-model="credentials.password" type="password" class="border rounded "/>
            </div>
            <div >
                <button @click="login" class="border p-2 bg-blue-500 rounded">Login</button>
            </div>
        </div>
    </div>
</template>

<script>
import { useStore } from '../../store/main'

export default {
    setup () {
        let store = useStore();

        return {
            store
        }
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
                this.store.$patch({
                    isAuthenticated: true,
                    user: response.data.user
                });

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