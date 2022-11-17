<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReplaceProductExtraDataWithSpecs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text('specs');
            $table->string('category');
            $table->dropColumn([
                'product_category_id',
                'back_brake_id',
                'back_tire_id',
                'front_brake_id',
                'front_tire_id',
                'product_engine_id',
                'fuel_capacity',
                'weight',
                'datasheet_image',
            ]);
        });

        Schema::dropIfExists('product_categories');
        Schema::dropIfExists('product_brakes');
        Schema::dropIfExists('product_engines');
        Schema::dropIfExists('product_tires');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['specs', 'category']);
            $table->integer('product_category_id');
            $table->integer('back_brake_id');
            $table->integer('back_tire_id');
            $table->integer('front_brake_id');
            $table->integer('front_tire_id');
            $table->integer('product_engine_id');
            $table->string('fuel_capacity');
            $table->string('weight');
            $table->string('datasheet_image');
            $table->string('description_image_1');
            $table->string('description_image_2');
        });

        Schema::create('product_categories', function (Blueprint $table) {
            $table->engine = "MyISAM";
            $table->charset = "utf8";
            $table->collation = "utf8_general_ci";

            $table->increments('id');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('product_engines', function (Blueprint $table) {
            $table->engine = "MyISAM";
            $table->charset = "utf8";
            $table->collation = "utf8_general_ci";

            $table->increments('id');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('product_brakes', function (Blueprint $table) {
            $table->engine = "MyISAM";
            $table->charset = "utf8";
            $table->collation = "utf8_general_ci";

            $table->increments('id');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('product_tires', function (Blueprint $table) {
            $table->engine = "MyISAM";
            $table->charset = "utf8";
            $table->collation = "utf8_general_ci";

            $table->increments('id');
            $table->string('description');
            $table->timestamps();
        });
    }
}
