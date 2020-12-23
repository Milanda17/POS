<template>
    <div>
    <h1 v-if="isPopupFormEnable=='true'">Add Staff</h1>

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
                    <h3>STAFF </h3>
                </div>
            </div>

        </form>


        <form @submit.prevent="addStaff()" method="post" v-if="isPopupFormEnable=='true'">
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="first_name">First name</label>
                    <input type="text" class="form-control" id="first_name" placeholder="First name" v-model="staff.first_name">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="last_name">Last name</label>
                    <input type="text" class="form-control" id="last_name" placeholder="Last name" v-model="staff.last_name">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="registration_id">Registration Id</label>
                    <input type="text" class="form-control" id="registration_id" placeholder="Registration Id" v-model="staff.registration_id">
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Email" v-model="staff.email">
                </div>
                <div class="col-md-6 mb-3">
                        <label for="phone_number">Phone Number</label>
                        <input type="number" class="form-control" id="phone_number" placeholder="Phone Number" v-model="staff.phone_number">
                    </div>
                </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="Address" v-model="staff.address">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="position"> Position</label>
                    <input type="text" class="form-control" id="position" placeholder="Position" v-model="staff.position">
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Submit form</button>
            <button class="btn btn-primary" type="button" @click="cancel()">Cancel</button>
        </form>

        <br  v-if="isPopupFormEnable == 'true'">
        <br  v-if="isPopupFormEnable == 'true'">

        <button class="btn btn-success btn-sm buttonLeft" type="button" @click="popupForm()"  v-if="isPopupFormEnable == 'false'">Add Staff</button>
        <br>

        <br>

        <table class="table table-striped" v-if="isPopupFormEnable == 'false'">
            <thead class="thead-dark tablecenterheadCSS th">
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last name</th>
                <th scope="col">Register Id</th>
<!--                <th sope ="col">Email</th>-->
<!--                <th sope ="col">Phone Number</th>-->
<!--                <th sope ="col">Address</th>-->
                <th sope ="col">Position</th>
                <th scope="col">Action</th>

            </tr>
            </thead>
            <tbody class="tablecenterCSS td">
<!--            <tr v-for="data in staffData"  >-->
               <tr v-for="item in resultQuery"  >
                <th scope="row">{{item.id}}</th>
                <td>{{item.first_name}}</td>
                <td>{{item.last_name}}</td>
                <td>{{item.registration_id}}</td>
<!--                <td>{{item.email}}</td>-->
<!--                <td>{{item.phone_number}}</td>-->
<!--                <td>{{item.address}}</td>-->
                <td>{{item.position}}</td>
                   <td>
                       <button class="btn btn-success" @click="getUpdateData($event)" v-bind:id="item.id"><span class="fa fa-edit"></span></button>
                       <button class="btn btn-info"  @click="viewStaff($event)" v-bind:id="item.id"  data-toggle="modal" data-target="#exampleModalCenter"><span class="fa fa-eye"></span></button>
                       <button class="btn btn-danger"  @click="deleteStaff($event)" v-bind:id="item.id"><span class="fa fa-trash"></span></button>

                       <!--                       <button class="btn btn-danger">Delete</button>-->
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
                        <ul v-for="(value, name) in viewStaffData">
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
    name: "AddStaff",
    data() {
        return {
            staff: {
                first_name: "",
                last_name: "",
                registration_id: "",
                email: "",
                phone_number: "",
                address: "",
                position: ""

            },
            isPopupFormEnable: 'false',
            staffData:[],
            viewStaffData:[],
            searchQuery: null,

        }

    },
    created() {
        this.getStaffData();
    },

    computed: {
        resultQuery() {
            if (this.searchQuery) {
                return this.staffData.filter((item) => {
                    return this.searchQuery.toLowerCase().split(' ').every(v => item.first_name.toLowerCase().includes(v))
                })
            } else {
                return this.staffData;
            }
        }
    },

    methods: {
            addStaff() {
                if (this.staff.id){
                    axios.post('api/updateStaff', this.staff)
                        .then(response => {
                            if (response.data.status == 200) {
                                alert('successfully Updated Staff')
                            }
                        })
                }else {
                    axios.post('api/addStaff', this.staff)
                        .then(response => {
                            if (response.data.status == 201) {
                                alert('successfully created Staff')
                            }
                        })
                }
                this.reset();
            },

        getStaffData(){
            axios.get('api/getStaff')
                .then(response=> {
                    if (response.data.status == 201){
                        this.staffData = response.data.data;
                        console.log(response);
                    }
                })
        },

        popupForm(){
            if(this.isPopupFormEnable == 'false'){
                this.isPopupFormEnable = 'true'
            }else {
                this.isPopupFormEnable = 'false'
            }

        },
        getUpdateData(event){
            let self = this;
            this.staffData.forEach(function (value) {
                if (value.id == event.target.id){
                    self.staff = value;

                }
            });
            this.popupForm();
        },
        viewStaff(event){
            let self = this;
            this.staffData.forEach(function (value) {
                if (value.id == event.target.id) {
                    self.viewStaffData = value;

                }
            });
        },
        deleteStaff(event){
            let self = this;
            if (confirm("Are you sure you want delete Staff?")) {
                axios.get('api/deleteStaff/' + event.target.id)
                    .then(response => {
                        if (response.data.status == 201) {
                            alert('successfully deleted Student')
                        }
                    })
                this.getStaffData();
            }
        },
        cancel(){
            this.popupForm();
            this.reset();
        },
        reset(){
            this.staff = {
                first_name: "",
                last_name: "",
                registration_id: "",
                email: "",
                phone_number: "",
                address: "",
                position: ""

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
