<template>
    <div>
        <h1 v-if="isPopupFormEnable=='true'">Issue Book</h1>

<!--        <form class="form-inline mr-auto" v-if="isPopupFormEnable == 'false'">-->
<!--            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" v-model="searchQuery">-->
<!--            <button class="btn btn-outline-success btn-rounded btn-sm my-0" type="submit"><span class="fa fa-search"></span> Search</button>-->
<!--        </form>-->


        <form  v-if="isPopupFormEnable == 'false'">

            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search"
                                   v-model="searchQuery">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-outline-success btn-rounded btn-sm my-0" type="submit" disabled><span
                                class="fa fa-search"></span> Search
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <h3>ISSUE </h3>
                </div>
            </div>

        </form>

        <form @submit.prevent="addIssue()" method="post" v-if="isPopupFormEnable=='true'">
            <div class="form-row">
<!--                <div class="col-md-6 mb-3">-->
<!--                    <label for="user_type">User Type</label>-->
<!--                    <input type="text" class="form-control" id="user_type" placeholder="User Type"-->
<!--                           v-model="issue.user_type">-->
<!--                </div>-->

                <div class="col-md-6 mb-3">

                        <label for="user_type">User Type</label>

                        <select id="user_type" class="form-control" v-model="issue.user_type">
                            <option value="student">Student</option>
                            <option value="staff">Staff</option>

                        </select>
                    </div>

                <div class="col-md-6 mb-3">
                    <label for="user_id">User Id</label>
                    <input type="text" class="form-control" id="user_id" placeholder="User Id" v-model="issue.user_id">
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="book_id">Book Id</label>
                    <input type="text" class="form-control" id="book_id" placeholder="Book Id" v-model="issue.book_id">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="book_name">Book Name</label>
                    <input type="text" class="form-control" id="book_name" placeholder="Book Name"
                           v-model="issue.book_name">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="issue_day">Issue Date</label>
                    <input type="date" class="form-control" id="issue_day" placeholder="Issue Date"
                           v-model="issue.issue_day">
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="how_many_days">For How Many Days</label>
                    <input type="number" class="form-control" id="how_many_days" placeholder="For How Many Days"
                           v-model="issue.how_many_days">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="return_day">Return Date</label>
                    <input type="date" class="form-control" id="return_day" placeholder="Return Date"
                           v-model="issue.return_day">
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Submit form</button>
            <button class="btn btn-primary" type="button" @click="cancel()">Cancel</button>
        </form>

        <br  v-if="isPopupFormEnable == 'true'">
        <br  v-if="isPopupFormEnable == 'true'">

        <button class="btn btn-success btn-sm buttonLeft" type="button" @click="popupForm()"  v-if="isPopupFormEnable == 'false'">Book Issue</button>
        <br >

        <br>

        <table class="table table-striped" v-if="isPopupFormEnable == 'false'">
            <thead class="thead-dark tablecenterheadCSS th">
            <tr>
                <th scope="col">#</th>
                <th scope="col">User Type</th>
                <th scope="col">User ID</th>
<!--                <th scope="col">Book Id</th>-->
                <th sope ="col">Book Name</th>
<!--                <th sope ="col">Issue Date</th>-->
<!--                <th sope ="col">For How Many Days</th>-->
                <th sope ="col">Return Date</th>
                <th sope ="col">Action</th>


            </tr>
            </thead>
            <tbody class="tablecenterCSS td">
<!--            <tr v-for="data in issueData"  >-->
                <tr v-for="item in resultQuery" v-if="item.return == false" >
                <th scope="row">{{item.id}}</th>
                <td>{{item.user_type}}</td>
                <td>{{item.user_id}}</td>
<!--                <td>{{item.book_id}}</td>-->
                <td>{{item.book_name}}</td>
<!--                <td>{{item.issue_day}}</td>-->
<!--                <td>{{item.how_many_days}}</td>-->
                <td>{{item.return_day}}</td>
                <td>

                    <button class="btn btn-success" @click="getUpdateData($event)" v-bind:id="item.id"><span class="fa fa-edit"></span></button>
