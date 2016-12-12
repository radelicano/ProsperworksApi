<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     $data = [
            [
                'id'           => '81709',
                'name'         => 'Kent Ronato',
                'email'        => 'kronato@tastradesoft.com',         
                'password'     => 'admintastradesoft',         
            ],
            [
                'id'           => '81461',
                'name'         => 'John Vernon Logan',
                'email'        => 'jlogan@tastradesoft.com',         
                'password'     => 'admintastradesoft',   
            ],
            [
                'id'           => '81463',
                'name'         => 'John Daniel de la Paz',
                'email'        => 'johnddlp@tastradesoft.com',         
                'password'     => 'admintastradesoft',   
            ],
            [
                'id'           => '104008',
                'name'         => 'Jay Isidro',
                'email'        => 'jisidro@tastradesoft.com',         
                'password'     => 'admintastradesoft',   
            ],
            [
                'id'           => '122001',
                'name'         => 'Michael Ceballos',
                'email'        => 'mceballos@tastradesoft.com',         
                'password'     => 'admintastradesoft',   
            ],
            [
                'id'           => '119979',
                'name'         => 'John Rider',
                'email'        => 'jrider@tastradesoft.com',         
                'password'     => 'admintastradesoft',   
            ],
            [
                'id'           => '119993',
                'name'         => 'Jinky Cango',
                'email'        => 'jcango@tastradesoft.com',         
                'password'     => 'admintastradesoft',   
            ],
            [
                'id'           => '110531',
                'name'         => 'Vicky Arulsingam',
                'email'        => 'vix@tastradesoft.com',         
                'password'     => 'admintastradesoft',   
            ],
            [
                'id'           => '103160',
                'name'         => 'James Acuin',
                'email'        => 'jmacuin@tastradesoft.com',         
                'password'     => 'admintastradesoft',   
            ],
        ];
        foreach ($data as $key)
        {
            User::create([
                'id'    => $key['id'],
                'name'     => $key['name'],
                'email'         => $key['email'],
                'password'      => bcrypt($key['password']),
               
            ]);
        }
    }
}