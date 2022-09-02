<?php

namespace App\Actions;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;


class MailAction extends Mailable
{

    use Queueable, SerializesModels;

    public function FireMail(array $data)
    {

        $this->fromAddress = (config('keys.email.from_address'));
        $this->fromName = (config('keys.email.from_name'));
        $this->apiKey = (config('keys.email.mailgun_api_key'));
        $this->MailgunUrl = (config('keys.email.mailgun_url'));

        try {
            $response = Http::withHeaders([
                "Content-Type" => "application/x-www-form-urlencoded"
            ])->asForm()->post("https://api:{$this->apiKey}@api.mailgun.net/v3/{$this->MailgunUrl}/messages", [
                'from' => "{$this->fromName} <{$this->fromAddress}>",
                'to' => "{$data['to_name']}  <{$data['to_email']}>",
                'subject' => "{$data['subject']}",
                'text' => isset($data['text']) ? $data['text'] : "",
                'html' => isset($data['html_message']) ? $data['html_message'] : "",
                'attachment' => isset($data['attachment']) ? $data['attachment'] : "",
                'bcc' => isset($data['to_bcc']) ? $data['to_bcc'] : "",
                'cc' => isset($data['to_cc']) ? $data['to_cc'] : "",
                'o:tag' => isset($data['o_tag']) ? $data['o_tag'] : "",
                'o:tracking' => "yes",
                'h:Reply-To' => isset($data['reply_to']) ? $data['reply_to'] : "support@cashpally.com"
            ])->json();

            $this->log($response['message'] . " for mail: " . $data['to_email']);
        } catch (Exception $e) {
            $this->log("Line 45: for mail: in Exception : " . array($e->getMessage()));
        }
    }
}
