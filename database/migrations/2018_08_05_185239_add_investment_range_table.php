<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInvestmentRangeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('investment_range')->insert(array(
            array(
                'range' => '1,00,000 to 5,00,000',
                'desc' => '',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'range' => '5,00,000 to 10,00,000',
                'desc' => '',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'range' => '10,00,000 to 20,00,000',
                'desc' => '',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'range' => '20,00,000 to 50,00,000',
                'desc' => '',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'range' => '50,00,000 to 1,00,00,000',
                'desc' => '',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'range' => '1,00,00,000+',
                'desc' => '',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
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
        Schema::table('investment_range', function (Blueprint $table) {
            //
        });
    }
}
