<?php

namespace App\Traits\Ebay;

use Session;
use Illuminate\Http\Request;

use App\Traits\Utils;
use Illuminate\Support\Facades\Http;

trait EbayService
{
    use Browse;
    use Finding;
    use Fullfillment;
    use Marketing;
    use OAuth;
    use Shopping;
    use Trading;

    public function search_store(Request $request) {
        $findingResult = $this->find_items_advanced($request);
        $_request = new Request();
        $_request->setMethod('POST');
        $_request->request->add(['items' => $findingResult->searchResult['item']]);
        $shoppingResult = $this->get_multiple_items($request);
        return [$findingResult, $shoppingResult];
    }

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

    public function ebay_consent_accepted(Request $request) {
        return $this->get_user_token($request->code);
    }

    public function ebay_consent_declined(Request $request) {

    }

    public function test_point(Request $request)
    {
        $response =
            Http::withHeaders([
                    'X-EBAY-C-MARKETPLACE-ID' => 'EBAY_US',
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ])
                ->withToken('v^1.1#i^1#f^0#p^3#I^3#r^0#t^H4sIAAAAAAAAAOVZbWgb5x23bNnFeevbWJK+bOq1JW3KSc9JJ93pFgnk2Caa45daahK7LebRc8\/JT3xv3POcbaVb63iQsa4dS2GDLSzxp+6LuzEobP3QMkLHxgahWV8oHWvT7cPC6KClGwmk6fac7CiyQxNLKkQwfRH33P\/t93+7\/\/8OLPT07j6279iFraFbOpcWwEJnKCRtBr093Y9s6+q8q7sD1BGElhYeWAgvdp3fQ6Fluto4pq5jUxyZt0ybatXDjOB7tuZASqhmQwtTjSGtkBver8WjQHM9hznIMYVIvj8jpJMqlJKGhCQppaTjOj+1r8gsOhnBAACgOEwlEnICqIrM71Pq47xNGbRZRoiDuCQCVQTxIlC0BNCAGlVkdVKIHMAeJY7NSaJAyFbN1aq8Xp2t1zcVUoo9xoUI2XxusDCay\/cPjBT3xOpkZVf9UGCQ+XTt1V5Hx5ED0PTx9dXQKrVW8BHClAqx7IqGtUK13BVjmjC\/6moFGXLCgEhOpJMgncRfiisHHc+C7Pp2BCdEF40qqYZtRljlRh7l3igdxoitXo1wEfn+SPD3qA9NYhDsZYSBvtzEY4WBcSFSGBvznFmiYz1AKvFkScqyEheyDFPuQuxNUd877NhSalXXisBVT69TttexdRL4jUZGHNaHueF4vXvide7hRKP2qJczWGBUPV265kZ5MojrSiB9Nm0HocUW90WkennjIFzJiqt58GXlRTwJMdYNHakyRgpKrM2LoNaby41sEJ7c2FgssAWXYEW0oDeDmWtChEXE3etb2CO6lkga8YRqYFFPpQ1RThuGWErqKVEyMAYYl0oorf6fpQhjHin5DNfSZP2NKs6MUECOi8cck6CKsJ6k2nlWk2KeZoRpxlwtFpubm4vOJaKOV47FAZBih4b3F9A0tqBQoyU3JhZJNT0Q7yKcXmMVl1szz7OPK7fLQjbh6WPQY5U+v8KvC9g0+d+VDF5jYXb96RdA3WsS7ociV9ReSPc5lGG9JWimUyb2MGbTjn5TsQW1fg2+oHry\/S3hy7lu3rJ8Bksmzt9ciNcmakpNy1JL8ILephFoaMyZwXb7Zej4wOD4QGHfVHF0aGCkJaQFjDzM2gvd0HBsMn1kom\/ImjDn8\/oQqqQOT8wUZ4oHEo4sHz64\/8iARUg8d3D20UxL4IfLpM1yV2whb4Na59IGyn67oVLjhgT0ZFJSIIBysiTDFErjpGoY6QQsYdhyK2ozvN90pu1xWLFEiJlDdcjEQt8hManKqQTfioCYkgwVqimlJdw0GBTaC3fAT7kA6JJo0EKjyLFiDuTjcHA0VbU4shGiWMmvcP069qIehrpjm5WN85V9Pv6tcG+MifJZJroyyXIYDWpcy9wAD7Fn+fTjeJVmFAa1XhPQAB9EyPFt1ozKVdYGOAzfNIhpBsNuMwrr2Bsx04ZmhRFEm49jdZ3h8aGkPM0alcPP+A7E+RFkkI+BTSQwnXZcN8hExOftBurFMHi9QB9VV8fGjOVLVHWJbxZsjZ93CWK2LMWddmzcshSo6x6mTQewJifYt1sWsvJKqNlaN4gd9F3aSH\/ha2ZU96DRSPW4\/KkVlKtOqBs8ahpT1wC5h7l8uPFMXcfUbDhshxGDoBUZ1C9R5BG3iXr5Qjk1w1p6tntYJx5GbMr3SHs94oPRZiqYbXinnOrH4rpRRyxTy9KPtAQ+8HkbrM7XQB\/LFQoHR8dbW5z78ez1ptXwYujNm7IzI8UAQAairKhYlGUIRVVPyKKiyCjFR3YZpBIt4SawzZZMKRVXVDUNlA3jWndQ9yLvmte4sbWfUrId1Z+0GHoVLIZe6QyFgAJE6RHwcE\/XY+GuLQLl3TNKoa2XnPkogUaUjx42f154ODqDKy4kXmdPiLz3FrpY9xFn6Umwo\/YZp7dL2lz3TQfcc\/VOt3Tr9q1xCaggztECoE6C+6\/eDUtfDX\/lt\/TOMz+85ciDv7JOP\/vUoPPCE994ZgfYWiMKhbo7eGZ29P7gb58v\/vk7bnh39kUzvTV89Ni3nDf2b3\/uvz87d7pj\/va\/7vzg\/PK\/f7otu3vX0e2Fjy7HLkhvD5+8fEgJn++9\/Nl9Zy6d3nnHc3fPLH0q\/\/zs2a+dmtrij+x5eunJx18ubT7ZvYuOPZV6\/XvHl3c5W9BPlJc+fPy13ynHX5\/\/xWu3vl+8+8OTL\/1rIh069fLgIokub1u8q5T49r2hT059YL6xUM4\/dN8\/j9\/z1ie\/jzx726YTO5+W\/zBIn9cv+NvuPfHOdx\/aPXrH7Wf+8xfaufzjf9x27sUMds\/96PTyzvcvfv2Fv5ePPvzm5MXffNz\/9tF3\/3R2x6b5wdKJX\/8RZx+cm90U\/n5xqP\/OZy4qPeovL320\/fmeS9ZKGP8HkfS+M14bAAA=')
                ->get('https://api.sandbox.ebay.com/buy/marketplace_insights/v1_beta/item_sales/search?q=(110534653610,110536462181,110535547212)&filter=lastSoldDate:[2021-05-20T00:00:00Z..2021-08-02T00:00:00Z]');

        return $response;

        // $_headers = array(
        //     'X-EBAY-API-DEV-NAME: ' . config('ebay.sandbox.credentials.devId'),
        //     'X-EBAY-API-APP-NAME: ' . config('ebay.sandbox.credentials.appId'),
        //     'X-EBAY-API-CERT-NAME: ' . config('ebay.sandbox.credentials.certId'),
        //     'X-EBAY-API-SITEID: ' . config('ebay.siteId'),
        //     'X-EBAY-C-MARKETPLACE-ID: EBAY_US',

        //     'Authorization: Bearer v^1.1#i^1#p^1#f^0#I^3#r^0#t^H4sIAAAAAAAAAOVYbWwURRjuXT+wIjUmikglORcwlbp7s3sfvdtwp1co4WhLC1cLLSLO7s622+7tXnZm216joammMQYlCgkhaFKEiNHEIDUQjAQSMCH8MEKEECDE+EMrIj8MiRA+4uxdKddKoKVnbOL9uezM+77zPs+8HzMD+kpKFw0sH/hrlmuGe7AP9LldLn4mKC0priwrdM8tLgA5Aq7BvgV9Rf2Fw4sxTOopcTXCKdPAyNOT1A0sZgYjjG0ZogmxhkUDJhEWiSwmYvV1osABMWWZxJRNnfHEl0aYKllWg9AnS4LsR0JQoqPGHZtNZoQJgXA4oIQCsoR4GODDdB5jG8UNTKBBIowABJ4FIRYITcAvBgIiAFwgGGxlPM3IwpppUBEOMNGMu2JG18rx9f6uQoyRRagRJhqPLUs0xOJLa1Y2Lfbm2IqO8JAgkNh47NcSU0GeZqjb6P7L4Iy0mLBlGWHMeKPZFcYaFWN3nHkI9zNUI9kfQFCQJZ/EC2Ek5IXKZaaVhOT+fjgjmsKqGVERGUQj6QcxStmQOpBMRr5WUhPxpR7nb5UNdU3VkBVhaqpjLbHGRia6wmw3VsN0koWImFiBhE1Ur2UDIX/QJ/M8YIO8GoKhYNXIQllrIzSPW2mJaSiaQxr2rDRJNaJeo/Hc+HO4oUINRoMVU4njUa5ccJRDodXZ1Owu2qTdcPYVJSkRnszng3dgVJsQS5NsgkYtjJ/IUBRhYCqlKcz4yUwsjoRPD44w7YSkRK+3u7ub6/ZxptXmFQDgvWvr6xJyO0pChso6uZ6V1x6swGoZKDKimlgTSTpFfemhsUodMNqYqC8YCvv5Ed7HuhUdP/qPgRzM3rEZka8MUQJ+WZAVFfr8Pr5KBfnIkOhIkHodP5AE02wSWp2IpHQoI1amcWYnkaUpoi+gCr6QilglGFZZf1hVWSmgBFleRQggJElyOPR/SpSJhnoCyRYieYn1vMV5bb23NdzbUl2bbNF74kqtnA52tHQ2dTY1+0y/v2NNXW9NUtOE2JquVZGJZsM9wS/RNcpME10/HwQ4uZ4/EpabmCBlSvASsplCjaauyenptcE+S2mEFklX22n6nUC6Tv+mBDWWSsXzU7HzBnKSxeLhcOevU/1HXeqeqLATuNMLlaOPqQGY0jjah5xcT3OymfSakB5CnOENGa894wTvKeSV7DTXZiNMqCcKPQdOWEmjxZyjLU2ZuEq2YVIQE1ehlwzFlslDLZTpzBxlU2trJ3hSa/ZMhRTJ1junFHQavTxMq5CjcLO4NSV76ucy4DncJXMWwqZt0QsP1+AcgpvMTmTQIwWxTF1HVvPU0s8ppsmkTaCko+lWVfNQXTQ4ufNOUb/rxL+Oiw8KVaEQ4AGYEjY5c6LZMN16Qr574STuNt6xLy3RgsyP73cdAv2ug26XC1QBlq8EL5QUvlJU+BiDaTXhMDQUyezhNKhytJAZkNgW4jpROgU1y13i0s79KF/LeeMZXA/mjL7ylBbyM3OefMCzd2eK+cefniXwIAQE4A8EAGgF8+/OFvGzi548OX/XiqHfX7vVX97/7dAj5W9sPDt7H5g1KuRyFRfQgCx45yvv1Q6xb0F8MPxDqq3oct2OxcHu2rcuVoX7y8pnL6zo3TofiQeZ1mb7rAlevb1JBHtP6QNzPz/9M3etRvQsuHr0xbIrt/bNObae+M/drATPbHl598mrH+/c88vttWdafrq4v7J3z9HnZzS/3th1rnJh13vz1IrDH5Zs7infuuvLHZueGK74oOOLzeofp657P7pUtqjiOfYCTO+AW85vOn95wDd4yFVwrVtqfVs5Yfq+3z70zfVtyvV17x/87Wuu9MLud29sK/216rTbfezP2KX9qxs/KxriDx+pPy5FPx3s2Nl6es7mvXUH3jzTsM1cN/xSp7H9yJV5w6G6pz65OXDD/13X8fYNBzY+ui+7jX8Dr0mZQn0TAAA=',
        //     'Accept: application/json',
        //     'Content-Type: application/json',
        // );

        // //initialise a CURL session
        // $connection = curl_init();
        // //set the server we are using (could be Sandbox or Production server)
        // curl_setopt($connection, CURLOPT_URL, 'https://api.sandbox.ebay.com/buy/marketplace_insights/v1_beta/item_sales/search?q=(110534653610,110536607790)&filter=lastSoldDate:[2021-05-20T00:00:00Z..2021-08-02T00:00:00Z]');

        // //stop CURL from verifying the peer's certificate
        // curl_setopt($connection, CURLOPT_SSL_VERIFYPEER, 0);
        // curl_setopt($connection, CURLOPT_SSL_VERIFYHOST, 0);

        // //set the headers using the array of headers
        // curl_setopt($connection, CURLOPT_HTTPHEADER, $_headers);

        // //set method as POST
        // // curl_setopt($connection, CURLOPT_POST, 1);

        // //set the XML body of the request
        // // curl_setopt($connection, CURLOPT_POSTFIELDS, $_body);

        // //set it to return the transfer as a string from curl_exec
        // curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);

        // //Send the Request
        // $response = curl_exec($connection);

        // //print $response;
        // $result = simplexml_load_string($response);

        // //close the connection
        // curl_close($connection);

        // return json_encode($result);

    }


}
