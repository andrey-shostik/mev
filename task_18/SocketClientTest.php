<?php

require('SocketClient.php');

class SocketClientTest extends PHPUnit_Framework_TestCase
{
  protected function setUp()
  {
    $this->obj = new SocketClient();
  }

  protected function tearDown()
  {
    $this->obj = null;
  }

  public function testSendMessage()
  {
    $result = $this->obj->sendMessage();
    $this->assertInternalType("boolean", $result);
    $this->assertEquals(true, $result);
  }
}
