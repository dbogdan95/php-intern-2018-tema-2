<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id')->unsigned();
		    $table->string('name', 64);
		    $table->string('description', 128)->nullable()->default("NULL");
		
		    $table->timestamps();
        });


         // Insert some stuff
        DB::table('companies')->insert(
            array(
                'name' => 'dummy'
            )
        ); 

        DB::statement("UPDATE companies SET id = 0 WHERE name = 'dummy'");      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
