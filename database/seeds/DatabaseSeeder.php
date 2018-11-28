<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'email'=>'admin@gmail.com',
        	'password'=>bcrypt('123456'),
        	'fullname'=>'Pham Van Tung ',
        	'level'=>'1',
            'phoneNumber' => '0981987981',
            'birthDay' => '1989-10-20',
        	]);
        // DB::table('courses')->insert([
        // 	'nameCourse'=> 'Lập trình hướng đối tượng',
        // 	]);
        // DB::table('assigment')->insert([
        // 	'idUser'=> '1',
        // 	'idCourse' => '19',
        // 	'timeStart'=>
        // 	]);

       	
       	

    }
}
