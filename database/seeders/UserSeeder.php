<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    public function run() {
        DB::statement("CREATE TABLE IF NOT EXISTS `user` (
            `username` varchar(50) NOT NULL,
            `password` text NOT NULL,
            `extend` text NOT NULL,
            `status` varchar(50) NOT NULL
        ) ENGINE=InnoDB");
        
        if(DB::table('user')->count() == 0) {
            DB::table('user')->insert([
                ['username'=>'admin','password'=>Hash::make('admin123'),'extend'=>'dummy','status'=>'admin'],
                ['username'=>'user1','password'=>Hash::make('user123'),'extend'=>'dummy','status'=>'user'],
            ]);
        }
    }
}
