<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $adminRole = new Role();
     	$adminRole->name = "admin";
     	$adminRole->display_name = "Admin SeeTours";
     	$adminRole->save();    

     	
		$admin = new User();
		$admin->name = 'Admin SeeTours';
		$admin->email = 'admin@gmail.com';
		$admin->password = bcrypt('rahasia');
		$admin->save();
		$admin->attachRole($adminRole);

        $karyawan1Role = new Role();
        $karyawan1Role->name = "karyawan1";
        $karyawan1Role->display_name = "Karyawan SeeTours 1";
        $karyawan1Role->save();    

        
        $karyawan1 = new User();
        $karyawan1->name = 'Karyawan SeeTours 1';
        $karyawan1->email = 'karyawan1@gmail.com';
        $karyawan1->password = bcrypt('rahasia1');
        $karyawan1->save();
        $karyawan1->attachRole($karyawan1Role);

        $karyawan2Role = new Role();
        $karyawan2Role->name = "karyawan2";
        $karyawan2Role->display_name = "Karyawan SeeTours 2";
        $karyawan2Role->save();    

        
        $karyawan2 = new User();
        $karyawan2->name = 'Karyawan SeeTours 2';
        $karyawan2->email = 'karyawan2@gmail.com';
        $karyawan2->password = bcrypt('rahasia2');
        $karyawan2->save();
        $karyawan2->attachRole($karyawan2Role);


    }
}
