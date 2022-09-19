<?php

namespace App\Traits;

use App\Actions\Events\MakeReservationAction;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

trait paystackCallbackTrait
{
    use ResponseTrait;

    public function getCallbackData($reference)
    {
        return $this->validateReference($reference);
    }

    public function validateReference($reference)
    {
        $this->paystack_url = (config('services.paystack.base_url'));
        $this->paystack_key = (config('services.paystack.secret'));
        try {

            $response = Http::withToken($this->paystack_key)->asForm()->get(
                "{$this->paystack_url}transaction/verify/" . $reference
            )->json();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }

        if ($response['message'] == "Verification successful") {
            return (new MakeReservationAction())->payloadFromPaystackCallback($response['data']);
        }

        return $this->error('Ooopss!! Unable to verify your payment this time ' . $response['message'], 402);
    }
}
