<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUniqueToQuestionoptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('question_opcions', function (Blueprint $table) {
            $table->boolean('unique')->after('value');
            $table->string('button_text')->after('value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('question_opcions', function (Blueprint $table) {
            $table->dropColumn('unique');
            $table->dropColumn('button_text');
        });
    }
}
