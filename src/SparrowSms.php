<?php

namespace SachinKiranti\SparrowSms;

use Exception;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Client as Http;
use GuzzleHttp\Exception\ClientException;

class SparrowSms
{

    public $recipients;

    public $message;

    public function __construct( $recipients, $message )
    {
        $this->recipients = $recipients;
        $this->message    = $message;
    }

    public function send()
    {
        return $this->request( config('sparrow-sms.apis.send'),  [
            'form_params' => [
                'token' => config('sparrow-sms.token'),
                'from'  => config('sparrow-sms.identity'),
                'to'    => is_array($this->recipients) ? implode(',', $this->recipients) : $this->recipients,
                'text'  => $this->message,
            ],
        ]);
    }

    public function credit()
    {
        return optional($this->request( config('sparrow-sms.apis.credit'), [
            'form_params' => [
                'token' => config('sparrow-sms.token'),
            ],
        ]))->credits_available;
    }

    private function request( string $url, array $payload )
    {
        $request = new Request( 'POST', config('sparrow-sms.base_url'). $url);
        try {
            $response = (new Http)->send( $request, $payload);

            $response = json_decode($response->getBody()->getContents(), true);
            return $response;
        } catch (ClientException $e) {
            logger()->error('HTTP SparrowSMS : '. $e->getMessage());

            return false;
        } catch (Exception $e) {
            logger()->error('SparrowSMS Exception : '.$e->getMessage());

            return false;
        }
    }

}