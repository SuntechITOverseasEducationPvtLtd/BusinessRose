<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdminSettings04102018Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('admin_settings')->insert(array(
            array(
                'enable_pricing' => '0',
                'enable_gst' => '0',
                'cgst' => '0.00',
                'sgst' => '0.00',
                'igst' => '0.00',
                'status' => 1,
                'created_at' => '2018-10-04',
                'updated_at' => '2018-10-04',
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
        Schema::table('admin_settings', function (Blueprint $table) {
            //
        });
    }
}
