<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PayForBecomeCoachMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $instructor, $verification_code;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($instructor, $verification_code)
    {
        $this->instructor = $instructor;
        $this->verification_code = $verification_code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from(get_option('MAIL_FROM_ADDRESS'), get_option('app_name'))
            ->subject('Pay For Become A Coach '. get_option('app_name'))
            ->markdown('mail.pay-for-become-coach')
            ->with([
                'instructor' => $this->instructor,
                'verification_code' => $this->verification_code,
                'link' => route('student.payForCoachRequest',$this->instructor->uuid)
            ]);
    }
}
