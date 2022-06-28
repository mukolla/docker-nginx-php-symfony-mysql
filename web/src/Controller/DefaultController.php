<?php

namespace App\Controller;

use GuzzleHttp\Exception\GuzzleException;
use Soneso\StellarSDK\Crypto\KeyPair;
use Soneso\StellarSDK\Network;
use Soneso\StellarSDK\SEP\WebAuth\ChallengeRequestErrorResponse;
use Soneso\StellarSDK\SEP\WebAuth\WebAuth;
use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
    public function index()
    {
        $clientSecretSeed = 'SB4LJS4FW6WVSCYNLKQ63KHI4HAX4NCNUN5CBASJR7YFQLGYZYUII4HY';

        //$webAuth = WebAuth::fromDomain("stage-tempopayments-api.tempo.eu.com/api/v2/payments/a1332d32-f630-450d-a433-5c6fad0dd8c6/sep0001", Network::testnet());

        $webAuth = new WebAuth('https://stage-tempopayments-api.tempo.eu.com/api/v2/payments/a1332d32-f630-450d-a433-5c6fad0dd8c6/sep0010/auth',
            'GCNPY65QPHCYFTLDSUE4AQAKYUNEFW65WWAR6OL4GU4M746AKP5BSRZH',
            'stage-tempopayments-api.tempo.eu.com',
            Network::testnet()
        );

        $clientKeyPair = KeyPair::fromSeed($clientSecretSeed);

        $jwtToken = $webAuth->jwtToken($clientKeyPair->getAccountId(),[$clientKeyPair]);

        dd(
            $jwtToken
        );


        return new Response("Hello");
    }
}
