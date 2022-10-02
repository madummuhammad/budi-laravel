<?php

namespace App\Session;

use App\Models\AnalyticsUser;

class DatabaseSessionHandler extends \Illuminate\Session\DatabaseSessionHandler
{
    /**
     * {@inheritDoc}
     */
    public function write($sessionId, $data)
    {
        $user_id = (auth()->guard('visitor')->check()) ? auth()->guard('visitor')->user()->id : null;

        if ($this->exists) {
            $anlytic = AnalyticsUser::find($sessionId);
            $anlytic->payload = base64_encode($data);
            $anlytic->last_activity = time();
            if(!$anlytic->user_id){
                $anlytic->user_id = $user_id;
            }
            $anlytic->save();

            $this->getQuery()->where('id', $sessionId)->update([
                'payload' => base64_encode($data), 'last_activity' => time(), 'user_id' => $user_id,
            ]);
        } else {

            $created_at = date('Y-m-d H:i:s');

            $anlytic = new AnalyticsUser;
            $anlytic->id = $sessionId;
            $anlytic->payload = base64_encode($data);
            $anlytic->last_activity = time();
            $anlytic->created_at = $created_at;
            $anlytic->user_id = $user_id;
            $anlytic->save();

            $this->getQuery()->insert([
                'id' => $sessionId, 'payload' => base64_encode($data), 'last_activity' => time(), 'user_id' => $user_id, 'created_at' => $created_at,
            ]);
        }

        $this->exists = true;
    }
}
