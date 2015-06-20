<?php
/**
 * YTest.php
 *
 * @author Brett O'Donnell <cornernote@gmail.com>
 * @link https://mrphp.com.au/
 */

namespace tests;

use cornernote\shortcuts\Y;
use Yii;
use yii\base\Application;
use yii\base\Controller;
use yii\base\Module;
use yii\base\Request;
use yii\base\Response;
use yii\base\View;
use yii\caching\Cache;
use yii\db\Connection;
use yii\i18n\Formatter;
use yii\web\Session;
use yii\web\User;

/**
 * YTest
 */
class ReturnUrlTest extends TestCase
{
    /**
     * Y::app()
     */
    public function testApp()
    {
        $this->assertTrue(Y::app() instanceof Application);
    }

    /**
     * Y::user()
     */
    public function testUser()
    {
        $this->assertTrue(Y::user() instanceof User);
    }

    /**
     * Y::db()
     */
    public function testDb()
    {
        $this->assertTrue(Y::db() instanceof Connection);
    }

    /**
     * Y::cache()
     */
    public function testCache()
    {
        $this->assertTrue(Y::cache() instanceof Cache);
    }

    /**
     * Y::request()
     */
    public function testRequest()
    {
        $this->assertTrue(Y::request() instanceof Request);
    }

    /**
     *
     */
    public function testResponse()
    {
        $this->assertTrue(Y::response() instanceof Response);
    }

    /**
     * Y::module()
     */
    public function testModule()
    {
        $this->assertTrue(Y::module('base') instanceof Module);
    }

    /**
     * Y::component()
     */
    public function testComponent()
    {
        $this->assertTrue(Y::component('cache') instanceof Cache);
    }

    /**
     * Y::formatter()
     */
    public function testFormatter()
    {
        $this->assertTrue(Y::formatter() instanceof Formatter);
    }

    /**
     * Y::controller()
     */
    public function testController()
    {
        $this->assertNull(Y::controller()); // this is null when not in an action
    }

    /**
     * Y::view()
     */
    public function testView()
    {
        $this->assertTrue(Y::view() instanceof View);
    }

    /**
     * Y::session()
     */
    public function testSession()
    {
        $this->assertTrue(Y::session() instanceof Session);
    }

    /**
     * Y::param()
     */
    public function testParam()
    {
        $this->assertEquals(Y::param('test'), 'testing');
    }

    /**
     * Y::GET()
     */
    public function testGET()
    {
        $_GET['test'] = 'testing';
        $this->assertEquals(Y::GET('test'), 'testing');
    }

    /**
     * Y::POST()
     */
    public function testPOST()
    {
        $_POST['test'] = 'testing';
        $this->assertEquals(Y::POST('test'), 'testing');
    }

    /**
     * Y::FILES()
     */
    public function testFILES()
    {
        $_FILES['test'] = ['name' => 'testing'];
        $this->assertEquals(Y::FILES('test'), ['name' => 'testing']);
    }

    /**
     * Y::baseUrl()
     */
    public function testBaseUrl()
    {
        $this->assertEquals(Y::baseUrl(), '');
    }
}