<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostUsers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users=[
            [
                'id'=>412217578,
                'username'=>'Ruaa Ahmed Alhazmi',
                'email'=> '412217578@qu.edu.sa',
                'major'=> 'Information Technology',
                'hours'=>125,
                'password'=>Hash::make(12345678),
                'role'=>1,
            ],
            [
                'id'=>412217537,
                'username'=>'Ruqaiah Mohammed Hadwan',
                'email'=> '412217537@qu.edu.sa',
                'major'=> 'Information Technology',
                'hours'=>130,
                'password'=>Hash::make(12345678),
                'role'=>1,
            ],
            [
                'id'=>392206387,
                'username'=>'Razan Sultan Alturaifi',
                'email'=> '392206387@qu.edu.sa',
                'major'=> 'Information Technology',
                'hours'=>135,
                'password'=>Hash::make(12345678),
                'role'=>1,
            ],[
                'id'=>411201847,
                'username'=>'Alanoud Mohammed Alsseed',
                'email'=> '411201847@qu.edu.sa',
                'major'=> 'Information Technology',
                'hours'=>140,
                'password'=>Hash::make(12345678),
                'role'=>1,
            ],
            [
                'id'=>123456789,
                'username'=>'Supervisor',
                'email'=> 'Supervisor@qu.edu.sa',
                'major'=> 'Information Technology',
                'password'=>Hash::make(12345678),
                'role'=>2,
            ],
            [
                'id'=>123456788,
                'username'=>'Afef',
                'email'=> 'Supervisor2@qu.edu.sa',
                'major'=> 'Information Technology',
                'password'=>Hash::make(12345678),
                'role'=>2,
            ]
        ];

        foreach($users as $key=>$value){
            User::create($value);
        }
    }
}
