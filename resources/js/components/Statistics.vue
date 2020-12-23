<template>
    <div>
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Staff</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Book</a>
                    </li>


<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="#">Link</a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="#">Link</a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="#">Link</a>-->
<!--                    </li>-->
                </ul>
            </div>
            <div class="card-body">

                <div>
                    <GChart
                        type="ColumnChart"
                        :data="chartData"
                        :options="chartOptions"
                    />
                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {
name: "Statistics",

    data () {
        return {
            // Array will be automatically processed with visualization.arrayToDataTable function
            chartData: [
                ['Year', 'Student', 'Staff', 'Book'],
                ['January', 1000, 400, 200],
                ['February', 1170, 460, 250],
                ['March', 660, 1120, 300],
                ['April', 1030, 540, 350]
            ],
            chartOptions: {
                chart: {
                    title: 'Company Performance',
                    subtitle: 'Student, Staff, and Book: 2014-2017',
                }
            }
        }
    }
}
</script>

<style scoped>

</style>
