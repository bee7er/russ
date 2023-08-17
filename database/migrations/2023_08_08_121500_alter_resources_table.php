<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AlterResourcesForFilterTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('resources', function (Blueprint $table) {
			$table->boolean('isAnimator');
		});
		Schema::table('resources', function (Blueprint $table) {
			$table->boolean('isDirector');
		});
		Schema::table('resources', function (Blueprint $table) {
			$table->boolean('isPersonal');
		});
		Schema::table('resources', function (Blueprint $table) {
			$table->boolean('isCommercial');
		});
		Schema::table('resources', function (Blueprint $table) {
			$table->boolean('includeInAll');
		});
		/**
		 * Migrations not working, so I did the following:
		 *
			 alter table resources add isCommercial tinyint(1) after template_id;
			 alter table resources add isPersonal tinyint(1) after template_id;
			 alter table resources add isDirector tinyint(1) after template_id;
			 alter table resources add isAnimator tinyint(1) after template_id;
			 alter table resources add includeInAll tinyint(1) after template_id;
		 */
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('resources', function (Blueprint $table) {
			$table->dropColumn(['isAnimator','isDirector','isPersonal','isCommercial','includeInAll',]);
		});
	}
}
