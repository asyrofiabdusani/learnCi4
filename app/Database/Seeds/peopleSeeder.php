<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class peopleSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            $faker = \Faker\Factory::create('id_ID');

            $datetime = Time::createFromTimestamp($faker->unixTime($max = 'now'));

            $data = [
                'name' => $faker->name,
                'alamat'    => $faker->address,
                'created_at' => $datetime,
                'updated_at' => $datetime
            ];

            // Simple Queries
            // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

            // Using Query Builder
            $this->db->table('people')->insert($data);
        }
    }
}