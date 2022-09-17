<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

trait InitiatePaystackTrait
{
    use ResponseTrait;

    public function proceedToPayment(array $data)
    {
        return $this->prepareForPayment($data);
    }

    private function prepareForPayment($data)
    {
        $metadata = json_encode($data);
        $this->paystack_url = (config('services.paystack.base_url'));
        $this->paystack_key = (config('services.paystack.secret'));
        $this->callback_url = ($data['calback_url']) ? $data['calback_url'] : (config('services.paystack.callback'));
        Log::info($this->callback_url);
        try {

            $response = Http::withToken($this->paystack_key)->asForm()->post(
                "{$this->paystack_url}transaction/initialize",
                [
                    'amount' => $data['amount'],
                    'email' => $data['email'],
                    'name' => $data['name'],
                    'metadata' => $metadata,
                    'callback_url' => $this->callback_url
                ]
            )->json();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }

        if ($response['status'] = 'true') return $this->success($response['data']['authorization_url'], 'Success, Redirect to payment page', 200);
        #if ($response['status'] = 'true') return  redirect($response['data']['authorization_url']);

        return $this->error('API returned error: ' . $response['message'], 402);
    }
}
