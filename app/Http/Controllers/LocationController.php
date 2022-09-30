<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class LocationController extends Controller
{
    public $url = 'http: //api.iksgroup.co.id/apilokasi';
    public $apiKey = '423fcf2c000f8400f535f93f840e9c0e';

    public function province()
    {
        $response = $this->curl("https://dev.farizdotid.com/api/daerahindonesia/provinsi");
        return response()->json(json_decode($response));
    }

    public function city($id)
    {
        $response = $this->curl("https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=" . $id);
        return response()->json(json_decode($response));
    }

    public function district($id)
    {
        $response = $this->curl("https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=" . $id);
        return response()->json(json_decode($response));
    }

    public function sub_district($id)
    {
        $response = $this->curl("https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=" . $id);
        return response()->json(json_decode($response));
    }

    public function curl($url = "")
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // return response()->json(json_decode($response));
            return $response;
        }

    }
}