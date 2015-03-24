<?php
class Box_DiTest extends PHPUnit_Framework_TestCase
{

    public function setup()
    {
        global $di;
        $this->di = clone $di;
    }

    public function testInjector()
    {
        $di = $this->di;
        $this->assertInstanceOf('Box_Config', $di['config']);
        $this->assertInstanceOf('Box_Mod', $di['mod']('admin'));
        $this->assertInstanceOf('Box_Log', $di['logger']);
        $this->assertInstanceOf('Box_Crypt', $di['crypt']);
        $this->assertTrue(isset($di['pdo']));
        $this->assertTrue(isset($di['db']));

        $this->assertInstanceOf('Box_Pagination', $di['pager']);
        $this->assertInstanceOf('Box_Url', $di['url']);
        $this->assertInstanceOf('Box_EventManager', $di['events_manager']);
        $this->assertInstanceOf('Box_Cookie', $di['cookie']);

        $this->assertInstanceOf('Box_Session', $di['session']);
        $this->assertInstanceOf('Box_Request', $di['request']);
        $this->assertInstanceOf('FileCache', $di['cache']);
        $this->assertInstanceOf('Box_Authorization', $di['auth']);
        $this->assertInstanceOf('Twig_Environment', $di['twig']);
        $this->assertInstanceOf('Box_License', $di['license']);
        $this->assertInstanceOf('Box_Tools', $di['tools']);
        $this->assertInstanceOf('Box_Validate', $di['validator']);

        $this->assertTrue(isset($di['mod']));
        $this->assertTrue(isset($di['mod_config']));
        $this->assertInstanceOf('Box\\Mod\\Cron\\Service', $di['mod_service']('cron'));
        $this->assertInstanceOf('\Guzzle\Http\Client', $di['guzzle_client']);
        $this->assertInstanceOf('\Box_Extension', $di['extension']);
        $this->assertInstanceOf('\Box_Update', $di['updater']);
        $this->assertInstanceOf('\Server_Package', $di['server_package']);
        $this->assertInstanceOf('\Server_Client', $di['server_client']);
        $this->assertInstanceOf('\Server_Account', $di['server_account']);
        $this->assertTrue(isset($di['server_manager']));
        $this->assertInstanceOf('\Box_Requirements', $di['requirements']);
        $this->assertInstanceOf('\Box\Mod\Theme\Model\Theme', $di['theme']);
        $this->assertInstanceOf('\Model_Cart', $di['cart']);
        $this->assertInstanceOf('\GeoIp2\Database\Reader', $di['geoip']);
        $this->assertInstanceOf('\Box_Password', $di['password']);
        $this->assertInstanceOf('\Box_Translate', $di['translate']());
        $this->assertInstanceOf('\Box\Mod\Api\Request', $di['api_request_data']);
    }
}