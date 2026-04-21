<?php
namespace App\Http\Services\Api;
use App\Traits\ManegeImagesTrait;
use App\Models\Kyc;

class KycService
{
    use ManegeImagesTrait;
    public function create($data, $user)
    {
        $exists = Kyc::where('user_id', $user->id)
            ->where('type', $data['type'])
            ->whereIn('status', ['pending', 'approved'])
            ->exists();
        if ($exists) {
            return [
                'status' => false,
                'message' => 'You already submitted this KYC'
            ];
        }
        $front = $this->uploadImage($data['front_id'], 'kyc');
        $back = $this->uploadImage($data['back_id'], 'kyc');
        $selfie = $this->uploadImage($data['selfie'], 'kyc');

        $kyc = new Kyc();
        $kyc->user_id = $user->id;
        $kyc->type = $data['type'];
        $kyc->front_id = $front;
        $kyc->back_id = $back;
        $kyc->selfie = $selfie;

        // ✔ broker only
        if ($data['type'] == 'broker') {

            if (isset($data['cv'])) {
                $kyc->cv = $this->uploadImage($data['cv'], 'kyc');
            }

            if (isset($data['contract'])) {
                $kyc->contract = $this->uploadImage($data['contract'], 'kyc');
            }

            $kyc->facebook_link = $data['facebook_link'] ?? null;
            $kyc->twitter_link = $data['twitter_link'] ?? null;
            $kyc->linkedin_link = $data['linkedin_link'] ?? null;
            $kyc->instagram_link = $data['instagram_link'] ?? null;
        }

        $kyc->save();

        return [
            'status' => true,
        ];
    }
}