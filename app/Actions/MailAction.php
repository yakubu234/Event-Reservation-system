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

    public function fireMail(array $data)
    {
        $this->fromAddress = (config('services.email.from_address'));
        $this->fromName = (config('services.email.from_name'));
        $formData = [
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
        ];

        return $this->sendMail($formData);
    }

    private function sendMail($formData)
    {

        $this->apiKey = (config('services.email.mailgun_api_key'));
        $this->MailgunUrl = (config('services.email.mailgun_url'));

        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($ch, CURLOPT_USERPWD, 'api:' . $this->apiKey);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v3/' . $this->MailgunUrl . '/messages');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $formData);
            $result = curl_exec($ch);
            curl_close($ch);
            return $result;
        } catch (Exception $e) {
            Log::info(array($e->getMessage()));
            return $e->getMessage();
        }
    }
}
