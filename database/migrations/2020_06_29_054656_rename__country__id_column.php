<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameCountryIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('_news', function (Blueprint $table) {
                $table->renameColumn('Country_Id', 'Category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('_news', function (Blueprint $table) {
            $table->renameColumn( 'Category_id','Country_Id');
        });
    }
}
