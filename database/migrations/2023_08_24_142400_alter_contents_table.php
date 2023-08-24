<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AlterContentsForTitleTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contents', function (Blueprint $table) {
			$table->boolean('useTitle');
		});
		/**
		 * Migrations not working, so I did the following:
		 *
			 alter table contents add useTitle tinyint(1) after title;
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
