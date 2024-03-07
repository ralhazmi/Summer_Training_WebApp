<?php

namespace Database\Seeders;

use App\Models\Announcements;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class PostAnnouncements extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('role', 2)->first();
        $announcements=[
            [
                'user_id' => $user->id,
        'title'=>'important',
        'content'=>'please uploads your reports on time',
        'created_at'=>date('Y-m-d H:i:s'),
        'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => $user->id,
                'title'=>'Aramco letters',
        'content'=>'sorry for being late, we working on Armco Letters',
        'created_at'=>date('Y-m-d H:i:s'),
        'updated_at'=>date('Y-m-d H:i:s'),
            ],[
                'user_id' => $user->id,
                'title'=>'Training Opportunity',
        'content'=>'Your House smart company have training you can contact them in this number +966*******',
        'created_at'=>date('Y-m-d H:i:s'),
        'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => $user->id,
                'title'=>' do not send email',
        'content'=>'please you can contact us here no need to use email',
        'created_at'=>date('Y-m-d H:i:s'),
        'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => $user->id,
                'title'=>'important',
        'content'=>'students Who do do not find Training Company until now pleas contact me',
        'created_at'=>date('Y-m-d H:i:s'),
        'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ];
        foreach($announcements as $key=>$value){
            Announcements::create($value);
        }
    }
}
