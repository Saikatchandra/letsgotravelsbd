<?php

use App\CompanyConfiguration;
use Illuminate\Database\Seeder;

class CompanyConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyConfiguration::insert([
            'company_name' => 'Stark Industries',
            'logo' => 'default.png',
            'address' => 'albania',
            'phone_number1' => '64314651651',
            //'phone_number2' => '431451544',
            'email' => 'test@gmail.com',
          //  'facebook' => '/starkindus',
            //'google_map' => 'Stark_Industries,albania',
            'about_us' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using  making it look like readable English.',
            'short_about_us' => 'type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged',
           ]);
    }
}
