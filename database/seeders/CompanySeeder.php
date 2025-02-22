<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            "name" => "NewTek Solutions",
            "description" => "NewTek Solutions is a leading technology company specializing in web development and digital solutions. We pride ourselves on delivering high-quality products and services to our clients while fostering a collaborative and innovative work environment.",
            "contactEmail" => "contact@teksolutions.com",
            "contactPhone" => "555-555-5555"
        ]);
        DB::table('companies')->insert([
            "name" => "Veneer Solutions",
            "description" => "Veneer Solutions is a creative agency specializing in digital design and development. Our team is dedicated to pushing the boundaries of creativity and innovation to deliver exceptional results for our clients.",
            "contactEmail" => "contact@loremipsum.com",
            "contactPhone" => "555-555-5555"
        ]);
        DB::table('companies')->insert([
            "name" => "Dolor Cloud",
            "description" => "Dolor Cloud is a leading technology company specializing in digital solutions for businesses of all sizes. With a focus on innovation and customer satisfaction, we are committed to delivering cutting-edge products and services.",
            "contactEmail" => "contact@dolorsitamet.com",
            "contactPhone" => "555-555-5555"
        ]);
        DB::table('companies')->insert([
            "name" => "Browning Technologies",
            "description" => "Browning Technologies is a rapidly growing technology company specializing in e-commerce solutions. We offer a dynamic and collaborative work environment where employees are encouraged to think creatively and innovate.",
            "contactEmail" => "contact@consecteturadipisicing.com",
            "contactPhone" => "555-555-5555"
        ]);

    }
}
