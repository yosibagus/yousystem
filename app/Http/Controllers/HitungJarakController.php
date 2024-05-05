<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HitungJarakController extends Controller
{
    public function index($destinasi)
    {
        // $destinasi = '-7.008388269417333,113.84431298909102';
        $origin = '-7.006672007148823,113.84435156944333'; //uniba

        $url = 'https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=' . $origin . '&destinations=' . $destinasi . '&key=AIzaSyA1MgLuZuyqR_OGY3ob3M52N46TDBRI_9k';

        // Initialize cURL session
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response, true);

        if ($data['status'] == 'OK') {
            $distanceValue = $data['rows'][0]['elements'][0]['distance']['text'];
        } else {
            $distanceValue = $data['status'];
        }

        return $distanceValue;
    }
}
