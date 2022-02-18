<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use SendinBlue\Client\Api\TransactionalEmailsApi;
use SendinBlue\Client\ApiException;
use SendinBlue\Client\Configuration;
use SendinBlue\Client\Model\SendSmtpEmail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function sendMail($email, $name = "Faso Logistique") {
        $config = Configuration::getDefaultConfiguration()
            ->setApiKey('api-key', env('SENDINBLUE_API_KEY'));
        $apiInstance = new TransactionalEmailsApi(
            new Client(),
            $config
        );
        $sendSmtpEmail = new SendSmtpEmail(); // \SendinBlue\Client\Model\SendSmtpEmail | Values to send a transactional email
        $sendSmtpEmail['to'] = array(array('email'=>$email, 'name'=>$name));
        $sendSmtpEmail['templateId'] = 6;
        $sendSmtpEmail['params'] = array('name'=>'John', 'surname'=>'Doe');
        $sendSmtpEmail['headers'] = array('Content-Type'=>'text/html','charset'=>'utf-8');

        try {
            $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
        }

        return true;
    }
}
