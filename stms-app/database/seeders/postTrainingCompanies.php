<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\TrainingInstitution;
use Illuminate\Database\Seeder;

class postTrainingCompanies extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trainingCompaies=[
            [
                'id'=>1,
                'company_name'=>'T2',
                'address'=> 'training@T2.com',
                "company_number"=>"920033339",
                "company_website"=>"https://www.t2.sa/en"
            ],
            [
                'id'=>2,
                'company_name'=>'Panorama',
                'address'=> 'info@panorama-q.com',
                "company_number"=>"+966554498558",
                "company_website"=>"https://panorama-q.com/"
            ],
            [
                'id'=>3,
                'company_name'=>'بيتك ذكي',
                'address'=> 'sales@yourhousesmart.com',
                "company_number"=>"+966553097940",
                "company_website"=>"www.yourhousesmart.com"
            ],[
                'id'=>4,
                'company_name'=>'SDAIA',
                'address'=> 'Info@sdaia.gov.sa',
                "company_number"=>"8001221111",
                "company_website"=>"www.sdaia.gov.sa"
            ],
            [
                'id'=>5,
                'company_name'=>'Efhas',
                'address'=> 'info@efhas.sa',
                "company_number"=>"+966554055255",
                "company_website"=>"www.efhaspos.com"
            ]];

        foreach($trainingCompaies as $key=>$value){
            TrainingInstitution::create($value);
        }
    }
}
