<?php

use Illuminate\Database\Seeder;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
       //DB::table('users')->truncate();

        $user = new \App\User([
        	'name'  => 'admin1',
        	'email' => 'admin1@laravelshop.com',
        	'password' => bcrypt('admin_pass'),
        	'isadmin' => true
        ]);

        $user->save();

        $user = new \App\User([
            'name'  => 'invi',
            'email' => '190724@qq.com',
            'password' => bcrypt('password'),
            'isadmin' => false
        ]);

        $user->save();
    }
}
