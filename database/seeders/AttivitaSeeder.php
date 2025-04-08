<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Attivita;

class AttivitaSeeder extends Seeder
{
    /**
     * Copy images and pdf doc to storage folder.
     * Run the database seeds.
     */
    public function run(): void
    {
        $top_dir = dirname(dirname(__DIR__));
        $images_source_dir = $top_dir . '/public/images/';
        $images_dest_dir = $top_dir . '/public/storage/imgtrek/';
        $pdf_source_dir = $top_dir . '/public/doc/';
        $pdf_dest_dir = $top_dir . '/public/storage/pdftrek/';

        for ($i = 1; $i <= 5; $i++) {
            $source_file_name = $images_source_dir . $i . '.png';
            $dest_file_name = $images_dest_dir . $i . '.png';
            if (file_exists($source_file_name)) {
                if (!file_exists($dest_file_name)) {
                    copy($source_file_name, $dest_file_name);
                    print "  INFO: file $source_file_name copied to $dest_file_name" . PHP_EOL;
                } else {
                    print "  INFO: file $dest_file_name exists" . PHP_EOL;
                }
            } else {
                print "  WARNING: no file $source_file_name found!" . PHP_EOL;
            }
        }

        for ($i = 1; $i <= 5; $i++) {
            $source_file_name = $pdf_source_dir . $i . '.pdf';
            $dest_file_name = $pdf_dest_dir . $i . '.pdf';
            if (file_exists($source_file_name)) {
                if (!file_exists($dest_file_name)) {
                    copy($source_file_name, $dest_file_name);
                    print "  INFO: file $source_file_name copied to $dest_file_name" . PHP_EOL;
                } else {
                    print "  INFO: file $dest_file_name exists" . PHP_EOL;
                }
            } else {
                print "  WARNING: no file $source_file_name found!" . PHP_EOL;
            }
        }

        Attivita::factory()
            ->count(50)
            ->create();
    }
}
