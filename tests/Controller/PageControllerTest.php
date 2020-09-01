<?php

namespace App\Tests\Controller;

use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PageControllerTest extends WebTestCase
{
 use FixturesTrait;
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

//  public function testAuthenticatedUserAccessAuth()
 //  {
 //   $client = static::createClient();
 //   $users  = $this->loadFixtures([UserFixtures::class]);

//   $client->request('get', '/auth');
 //   $this->assertResponseStatusCodeSame('200');

//  }
 // https: //youtu.be/zfwdc8xRyaI?t=1929

//  bin/phpunit --filter PageControllerTest
}
