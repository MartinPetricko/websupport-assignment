<?php

namespace App\Clients;

use CurlHandle;

abstract class Client
{
    private CurlHandle $curlHandle;

    private ?string $base_url = null;

    public function __construct()
    {
        $this->curlHandle = curl_init();

        curl_setopt($this->curlHandle, CURLOPT_RETURNTRANSFER, true);
    }

    public function __destruct() {
        curl_close($this->curlHandle);
    }

    protected function get(string $url): Response
    {
        curl_setopt($this->curlHandle, CURLOPT_URL, $this->base_url . $url);
        curl_setopt($this->curlHandle, CURLOPT_CUSTOMREQUEST, 'GET');

        $body = curl_exec($this->curlHandle);

        $response = new Response();

        $response->setBody($body);
        $response->setCode(curl_getinfo($this->curlHandle, CURLINFO_HTTP_CODE));

        return $response;
    }

    protected function post(string $url, array $data = []): Response
    {
        curl_setopt($this->curlHandle, CURLOPT_URL, $this->base_url . $url);
        curl_setopt($this->curlHandle, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($this->curlHandle, CURLOPT_POSTFIELDS, json_encode($data, JSON_THROW_ON_ERROR));

        $body = curl_exec($this->curlHandle);

        $response = new Response();

        $response->setBody($body);
        $response->setCode(curl_getinfo($this->curlHandle, CURLINFO_HTTP_CODE));

        return $response;
    }

    protected function delete(string $url, array $data = []): Response
    {
        curl_setopt($this->curlHandle, CURLOPT_URL, $this->base_url . $url);
        curl_setopt($this->curlHandle, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($this->curlHandle, CURLOPT_POSTFIELDS, json_encode($data, JSON_THROW_ON_ERROR));

        $body = curl_exec($this->curlHandle);

        $response = new Response();

        $response->setBody($body);
        $response->setCode(curl_getinfo($this->curlHandle, CURLINFO_HTTP_CODE));

        return $response;
    }

    protected function baseUrl(string $url): self
    {
        $this->base_url = $url;

        return $this;
    }

    protected function withHeaders(array $headers): self
    {
        curl_setopt($this->curlHandle, CURLOPT_HTTPHEADER, $headers);

        return $this;
    }

    protected function withBasicAuth(string $username, string $password): self
    {
        curl_setopt($this->curlHandle, CURLOPT_USERPWD, $username.':'.$password);

        return $this;
    }
}