<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App/Setting::create([
            'blog_name'=>'laravel',
            'phone'=>'00967733643099',
            'blog_email'=>'ahmed@gmail.com',
            'address'=>'kulmbach-germany'
        ]);
    }
}
