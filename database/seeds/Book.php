<?php

use Illuminate\Database\Seeder;

class Book extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("book")->insert([
            [
                'book_name'=>'ABC',
                'author_name'=>'CDF',
                'book_id'=>'234',
                'price'=>'560',
                'publication'=>'HJK'


            ]
        ]);


    }
}
