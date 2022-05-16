<?php

namespace Database\Seeders;

use App\Models\University;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid as RamseyUuid;

class UniversitySeeder extends Seeder
{
    protected $universities = [];

    public function run(): void
    {
        $this->universities = json_decode(file_get_contents("database/seeders/data/universities.json"), true);
        $this->universities = array_slice($this->universities, 0, 100);
        
        $universities = [];

        foreach ($this->universities as $university) {
            array_push($universities, [
                'id' =>  (string) RamseyUuid::uuid4(),
                'alpha_two_code' => $university['alpha_two_code'],
                'domains' => json_encode($university['domains']),
                'country' => $university['country'],
                'state_province' => $university['state-province'],
                'web_pages' => json_encode($university['web_pages']),
                'name' => $university['name'],
            ]);
        }

        University::insert($universities, ['id', 'alpha_two_code', 'domains', 'country', 'state_province', 'web_pages', 'name']);
    }
}
