<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameCountryIdphColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('_news', function (Blueprint $table) {
            $table->renameColumn('Country_Idph', 'Country_Id');
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
            $table->renameColumn('Country_Id', 'Country_Idph');
        });
    }
}
