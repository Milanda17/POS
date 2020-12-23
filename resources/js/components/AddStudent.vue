<template>
    <div>
        <h1  v-if="isPopupFormEnable == 'true'">Add Students</h1>

        <form  v-if="isPopupFormEnable == 'false'">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search"
                                   v-model="searchQuery">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-outline-success btn-rounded btn-sm my-0" type="submit"><span
                                class="fa fa-search"></span> Search
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3>STUDENT </h3>
                </div>
            </div>
        </form>

        <form @submit.prevent="addStudent()" method="post" v-if="isPopupFormEnable == 'true' ">
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="first_name">First name</label>
                    <input type="text" class="form-control" id="first_name" placeholder="First name" v-model="student.first_name">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="last_name">Last name</label>
                    <input type="text" class="form-control" id="last_name" placeholder="Last name" v-model="student.last_name">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="register_id">Registration Id</label>
                    <input type="text" class="form-control" id="register_id" placeholder="Registration Id" v-model="student.register_id">
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Email" v-model="student.email">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="phone_number">Phone Number</label>
                    <input type="number" class="form-control" id="phone_number" placeholder="Phone Number" v-model="student.phone_number">
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="Address" v-model="student.address">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="city"> City</label>
                    <input type="text" class="form-control" id="city" placeholder="City" v-model="student.city">
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" id="age" placeholder="Age" v-model="student.age">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="grade"> Grade</label>
                    <input type="number" class="form-control" id="Grade" placeholder="Grade" v-model="student.grade">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="grade"> School</label>
                    <input type="text" class="form-control" id="School" placeholder="School" v-model="student.school">
                </div>
            </div>

            <div class="form-row">
                 <div class="col-md-6 mb-3">

                     <label for="acerLiteracyTest">Acer Literacy Test</label>

                        <select id="acerLiteracyTest" class="form-control" v-model="student.acer_literacy">
                            <option value="beginner">Beginner Level</option>
                            <option value="letter">Letter Level</option>
                            <option value="word">Word Level</option>
                            <option value="sentence">Sentence Level</option>
                            <option value="story">Story Level</option>

                        </select>
                 </div>
                <div class="col-md-6 mb-3">
                        <label for="acerNumeracyTest">Acer Numeracy Test</label>

                            <select id="acerNumeracyTest" class="form-control" v-model="student.acer_numeracy">
                                <option value="first">1 to 9 Level</option>
                                <option value="second">10 to 99 Level</option>
                                <option value="divide">Divide Level</option>
                                <option value="multiply">Multiply Level</option>

                            </select>
                </div>

            </div>


            <!--                <div class="col-md-6 mb-3">-->
            <!--                    <label for="acer_test"> Aser Test Result </label>-->
            <!--                    <input type="number" class="form-control" id="acer_test" placeholder="Acer Test Result" v-model="student.acer_test">-->
            <!--                </div>-->

            <button class="btn btn-primary" type="submit">Submit form</button>
            <button class="btn btn-primary" type="button" @click="cancel()">Cancel</button>
        </form>

        <button class="btn btn-success btn-sm buttonLeft" type="button" @click="popupForm()"  v-if="isPopupFormEnable == 'false'">Add Student</button>
        <br v-if="isPopupFormEnable == 'false'">
        <br v-if="isPopupFormEnable == 'false'">

        <table class="table table-striped"  v-if="isPopupFormEnable == 'false'">
            <thead class="thead-dark tablecenterheadCSS th">
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Register Id</th>
<!--                <th scope="col">Phone Number</th>-->
                <th scope="col">Address</th>
<!--                <th scope="col">City</th>-->
<!--                <th sope ="col">Email</th>-->
<!--                <th scope="col">Age</th>-->
                <th scope="col">Grade</th>
                <th scope="col">School</th>
<!--                <th scope="col">Acer Literacy Test</th>-->
<!--                <th scope="col">Acer Numeracy Test</th>-->
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody class="tablecenterCSS td">
            <tr v-for="item in resultQuery"  >
                <th scope="row">{{item.id}}</th>
                <td>{{item.first_name}}</td>
                <td>{{item.last_name}}</td>
                <td>{{item.register_id}}</td>
<!--                <td>{{item.phone_number}}</td>-->
                <td>{{item.address}}</td>
<!--                <td>{{item.city}}</td>-->
<!--                <td>{{item.email}}</td>-->
<!--                <td>{{item.age}}</td>-->
                <td>{{item.grade}}</td>
                <td>{{item.school}}</td>
<!--                <td>{{item.acer_literacy}}</td>-->
<!--                <td>{{item.acer_numeracy}}</td>-->

                <td>
                    <button class="btn btn-success" @click="getUpdateData($event)" v-bind:id="item.id"><span class="fa fa-edit"></span></button>
                    <button class="btn btn-info"  @click="viewStudent($event)" v-bind:id="item.id"  data-toggle="modal" data-target="#exampleModalCenter"><span class="fa fa-eye"></span></button>
                    <button class="btn btn-danger"  @click="deleteStudent($event)" v-bind:id="item.id"><span class="fa fa-trash"></span></button>

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
                       <ul v-for="(value, name) in viewStudentData">
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
    name: "AddStudent",
    data() {
        return {
            student: {
                first_name: "",
                last_name: "",
                register_id: "",
                email: "",
                phone_number: "",
                address: "",
                city: "",
                age: "",
                grade: "",
                school: "",
                acer_literacy: "",
                acer_numeracy: ""
            },
            isPopupFormEnable: 'false',
            studentData: [],
            viewStudentData:[],
            searchQuery: null,
        }
    },
    created() {
        this.getStudentData();
    },

    computed: {
        resultQuery() {
            if (this.searchQuery) {
                return this.studentData.filter((item) => {
                    return this.searchQuery.toLowerCase().split(' ').every(v => item.first_name.toLowerCase().includes(v))
                })
            } else {
                return this.studentData;
            }
        }
    },
    methods: {
        addStudent() {
            if (this.student.id) {
                axios.post('api/updateStudent', this.student)
                    .then(response => {
                        if (response.data.status == 200) {
                            alert('successfully Updated Student')
                        }
                    })
            } else {
                axios.post('api/addStudent', this.student)
                    .then(response => {
                        if (response.data.status == 201) {
                            alert('successfully created Student')


                        }
                    })
            }
            this.reset();
        },


        getStudentData() {
            axios.get('api/getStudent')
                .then(response => {
                    if (response.data.status == 201) {
                        this.studentData = response.data.data;
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
            this.studentData.forEach(function (value) {
                if (value.id == event.target.id) {
                    self.student = value;

                }
            });
            this.popupForm();
        },
        viewStudent(event){
            let self = this;
            this.studentData.forEach(function (value) {
                if (value.id == event.target.id) {
                    self.viewStudentData = value;

                }
            });
        },
        deleteStudent(event) {
            let self = this;
            if (confirm("Are you sure you want delete Student?")) {
                axios.get('api/deleteStudent/' + event.target.id)
                    .then(response => {
                        if (response.data.status == 201) {
                            alert('successfully deleted Student')
                        }
                    })
                this.getStudentData();
            }
        },
        cancel(){
            this.popupForm();
            this.reset();
        },
        reset() {
            this.student = {
                first_name: "",
                last_name: "",
                register_id: "",
                email: "",
                phone_number: "",
                address: "",
                city: "",
                age: "",
                grade: "",
                school: "",
                acer_literacy: "",
                acer_numeracy: ""

            }
            this.isPopupFormEnable = 'false';
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
