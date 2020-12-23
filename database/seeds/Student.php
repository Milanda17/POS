<?php

use Illuminate\Database\Seeder;

class Student extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("students")->insert([
            [
                'first_name'=>'rashmi',
                'last_name'=>'ishani',
                'register_id'=>'123',
                'email'=>'rashmi@gmail.com',
                'phone_number'=>'0717448148',
                'address'=>'No,84 Inamaluwa Dambulla',
                'city'=>'Dambulla',
                'age'=>'15',
                'grade'=>'07',
                'school'=>'Dambulla C.C ',
                'acer_literacy'=>'word',
                'acer_numeracy'=>'1 to 9'
            ]
        ]);

    }
}
