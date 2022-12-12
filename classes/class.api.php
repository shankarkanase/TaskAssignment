<?php

/******************************************
	Class Name - Api
	Developer - Shankar Kanase
	Created Date 10-12-2022
 *******************************************/


class Api
{

    /***************************************************************************
		Function Name - CallAPI()
		Parameters - method, url and data
		Purpose - To call API
		Return - API response
		Developer - Shankar Kanase
     ***************************************************************************/
    public function CallAPI($method, $url, $data = false)
    {

        $curl = curl_init();

        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);

                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }


        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }
}
