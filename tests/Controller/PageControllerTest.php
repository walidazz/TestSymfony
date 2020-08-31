<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PageControllerTest extends WebTestCase
{

 public function testHelloPage()
 {

  $client = static::createClient();
  $client->request('get', '/hello');
  $this->assertResponseStatusCodeSame('200');

 }

 public function testH1HelloPage()
 {

  $client = static::createClient();
  $client->request('get', '/hello');
  $this->assertSelectorTextContains('h1', 'hello my friend');

 }
 public function testAuthPageIsRestricted()
 {

  $client = static::createClient();
  $client->request('get', '/auth');
  $this->assertResponseStatusCodeSame('302');

 }

 public function testRedirectTologin()
 {
  $client = static::createClient();
  $client->request('get', '/auth');
  $this->assertResponseRedirects('/login');

 }

//  bin/phpunit --filter PageControllerTest
}
