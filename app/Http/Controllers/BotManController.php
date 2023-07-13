<?php
namespace App\Http\Controllers;
   
use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
   
class BotManController extends Controller
{

    
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');
   
        $botman->hears('{message}', function($botman, $message) {
   
            if ($message == 'hi') {
                $this->askName($botman);
            }

            else if($message == '1') {
                $botman->reply('Berikut merupakan langkah-langkah memesan jasa design di PT Rovina Jaya Sentosa <br>
                                1. Tekan halaman product <br> 
                                2. Pilih Jasa Design <br>
                                3. Maka akan muncul form pemesanan <br>
                                4. Masukkan Email, Nomor Handphone, Skesta yang ingin di designkan (optional), Deskripsi dan bukti transaksi Dp sebesar Rp. 100.000,- <br>
                                5. Apply Form Pemesanan <br>');
            } 
            else if($message == '2') {
                $botman->reply('Berikut merupakan langkah-langkah memesan jasa konstruksi di PT Rovina Jaya Sentosa <br>
                                1. Tekan halaman product <br> 
                                2. Pilih Jasa Konstruksi <br>
                                3. Maka akan muncul form pemesanan <br>
                                4. Masukkan Email, Gambar, Deskripsi dan Nomor Handphone <br>
                                5. Apply Form Pemesanan <br>');
            }
            else if($message == '3') {
                $botman->reply('Berikut merupakan langkah-langkah apply career di PT Rovina Jaya Sentosa <br>
                                1. Tekan halaman career <br> 
                                2. Pilih career yang tersedia atau pilih apply career<br>
                                3. Maka akan muncul form career<br>
                                4. Masukkan Nama Lengkap, Career yang ingin diapply, Email, CV *Wajib, Berkas Pendukung Lainnya *Optional, dan Nomor Handphone<br>
                                5. Apply Form Career <br>');
            }

            else if($message == '4'){
                $botman->reply('Berikut merupakan langkah-langkah memesan rumah di PT Rovina Jaya Sentosa <br>
                                1. Tekan halaman produk <br> 
                                2. Pilih perumahan yang tersedia atau pilih pesan perumahan<br>
                                3. Maka akan muncul form perumahan<br>
                                4. Masukkan Email, Nomor Handphone, Booking (Perumahan yang ingin dibooking), Bukti Pembayaran Booking, Syarat Pengambilan Rumah (KTP, KK), dan lengkapi persyaratan kredit jika memakai kredit<br>
                                5. Apply Form Pemesanan <br>');
            }

            else if($message == '5') {
                $botman->reply('Sertifikat atau piagam lainnya');
            }
            
            else {
                $botman->reply("Pilih angka yang dari pertanyaan yang ingin anda tanyakan :)<br>
                                1. Bagaimana cara memesan jasa design di PT Rovina Jaya Sentosa? <br>
                                2. Bagaimana cara memesan jasa konstruksi di PT Rovina Jaya Sentosa? <br>
                                3. Bagaimana apply career di PT Rovina Jaya Sentosa? <br>
                                4. Bagaimana cara memesan Perumahan di PT Rovina Jaya Sentosa? <br>
                                5. Apa Saja Berkas Pendukung Lainnya pada CV? 
                                ");  
            }

           
        });
   
        $botman->listen();
    }
   
    /**
     * Place your BotMan logic here.
     */
    public function askName($botman)
    {
        $botman->ask('Hi! Siapa nama kamu?', function(Answer $answer) {
   
            $name = $answer->getText();
   
            $this->say('Senang bertemu dengan anda '.$name);
        });
    }

    public function askJasaDesign()
    {
        $this->say('1. Tekan halaman product 
                    2. Pilih Jasa Design');
    }
}