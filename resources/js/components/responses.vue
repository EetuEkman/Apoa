<template>
    <div id="assessments">
        <ul v-for="assessment in assessments" v-bind:key="assessment">
            <li>{{assessment.title}}</li>
            <li>{{assessment.body}}</li>
            <li>{{assessment.first_name}} {{assessment.last_name}}</li>
            <ul v-for="response in assessment.responses" v-bind:key="response">
                <li>Arvosana: {{response.grade}}</li>
                <li>Arvio: {{response.body}}</li>
                <li>Päivämäärä: {{response.created_at}}</li>
            </ul>
        </ul>
    </div>
</template>

<script>
    module.exports = {
        props: [
            'assessments'
        ]
    }

    export default {
        data() {
            return {
                assessments: ''
            }
        },
    }
</script>
