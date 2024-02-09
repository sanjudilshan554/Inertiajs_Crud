<template>
    <div>
        <Navbar />
        <slot name="content" />
    </div>
</template>

<script>

import  Navbar  from "@/Components/NavBar/nav_bar.vue"

export default{
    components:{
        Navbar
    }
}
</script>

<style lang="css" scoped>

</style>