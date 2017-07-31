<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoices_id')->unsigned();
            $table->string('firstname', 100);
            $table->string('lastname', 100);
            $table->string('address', 400);
            $table->integer('ico');
            $table->integer('dic');
            $table->integer('icdhp');
            $table->string('email_address');
            $table->string('website_url');
            $table->string('phone_number');
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
        Schema::drop('clients');
    }
}
