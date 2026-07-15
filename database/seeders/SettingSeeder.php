<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'app_name' => 'Admin Laravel',
            'copyright' => 'Admin Laravel ||2026',
            'login_title' => 'Admin Laravel',
            'keywords' => 'root admin, laravel core system, dashboard pusat, core panel, superadmin laravel, 
            manajemen sistem, arsitektur backend, kendali akses terpusat, starter kit laravel, sistem informasi eksekutif',
            'description' => 'Sistem inti panel admin dan dashboard pusat untuk manajemen data terpadu, 
            kendali hak akses superadmin, dan konfigurasi aplikasi modular',

        ]);
    }
}
