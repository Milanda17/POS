<template>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-blue">
                    <div class="inner">
                        <h3> 450 </h3>
                        <p> Manage Books  </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    </div>
<!--                    <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i> <router-link to="/add"> </router-link></a>-->
                    <router-link to="/addbook"> <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a></router-link>

                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-green">
                    <div class="inner">
                        <h3> 230 </h3>
                        <p> Issued Books </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-book" aria-hidden="true"></i>
                    </div>
                    <router-link to="/issuebook"> <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a></router-link>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-orange">
                    <div class="inner">
                        <h3> 600 </h3>
                        <p> Manage Students </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                    </div>
                    <router-link to="/add"> <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a></router-link>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-red">
                    <div class="inner">
                        <h3> 350 </h3>
                        <p> Manage Staff </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <router-link to="/staff"> <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a></router-link>
                </div>
            </div>
        </div>

        <div class="row no-gutters position-relative">
            <div class="col-md-6 mb-md-0 p-md-4">
                <img class="w-100" src="https://mdbootstrap.com/img/Mockups/Lightbox/Thumbnail/img%20(67).jpg" alt="image">
            </div>
            <div class="col-md-6 position-static p-4 pl-md-0">
                <h5 class="mt-0">Mobile Library System</h5>
                <p>ACDA is a non profit Srilankan organization established in 2007. the members of the organization develop innovative initiative & programs in the filed of health, education and skill development respectively for infants, children and youth, as well as adults without considering grounds of cast, creed, race and gender.</p>
                <a href="https://abhimana.org/" class="stretched-link">View More</a>
            </div>
        </div>
<!--<br>-->
<!--<div>-->
<!--    <div class="progress">-->
<!--        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--    </div>-->
<!--    <br>-->
<!--    <p> Education Books </p>-->
<!--    <div class="progress">-->
<!--        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--    </div>-->
<!--    <br>-->
<!--    <p>  Translate Books </p>-->
<!--    <div class="progress">-->
<!--        <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--    </div>-->
<!--    <br>-->
<!--    <p>  Novels </p>-->
<!--    <div class="progress">-->
<!--        <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--    </div>-->
<!--    <br>-->
<!--    <p>  Kids Books  </p>-->
<!--    <div class="progress">-->
<!--        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--    </div>-->


<!--</div>-->
<!--<br>-->
<!--        <div id="piechart" style="width: 900px; height: 500px;"></div>-->
<!--        <div id="exampleJavascript"></div>-->

    </div>


</template>

<script>

export default {
name: "About",
}
</script>

<style scoped>
.card-box {
    position: relative;
    color: #fff;
    padding: 20px 10px 40px;
    margin: 20px 0px;
}
.card-box:hover {
    text-decoration: none;
    color: #f1f1f1;
}
.card-box:hover .icon i {
    font-size: 100px;
    transition: 1s;
    -webkit-transition: 1s;
}
.card-box .inner {
    padding: 5px 10px 0 10px;
}
.card-box h3 {
    font-size: 27px;
    font-weight: bold;
    margin: 0 0 8px 0;
    white-space: nowrap;
    padding: 0;
    text-align: left;
}
.card-box p {
    font-size: 15px;
}
.card-box .icon {
    position: absolute;
    top: auto;
    bottom: 5px;
    right: 5px;
    z-index: 0;
    font-size: 72px;
    color: rgba(0, 0, 0, 0.15);
}
.card-box .card-box-footer {
    position: absolute;
    left: 0px;
    bottom: 0px;
    text-align: center;
    padding: 3px 0;
    color: rgba(255, 255, 255, 0.8);
    background: rgba(0, 0, 0, 0.1);
    width: 100%;
    text-decoration: none;
}
.card-box:hover .card-box-footer {
    background: rgba(0, 0, 0, 0.3);
}
.bg-blue {
    background-color: #00c0ef !important;
}
.bg-green {
    background-color: #00a65a !important;
}
.bg-orange {
    background-color: #f39c12 !important;
}
.bg-red {
    background-color: #d9534f !important;
}
</style>
