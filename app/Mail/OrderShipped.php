<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;
use GuzzleHttp\Psr7\Request;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @param array $user User
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->user->email)
                    ->subject('Welcome to Phone.com')
                    ->view('emails.order_shipped');
    }

    /**
     * Build the message.
     *
     * @param string $request Request
     *
     * @return void
     */
    public function sendMail(Request $request)
    {
        $email = $request->email;
        Maill::to($email)->send(new OrderShipped());
    }
}
