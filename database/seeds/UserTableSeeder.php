<?php
/**
 * Created by PhpStorm.
 * User: Santiago Ortega
 * Date: 18/03/2015
 * Time: 06:17 PM
 */

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    public function run(){
         \DB::table('users')->insert(array(
            'name'=>'Santiago',
             'email'=>'asortega@unicauca.edu.co',
             'password'=>\Hash::make('secret')
         ));
    }
}