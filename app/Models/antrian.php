<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use BeyondCode\LaravelWebSockets\WebSockets\Channels\ChannelManager;

class antrian extends Model
{
    use HasFactory;
    public function lokets()
    {
        return $this->belongsTo(Loket::class);
    }
    public static function panggilAntrian($kodeLoket, $nomorAntrian)
    {
        $antrian = self::where('kode_loket', $kodeLoket)
            ->where('nomor_antrian', $nomorAntrian)
            ->first();

        if ($antrian) {
            $antrian->status = 'dipanggil';
            $antrian->save();

            $channelManager = app(ChannelManager::class);
            $channelManager->broadcastToAll("antrian-panggil", [
                'kode_loket' => $kodeLoket,
                'nomor_antrian' => $nomorAntrian,
            ]);

            return true;
        }

        return false;
    }
}
