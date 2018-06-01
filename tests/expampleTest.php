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
require '../src/Elektronika/models/addoffer_model.php';


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


}