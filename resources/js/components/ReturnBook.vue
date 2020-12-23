<template>
    <div>

        <h1>Return Book</h1>
        <form class="form-inline mr-auto">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search"
                   v-model="searchQuery">
            <button class="btn btn-outline-success btn-rounded btn-sm my-0" type="submit"><span class="fa fa-search"></span> Search</button>
        </form>

        <br>
        <table class="table table-striped">
            <thead class="thead-dark tablecenterheadCSS th">
            <tr>
                <th scope="col">#</th>
                <th scope="col">User Type</th>
                <th scope="col">User ID</th>
                <th scope="col">Book ID</th>
                <th scope="col">Book Name</th>
                <th scope="col">Issue Date</th>
                <th sope="col">Return Date</th>
<!--                <th sope="col">Action</th>-->

            </tr>
            </thead>
            <tbody class="tablecenterCSS td">

            <!--            <tr v-for="data in issue">-->
            <tr v-for="item in resultQuery" v-if="item.return == true">
                <th scope="row">{{ item.id }}</th>
                <td>{{ item.user_type }}</td>
                <td>{{ item.user_id }}</td>
                <td>{{ item.book_id }}</td>
                <td>{{ item.book_name }}</td>
                <td>{{ item.issue_day }}</td>
                <td>{{ item.return_day }}</td>
<!--                <td>-->
<!--                    <button class="btn btn-success">Renew</button>-->
<!--                    <button class="btn btn-danger" @click="returnBook($event)" v-bind:id="item.id">Return</button>-->
<!--                </td>-->

            </tr>

            </tbody>
        </table>


    </div>

</template>

<script>
export default {
    name: "ReturnBook",
    data() {
        return {
            issue: [],
            searchQuery: null

        }
    },
    created() {
        let self = this;
        axios.get('/api/test1')
            .then(response => {
                /*  alert(response) ;*/
                console.log(response);
                self.issue = response.data

            });
    },

    computed: {
        resultQuery() {
            if (this.searchQuery) {
                return this.issue.filter((item) => {
                    return this.searchQuery.toLowerCase().split(' ').every(v => item.user_id.toLowerCase().includes(v))
                })
            } else {
                return this.issue;
            }
        }
    },

    // methods:{
    //     returnBook(event){
    //         axios.get('api/returnBook/'+event.target.id).then(response=>{
    //             alert('successfully Returned Book')
    //         })
    //
    //     }
    // }
}
</script>

<style scoped>
.tablecenterheadCSS th{
    text-align:center;
}
.tablecenterCSS td{
    text-align:center;
}
</style>