<!--                    <button class="btn btn-danger">Delete</button>-->
                    <button class="btn btn-info"  @click="viewIssue($event)" v-bind:id="item.id"  data-toggle="modal" data-target="#exampleModalCenter"><span class="fa fa-eye"></span></button>
                    <button class="btn btn-danger"  @click="deleteIssue($event)" v-bind:id="item.id"><span class="fa fa-trash"></span> </button>
                    <button class="btn btn-danger" @click="returnBook($event)" v-bind:id="item.id"><span class=" fa fa-refresh"></span> </button>


                </td>

            </tr>
            </tbody>
        </table>


        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">More Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul v-for="(value, name) in viewIssueData">
                            <li>{{name}} : {{value}}</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>



    </div>


</template>

<script>
export default {
    name: "IssueBook",
    data() {
        return {
            issue: {
                issue_day: "",
                book_id: "",
                user_type: "",
                user_id: "",
                how_many_days: "",
                return_day: "",
                book_name: "",
            },
            isPopupFormEnable: 'false',
            issueData: [],
            viewIssueData:[],
            searchQuery: null


        }
    },
    created() {
        this.getIssueData();
    },
    computed: {
        resultQuery() {
            if (this.searchQuery) {
                return this.issueData.filter((item) => {
                    return this.searchQuery.toLowerCase().split(' ').every(v => item.book_id.toLowerCase().includes(v))
                })
            } else {
                return this.issueData;
            }
        }
    },


    methods: {
        addIssue() {
            if (this.issue.id) {
                axios.post('api/updateIssue', this.issue)
                    .then(response => {
                        if (response.data.status == 200) {
                            alert('successfully Updated Issue Details')
                        }
                    })
            } else {
                axios.post('api/addIssue', this.issue)
                    .then(response => {
                        if (response.data.status == 201) {
                            alert('successfully created Issue Details')
                        }
                    })
            }
            this.reset();

        },

        getIssueData() {
            axios.get('api/getIssue')
                .then(response => {
                    if (response.data.status == 201) {
                        this.issueData = response.data.data;
                        console.log(response);
                    }
                })
        },

        popupForm() {
            if (this.isPopupFormEnable == 'false') {
                this.isPopupFormEnable = 'true'
            } else {
                this.isPopupFormEnable = 'false'
            }

        },
        getUpdateData(event) {
            let self = this;
            this.issueData.forEach(function (value) {
                if (value.id == event.target.id) {
                    self.issue = value;

                }
            });
            this.popupForm();
        },
        viewIssue(event){
            let self = this;
            this.issueData.forEach(function (value) {
                if (value.id == event.target.id) {
                    self.viewIssueData = value;

                }
            });
        },
        deleteIssue(event) {
            let self = this;
            if (confirm("Are you sure you want delete Issue details?")) {
                axios.get('api/deleteIssue/' + event.target.id)
                    .then(response => {
                        if (response.data.status == 201) {
                            alert('successfully deleted Issue details')
                        }
                    })
                this.getIssueData();
            }
        },
        returnBook(event){
                axios.get('api/returnBook/'+event.target.id).then(response=>{
                    alert('successfully Returned Book')
                    this.getIssueData();
                })

            },
        cancel(){
            this.popupForm();
            this.reset();
        },
        reset(){
            this.issue = {
                    issue_day: "",
                    book_id: "",
                    user_type: "",
                    user_id: "",
                    how_many_days: "",
                    return_day: "",
                    book_name: "",
            }
            this. isPopupFormEnable = 'false';
        }
    }

}
</script>

<style scoped>
.buttonLeft{
    margin: 0;
    position: absolute;
    left: 90%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}
.tablecenterheadCSS th{
    text-align:center;
}
.tablecenterCSS td{
    text-align:center;
}
</style>
