<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class CustomCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'custom:command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change Employee Status';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(){
        date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d");
		$retirements = DB::table('employees')->select('emp_id', 'emp_date_of_retirement')->where('status', 1)->get();
		foreach($retirements as $retirement){
			if($retirement->emp_date_of_retirement<$date){
				$row = DB::table('employees')->where('emp_id', $retirement->emp_id)->update(['status' => 0]);
				$row1 = DB::table('servicebooks')->where('emp_id', $retirement->emp_id)->update(['status' => 0]);
			}
		}
		 $this->info('All inactive users are deleted successfully!');
    }
}
