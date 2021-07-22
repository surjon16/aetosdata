<?php

namespace App\Traits\Ebay;

use Session;
use Illuminate\Http\Request;

use App\Traits\Utils;

trait EbayService
{
    use Finding;
    use Trading;

    public function ebay_endpoint(Request $request) {
        $hash = hash_init('sha256');

        hash_update($hash, $request->challenge_code);
        hash_update($hash, 'YkhKaGVYVjZZV3RwTG1Od1pVQm5iV0ZwYkM1amIyMUJSVlJQVTBSQlZFRXVRMDlO');
        hash_update($hash, 'https://aetosdata.com/api/ebay/endpoint');

        $responseHash = hash_final($hash);
        return response()->json(
            ['challengeResponse'=> $responseHash],
            200,
            [ 'content-type'=>'application/json']
        );
    }

}
