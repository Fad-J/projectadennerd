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

        // Buat tabel peminjaman
        DB::statement("CREATE TABLE IF NOT EXISTS `peminjaman` (
            `id` int NOT NULL AUTO_INCREMENT,
            `username` varchar(50) NOT NULL,
            `id_buku` int NOT NULL,
            `tanggal_pinjam` date NOT NULL,
            `tanggal_kembali` date DEFAULT NULL,
            `status` varchar(50) NOT NULL DEFAULT 'Dipinjam',
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
        
        // Insert admin default kalau tabel kosong
        if (DB::table('user')->count() == 0) {
            $hash = Hash::make('admin123');
            $split = str_split($hash, 30);
            DB::table('user')->updateOrinsert(
                ['username' => 'admin'],
                [
                'password' => $split[0],
                'extend'   => $split[1],
                'status'   => 'admin'
                ]
            );
            // Tambah akun user default
            $hash2 = Hash::make('user123');
            $split2 = str_split($hash2, 30);
            DB::table('user')->updateOrInsert(
                ['username' => 'user1'],
                [
                    'password' => $split2[0],
                    'extend'   => $split2[1],
                    'status'   => 'user'
                ]
            );
        }
    }
}
