<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CommonQuestions;
use Illuminate\Database\Seeder;

class postFQA extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $FAQs=[
            [
                'id'=>1,
                'question'=>'How long is the Summer Training?',
                'answer'=> '8 weeks'
            ],
            [
                'id'=>2,
                'question'=>'How many reports are required?',
                'answer'=> 'The total is approximately 5 reports. 3 progress reports are submitted every two or three weeks, and two reports, one of which is the student’s evaluation of the company and the other is sent by the company to the supervisor’s email to evaluate the student.'
            ],
            [
                'id'=>3,
                'question'=>'Is training allowed outside qassim?',
                'answer'=> 'Yes,it is allowed.'
            ],[
                'id'=>4,
                'question'=>'Are there specific conditions for training agencies?',
                'answer'=> 'Preferably in the technical field'
            ],
            [
                'id'=>5,
                'question'=>'Is online training allowed? ',
                'answer'=> 'It is only allowed in specific cases authorized by the supervisor'
            ],
            [
                'id'=>6,
                'question'=>'How many letters are allowed?',
                'answer'=> ' A maximum of 5 letters per student'
            ]];

        foreach($FAQs as $key=>$value){
            CommonQuestions::create($value);
        }
    }
}
