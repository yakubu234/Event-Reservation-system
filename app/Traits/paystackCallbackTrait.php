<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait paystackCallbackTrait
{
    use ResponseTrait;

    // public function getCallbackData($reference)
    // {
    //     return $this->validate($reference);
    // }

    // public function validate($reference)
    // {
    //     $this->paystack_url = (config('services.paystack.base_url'));
    //     $this->paystack_key = (config('services.paystack.secret'));
    //     try {

    //         $response = Http::withToken($this->paystack_key)->asForm()->get(
    //             "{$this->paystack_url}transaction/verify/" . rawurlencode($reference)
    //         )->json();
    //     } catch (\Throwable $th) {
    //         return $th->getMessage();
    //     }

    //     return $response;
    //     if ($response['status'] = 'true') return $this->success($response['data']['authorization_url'], 'Success, Redirect to payment page', 200);
    //     #if ($response['status'] = 'true') return  redirect($response['data']['authorization_url']);

    //     return $this->error('API returned error: ' . $response['message'], 402);
    // }
}
