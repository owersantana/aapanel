<?php

namespace DevOpsSantana\AAPanel;


/**
 * Class AAPanelConnect
 * @package DevOpsSantana\AAPanel
 * @author Rogério Santana <https://github.com/devopssantana>
 * @since : 2022
 */

abstract class AAPanelConnect
{

    /** @var string */
    protected $serverKey;

    /** @var string */
    protected $serverUrl;

    /** @var array */
    protected $data;

    /**
     * Class Construct
     */
    public function __construct()
    {
        $this->serverUrl = AAPANEL_SERVER_URL;
        $this->serverKey = AAPANEL_SERVER_KEY;

        $this->GetKeyData();
    }

    /**
     * @description Generate Coookie
     * @return array
     */
    private function GetKeyData()
    {
        $now_time = time();

        $this->data = array(
            'request_token' => md5($now_time . '' . md5($this->serverKey)),
            'request_time' => $now_time
        );

        return $this;
    }

    /**
     * @description Execute Action in AAPanel Server
     * @param $url
     * @param $data
     * @param int $timeout
     * 
     */
    protected function Execute($url, $data, int $timeout = 60)
    {
        $cookie_file = './' . md5($this->serverUrl) . '.cookie';
        if (!file_exists($cookie_file)) {
            $fp = fopen($cookie_file, 'w+');
            fclose($fp);
        }

        // //CURLOPT_CUSTOMREQUEST
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);


        $output = json_decode(curl_exec($ch));
        curl_close($ch);
        return $output;
    }
}
