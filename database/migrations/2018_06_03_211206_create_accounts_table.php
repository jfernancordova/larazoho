<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
	        $table->string('id')->primaryKey();
	        $table->string('wfTrigger')->default('true');
	        $table->string('accountOwner')->nullable();
	        $table->string('accountName')->nullable();
	        $table->string('accountNumber')->nullable();
	        $table->string('accountType')->nullable();
	        $table->string('ownerShip')->nullable();
	        $table->string('industry')->nullable();
	        $table->string('employees')->nullable();
	        $table->string('phone')->nullable();
	        $table->string('annualRevenue')->nullable();
	        $table->string('sicCode')->nullable();
	        $table->string('createdBy')->nullable();
	        $table->string('modifiedBy')->nullable();
	        $table->string('billingStreet')->nullable();
	        $table->string('billingCity')->nullable();
	        $table->string('billingState')->nullable();
	        $table->string('billingCountry')->nullable();
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
        Schema::dropIfExists('accounts');
    }
}
