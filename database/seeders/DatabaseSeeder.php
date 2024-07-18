<?php

namespace Database\Seeders;

use App\Models\Event;
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
                'idphong'=>'1',
                'job'=>'Cong Nghe Thong Tin',
                'course'=>'22',
                'class'=>'CD22TT11'
                // $table->string('job');
                // $table->string('year');
                // $table->string('class');
            ],
            [
                'MSSV' => 'S123457',
                
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
                    'job'=>'Cong Nghe Thong Tin',
                    'course'=>'22',
                    'class'=>'CD22TT11'
            ],
            [
                'MSSV' => 'S123458',
                
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
                'job'=>'Cong Nghe Thong Tin',
                'course'=>'22',
                'class'=>'CD22TT11'
            ],
            [
                'MSSV' => 'S123459',
                
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
                'job'=>'Cong Nghe Thong Tin',
                'course'=>'22',
                'class'=>'CD22TT11'
            ],
            [
                'MSSV' => 'S123460',
                
                'name' => 'Hoang Van E',
                'cccd' => '123456783',
                'birthday' => '2000-05-05',
                'phone' => '0912345682',
                'mail' => 'hoandddgvane@example.com',
                'nation' => 'Vietnam',
                'gender' => 1,
                'time' => now(),
                'note' => 'Note E',
                'address' => 'Address E',
                'type' => 1,
                'idphong'=>'2',
                'job'=>'Cong Nghe Thong Tin',
                'course'=>'22',
                'class'=>'CD22TT11'
            ],
            [
                'MSSV' => 'S123460',
                
                'name' => 'out 1',
                'cccd' => '123456783',
                'birthday' => '2000-05-05',
                'phone' => '0912345682',
                'mail' => 'hoangvanecaa@example.com',
                'nation' => 'Vietnam',
                'gender' => 1,
                'time' => now(),
                'note' => 'Note E',
                'address' => 'Address E',
                'type' => 0,
                'idphong'=>'2',
                'job'=>'Cong Nghe Thong Tin',
                'course'=>'22',
                'class'=>'CD22TT11'
            ],
            [
                'MSSV' => 'S123460',
                
                'name' => 'out 2',
                'cccd' => '123456783',
                'birthday' => '2000-05-05',
                'phone' => '0912345682',
                'mail' => 'hoaadqwngvane@example.com',
                'nation' => 'Vietnam',
                'gender' => 1,
                'time' => now(),
                'note' => 'Note E',
                'address' => 'Address E',
                'type' => 0,
                'idphong'=>'2',
                'job'=>'Cong Nghe Thong Tin',
                'course'=>'22',
                'class'=>'CD22TT11'
            ],
            [
                'MSSV' => 'S123460',
                
                'name' => 'out3',
                'cccd' => '123456783',
                'birthday' => '2000-05-05',
                'phone' => '0912345682',
                'mail' => 'hoanfgfdgvane@example.com',
                'nation' => 'Vietnam',
                'gender' => 1,
                'time' => now(),
                'note' => 'Note E',
                'address' => 'Address E',
                'type' => 0,
                'idphong'=>'2',
                'job'=>'Cong Nghe Thong Tin',
                'course'=>'22',
                'class'=>'CD22TT11'
            ],
            [
                'MSSV' => 'OUT1',
                'name' => 'in 1',
                'cccd' => '123456783',
                'birthday' => '2000-05-05',
                'phone' => '0912345682',
                'mail' => '22211TT1357@mail.tdc.edu.vn',
                'nation' => 'Vietnam',
                'gender' => 1,
                'time' => now(),
                'note' => 'Note E',
                'address' => 'Address E',
                'type' => 2,
                 'idphong'=>null,
                 'job'=>'Cong Nghe Thong Tin',
                 'course'=>'22',
                 'class'=>'CD22TT11'
                
            ],
            [
                'MSSV' => 'OUT2',
                
                'name' => 'in 2',
                'cccd' => '123456783',
                'birthday' => '2000-05-05',
                'phone' => '0912345682',
                'mail' => 'vandunguyenvan@gmail.com',
                'nation' => 'Vietnam',
                'gender' => 1,
                'time' => now(),
                'note' => 'Note E',
                'address' => 'Address E',
                'type' => 2,
                 'idphong'=>null,
                 'job'=>'Cong Nghe Thong Tin',
                 'course'=>'22',
                 'class'=>'CD22TT11'
                
            ],
            [
                'MSSV' => 'OUT3',
                
                'name' => 'in 3',
                'cccd' => '123456783',
                'birthday' => '2000-05-05',
                'phone' => '0912345682',
                'mail' => 'dunv.57.student@fit.tdc.edu.vn',
                'nation' => 'Vietnam',
                'gender' => 1,
                'time' => now(),
                'note' => 'Note E',
                'address' => 'Address E',
                'type' => 2,
                 'idphong'=>null,
                 'job'=>'Cong Nghe Thong Tin',
                 'course'=>'22',
                 'class'=>'CD22TT11'

                
            ],
            [
                'MSSV' => 'OUT4',
                
                'name' => 'in 4',
                'cccd' => '123456783',
                'birthday' => '2000-05-05',
                'phone' => '0912345682',
                'mail' => 'levietkhanh2k4@gmail.com',
                'nation' => 'Vietnam',
                'gender' => 1,
                'time' => now(),
                'note' => 'Note E',
                'address' => 'Address E',
                'type' => 2,
                 'idphong'=>null,
                 'job'=>'Cong Nghe Thong Tin',
                 'course'=>'22',
                 'class'=>'CD22TT11'

                
            ],
        ]);
        DB::table('rooms')->insert([
            [
                'name'=>'001',
                'gender'=>'nữ',
                'note'=>'',
            ],
            [
                'name'=>'002',
                'gender'=>'nam',
                'note'=>'',
            ],
            [
                'name'=>'003',
                'gender'=>'nữ',
                'note'=>'',
            ],
        ]);
       
        DB::table('users')->insert(
            [[
            'name' => 'khangggg',
            'email' => 'huukhang@gmail.com',
            'password' => Hash::make('12345678'),
            'permission' => 'student',
        ],
        [
            'name' => 'vanduvandu',
            'email' => 'vandupluss@gmail.com',
            'password' => Hash::make('12345678'),
            'permission'=>'admin',
        ],]
    );

        DB::table('events')->insert([
            'id' => 0,
            'title' => '1',
            'content' => 'latfbnigyiauombaeiuNOm',
            'img' => 'banner.jpg',
            'type' => 'none'
        ]);
        DB::table('events')->insert([
            'id' => 0,
            'title' => '2',
            'content' => 'latfbnigyiauombaeiuNOm',
            'img' => 'banner.jpg',
            'type' => 'none'
        ]);
        DB::table('events')->insert([
            'id' => 0,
            'title' => '3',
            'content' => 'latfbnigyiauombaeiuNOm',
            'img' => 'banner.jpg',
            'type' => 'none'
        ]);
       
    }
}
