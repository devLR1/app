<template>

</template>
<script>
import axios from "axios";

export default {
    name: "Targets",
    methods: {
        getTargets() {
            axios
                .get('http://127.0.0.1:8000/api/targets')
                .then(response => {
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        },
    },
    beforeMount() {
        this.getTargets();
    },
};
</script>
<style scoped lang="scss">

</style>
