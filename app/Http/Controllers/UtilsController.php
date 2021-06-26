<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Support\Str;

class UtilsController extends Controller
{
    private function uniqueId()
    {
        // generate a 20 character ransom string
        return 'LFX_' . Str::random(20);
    }

    public function generateReference()
    {
        $uniqueId = $this->uniqueId();
        // Validate that the reference doesn't already exist
        $client = Client::where('client_id', $uniqueId)->first();
        if (!$client) {
            // return the reference if unique
            return $uniqueId;
        } else {
            // generate a new referemce if it's not unique
            $this->generateReference();
        }
    }
}
