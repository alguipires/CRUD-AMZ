<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class User extends Seeder
{
    public function run()
    {
        $data = [
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
            'phone' => '42999001100',
            'cep' => '85065100',
            'street' => 'XV de novembro',
            'neighborhood' => 'Centro',
            'number_house' => '1000',
            'city' => 'Guarapuava',
            'state' => 'Paraná',
            'country' => 'Brasil',
        ];
        $this->db->table('users')->insert($data);
        
        $faker = Factory::create('pt_BR');
        for ($i = 1; $i <= 10; $i++) {
            $data = [
                'name' => $faker->firstName(),
                'email' => $faker->email(),
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'phone' => $faker->landlineNumber(false),
                'cep' => $faker->randomNumber(8, true),
                'street' => $faker->streetName(),
                'neighborhood' => $faker->citySuffix(),
                'number_house' => $faker->randomNumber(4, true),
                'city' => $faker->city(),
                'state' => $faker->state(),
                'country' => $faker->country(),
            ];
            $this->db->table('users')->insert($data);
        }
    }
}
