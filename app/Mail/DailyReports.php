<?php

namespace App\Mail;

use Carbon\Carbon;
use Dompdf\Dompdf;
use App\Models\Account;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class DailyReports extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Daily Application Reports',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.dailyemail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function build()
    {
     
          $accounts = Account::whereDate('created_at', Carbon::today())
                              ->get();
                            
       
   
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('emails.dailyapplication', ['accounts' => $accounts]));
        $dompdf->render();
       
   

        return $this->markdown('emails.dailyapplication')
            ->attachData($dompdf->output(), 'Applications.pdf');
    }

    
}
