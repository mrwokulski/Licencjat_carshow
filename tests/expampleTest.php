<?php
/**
 * Created by PhpStorm.
 * User: Mikolaj
 * Date: 2018-06-01
 * Time: 14:42
 */

use PHPUnit\Framework\TestCase;

require '../src/Elektronika/config/paths.php';
require '../src/Elektronika/libs/Session.php';
require '../src/Elektronika/libs/View.php';
require '../src/Elektronika/libs/Model.php';
require '../src/Elektronika/libs/Controller.php';
require '../src/Elektronika/libs/Database.php';
require '../src/Elektronika/controllers/error.php';
require '../src/Elektronika/controllers/addoffer.php';
require '../src/Elektronika/controllers/offer.php';
require '../src/Elektronika/models/addoffer_model.php';
require '../src/Elektronika/models/admin_model.php';
require '../src/Elektronika/models/logout_model.php';


final class ExampleTest extends TestCase
{
    /**
     * @runInSeparateProcess
     */

    public function test_Error_Code()
    {
        $error = new Error_Code();
        $error->index();

        $expected = $error->view->msg;
        $this->assertEquals($expected, "Ta strona nie istnieje");
    }

    /**
     * @runInSeparateProcess
     */

    public function test_validJSONCategories()
    {

        $categories = new Addoffer_Model();
        $cats = $categories->getCategories();

        $this->assertNotNull(json_decode($cats));
    }

    /**
     * @runInSeparateProcess
     */

    public function test_adminStats()
    {

        $admin = new Admin_Model();
        $stats = $admin->stats();

        $this->assertEquals(4, count($stats));
    }

    /**
     * @runInSeparateProcess
     */

    public function test_logOut()
    {
        Session::init();
        Session::set('log', true);
        $var = new Logout_Model();
        $var->logOut();
        $this->assertFalse(Session::get('log'));
    }

    /**
     * @runInSeparateProcess
     */

    public function test_View()
    {
        $view = new View();
        $view->render('index\index');

        $render = file_get_contents(URL);

        $this->assertContains("<!DOCTYPE html>", $render);
    }






}