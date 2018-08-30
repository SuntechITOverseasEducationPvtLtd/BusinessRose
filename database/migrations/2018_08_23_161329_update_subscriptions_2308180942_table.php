<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSubscriptions2308180942Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->string('title')->after('id')->nullable();
            $table->integer('credits')->after('title')->nullable();
            $table->integer('discount')->after('credits')->nullable();
            $table->string('description')->after('discount')->nullable();
            $table->integer('updated_by')->after('created_by')->nullable();
            $table->renameColumn('time_period', 'discount_validity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            //
        });
    }
}
