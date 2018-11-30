<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Storage;

class DatabaseBackup extends Command
{
    protected $signature = 'backup:database';
    protected $description = 'This command will take a backup of current database';
	
    public function __construct(){
        parent::__construct();
    }

    public function handle(){
        $date = "ahsec_hrmis.sql";
		$user = env('DB_USERNAME');
		$password = env('DB_PASSWORD');
		$database = env('DB_DATABASE');
		$command = "mysqldump --user={$user} -p{$password} {$database} > {$date}.sql";
		$process = new Process($command);
		$process->start();
		while($process->isRunning()){
			$get_file = Storage::disk('local')->get($date);
			//$s3->put('sql/' . $date . ".sql", file_get_contents('{$date}.sql'));
			$s3->put("sql/" . $date, $get_file);
			//unlink('{$date}.sql');
		}
    }
}


