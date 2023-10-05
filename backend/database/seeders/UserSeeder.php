<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //manager
        $user = new User();
        $user->name = 'ผู้จัดการ เคร่งขรึม';
        $user->email = 'manager@car.com';
        $user->password = bcrypt('12345678');
        $user->phone_number = '0812345678';
        $user->role = 'manager';
        $user->save();

        //staff
        $user = new User();
        $user->name = 'พนักงาน สมหวัง';
        $user->email = 'staff@car.com';
        $user->password = bcrypt('12345678');
        $user->phone_number = '0812345678';
        $user->role = 'staff';
        $user->save();

        //customer
        $user = new User();
        $user->name = 'ลูกค้า สมบูรณ์';
        $user->email = 'user@car.com';
        $user->password = bcrypt('12345678');
        $user->phone_number = '0812345678';
        $user->role = 'user';
        $user->save();

        //random staff
        $s_name = ['Benzema', 'Rolando', 'Ronaldo', 'Messi', 'Neymar', 'Suarez',
                 'Ramos', 'Bale', 'Modric', 'Kroos', 'Marcelo', 'Carvajal', 
                 'Varane', 'Isco'];
        for ($i = 0; $i < 14; $i++) {
            $user = new User();
            $user->name = 'พนักงาน ' . $s_name[$i];
            $user->email = 'staff' . $s_name[$i] . '@car.com';
            $user->password = bcrypt('12345678');
            $user->phone_number = '08' . fake()->numerify('########');
            $user->role = 'staff';
            $user->save();
        }
    }
}
