<?php

use Illuminate\Database\Seeder;
use App\Entities\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        #aqui compoe o BD
        User::create([
            'cpf'=> '1234',
            'nome'=>'admin',
            'instrutor'=>'',
            'email'=>'admin@admin.com',
            'password'=> env('PASSWORD_HASH') ? bcrypt('1234'): '1234',
 ]);

        // $this->call(UserSeeder::class);
    }
}
