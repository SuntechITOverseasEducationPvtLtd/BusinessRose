<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('qualifications')->insert(array(
			array(
				'qualification' => 'IIT, IIM, IIIT',
				'status' => 1,
				'created_at' => '2018-07-31',
				'updated_at' => '2018-07-31',
				'created_by' => 1
			),
			array(
				'qualification' => 'Post Graduate',
				'status' => 1,
				'created_at' => '2018-07-31',
				'updated_at' => '2018-07-31',
				'created_by' => 1
			),
			array(
				'qualification' => 'Graduate',
				'status' => 1,
				'created_at' => '2018-07-31',
				'updated_at' => '2018-07-31',
				'created_by' => 1
			),
			array(
				'qualification' => '10th to College',
				'status' => 1,
				'created_at' => '2018-07-31',
				'updated_at' => '2018-07-31',
				'created_by' => 1
			),
			array(
				'qualification' => 'None to Schooling',
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
        Schema::table('qualifications', function (Blueprint $table) {
            //
        });
    }
}
