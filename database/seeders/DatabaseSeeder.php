<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database with initial users and feature dummy data.
     */
    public function run(): void
    {
        // 1. Akun Role Admin (Untuk Login & Akses Halaman Admin)
        User::updateOrCreate(
            ['email' => 'admin@ebmd.ac.id'],
            [
                'name' => 'Hendra Setiawan (Admin Diskominfo)',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin@bandung.go.id'],
            [
                'name' => 'Admin Diskominfo Kota Bandung',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Akun Role Surveyor (Untuk Login & Akses Halaman Surveyor)
        User::updateOrCreate(
            ['email' => 'surveyor@ebmd.ac.id'],
            [
                'name' => 'Budi Pratama (Surveyor Lapangan)',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        );

        User::updateOrCreate(
            ['email' => 'surveyor@bandung.go.id'],
            [
                'name' => 'Surveyor Diskominfo Kota Bandung',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        );

        // 3. Admin Role Seeders (Frontend Dummy Data)
        $this->call([
            \Database\Seeders\Admin\AdminDashboardSeeder::class,
            \Database\Seeders\Admin\AdminPengadaanSeeder::class,
            \Database\Seeders\Admin\AdminUserSeeder::class,
            \Database\Seeders\Admin\AdminMonitoringSeeder::class,
            \Database\Seeders\Admin\AdminInboxSeeder::class,
            \Database\Seeders\Admin\AdminPengaturanSeeder::class,
        ]);

        // 4. Surveyor Role Seeders (Frontend Dummy Data)
        $this->call([
            \Database\Seeders\Surveyor\SurveyorDashboardSeeder::class,
            \Database\Seeders\Surveyor\SurveyorSensusSeeder::class,
            \Database\Seeders\Surveyor\SurveyorRiwayatSeeder::class,
            \Database\Seeders\Surveyor\SurveyorInboxSeeder::class,
            \Database\Seeders\Surveyor\SurveyorPengaturanSeeder::class,
        ]);
    }
}
