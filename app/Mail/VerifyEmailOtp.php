<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerifyEmailOtp extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;

    public function __construct($otp)
    {
        $this->otp = $otp;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Verify Your Email Address'
        );
    }

    public function build()
    {
        // Use a public URL for the logo
        $logoUrl = public_path('logo/logo.png');

        return $this->view('layout.email')
                    ->with(['otp' => $this->otp, 'logoUrl' => $logoUrl]);
    }
    
}
