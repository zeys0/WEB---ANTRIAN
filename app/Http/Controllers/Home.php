<?php

namespace App\Http\Controllers;

use App\Events\PanggilanAntrianEvent;
use Illuminate\Http\Request;
use App\Models\antrian;
use App\Events\Pesan;
use Pusher\Pusher;
use Exception;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

use Mike42\Escpos\CapabilityProfile;

class Home extends Controller
{
   public function index()
   {
      return view('components/menu');
   }


   public function antrian()
   {
      return view('components/regisAntrian');
   }

   public function tambahAntrian()
   {
      // Mendapatkan nomor antrian terakhir untuk loket tertentu
      $lastQueueNumber = Antrian::where('kode_loket', 'A')->orderBy('id', 'desc')->first();

      // Mengambil nomor antrian baru
      if ($lastQueueNumber) {
         $lastNumber = intval(substr($lastQueueNumber->nomor_antrian, strpos($lastQueueNumber->nomor_antrian, '-') + 1));
         $newQueueNumber = 'A-' . str_pad($lastNumber + 1, 2, '0', STR_PAD_LEFT);
      } else {
         // Jika ini antrian pertama untuk loket ini
         $newQueueNumber = 'A-01';
      }

      // Simpan nomor antrian baru ke dalam basis data
      $antrian = new Antrian();
      $antrian->nomor_antrian = $newQueueNumber;
      $antrian->kode_loket = 'A';
      $antrian->save();

      // Membuat pesan tanggapan
      // $message = 'Antrian dengan kode ' . $antrian->kode_loket . ' dan nomor antrian ' . $antrian->nomor_antrian . ' berhasil ditambahkan';
      // return response()->json(['message' => $message]);
      // try {
      //    $this->cetakNomorAntrian($antrian->nomor_antrian);
      //    $message .= ' Nomor antrian telah dicetak.';
      // } catch (Exception $e) {
      //    $message .= ' Namun, terjadi kesalahan saat mencetak: ' . $e->getMessage();
      // }


      $message = 'Antrian dengan kode ' . $antrian->kode_loket . ' dan nomor antrian ' . $antrian->nomor_antrian . ' berhasil ditambahkan';
      return response()->json([
         'kode_loket' => $antrian->kode_loket,
         'nomor_antrian' => $antrian->nomor_antrian,
         'message' => $message,
      ]);
   }


   // PRINT ESCPOST
   // private function cetakNomorAntrian($nomorAntrian)
   // {
   //    try {
   //       // Ganti dengan detail koneksi printer Anda

   //       $profile = CapabilityProfile::load("simple");
   //       $connector = new WindowsPrintConnector("printer_cano");
   //       $printer = new Printer($connector, $profile);

   //       // Format cetak
   //       $printer->setJustification(Printer::JUSTIFY_CENTER);
   //       $printer->text("Nomor Antrian Anda: \n");
   //       $printer->feed();
   //       $printer->setTextSize(2, 2);
   //       $printer->text($nomorAntrian . "\n");
   //       $printer->feed(2);

   //       // Akhir cetak
   //       $printer->cut();
   //       $printer->close();
   //    } catch (Exception $e) {
   //       throw $e;
   //    }
   // }



   public function display()
   {

      return view('components/display', []);
   }



   public function rincian()
   {

      // Mendapatkan data nomor antrian dari model Antrian
      $antrians = Antrian::paginate(5);

      // Mendapatkan jumlah total antrian
      $jumlahAntrian = Antrian::count();

      // Contoh: Mendapatkan antrian yang sedang dipanggil
      $antrianSekarang = Antrian::where('status', 'dipanggil')->count();

      // Menghitung sisa antrian
      $sisaAntrian = $jumlahAntrian - $antrianSekarang;

      // Mengirimkan data antrians dan informasi antrian ke view
      return view('components.rincian', [
         'antrians' => $antrians,
         'jumlahAntrian' => $jumlahAntrian,
         'antrianSekarang' => $antrianSekarang,
         'sisaAntrian' => $sisaAntrian,
      ]);
   }





   public function panggilAntrian($kodeLoket, $nomorAntrian)
   {
      // Temukan data Antrian yang sesuai
      $antrian = Antrian::where('kode_loket', $kodeLoket)
         ->where('nomor_antrian', $nomorAntrian)
         ->first();

      if ($antrian) {
         // Lakukan tindakan panggil antrian di sini, seperti mengubah status menjadi 'dipanggil'
         $antrian->status = 'dipanggil';
         $antrian->save();


         // Mengirim data ke Pusher ke channel 'my-channel' dengan event 'my-event'

         event(new PanggilanAntrianEvent($antrian));
         // Mengembalikan respons JSON dengan pesan dan informasi antrian
         return response()->json([
            'kode_loket' => $kodeLoket,
            'nomor_antrian' => $nomorAntrian
         ]);
      }


      // Mengembalikan pesan error jika antrian tidak ditemukan
      return response()->json(['error' => 'Antrian tidak ditemukan'], 404);
   }



   public function admin()

   {
      // Mendapatkan data nomor antrian dari model Antrian
      $antrians = Antrian::paginate(5);

      // Mendapatkan jumlah total antrian
      $jumlahAntrian = Antrian::count();

      // Contoh: Mendapatkan antrian yang sedang dipanggil
      $antrianSekarang = Antrian::where('status', 'dipanggil')->count();

      // Menghitung sisa antrian
      $sisaAntrian = $jumlahAntrian - $antrianSekarang;

      // Mengirimkan data antrians dan informasi antrian ke view
      return view('components/das', [
         'antrians' => $antrians,
         'jumlahAntrian' => $jumlahAntrian,
         'antrianSekarang' => $antrianSekarang,
         'sisaAntrian' => $sisaAntrian,
      ]);
   }


   public function hapusAntrian($id)
   {
      // Temukan antrian berdasarkan ID
      $antrian = Antrian::find($id);

      if ($antrian) {
         // Hapus antrian
         $antrian->delete();

         // Pesan yang akan ditampilkan setelah berhasil menghapus antrian
         return redirect()->back()->with('success', 'Antrian berhasil dihapus');
      }

      // Redirect atau respons dengan pesan error jika antrian tidak ditemukan
      return redirect()->back()->with('error', 'Antrian tidak ditemukan');
   }

   public function reset()
   {
      // Hapus semua data dari tabel Antrian
      Antrian::truncate();

      // Pesan yang akan ditampilkan setelah berhasil menghapus antrian
      return redirect()->back()->with('success', 'Antrian berhasil direset');
   }

   // public function trigger()
   // {
   //    event(new Pesan('halo'));
   //    return view('welcome');
   // }

   public function folder()

   {
      // Mendapatkan data nomor antrian dari model Antrian
      $antrians = Antrian::paginate(5);

      // Mendapatkan jumlah total antrian
      $jumlahAntrian = Antrian::count();

      // Contoh: Mendapatkan antrian yang sedang dipanggil
      $antrianSekarang = Antrian::where('status', 'dipanggil')->count();

      // Menghitung sisa antrian
      $sisaAntrian = $jumlahAntrian - $antrianSekarang;

      // Mengirimkan data antrians dan informasi antrian ke view
      return view('components/folder', [
         'antrians' => $antrians,

      ]);
   }
   public function cetak()

   {
      // Mendapatkan data nomor antrian dari model Antrian
      $antrians = Antrian::all();


      return view('components/cetak', [
         'antrians' => $antrians,

      ]);
   }
}
