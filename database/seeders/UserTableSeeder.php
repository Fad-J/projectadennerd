<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        // Buat tabel user kalau belum ada
        DB::statement("CREATE TABLE IF NOT EXISTS `user` (
            `username` varchar(50) NOT NULL,
            `password` text NOT NULL,
            `extend` text NOT NULL,
            `status` varchar(50) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci");

        // Insert admin default kalau tabel kosong
        if (DB::table('user')->count() == 0) {
            $hash = Hash::make('admin123');
            $split = str_split($hash, 30);
            DB::table('user')->insert([
                'username' => 'admin',
                'password' => $split[0],
                'extend'   => $split[1],
                'status'   => 'admin'
            ]);
        }
    }
}
