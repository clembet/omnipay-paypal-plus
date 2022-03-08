<?php

namespace Omnipay\PayPalPlus;

use Omnipay\PayPal\RestGateway;

/**
 * PayPal Plus Gateway.
 *
 * @link https://www.paypalobjects.com/webstatic/de_DE/downloads/PayPal-PLUS-IntegrationGuide.pdf
 */
class Gateway extends RestGateway
{
    /**
     * Get gateway display name
     *
     * This can be used by carts to get the display name for each gateway.
     * @return string
     */
    public function getName()
    {
        return 'PayPalPlus';
    }

    public function getClientId()
    {
        return $this->getParameter('client_id');
    }

    public function setClientId($value)
    {
        return $this->setParameter('client_id', $value);
    }

    public function getSecret()
    {
        return $this->getParameter('secret');
    }

    public function setSecret($value)
    {
        return $this->setParameter('secret', $value);
    }

    public function parseResponse($data)
    {
        $request = $this->createRequest('\Omnipay\PayPalPlus\Message\RestPurchaseRequest', []);
        return new \Omnipay\PayPalPlus\Message\RestAuthorizeResponse($request, (array)$data);
    }

    public function purchase(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\PayPalPlus\Message\RestPurchaseRequest', $parameters);
    }
}
