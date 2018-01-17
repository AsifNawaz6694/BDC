<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Welcome extends Mailable
{
    use Queueable, SerializesModels;

        protected $detail;
        protected $file;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($detail, $file)
    {
        exit();
        $this->detail = $detail;
        $this->file = $file;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        exit;
        return $this->view('email.welcome')->with($this->detail)->attach('/assets/admin/', 'name.pdf', [
                        'mime' => 'application/pdf',
                    ]);;
    }
}
