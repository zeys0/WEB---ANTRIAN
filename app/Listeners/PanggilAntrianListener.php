<?php

namespace App\Listeners;

use App\Events\PanggilAntrianEvent;
use BeyondCode\LaravelWebSockets\WebSockets\Channels\ChannelManager;

class PanggilAntrianListener
{
    /**
     * Handle the event.
     *
     * @param  PanggilAntrianEvent  $event
     * @return void
     */
    public function handle(PanggilAntrianEvent $event)
    {
        $data = [
            'kode_loket' => $event->kodeLoket,
            'nomor_antrian' => $event->nomorAntrian,
        ];

        $channelManager = app(ChannelManager::class);
        $channelManager->broadcastToAll("antrian-panggil", $data);
    }
}
