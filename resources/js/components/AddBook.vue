<template>
    <div>

        <h1 v-if="isPopupFormEnable=='true'">Add Book</h1>

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
                    <h3>BOOK </h3>
                </div>
            </div>

        </form>

        <form @submit.prevent="addBook()" method="post" v-if="isPopupFormEnable=='true'">
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="book_name">Book name</label>
                    <input type="text" class="form-control" id="book_name" placeholder="Book Name"
                           v-model="book.book_name">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="author_name">Author name</label>
                    <input type="text" class="form-control" id="author_name" placeholder="author_name Name"
                           v-model="book.author_name">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="book_id">Book Id</label>
                    <input type="number" class="form-control" id="book_id" placeholder="Book Id" v-model="book.book_id">
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" placeholder="Price" v-model="book.price">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="publication">Publication </label>
                    <input type="text" class="form-control" id="publication" placeholder="Publication"
                           v-model="book.publication">
                </div>
            </div>


            <button class="btn btn-primary" type="submit">Submit form</button>
            <button class="btn btn-primary" type="button" @click="cancel()">Cancel</button>
        </form>

        <br v-if="isPopupFormEnable == 'true'">
        <br v-if="isPopupFormEnable == 'true'">

        <button class="btn btn-success btn-sm buttonLeft" type="button" @click="popupForm()"
                v-if="isPopupFormEnable == 'false'">Add Book
        </button>
        <br>

        <br>

        <table class="table table-striped" v-if="isPopupFormEnable == 'false'">
            <thead class="thead-dark tablecenterheadCSS th">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Book Name <i class="fa fa-sort"></i></th>
                <th scope="col">Book ID</th>
                <th scope="col">Author</th>
                <!--            <th sope ="col">Price</th>-->
                <!--            <th sope ="col">Publication</th>-->
                <th sope="col">Action</th>

            </tr>
            </thead>

            <tbody class="tablecenterCSS td">
            <!--        <tr v-for="data in bookData"  >-->
            <tr v-for="item in resultQuery" v-bind:key="item.id">
                <th scope="row">{{ item.id }}</th>
                <td>{{ item.book_name }}</td>
                <td>{{ item.book_id }}</td>
                <td>{{ item.author_name }}</td>
                <!--            <td>{{item.price}}</td>-->
                <!--            <td>{{item.publication}}</td>-->
                <td>

                    <button class="btn btn-success" @click="getUpdateData(item.id)" v-bind:id="item.id"><span
                        class="fa fa-edit"></span></button>
                    <!--                <button class="btn btn-danger"> Delete</button>-->
                    <button class="btn btn-info" @click="viewBook(item.id)" v-bind:id="item.id" data-toggle="modal"
                            data-target="#exampleModalCenter"><span class="fa fa-eye"></span></button>
                    <button class="btn btn-danger" @click="deleteBook($event)" v-bind:id="item.id"><span
                        class="fa fa-trash"></span></button>

                </td>

            </tr>
            </tbody>

        </table>

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">More Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul v-for="(value, name) in viewBookData">
                            <li>{{ name }} : {{ value }}</li>
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
    name: "AddBook",
    data() {
        return {
            book: {
                book_name: "",
                author_name: "",
                book_id: "",
                price: "",
                publication: ""

            },
            isPopupFormEnable: 'false',
            bookData: [],
            viewBookData: [],
            searchQuery: null

        }
    },
    created() {
        this.getBookData();
    },
    computed: {
        resultQuery() {
            if (this.searchQuery) {
                return this.bookData.filter((item) => {
                    return this.searchQuery.toLowerCase().split(' ').every(v => item.book_id.toLowerCase().includes(v))
                })
            } else {
                return this.bookData;
            }
        }
    },
    methods: {
        addBook() {
            if (this.book.id) {
                axios.post('api/updateBook', this.book)
                    .then(response => {
                        if (response.data.status == 200) {
                            alert('successfully Updated Book')
                        }
                    })
            } else {
                axios.post('api/addBook', this.book)
                    .then(response => {
                        if (response.data.status == 201) {
                            alert('successfully created Book')
                        }
                    })
            }
            this.reset();
        },

        getBookData() {
            axios.get('api/getBook')
                .then(response => {
                    if (response.data.status == 201) {
                        this.bookData = response.data.data;
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
        getUpdateData(id) {
            let self = this;
            this.bookData.forEach(function (value) {
                if (value.id == id) {
                    self.book = value;

                }
            });
            this.popupForm();
        },
        viewBook(id) {
            let self = this;
            this.bookData.forEach(function (value) {
                if (value.id == id) {
                    self.viewBookData = value;

                }
            });
        },

        deleteBook(event) {
            let self = this;
            if (confirm("Are you sure you want delete Book?")) {
                axios.get('api/deleteBook/' + event.target.id)
                    .then(response => {
                        if (response.data.status == 201) {
                            alert('successfully deleted Book')
                        }
                    })
                this.getBookData();
            }
        },
        cancel(){
            this.popupForm();
            this.reset();
        },
        reset() {
            this.book = {
                book_name: "",
                author_name: "",
                book_id: "",
                price: "",
                publication: ""
            }
            this.isPopupFormEnable = 'false';
        }
    }

}
</script>

<style scoped>
.buttonLeft {
    margin: 0;
    position: absolute;
    left: 90%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}

.tablecenterheadCSS th {
    text-align: center;
}

.tablecenterCSS td {
    text-align: center;
}
</style>
