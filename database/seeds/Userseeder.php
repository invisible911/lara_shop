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
        $user = new \App\User([
        	'name'  => 'admin1',
        	'email' => 'admin1@shop.com',
        	'password' => '$2y$10$xgLr4NTKILCUYX4ff2O9pO5if72GaJV5QxaEQgiAGfbRRDQOLGU.6',//admin_pass
        	'isadmin' => true
        ]);

        $user->save();

        $user = new \App\User([
            'name'  => 'invi',
            'email' => '190724@qq.com',
            'password' => '$2y$10$nNgMYUyFCILgxEagVADqCuoCp2d4.WfOCnJrpZWPV/Ncv1lOFGuLa',//password
            'isadmin' => false
        ]);

        $user->save();
    }
}
