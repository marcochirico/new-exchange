<?php

class RoutingTest extends TestCase {

    public function testPublicRoutes() {
        $this->client->request('GET', '/');
        $this->assertTrue($this->client->getResponse()->isOk());

        $this->client->request('GET', '/how-to');
        $this->assertTrue($this->client->getResponse()->isOk());

        $this->client->request('GET', '/our-services');
        $this->assertTrue($this->client->getResponse()->isOk());

        $this->client->request('GET', '/payments');
        $this->assertTrue($this->client->getResponse()->isOk());

        $this->client->request('GET', '/legal');
        $this->assertTrue($this->client->getResponse()->isOk());
    }
    
    public function testClientRoutes() {
        $this->client->request('GET', '/client/login');
        $this->assertTrue($this->client->getResponse()->isOk());

        $this->client->request('POST', '/client/login/authorize');
        $this->assertTrue($this->client->getResponse()->isOk());

        $this->client->request('GET', '/client/register');
        $this->assertTrue($this->client->getResponse()->isOk());
    }
    
    public function testContractorRoutes() {
        $this->client->request('GET', '/contractor/login');
        $this->assertTrue($this->client->getResponse()->isOk());

        $this->client->request('POST', '/contractor/login/authorize');
        $this->assertTrue($this->client->getResponse()->isOk());

        $this->client->request('GET', '/contractor/register');
        $this->assertTrue($this->client->getResponse()->isOk());
    }

}