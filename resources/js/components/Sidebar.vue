<template>
    <div class="sidenav">
        <router-link to="/test">  <a href="#services"><i class="fa fa-fw fa-wrench"></i> Test</a></router-link>
        <router-link to="/home"> <a href="#home"><i class="fa fa-fw fa-home"></i> Home</a></router-link>
    </div>
</template>

<script>
export default {
name: "Sidebar"
}
</script>

<style scoped>
.sidenav {
    height: 100%;
    width: 160px;
    position: fixed;
    z-index: 1;
    top: 9%;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    padding-top: 20px;
}

.sidenav a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 20px;
    color: #818181;
    display: block;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.main {
    margin-left: 160px; /* Same as the width of the sidenav */
    font-size: 28px; /* Increased text to enable scrolling */
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}
</style>
