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
        // Encode the logo as base64
        $data = base64_encode(file_get_contents(public_path('logo/logo.png')));
        $src = 'data:image/png;base64,' . $data;

        // Return the view with the OTP and logo
        return $this->view('layout.email')
                    ->with(['otp' => $this->otp, 'logo' => $src]);
    }
}
