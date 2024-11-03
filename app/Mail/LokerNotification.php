<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Loker; // Pastikan ini adalah namespace model yang benar

class LokerNotification extends Mailable implements ShouldQueue // Implementasikan ShouldQueue
{
    use Queueable, SerializesModels;

    public $loker;

    public function __construct(Loker $loker)
    {
        $this->loker = $loker;
    }

    public function build()
    {
        return $this->view('email.emailInformation')
                    ->subject('Pemberitahuan Lowongan Kerja Baru')
                    ->with([
                        'judul' => $this->loker->judul,
                        'kualifikasi_pendidikan' => $this->loker->kual_pend,
                        'kualifikasi_jurusan' => $this->loker->kual_jurusan,
                        'deskripsi' => $this->loker->isi,
                        'url_tautan' => 'http://example.com/loker/',
                        'email_contact' => 'smkpembangunantukdanabkk@example.com',
                        'cover_image' => $this->loker->cover ? asset('img/loker/' . $this->loker->cover) : null,
                        'date' => $this->loker->tanggal_batas,
                    ]);
    }
}