<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        DB::table('vuejobs')->insert([
            "title" => "Senior Vue Developer",
            "type" => "Full-Time",
            "description" => "We are seeking a talented Front-End Developer to join our team in Boston, MA. The ideal candidate will have strong skills in HTML, CSS, and JavaScript, with experience working with modern JavaScript frameworks such as Vue or Angular.",
            "location" => "Boston, MA",
            "salary" => "$70K - $80K",
            "company_id" => 1,
            "user_id" => 1,
        ]);
        DB::table('vuejobs')->insert([
            "title" => "Front-End Engineer (Vue)",
            "type" => "Full-Time",
            "description" => "Join our team as a Front-End Developer in sunny Miami, FL. We are looking for a motivated individual with a passion for crafting beautiful and responsive web applications. Experience with UI/UX design principles and a strong attention to detail are highly desirable.",
            "location" => "Miami, FL",
            "salary" => "$70K - $80K",
            "company_id" => 2,
            "user_id" => 1,
        ]);
        DB::table('vuejobs')->insert([
            "title" => "Vue.js Developer",
            "type" => "Full-Time",
            "description" => "Are you passionate about front-end development? Join our team in vibrant Brooklyn, NY, and work on exciting projects that make a difference. We offer competitive compensation and a collaborative work environment where your ideas are valued.",
            "location" => "Brooklyn, NY",
            "salary" => "$70K - $80K",
            "company_id" => 3,
            "user_id" => 1,
        ]);
        DB::table('vuejobs')->insert([
            "title" => "Vue Front-End Developer",
            "type" => "Part-Time",
            "description" => "Join our team as a Part-Time Front-End Developer in beautiful Pheonix, AZ. We are looking for a self-motivated individual with a passion for creating engaging user experiences. This position offers flexible hours and the opportunity to work remotely.",
            "location" => "Pheonix, AZ",
            "salary" => "$60K - $70K",
            "company_id" => 1,
            "user_id" => 1,
        ]);
        DB::table('vuejobs')->insert([
            "title" => "Full Stack Vue Developer",
            "type" => "Full-Time",
            "description" => "Exciting opportunity for a Full-Time Front-End Developer in bustling Atlanta, GA. We are seeking a talented individual with a passion for building elegant and scalable web applications. Join our team and make an impact!",
            "location" => "Atlanta, GA",
            "salary" => "$90K - $100K",
            "company_id" => 4,
            "user_id" => 1,
        ]);
        DB::table('vuejobs')->insert([
            "title" => "Vue Native Developer",
            "type" => "Full-Time",
            "description" => "Join our team as a Front-End Developer in beautiful Portland, OR. We are looking for a skilled and enthusiastic individual to help us create innovative web solutions. Competitive salary and great benefits package available.",
            "location" => "Portland, OR",
            "salary" => "$100K - $110K",
            "company_id" => 2,
            "user_id" => 1,
        ]);
    }
}
