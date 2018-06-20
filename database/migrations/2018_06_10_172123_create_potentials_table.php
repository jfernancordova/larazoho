<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePotentialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('potentials', function (Blueprint $table) {
	        $table->string('id')->primaryKey();
	        $table->string('wfTrigger')->default('true');
	        $table->string('potentialOwner')->nullable();
	        $table->string('amount')->nullable();
	        $table->string('potentialName')->nullable();
	        $table->string('closingDate')->nullable();
	        $table->string('accountId')->nullable();
	        $table->string('accountName')->nullable();
	        $table->string('stage')->nullable();
	        $table->string('type')->nullable();
	        $table->string('probability')->nullable();
	        $table->string('createdBy')->nullable();
	        $table->string('modifiedBy')->nullable();
	        $table->string('contactId')->nullable();
	        $table->string('contactName')->nullable();
	        $table->string('expectedRevenue')->nullable();
	        $table->string('salesCycleDuration')->nullable();
	        $table->string('overallSalesDuration')->nullable();
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
        Schema::dropIfExists('potentials');
    }
}
