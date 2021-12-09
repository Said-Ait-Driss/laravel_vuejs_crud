<template>
    <div>
        <NavBar/>
        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    import NavBar from "./components/navBar.vue";

    export default {
        name:"Main",
        components:{
            NavBar
        }
    }
</script> 