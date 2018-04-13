<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Droit;
use App\Personnel;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $droit_admin=Droit::all();
        $personnel_admin=Personnel::where('nom','test')->first();
        $admin=new User();
        $admin->username='admin';
        $admin->password=bcrypt('admin');
        $admin->personnel()->associate($personnel_admin);
        $admin->save();
        $admin->droits()->attach($droit_admin);
    }
}
