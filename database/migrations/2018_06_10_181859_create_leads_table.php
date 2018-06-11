<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
	        $table->string('id')->primaryKey();
	        $table->string('wfTrigger')->default('true');
	        $table->string('leadOwner')->nullable();
	        $table->string('firstName')->nullable();
	        $table->string('lastName')->nullable();
	        $table->string('company')->nullable();
	        $table->string('designation')->nullable();
	        $table->string('email')->nullable();
	        $table->string('phone')->nullable();
	        $table->string('mobile')->nullable();
	        $table->string('website')->nullable();
	        $table->string('leadSource')->nullable();
	        $table->string('leadStatus')->nullable();
	        $table->string('industry')->nullable();
	        $table->string('noOfEmployee')->nullable();
	        $table->string('annualRevenue')->nullable();
	        $table->string('createdBy')->nullable();
	        $table->string('modifiedBy')->nullable();
	        $table->string('fullName')->nullable();
	        $table->string('street')->nullable();
	        $table->string('city')->nullable();
	        $table->string('state')->nullable();
	        $table->string('zipCode')->nullable();
	        $table->string('country')->nullable();
	        $table->string('skypeId')->nullable();
	        $table->string('emailOpt')->nullable();
	        $table->string('salutation')->nullable();
	        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
}
