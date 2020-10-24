<?php

use Illuminate\Database\Seeder;

class SeedUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vpassword = Hash::make('0000');//test password
        //
        DB::table('users')->insert(['id' => 1,'name'=>'atemp-admin',
            'role'=> 'admin',
            'role_id'=>NULL,
            'expire'=>'2080-09-20',
            'is_active'=>true,
            'email'=> 'admin@admin.com',
            'password'=> $vpassword, //'$2y$10$c/Mn8WmG5A7gmMbyvhLWUOf8a2CA8v4wuAu0/IK104rVyJzKfEZtW',//Test11
            'remember_token'=>'0abG9txH5xAjPimB3DwQipZsKiYkMAB33V5S9w0uOjJLcnnohV2Mt3LSWvM4']);
        DB::table('users')->insert(['id' => 2,'name'=>'atemp-student',
            'role'=> 'student',
            'role_id'=>NULL,
            'expire'=>'2080-09-20',
            'is_active'=>true,
            'email'=> 'student@student.com',
            'password'=> $vpassword,
            'remember_token'=>'0abG9txH5xAjPimB3DwQipZsKiYkMAB33V5S9w0uOjJLcnnohV2Mt3LSWvM1'
        ]);
        DB::table('users')->insert(['id' => 3,'name'=>'atemp-tutor',
            'role'=> 'tutor',
            'role_id'=>NULL,
            'expire'=>'2080-09-20',
            'is_active'=>true,
            'email'=> 'tutor@tutor.com',
            'password'=> $vpassword,
            'remember_token'=>'0abG9txH5xAjPimB3DwQipZsKiYkMAB33V5S9w0uOjJLcnnohV2Mt3LSWvM1'
        ]);




        DB::table('users')->insert(['id' => 4,'name'=>'atemp-author',
            'role'=> 'author',
            'role_id'=>NULL,
            'expire'=>'2080-09-20',
            'is_active'=>true,
            'email'=> 'author@author.com',
            'password'=> $vpassword,
            'remember_token'=>'0abG9txH5xAjPimB3DwQipZsKiYkMAB33V5S9w0uOjJLcnnohV2Mt3LSWvM2'
        ]);

        DB::table('users')->insert(['id' => 5,'name'=>'user',
            'role'=> 'author',
            'role_id'=>NULL,
            'expire'=>'2080-09-20',
            'is_active'=>true,
            'email'=> 'test@test.com',
            'password'=> $vpassword,
            'remember_token'=>'0abG9txH5xAjPimB3DwQipZsKiYkMAB33V5S9w0uOjJLcnnohV2Mt3LSWvM2'
        ]);



    }
}
