<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCamposToQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->boolean('indelible')->after('text_colum');
            $table->string('slug')->after('text_colum');
            $table->boolean('email')->after('text_colum');
            $table->string('button_text')->after('text_colum');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn('indelible');
            $table->dropColumn('email');
            $table->dropColumn('button_text');
            $table->dropColumn('slug');
        });
    }
}
