<?php

use Illuminate\Database\Seeder;
use App\Admin;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $Admin = new Admin();
        $Admin->name = 'Bahar Hanım';
        $Admin->email = 'bahar@rdglobal.com.tr';
        $Admin->title = 'Yönetici Hesabı';
        $Admin->password = Hash::make('baharinvrd6210');
        $Admin->save();
    }
}

