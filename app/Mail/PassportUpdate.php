<?php

namespace App\Mail;

use App\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PassportUpdate extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The client instance.
     *
     * @var Client
     */
    protected $client;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.profile-update')
            ->with([
                'client' => $this->client,
            ]);
    }
}
