<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportCities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-cities {path=storage/cities/cities.csv} {--separator=;}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importuje miasta z wybranego pliku';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = $this->argument('path');
        $separator = $this->option('separator');

        $this->info('Importing cities from '.$path);

        try {
            DB::table('cities')->truncate();

            $fileContents = file($path);

            $citiesToImport = [];

            foreach($fileContents as $line) {
                $row = str_getcsv($line, $separator);

                foreach($row as $value) {
                    $citiesToImport[] = [
                        'name' => trim($value)
                    ];
                }
            }

            DB::table('cities')->insert($citiesToImport);

        } catch(Exception $e) {
            $this->fail($e->getMessage());
        }
    }
}
