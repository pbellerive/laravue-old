<template>
    <header class="flex flex-1 border-b-2 border-black px-1 md:px-2 py-1 md:py-5">
        <div class="flex gap-3">
            <router-link to="/">Home</router-link>
            <router-link to="/about">About</router-link>
        </div>
        <div class="flex flex-row-reverse w-full pr-5">
            <router-link to="/profile">Profile</router-link>
        </div>
    </header>
</template>

<script>
export default {
    setup () {


        return {}
    }
}
</script>

<style lang="scss" scoped>

</style>