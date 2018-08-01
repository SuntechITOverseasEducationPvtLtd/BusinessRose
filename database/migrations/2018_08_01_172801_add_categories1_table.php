<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategories1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('categories')->insert(array(
			array(
				'cat_name' => 'Real estate/construction',
				'status' => 1,
				'created_at' => '2018-07-31',
				'updated_at' => '2018-07-31',
				'created_by' => 1
			),
			array(
				'cat_name' => 'Transportation',
				'status' => 1,
				'created_at' => '2018-07-31',
				'updated_at' => '2018-07-31',
				'created_by' => 1
			),
			array(
				'cat_name' => 'Manufacturing',
				'status' => 1,
				'created_at' => '2018-07-31',
				'updated_at' => '2018-07-31',
				'created_by' => 1
			),
			array(
				'cat_name' => 'Retail/Wholesale/Distributors',
				'status' => 1,
				'created_at' => '2018-07-31',
				'updated_at' => '2018-07-31',
				'created_by' => 1
			),
			array(
				'cat_name' => 'Finance',
				'status' => 1,
				'created_at' => '2018-07-31',
				'updated_at' => '2018-07-31',
				'created_by' => 1
			),
			array(
				'cat_name' => 'Healthcare',
				'status' => 1,
				'created_at' => '2018-07-31',
				'updated_at' => '2018-07-31',
				'created_by' => 1
			),
			array(
				'cat_name' => 'Food',
				'status' => 1,
				'created_at' => '2018-07-31',
				'updated_at' => '2018-07-31',
				'created_by' => 1
			),
			array(
				'cat_name' => 'Entertainment',
				'status' => 1,
				'created_at' => '2018-07-31',
				'updated_at' => '2018-07-31',
				'created_by' => 1
			),
			array(
				'cat_name' => 'Apparel/Clothing',
				'status' => 1,
				'created_at' => '2018-07-31',
				'updated_at' => '2018-07-31',
				'created_by' => 1
			),
			array(
				'cat_name' => 'Mining',
				'status' => 1,
				'created_at' => '2018-07-31',
				'updated_at' => '2018-07-31',
				'created_by' => 1
			),
			array(
				'cat_name' => 'Education',
				'status' => 1,
				'created_at' => '2018-07-31',
				'updated_at' => '2018-07-31',
				'created_by' => 1
			),
			array(
				'cat_name' => 'Business Services',
				'status' => 1,
				'created_at' => '2018-07-31',
				'updated_at' => '2018-07-31',
				'created_by' => 1
			),
			array(
				'cat_name' => 'Gems/Jewelry',
				'status' => 1,
				'created_at' => '2018-07-31',
				'updated_at' => '2018-07-31',
				'created_by' => 1
			),
			array(
				'cat_name' => 'Import/Export',
				'status' => 1,
				'created_at' => '2018-07-31',
				'updated_at' => '2018-07-31',
				'created_by' => 1
			),
			array(
				'cat_name' => 'Travel',
				'status' => 1,
				'created_at' => '2018-07-31',
				'updated_at' => '2018-07-31',
				'created_by' => 1
			),
			array(
				'cat_name' => 'Transportation',
				'status' => 1,
				'created_at' => '2018-07-31',
				'updated_at' => '2018-07-31',
				'created_by' => 1
			),
			array(
				'cat_name' => 'Media/Publishing',
				'status' => 1,
				'created_at' => '2018-07-31',
				'updated_at' => '2018-07-31',
				'created_by' => 1
			),
			array(
				'cat_name' => 'Industrial goods',
				'status' => 1,
				'created_at' => '2018-07-31',
				'updated_at' => '2018-07-31',
				'created_by' => 1
			),
			array(
				'cat_name' => 'Others',
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
        Schema::table('categories', function (Blueprint $table) {
            //
        });
    }
}
