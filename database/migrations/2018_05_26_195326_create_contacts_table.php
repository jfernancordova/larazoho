<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
	        $table->string('id')->primaryKey();
	        $table->string('wfTrigger')->default('true');
	        $table->string('contactOwner')->nullable();
	        $table->string('leadSource')->nullable();
	        $table->string('firstName')->nullable();
	        $table->string('lastName')->nullable();
	        $table->string('fullName')->nullable();
	        $table->string('email')->nullable();
	        $table->string('phone')->nullable();
	        $table->string('mobile')->nullable();
	        $table->string('title')->nullable();
	        $table->string('createdBy')->nullable();
	        $table->string('modifiedBy')->nullable();
	        $table->string('mailingStreet')->nullable();
	        $table->string('mailingCity')->nullable();
	        $table->string('mailingState')->nullable();
	        $table->string('mailingZip')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
