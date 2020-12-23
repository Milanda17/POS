<?php

use Illuminate\Database\Seeder;

class Issue extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("issue")->insert([
            [
                'user_type'=>'staff',
                'user_id'=>'00789',
                'book_id'=>'234',
                'book_name'=>'ABC',
                'issue_day'=>'2020/10/11',
                'how_many_days'=>'5',
                'return_day'=>'2020/10/20'


            ]
        ]);



    }
}
