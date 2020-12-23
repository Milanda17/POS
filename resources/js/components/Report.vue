<template>
<div>
    <h1>Report</h1>


<!--    <download-csv-->
<!--        class   = "btn btn-default"-->
<!--        :data   = "student_data"-->
<!--        name    = "student_data.csv">-->

<!--        Download Student data-->

<!--    </download-csv>-->

<!--    <download-csv-->
<!--        class   = "btn btn-default"-->
<!--        :data   = "staff_data"-->
<!--        name    = "staff_data.csv">-->

<!--        Download Staff data-->

<!--    </download-csv>-->

<!--    <download-csv-->
<!--        class   = "btn btn-default"-->
<!--        :data   = "book_data"-->
<!--        name    = "book_data.csv">-->

<!--        Download Book data-->

<!--    </download-csv>-->


    
    <div class="row">
        <div class="col-sm-6">
            <div class="card" >
                <div class="card-body" >
                    <div class="card bg-primary ">
                    <h5 class="card-title "> Student Data</h5>
                    <p class="card-text">
                    Here you can download students data file
                    </p>
                    <a href="#" class="card bg-light fa fa-download"  >
                    <download-csv
                        class   = "btn btn-default"
                        :data   = "student_data"
                        name    = "student_data.csv">
                        Download Student data
                    </download-csv>
                    </a>
                </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="card bg-primary">
                    <h5 class="card-title">Staff Data</h5>
                    <p class="card-text">
                        Here you can download staff data file
                    </p>
                    <a href="#" class="card bg-light fa fa-download">
                        <download-csv
                            class   = "btn btn-default"
                            :data   = "staff_data"
                            name    = "staff_data.csv">

                            Download Staff data

                        </download-csv>
                    </a>
                </div>
                </div>
            </div>
        </div>

    </div>

<br>

    <div class="row">
        <div class="col-sm-6">
            <div class="card" >
                <div class="card-body" >
                    <div class="card bg-primary ">
                        <h5 class="card-title "> Books Data</h5>
                        <p class="card-text">
                            Here you can download books data file
                        </p>
                        <a href="#" class="card bg-light fa fa-download"  >
                                <download-csv
                                    class   = "btn btn-default"
                                    :data   = "book_data"
                                    name    = "book_data.csv">

                                    Download Book data

                                </download-csv>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="card bg-primary">
                        <h5 class="card-title">Issued Book Data</h5>
                        <p class="card-text">
                            Here you can download issued book data file
                        </p>
                        <a href="#" class="card bg-light fa fa-download">
                            <download-csv
                                class   = "btn btn-default"
                                :data   = "issue_data"
                                name    = "issue_data.csv">

                                Download Issued Book data

                            </download-csv>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>



</template>

<script>
export default {
name: "Report.vue",
    data(){
        return{
            student_data: [],
            staff_data:[],
            book_data:[],
            issue_data:[]
        }
    },
    created() {
    this.getStudentData();
    this.getStaffData();
    this.getBookData();
    this.getIssue();

    },
    methods:{
        getStudentData() {
            axios.get('api/getStudent')
                .then(response => {
                    if (response.data.status == 201) {
                        this.student_data = response.data.data;
                    }
                })
        },

        getStaffData() {
            axios.get('api/getStaff')
                .then(response => {
                    if (response.data.status == 201) {
                        this.staff_data = response.data.data;
                    }
                })
        },
        getBookData() {
            axios.get('api/getBook')
                .then(response => {
                    if (response.data.status == 201) {
                        this.book_data = response.data.data;
                    }
                })
        },
        getIssue() {
            axios.get('api/getIssue')
                .then(response => {
                    if (response.data.status == 201) {
                        this.issue_data = response.data.data;
                    }
                })
        },
    }
}
</script>

<style scoped>

</style>
