<template>
<div class="d-flex justify-content-center">
    <font-awesome-icon icon="fa-solid fa-spinner" spin size="2xl" />
</div>
</template>

<script>
    import { library } from '@fortawesome/fontawesome-svg-core'
    /* import specific icons */
    import { faSpinner } from '@fortawesome/free-solid-svg-icons'
    /* import font awesome icon component */
    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
    /* add icons to the library */
    library.add(faSpinner)
    export default {
        name: "Loading",
        components: {
        FontAwesomeIcon
        }, 
    }
</script>

<style>

</style>