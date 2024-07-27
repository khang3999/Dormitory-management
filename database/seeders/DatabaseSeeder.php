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
                'MSSV' => '22211TT3807',
                'name' => 'Ngô Định An',
                'cccd' => '123456789011',
                'birthday' => '14-09-2004',
                'phone' => '08999999999',
                'mail' => '22211TT3807@mail.tdc.edu.vn',
                'nation' => 'Vietnam',
                'gender' => 1,
                'time' => now(),
                'note' => 'Note A',
                'address' => 'Hồ Chí Minh',
                'type' => 1,
                'idphong'=>'1',
                'job'=>'Cong Nghe Thong Tin',
                'course'=>'22',
                'class'=>'CD22TT11'
            ],
            [
                'MSSV' => '22211TT0744',
                'name' => 'Huỳnh Lý Đình Châu',
                'cccd' => '123456789011',
                'birthday' => '14-09-2004',
                'phone' => '08999999999',
                'mail' => '22211TT0744@mail.tdc.edu.vn',
                'nation' => 'Vietnam',
                'gender' => 1,
                'time' => now(),
                'note' => 'Note A',
                'address' => 'Hồ Chí Minh',
                'type' => 1,
                'idphong'=>'1',
                'job'=>'Cong Nghe Thong Tin',
                'course'=>'22',
                'class'=>'CD22TT11'
            ],
            [
                'MSSV' => '22211TT3000',
                'name' => 'Trần Trung Chiến',
                'cccd' => '123456789011',
                'birthday' => '14-09-2004',
                'phone' => '08999999999',
                'mail' => '22211TT3000@mail.tdc.edu.vn',
                'nation' => 'Vietnam',
                'gender' => 1,
                'time' => now(),
                'note' => 'Note A',
                'address' => 'Hồ Chí Minh',
                'type' => 1,
                'idphong'=>'1',
                'job'=>'Cong Nghe Thong Tin',
                'course'=>'22',
                'class'=>'CD22TT11'
            ],
            [
                'MSSV' => '22211TT1357',
                'name' => 'Nguyễn Văn Dư',
                'cccd' => '123456789011',
                'birthday' => '14-09-2004',
                'phone' => '08999999999',
                'mail' => '22211TT1357@mail.tdc.edu.vn',
                'nation' => 'Vietnam',
                'gender' => 1,
                'time' => now(),
                'note' => 'Note A',
                'address' => 'Hồ Chí Minh',
                'type' => 2,
               'idphong'=>'0',
                'job'=>'Cong Nghe Thong Tin',
                'course'=>'22',
                'class'=>'CD22TT11'
            ],
            [
                'MSSV' => '22211TT2661',
                'name' => 'Nguyễn Tiến Đạt',
                'cccd' => '123456789011',
                'birthday' => '14-09-2004',
                'phone' => '08999999999',
                'mail' => '22211TT2661@mail.tdc.edu.vn',
                'nation' => 'Vietnam',
                'gender' => 1,
                'time' => now(),
                'note' => 'Note A',
                'address' => 'Hồ Chí Minh',
                'type' => 1,
                'idphong'=>'1',
                'job'=>'Cong Nghe Thong Tin',
                'course'=>'22',
                'class'=>'CD22TT11'
            ],
            [
                'MSSV' => '22211TT4044',
                'name' => 'Nguyễn Trọng Hiền',
                'cccd' => '123456789011',
                'birthday' => '14-09-2004',
                'phone' => '08999999999',
                'mail' => '22211TT4044@mail.tdc.edu.vn',
                'nation' => 'Vietnam',
                'gender' => 1,
                'time' => now(),
                'note' => 'Note A',
                'address' => 'Hồ Chí Minh',
                'type' => 1,
                'idphong'=>'1',
                'job'=>'Cong Nghe Thong Tin',
                'course'=>'22',
                'class'=>'CD22TT11'
            ],
            [
                'MSSV' => '22211TT0253',
                'name' => 'Trần Thị Anh Thư',
                'cccd' => '123456789011',
                'birthday' => '14-09-2004',
                'phone' => '08999999999',
                'mail' => '22211TT0253@mail.tdc.edu.vn',
                'nation' => 'Vietnam',
                'gender' => 0,
                'time' => now(),
                'note' => 'Note A',
                'address' => 'Hồ Chí Minh',
                'type' => 1,
                'idphong'=>'1',
                'job'=>'Cong Nghe Thong Tin',
                'course'=>'22',
                'class'=>'CD22TT11'
            ],
            [
                'MSSV' => '22211TT2577',
                'name' => 'Lê Việt Khanh',
                'cccd' => '123456789011',
                'birthday' => '14-09-2004',
                'phone' => '08999999999',
                'mail' => '22211TT2577@mail.tdc.edu.vn',
                'nation' => 'Vietnam',
                'gender' => 0,
                'time' => now(),
                'note' => 'Note A',
                'address' => 'Hồ Chí Minh',
                'type' => 2,
                'idphong'=>'0',
                'job'=>'Cong Nghe Thong Tin',
                'course'=>'22',
                'class'=>'CD22TT11'
            ]
            ,
            [
                'MSSV' => '22211TT4759',
                'name' => 'Nguyễn Phương Nhi',
                'cccd' => '123456789011',
                'birthday' => '14-09-2004',
                'phone' => '08999999999',
                'mail' => '22211TT4759@mail.tdc.edu.vn',
                'nation' => 'Vietnam',
                'gender' => 0,
                'time' => now(),
                'note' => 'Note A',
                'address' => 'Hồ Chí Minh',
                'type' => 2,
               'idphong'=>'0',
                'job'=>'Cong Nghe Thong Tin',
                'course'=>'22',
                'class'=>'CD22TT11'
            ],
            [
                'MSSV' => '22211TT1006',
                'name' => 'Hà Nguyễn Bình Minh',
                'cccd' => '123456789011',
                'birthday' => '14-09-2004',
                'phone' => '08999999999',
                'mail' => '22211TT1006@mail.tdc.edu.vn',
                'nation' => 'Vietnam',
                'gender' => 1,
                'time' => now(),
                'note' => 'Note A',
                'address' => 'Hồ Chí Minh',
                'type' => 0,
                'idphong'=>'1',
                'job'=>'Cong Nghe Thong Tin',
                'course'=>'22',
                'class'=>'CD22TT11'
            ]



        ]);
        DB::table('rooms')->insert([
            [
                'name'=>'001',
                'gender'=>'nữ',
                'note'=>'',
            ],
            [
                'name'=>'002',
                'gender'=>'nữ',
                'note'=>'',
            ],
            [
                'name'=>'003',
                'gender'=>'nữ',
                'note'=>'',
            ],
            [
                'name'=>'004',
                'gender'=>'nam',
                'note'=>'',
            ]
        ]);
       
        DB::table('users')->insert(
            [[
            'name' => 'khangggg',
            'mssv'=>'',
            'email' => 'huukhang@gmail.com',
            'password' => Hash::make('12345678'),
            'permission' => 'student',
        ],
        [
            'name' => 'adminKTX',
            'mssv'=>'',
            'email' => 'adminKTXTDC@gmail.com',
            'password' => Hash::make('@AdminTDC12345678'),
            'permission'=>'admin',
            
        ],
        [
            'name' => 'Ngô Định An',
            'mssv'=>'22211TT3807',
            'email' => '22211TT3807@mail.tdc.edu.vn',
            'password' => Hash::make('22211TT3807'),
            'permission'=>'student',
        ],
        [
            'name' => 'Huỳnh Lý Đình Châu',
            'mssv'=>'22211TT0744',
            'email' => '22211TT0744@mail.tdc.edu.vn',
            'password' => Hash::make('22211TT0744'),
            'permission'=>'student',
        ],
        [
            'name' => 'Trần Trung Chiến',
            'mssv'=>'22211TT3000',
            'email' => '22211TT3000@mail.tdc.edu.vn',
            'password' => Hash::make('22211TT3000'),
            'permission'=>'student',
        ],
        [
            'name' => 'Nguyễn Văn Dư',
            'mssv'=>'22211TT1357',
            'email' => '22211TT1357@mail.tdc.edu.vn',
            'password' => Hash::make('22211TT1357'),
            'permission'=>'student',
        ],
        [
            'name' => 'Nguyễn Tiến Đạt',
            'mssv'=>'22211TT2661',
            'email' => '22211TT2661@mail.tdc.edu.vn',
            'password' => Hash::make('22211TT2661'),
            'permission'=>'student',
        ],
        [
            'name' => 'Nguyễn Trọng Hiền',
            'mssv'=>'22211TT4044',
            'email' => '22211TT4044@mail.tdc.edu.vn',
            'password' => Hash::make('22211TT4044'),
            'permission'=>'student',
        ],
        [
            'name' => 'Trần Thị Anh Thư',
            'mssv'=>'22211TT0253',
            'email' => '22211TT0253@mail.tdc.edu.vn',
            'password' => Hash::make('22211TT0253'),
            'permission'=>'student',
        ],
        [
            'name' => 'Hà Nguyễn Bình Minh',
            'mssv'=>'22211TT1006',
            'email' => '22211TT1006@mail.tdc.edu.vn',
            'password' => Hash::make('22211TT1006'),
            'permission'=>'student',
        ]
        ]
    );

        DB::table('events')->insert([
            'title' => '2',
            'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Libero iste accusamus, labore odio enim sint ullam corporis, nesciunt, nam minima mollitia quas natus quidem fugit ducimus distinctio cumque eveniet commodi. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptas quo ad blanditiis, sed similique recusandae facere optio rerum quisquam, obcaecati ipsa! Enim saepe ullam aliquam incidunt labore architecto voluptates assumenda!',
           
            'title' => 'Giới thiệu về Kí túc xá',
            'content' => 'http://ktx.tdc.edu.vn/gioi-thieu.html',
            'img' => 'banner.jpg',
            'type' => ''
        ]);
        DB::table('events')->insert([
           
            'title' => 'Quy chế kí túc xá',
            'content' => 'http://ktx.tdc.edu.vn/quy-che-noi-tru-ky-tuc-xa.html',
            'img' => 'banner.jpg',
            'type' => 'none'
        ]);
        DB::table('events')->insert([
            'title' => '5',
            'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Libero iste accusamus, labore odio enim sint ullam corporis, nesciunt, nam minima mollitia quas natus quidem fugit ducimus distinctio cumque eveniet commodi. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptas quo ad blanditiis, sed similique recusandae facere optio rerum quisquam, obcaecati ipsa! Enim saepe ullam aliquam incidunt labore architecto voluptates assumenda!',
            'img' => 'banner.jpg',
            'type' => 'none'
        ]);
        DB::table('events')->insert([
            'title' => '3',
            'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Libero iste accusamus, labore odio enim sint ullam corporis, nesciunt, nam minima mollitia quas natus quidem fugit ducimus distinctio cumque eveniet commodi. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptas quo ad blanditiis, sed similique recusandae facere optio rerum quisquam, obcaecati ipsa! Enim saepe ullam aliquam incidunt labore architecto voluptates assumenda!',
        
            'title' => 'Trang liên hệ',
            'content' => 'http://ktx.tdc.edu.vn/lien-he/',
            'img' => 'banner.jpg',
            'type' => 'none'
        ]);
        // Schema::create('history', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('idphong');
        //     $table->string('status');
        //     $table->string('ngayhu');
        //     $table->string('ngaysua')->nullable();
        //     $table->string('type');
        //     $table->timestamps(); // Thêm timestamps
        // });

        //type 0 la sua roi, 1 la chua
        DB::table('histories')->insert([
           [
            'idphong' =>'1',
            'status'=> "hu cua",
            'ngayhu'=>'14-09-2004',
           
             'ngaysua'=>'',
            'type'=> "0",
           ],
           [
            'idphong' =>'1',
            'status'=> "hu rem",
            'ngayhu'=>'14-09-2004', 
           
             'ngaysua'=>'',
            'type'=> "0",
           ],
           [
            'idphong' =>'1',
            'status'=> "hu cua",
            'ngayhu'=>'14-09-2004',
            'type'=> "0",
             'ngaysua'=>'',
           ],
           [
            'idphong' =>'1',
            'status'=> "hu den",
            'ngayhu'=>'14-09-2004',
            'type'=> "0",
             'ngaysua'=>'',
           ],
           [
            'idphong' =>'3',
            'status'=> "hu rem",
            'ngayhu'=>'14-09-2004',
            'type'=> "0",
             'ngaysua'=>'',
           ],
           [
            'idphong' =>'2',
            'status'=> "hu cua",
            'ngayhu'=>'14-09-2004',
            'type'=> "0",
             'ngaysua'=>'',
           ],
           [
            'idphong' =>'2',
            'status'=> "hu den",
            'ngayhu'=>'14-09-2004',
            'type'=> "0",
             'ngaysua'=>'',
           ],
        ]);
    }
}
