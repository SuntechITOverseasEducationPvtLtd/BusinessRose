<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubscriptions2308181013Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('subscriptions')->insert(array(
            array(
                'title' => 'Silver',
                'credits' => 25,
                'discount' => 0,
                'description' => 'This is a Test Message',
                'discount_validity' => '2018-07-31',
                'price' => 5000,
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1,
                'updated_by' => 1
            ),
            array(
                'title' => 'Gold',
                'credits' => 50,
                'discount' => 0,
                'description' => 'This is a Test Message',
                'discount_validity' => '2018-07-31',
                'price' => 9000,
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1,
                'updated_by' => 1
            ),
            array(
                'title' => 'Platinum',
                'credits' => 75,
                'discount' => 0,
                'description' => 'This is a Test Message',
                'discount_validity' => '2018-07-31',
                'price' => 13500,
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1,
                'updated_by' => 1
            ),
            array(
                'title' => 'Diamond',
                'credits' => 100,
                'discount' => 0,
                'description' => 'This is a Test Message',
                'discount_validity' => '2018-07-31',
                'price' => 16000,
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1,
                'updated_by' => 1
            ))
        );
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
