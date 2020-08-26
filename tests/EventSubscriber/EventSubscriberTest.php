<?php

namespace App\Tests\EventSubscriber;

use App\EventSubscriber\ExceptionSubscriber;
use Exception;
use PHPUnit\Framework\TestCase;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelInterface;

class ExceptionSubscriberTest extends TestCase
{

 public function testEventSubscription()
 {

  $this->assertArrayHasKey(ExceptionEvent::class, ExceptionSubscriber::getSubscribedEvents());
 }

 public function testOnExceptionSendEmail()
 {

  $mailer     = $this->getMockBuilder(\Swift_Mailer::class)->disableOriginalConstructor()->getMock();
  $subscriber = new ExceptionSubscriber($mailer, 'from@domain.fr', 'to@domain.flex-row');

  $kernel = $this->getMockBuilder(KernelInterface::class)->getMock();
  $event  = new ExceptionEvent($kernel, new Request(), 1, new \Exception());

  $mailer->expects($this->once())->method('send');

  $dispatcher = new EventDispatcher();
  $dispatcher->addSubscriber($subscriber);
  $dispatcher->dispatch($event);

  // $subscriber->onException($event);
 }

}

// Exercice à faire : https: //youtu.be/DZZbGpGy8sM?t=705
