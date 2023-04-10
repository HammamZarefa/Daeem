<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PayForBecomeOrganizationMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $organization;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($organization)
    {
        $this->organization = $organization;
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
            ->markdown('mail.pay-for-become-organization')
            ->with([
                'organization' => $this->organization,
                'link' => route('student.payForOrganizationRequest',$this->organization->uuid)
            ]);
    }
}
