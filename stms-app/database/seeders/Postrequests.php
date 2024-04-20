<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Requests;
class Postrequests extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Requsets=[
            [
                'user_id'=>412217578,
                'userTo'=>123456789,
                'request_title'=> ' خطاب أرامكوا',
                "content"=>"طلب خطاب ارامكوا لفتحها تدريب صيفي",
                "date"=>date('Y-m-d H:i:s')
            ],
            [
                'user_id'=>412217578,
                'userTo'=>123456788,
                'request_title'=> 'طلب خطاب',
                "content"=>"طلب خطاب سدايا لفتحها تدريب صيفي",
                "date"=>date('Y-m-d H:i:s')
            ],
            [
                'user_id'=>412217537,
                'userTo'=>123456788,
                'request_title'=> ' خطاب سدايا',
                "content"=>"طلب خطاب سدايا لفتحها تدريب صيفي",
                "date"=>date('Y-m-d H:i:s')
            ]];

        foreach($Requsets as $key=>$value){
            Requests::create($value);
        }
    }
}
