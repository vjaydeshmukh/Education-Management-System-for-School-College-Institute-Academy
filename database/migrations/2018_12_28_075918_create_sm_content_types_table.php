<?php

use App\SmContentType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmContentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sm_content_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type_name')->length(100)->nullable();
            $table->tinyInteger('active_status')->default(1);
            $table->timestamps();

            $table->integer('created_by')->nullable()->default(1)->unsigned();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('restrict');

            $table->integer('updated_by')->nullable()->default(1)->unsigned();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('restrict');

            $table->integer('school_id')->nullable()->default(1)->unsigned();
            $table->foreign('school_id')->references('id')->on('sm_schools')->onDelete('restrict');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sm_content_types');
    }
}
