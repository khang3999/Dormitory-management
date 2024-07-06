<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        DB::table('students')->insert([
            [
                'MSSV' => 'S123456',
                'password' => Hash::make('password123'),
                'name' => 'Nguyen Van A',
                'cccd' => '123456789',
                'birthday' => '2000-01-01',
                'phone' => '0912345678',
                'mail' => 'nguyenvana@example.com',
                'nation' => 'Vietnam',
                'gender' => 1,
                'time' => now(),
                'note' => 'Note A',
                'address' => 'Address A',
                'type' => 1,
                'idphong'=>'1'
            ],
            [
                'MSSV' => 'S123457',
                'password' => Hash::make('password123'),
                'name' => 'Tran Thi B',
                'cccd' => '123456780',
                'birthday' => '2000-02-02',
                'phone' => '0912345679',
                'mail' => 'tranthib@example.com',
                'nation' => 'Vietnam',
                'gender' => 0,
                'time' => now(),
                'note' => 'Note B',
                'address' => 'Address B',
                'type' => 1,
                    'idphong'=>'1',
            ],
            [
                'MSSV' => 'S123458',
                'password' => Hash::make('password123'),
                'name' => 'Le Van C',
                'cccd' => '123456781',
                'birthday' => '2000-03-03',
                'phone' => '0912345680',
                'mail' => 'levanc@example.com',
                'nation' => 'Vietnam',
                'gender' => 1,
                'time' => now(),
                'note' => 'Note C',
                'address' => 'Address C',
                'type' => 1,
                'idphong'=>'1',
            ],
            [
                'MSSV' => 'S123459',
                'password' => Hash::make('password123'),
                'name' => 'Pham Thi D',
                'cccd' => '123456782',
                'birthday' => '2000-04-04',
                'phone' => '0912345681',
                'mail' => 'phamthid@example.com',
                'nation' => 'Vietnam',
                'gender' => 0,
                'time' => now(),
                'note' => 'Note D',
                'address' => 'Address D',
                'type' => 1,
                'idphong'=>'2',
            ],
            [
                'MSSV' => 'S123460',
                'password' => Hash::make('password123'),
                'name' => 'Hoang Van E',
                'cccd' => '123456783',
                'birthday' => '2000-05-05',
                'phone' => '0912345682',
                'mail' => 'hoangvane@example.com',
                'nation' => 'Vietnam',
                'gender' => 1,
                'time' => now(),
                'note' => 'Note E',
                'address' => 'Address E',
                'type' => 1,
                'idphong'=>'2',
            ],
            [
                'MSSV' => 'S123460',
                'password' => Hash::make('password123'),
                'name' => 'out 1',
                'cccd' => '123456783',
                'birthday' => '2000-05-05',
                'phone' => '0912345682',
                'mail' => 'hoangvane@example.com',
                'nation' => 'Vietnam',
                'gender' => 1,
                'time' => now(),
                'note' => 'Note E',
                'address' => 'Address E',
                'type' => 0,
                'idphong'=>'2',
            ],
            [
                'MSSV' => 'S123460',
                'password' => Hash::make('password123'),
                'name' => 'out 2',
                'cccd' => '123456783',
                'birthday' => '2000-05-05',
                'phone' => '0912345682',
                'mail' => 'hoangvane@example.com',
                'nation' => 'Vietnam',
                'gender' => 1,
                'time' => now(),
                'note' => 'Note E',
                'address' => 'Address E',
                'type' => 0,
                'idphong'=>'2',
            ],
            [
                'MSSV' => 'S123460',
                'password' => Hash::make('password123'),
                'name' => 'out3',
                'cccd' => '123456783',
                'birthday' => '2000-05-05',
                'phone' => '0912345682',
                'mail' => 'hoangvane@example.com',
                'nation' => 'Vietnam',
                'gender' => 1,
                'time' => now(),
                'note' => 'Note E',
                'address' => 'Address E',
                'type' => 0,
                'idphong'=>'2',
            ],
            [
                'MSSV' => 'S123460',
                'password' => Hash::make('password123'),
                'name' => 'in 1',
                'cccd' => '123456783',
                'birthday' => '2000-05-05',
                'phone' => '0912345682',
                'mail' => 'hoangvane@example.com',
                'nation' => 'Vietnam',
                'gender' => 1,
                'time' => now(),
                'note' => 'Note E',
                'address' => 'Address E',
                'type' => 2,
                 'idphong'=>null,
                
            ],
            [
                'MSSV' => 'S123460',
                'password' => Hash::make('password123'),
                'name' => 'in 2',
                'cccd' => '123456783',
                'birthday' => '2000-05-05',
                'phone' => '0912345682',
                'mail' => 'hoangvane@example.com',
                'nation' => 'Vietnam',
                'gender' => 1,
                'time' => now(),
                'note' => 'Note E',
                'address' => 'Address E',
                'type' => 2,
                 'idphong'=>null,
                
            ],
            [
                'MSSV' => 'S123460',
                'password' => Hash::make('password123'),
                'name' => 'in 3',
                'cccd' => '123456783',
                'birthday' => '2000-05-05',
                'phone' => '0912345682',
                'mail' => 'hoangvane@example.com',
                'nation' => 'Vietnam',
                'gender' => 1,
                'time' => now(),
                'note' => 'Note E',
                'address' => 'Address E',
                'type' => 2,
                 'idphong'=>null,

                
            ],
        ]);
        DB::table('rooms')->insert([
            [
                'name'=>'001',
                'status'=>'10',
                'gender'=>'nữ',
                'note'=>'',
            ],
            [
                'name'=>'002',
                'status'=>'15',
                'gender'=>'nam',
                'note'=>'',
            ],
            [
                'name'=>'003',
                'gender'=>'nữ',
                'status'=>'12',
                'note'=>'',
            ],
        ]);
       
    }
}
