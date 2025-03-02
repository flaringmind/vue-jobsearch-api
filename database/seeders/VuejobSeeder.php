<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Vuejob;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VuejobSeeder extends Seeder
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


//        DB::table('vuejobs')->insert([
//            "title" => "Senior Vue Developer",
//            "type" => "Full-Time",
//            "description" => "We are seeking a talented Front-End Developer to join our team in Boston, MA. The ideal candidate will have strong skills in HTML, CSS, and JavaScript, with experience working with modern JavaScript frameworks such as Vue or Angular.",
//            "location" => "Boston, MA",
//            "salary" => "$70K - $80K",
//            "company_id" => 1,
//            "user_id" => 1,
//        ]);
//        DB::table('vuejobs')->insert([
//            "title" => "Front-End Engineer (Vue)",
//            "type" => "Full-Time",
//            "description" => "Join our team as a Front-End Developer in sunny Miami, FL. We are looking for a motivated individual with a passion for crafting beautiful and responsive web applications. Experience with UI/UX design principles and a strong attention to detail are highly desirable.",
//            "location" => "Miami, FL",
//            "salary" => "$70K - $80K",
//            "company_id" => 2,
//            "user_id" => 1,
//        ]);
//        DB::table('vuejobs')->insert([
//            "title" => "Vue.js Developer",
//            "type" => "Full-Time",
//            "description" => "Are you passionate about front-end development? Join our team in vibrant Brooklyn, NY, and work on exciting projects that make a difference. We offer competitive compensation and a collaborative work environment where your ideas are valued.",
//            "location" => "Brooklyn, NY",
//            "salary" => "$70K - $80K",
//            "company_id" => 3,
//            "user_id" => 1,
//        ]);
//        DB::table('vuejobs')->insert([
//            "title" => "Vue Front-End Developer",
//            "type" => "Part-Time",
//            "description" => "Join our team as a Part-Time Front-End Developer in beautiful Pheonix, AZ. We are looking for a self-motivated individual with a passion for creating engaging user experiences. This position offers flexible hours and the opportunity to work remotely.",
//            "location" => "Pheonix, AZ",
//            "salary" => "$60K - $70K",
//            "company_id" => 1,
//            "user_id" => 1,
//        ]);
//        DB::table('vuejobs')->insert([
//            "title" => "Full Stack Vue Developer",
//            "type" => "Full-Time",
//            "description" => "Exciting opportunity for a Full-Time Front-End Developer in bustling Atlanta, GA. We are seeking a talented individual with a passion for building elegant and scalable web applications. Join our team and make an impact!",
//            "location" => "Atlanta, GA",
//            "salary" => "$90K - $100K",
//            "company_id" => 4,
//            "user_id" => 1,
//        ]);
//        DB::table('vuejobs')->insert([
//            "title" => "Vue Native Developer",
//            "type" => "Full-Time",
//            "description" => "Join our team as a Front-End Developer in beautiful Portland, OR. We are looking for a skilled and enthusiastic individual to help us create innovative web solutions. Competitive salary and great benefits package available.",
//            "location" => "Portland, OR",
//            "salary" => "$100K - $110K",
//            "company_id" => 2,
//            "user_id" => 1,
//        ]);
    }
}
