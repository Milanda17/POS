<?php

use Illuminate\Database\Seeder;

class Staff extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("staff")->insert([
            [
                'first_name'=>'sineth',
                'last_name'=>'kodikara',
                'registration_id'=>'234',
                'email'=>'sineth@gmail.com',
                'phone_number'=>'0725345678',
                'address'=>'no 56, Dambulla',
                'position'=>'PO'

            ]
        ]);

    }

}
