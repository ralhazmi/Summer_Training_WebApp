<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reports;
use Illuminate\Support\Facades\Storage;

class Postreports extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Sample data for post reports
       $reports = [
        [
            'user_id' => 412217578,
            'userTo' => 123456788,
            'report_title' => 'Report 1',
            'attachment' => $this->uploadAttachment('/stms-app/public/attachmentFile/1713578999.pdf'),
            'date' => now()
        ]];
        foreach($reports as $key=>$value){
            Reports::create($value);
        }
    }
    /**
     * Upload attachment file and return the file path.
     *
     * @param string $filePath
     * @return string|null
     */
    private function uploadAttachment(string $filePath): ?string
    {
        // Check if the file exists
        if (Storage::exists($filePath)) {
            $fileName = basename($filePath); // Get the file name
            $newFileName = 'attachment_' . time() . '_' . $fileName; // Generate a unique file name

            // Store the file in the 'public/attachmentFile' directory
            Storage::putFileAs('public/attachmentFile', $filePath, $newFileName);

            // Return the relative file path
            return 'attachmentFile/' . $newFileName;
        }

        return null; // Return null if file not found
    }
}
