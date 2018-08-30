<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('slugs')->insert(array(
            array(
                'page_name' => 'About Us',
                'page_slug' => 'about-us',
                'meta_keyword' => 'about us',
                'meta_description' => 'about us',
                'page_content' => 'about us',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'page_name' => 'Terms & Conditions',
                'page_slug' => 'terms-conditions',
                'meta_keyword' => 'terms & conditions',
                'meta_description' => 'terms & conditions',
                'page_content' => 'terms & conditions',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'page_name' => 'Privacy & Policy',
                'page_slug' => 'privacy-policy',
                'meta_keyword' => 'privacy & policy',
                'meta_description' => 'privacy & policy',
                'page_content' => 'privacy & policy',
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
        Schema::table('slugs', function (Blueprint $table) {
            //
        });
    }
}
