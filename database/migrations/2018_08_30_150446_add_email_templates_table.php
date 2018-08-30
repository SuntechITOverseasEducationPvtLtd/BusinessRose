<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmailTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('email_templates')->insert(array(
            array(
                'category_name' => 'Account Approved',
                'subject' => 'Account Approved',
                'mail_body' => 'Account Approved',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'category_name' => 'Change Password',
                'subject' => 'Change Password',
                'mail_body' => 'Change Password',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'category_name' => 'Connect Now',
                'subject' => 'Connect Now',
                'mail_body' => 'Connect Now',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'category_name' => 'Forgot Password',
                'subject' => 'Forgot Password',
                'mail_body' => 'Forgot Password',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'category_name' => 'Email Verification',
                'subject' => 'Email Verification',
                'mail_body' => 'Email Verification',
                'status' => 1,
                'created_at' => '2018-07-31',
                'updated_at' => '2018-07-31',
                'created_by' => 1
            ),
            array(
                'category_name' => 'Welcome Email',
                'subject' => 'Welcome Email',
                'mail_body' => 'Welcome Email',
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
        Schema::table('email_templates', function (Blueprint $table) {
            //
        });
    }
}
