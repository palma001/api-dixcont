<?php

namespace App\Observers;

use App\Models\LivingRoom;

class LivingRoomObserver
{
    /**
     * Handle the LivingRoom "created" event.
     *
     * @param  \App\Models\LivingRoom  $livingRoom
     * @return void
     */
    public function created(LivingRoom $livingRoom)
    {
        if (request()->tables) {
            collect(request()->tables)
                ->each(function ($table) use($livingRoom) {
                    $livingRoom->tables()->updateOrCreate($table);
                });
        }
    }

    /**
     * Handle the LivingRoom "updated" event.
     *
     * @param  \App\Models\LivingRoom  $livingRoom
     * @return void
     */
    public function updated(LivingRoom $livingRoom)
    {
        if (request()->tables) {
            collect(request()->tables)
                ->each(function ($table) use($livingRoom) {
                    $livingRoom->tables()->updateOrCreate(
                        [
                            'id' => isset($table['id']) ? $table['id'] : null
                        ],
                        [
                            'name' => $table['name'],
                            'x' => $table['x'],
                            'y' => $table['y'],
                            'width' => $table['width'],
                            'height' => $table['height'],
                            'user_created_id' => $table['user_created_id'],
                            'user_updated_id' => $table['user_updated_id']
                        ]
                    );
                });
        }
    }

    /**
     * Handle the LivingRoom "deleted" event.
     *
     * @param  \App\Models\LivingRoom  $livingRoom
     * @return void
     */
    public function deleted(LivingRoom $livingRoom)
    {
        //
    }

    /**
     * Handle the LivingRoom "restored" event.
     *
     * @param  \App\Models\LivingRoom  $livingRoom
     * @return void
     */
    public function restored(LivingRoom $livingRoom)
    {
        //
    }

    /**
     * Handle the LivingRoom "force deleted" event.
     *
     * @param  \App\Models\LivingRoom  $livingRoom
     * @return void
     */
    public function forceDeleted(LivingRoom $livingRoom)
    {
        //
    }
}
