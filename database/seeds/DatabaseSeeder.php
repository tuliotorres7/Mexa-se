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
            'cpf'=> '123456788',
            'nome'=>'uala',
            'instrutor'=>'',
            'email'=>'joao2@sistem.com',
            'password'=> env('PASSWORD_HASH') ? bcrypt('1234'): '1234',
 ]);

        // $this->call(UserSeeder::class);
    }
}
