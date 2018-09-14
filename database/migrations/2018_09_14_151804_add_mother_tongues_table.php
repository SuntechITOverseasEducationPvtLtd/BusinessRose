<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMotherTonguesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        DB::table('mother_tongues')->insert(array(
            array(
                'mother_tongue' => 'Assamese',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1,            
            ),
            array(
                'mother_tongue' => 'Bengali',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'mother_tongue' => 'English',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'mother_tongue' => 'Gujarati',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'mother_tongue' => 'Hindi',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'mother_tongue' => 'Kannada',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'mother_tongue' => 'Konkani',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'mother_tongue' => 'Malayalam',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'mother_tongue' => 'Marathi',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'mother_tongue' => 'Marwari',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'mother_tongue' => 'Odia',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'mother_tongue' => 'Punjabi',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'mother_tongue' => 'Sindhi',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'mother_tongue' => 'Tamil',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'mother_tongue' => 'Telugu',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'mother_tongue' => 'Urdu',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            )
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mother_tongues', function (Blueprint $table) {
            //
        });
    }
}
