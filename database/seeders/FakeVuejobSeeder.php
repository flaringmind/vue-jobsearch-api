<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Vuejob;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FakeVuejobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        Vuejob::factory()
            ->count(20)
            ->state(new Sequence(
                fn (Sequence $sequence) => [
                    'type' => collect([
                        'Full-Time',
                        'Part-Time',
                        'Remote',
                        'Internship'
                    ])->random(),
                    'salary' => collect([
                        'under $50K',
                        '$50 - $60K',
                        '$60 - $70K',
                        '$70 - $80K',
                        '$80 - $90K',
                        '$90 - $100K',
                        '$100 - $125K',
                        '$125 - $150K',
                        '$150 - $175K',
                        '$175 - $200K',
                        'Over $200K',
                    ])->random(),
                    'company_id' => Company::all()->random(),
                ],
            ))
            ->create();
    }
}
