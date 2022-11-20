<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('box_metas', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->unsignedInteger('box_id');
            $table->string('meta_key');
            $table->text('meta_value');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('boxe_metas');
    }
};
