<template>
    <div class="border max-w-7xl mx-auto mt-8">
        <div class="">
            <div class="flex gap-2">
                <label for="">FirstName</label>
                <v-input v-model="user.first_name"/>
            </div>
            <div class="flex gap-2">
                <label for="">last name</label>
                <v-input v-model="user.last_name"/>
            </div>
            <div class="flex gap-2">
                <label for="">email</label>
                <v-input v-model="user.email"/>
            </div>
            <div class="flex gap-2">
                <label for="">password</label>
                <v-input v-model="user.password"/>
            </div>
            <div class="flex gap-2">
                <label for="">password confirm</label>
                <v-input v-model="user.password_confirm"/>
            </div>
        </div>
        <div>
            <button @click="save">Save</button>
        </div>
    </div>
</template>

<script>
import {VInput} from 'laravue-ui-components/src/components';

    export default {
      components: {
        'v-input': VInput,
      },
        created () {
            this.fetchCurrentUser();
        },
        data() {
            return {
                user: {}
            }
        },
        methods: {
            fetchCurrentUser() {
                axios.get('profile').then(response => {
                    this.user = response.data;
                })
            },
            save() {
                axios.patch('users/' + this.user.id, this.user).then(response => {
                    this.$router.push('/');
                })
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>