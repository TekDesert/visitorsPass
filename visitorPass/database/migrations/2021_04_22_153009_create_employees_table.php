<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('natureofvisit');
            $table->date('date');
            $table->time('starttime');
            $table->time('endtime');
            $table->string("type");
            $table->string("companyname");
            $table->string("personname");
            $table->string("mobilenumber");
            $table->string("otherpeople");
            $table->string("imageprofile");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
