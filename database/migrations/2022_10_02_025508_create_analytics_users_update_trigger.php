<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalyticsUsersUpdateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER tr_Session_Update AFTER UPDATE ON `sessions` FOR EACH ROW
            BEGIN
                UPDATE analytics_users SET user_id = New.user_id, ip_address = NEW.ip_address, device = NEW.device, location = NEW.location, last_activity = NEW.last_activity, created_at = NEW.created_at, updated_at = NEW.updated_at 
                WHERE id = NEW.id;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_Session_Update`');
    }
}
