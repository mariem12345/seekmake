<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Admin::updateOrCreate(['username'=>'admin'],['username'=>'admin','password'=>'admin','status'=>'1']);
    }
}
