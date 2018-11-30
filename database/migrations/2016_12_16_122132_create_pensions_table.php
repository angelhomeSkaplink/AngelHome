<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePensionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pensions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned()->index();
            $table->string('pension_order_number', 127);
            $table->date('pension_order_date');
            $table->enum('pension_type', ['FP', 'SP']);
            $table->enum('pension_status', ['active', 'closed'])->default('active');
            $table->integer('month')->unsigned();
            $table->integer('year')->unsigned();
            $table->decimal('dr', 10,2)->commect('D.R in percentage');
            $table->decimal('medical', 10,2);
            $table->decimal('pension', 10,2)->commect('Pension amount entered by the AHSEC employee');
            $table->decimal('basic', 10,2)->commect('Basic amount entered by the AHSEC employee');
            $table->decimal('total_pension', 10,2);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pensions');
    }
}
