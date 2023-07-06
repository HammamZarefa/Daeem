<?php


namespace App\Http\Services;


class SendSmsNotification
{

    public function send($number, $msg)
    {
        $ch = curl_init();
        $userSender = get_option('SMS_USERSENDER');
        $apiKey = get_option('SMS_API_KEY');
        $authorization = "Authorization: Bearer " . $apiKey;
        curl_setopt($ch, CURLOPT_URL, "https://api.oursms.com/msgs/sms");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, TRUE);

        curl_setopt($ch, CURLOPT_POST, TRUE);

        $fields = [
            "src" => $userSender,
            "dests" => [$number],
            "body" => $msg,
            "priority" => 0,
            "delay" => 0,
            "validity" => 0,
            "maxParts" => 0,
            "dlr" => 0,
            "prevDups" => 0,
            "msgClass" => "promotional"
        ];
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json", $authorization
        ));


        $response = curl_exec($ch);
        $info = curl_getinfo($ch);
        curl_close($ch);

        dd($response);
        var_dump($response);
    }

}
