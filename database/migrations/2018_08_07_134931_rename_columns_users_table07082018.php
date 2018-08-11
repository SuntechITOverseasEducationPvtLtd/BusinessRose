<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnsUsersTable07082018 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('highlights_of_business', 'description_of_business');
            $table->renameColumn('products_and_services', 'description_of_profound_value');
            $table->renameColumn('monthly_yearly_sales', 'description_of_sales');
            $table->renameColumn('personal_details', 'description_of_family');
            $table->renameColumn('business_category', 'category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user', function (Blueprint $table) {
            //
        });
    }
}
