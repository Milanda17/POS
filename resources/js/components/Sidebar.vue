<template>
    <div class="sidenav">
       <!-- <router-link to="/test">  <a href="#services"><i class="fa fa-fw fa-wrench"></i> Test</a></router-link>
        <router-link to="/home"> <a href="#home"><i class="fa fa-fw fa-home"></i> Home</a></router-link>-->
        <router-link to="/about"> <a href="#home"><i class="fa fa-fw fa-home"></i> About</a></router-link>
        <router-link to="/add"> <a href="#home"><i class="fa fa-fw fa-user-circle-o"></i> Student</a></router-link>
        <router-link to="/staff"> <a href="#home"><i class="fa fa-fw fa-user-circle-o"></i> Staff</a></router-link>
        <router-link to="/addbook"> <a href="#home"><i class="fa fa-fw fa-book"></i> Book</a></router-link>
        <router-link to="/issuebook"> <a href="#home"><i class="fa fa-fw fa-cog"></i> Issue </a></router-link>
        <router-link to="/returnbook"> <a href="#home"><i class="fa fa-fw fa-refresh"></i> Returned</a></router-link>
        <router-link to="/report"><a href="#home"> <i class="fa fa-fw fa-file"></i> Report</a> </router-link>
        <router-link to="/statistics"><a href="#home"> <i class="fa fa-fw fa-line-chart"></i> Statistics</a> </router-link>

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
    width: 12%;
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
