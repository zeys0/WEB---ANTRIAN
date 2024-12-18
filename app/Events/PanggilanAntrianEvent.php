<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Queue\SerializesModels;

class PanggilanAntrianEvent implements ShouldBroadcastNow
{
    use SerializesModels;


    public $jumlahAntrian;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($jumlahAntrian)
    {

        $this->jumlahAntrian = $jumlahAntrian;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('my-channel');
    }

    /**
     * Get the data to broadcast.
     *
     * @return array
     */
    public function broadcastWith()
    {
        return [

            'nomor_antrian' => $this->jumlahAntrian,
            // Informasi tambahan jika diperlukan
        ];
    }
}
