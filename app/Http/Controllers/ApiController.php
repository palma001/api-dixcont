<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function exchangeRate(Request $request)
    {
        $url = 'https://api.apis.net.pe/v1/tipo-cambio-sunat?fecha=';
        $token = "apis-token-1.aTSI1U7KEuT-6bbbCguH-4Y8TI6KS73N";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . $request->start_date,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 2,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Referer: https://apis.net.pe/tipo-de-cambio-sunat-api',
                'Authorization: Bearer ' . $token
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $changeType = json_decode($response);

        return response()->json($changeType, 200);
    }

    public function getDocuments($documentType, $documentNumber)
    {
        $token = 'apis-token-1.aTSI1U7KEuT-6bbbCguH-4Y8TI6KS73N';
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.apis.net.pe/v1/{$documentType}?numero=" . $documentNumber,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 2,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Referer: https://apis.net.pe/consulta-dni-api',
                'Authorization: Bearer ' . $token
            )
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response);

        return response()->json($data, 200);
    }
}
