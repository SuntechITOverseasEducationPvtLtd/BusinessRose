<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('sub_categories')->insert(array(
            array(
                'cat_id' => 1,
                'sub_cat_name' => 'Advertising / Marketing',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1,            
            ),
            array(
                'cat_id' => 1,
                'sub_cat_name' => 'Administrative services',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'cat_id' => 1,
                'sub_cat_name' => 'Architecture',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'cat_id' => 1,
                'sub_cat_name' => 'Armed forces',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'cat_id' => 1,
                'sub_cat_name' => 'Arts',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'cat_id' => 1,
                'sub_cat_name' => 'Commerce',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'cat_id' => 1,
                'sub_cat_name' => 'Computers / IT',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'cat_id' => 1,
                'sub_cat_name' => 'Education',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'cat_id' => 1,
                'sub_cat_name' => 'Engineering/ Technology',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'cat_id' => 1,
                'sub_cat_name' => 'Fashion',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'cat_id' => 1,
                'sub_cat_name' => 'Finance',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'cat_id' => 1,
                'sub_cat_name' => 'Fine arts',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'cat_id' => 1,
                'sub_cat_name' => 'Home science',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'cat_id' => 1,
                'sub_cat_name' => 'Law',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'cat_id' => 1,
                'sub_cat_name' => 'Management',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'cat_id' => 1,
                'sub_cat_name' => 'Medicine',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'cat_id' => 1,
                'sub_cat_name' => 'Nursing / Health Sciences',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'cat_id' => 1,
                'sub_cat_name' => 'Office Administration',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'cat_id' => 1,
                'sub_cat_name' => 'Shipping',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'cat_id' => 1,
                'sub_cat_name' => 'Science',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'cat_id' => 1,
                'sub_cat_name' => 'Travel & Tourism',
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
        Schema::table('sub_categories', function (Blueprint $table) {
            //
        });
    }
}
