<template>
    <div>
        <p>{{greeting}}</p>
        <response-chart></response-chart>
    </div>
</template>

<script>
    import ResponseChart from './ResponseChart'

    export default {
        data() {
            return {
                greeting: 'Tervehdys. Olen ExampleComponent'
            }
        },
        components: {
            ResponseChart
        }
    }
</script>

<style scoped>

</style>
