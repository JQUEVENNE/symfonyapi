<?php


namespace App\Tests\integration\controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UsersControllerTest
{
    public function testGetUsers()
    {
        $client = static::createClient();
        $client->request('GET', '/api/users', [], [], ['HTTP_ACCEPT' => 'application/json']);
        $response = $client->getResponse();
        $content = $response->getContent();
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($content);
        $arrayContent = \json_decode($content, true);
        $this->assertCount(10, $arrayContent);
    }
    public function testPostUsers()
    {
        $client = static::createClient();
        $client->request('POST', '/api/users', [], [],
            [
                'HTTP_ACCEPT' => 'application/json',
                'CONTENT_TYPE' => 'application/json',
                'HTTP_X-AUTH-TOKEN' => 'si|L@vHTJVryk6'
            ],
            '{"apiKey": "adqaaa","email": "test@behat.com"}'
        );
        $response = $client->getResponse();
        $content = $response->getContent();
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($content);
    }


}