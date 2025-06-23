<?php

namespace App\Mail;

use App\Models\Loan;
use App\Models\Motor;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LoanEmail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('galkarent@gmail.com')
                    ->subject('Return back loan motor cycle')
                    ->view('home')
                    ->with([
                        'title' => 'Pengembalian Sepeda Motor',
                        'body' => 'Hello Galkarent User, your loan is in the process of returning, please visit our website again, for the motorcycle return process, it can be returned quickly'
                    ]);
    }
}
