<template>
    <div>
        <div v-for="obj in modulea" :key="obj.id">
            {{obj.id}}
        </div>
    </div>
</template>

<script>
export default {
    setup () {
        return {}
    },
    data() {
        return {
            modulea: []
        }
    }
}
</script>

<style lang="scss" scoped>

</style>