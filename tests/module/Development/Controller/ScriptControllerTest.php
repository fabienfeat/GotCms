<?php
/**
 * This source file is part of GotCms.
 *
 * GotCms is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * GotCms is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License along
 * with GotCms. If not, see <http://www.gnu.org/licenses/lgpl-3.0.html>.
 *
 * PHP Version >=5.3
 *
 * @category Gc_Tests
 * @package  ZfModules
 * @author   Pierre Rambaud (GoT) <pierre.rambaud86@gmail.com>
 * @license  GNU/LGPL http://www.gnu.org/licenses/lgpl-3.0.html
 * @link     http://www.got-cms.com
 */

namespace Development\Controller;

use Gc\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
use Gc\Script\Model as ScriptModel;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-03-15 at 23:50:27.
 *
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 * @group    ZfModules
 * @category Gc_Tests
 * @package  ZfModules
 */
class ScriptControllerTest extends AbstractHttpControllerTestCase
{
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     *
     * @return void
     */
    public function setUp()
    {
        $this->init();
    }

    /**
     * Test
     *
     * @covers Development\Controller\ScriptController::indexAction
     *
     * @return void
     */
    public function testIndexAction()
    {
        $this->dispatch('/admin/development/script/list');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('scriptList');
    }

    /**
     * Test
     *
     * @covers Development\Controller\ScriptController::createAction
     *
     * @return void
     */
    public function testCreateAction()
    {
        $this->dispatch('/admin/development/script/create');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('scriptCreate');
    }

    /**
     * Test
     *
     * @covers Development\Controller\ScriptController::createAction
     *
     * @return void
     */
    public function testCreateActionWithInvalidPostData()
    {
        $this->dispatch(
            '/admin/development/script/create',
            'POST',
            array(
            )
        );

        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('scriptCreate');
    }

    /**
     * Test
     *
     * @covers Development\Controller\ScriptController::createAction
     *
     * @return void
     */
    public function testCreateActionWithPostData()
    {
        $this->dispatch(
            '/admin/development/script/create',
            'POST',
            array(
                'name' => 'ScriptName',
                'identifier' => 'Identifier',
                'description' => 'Description',
            )
        );
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('scriptCreate');

        ScriptModel::fromIdentifier('Identifier')->delete();
    }

    /**
     * Test
     *
     * @covers Development\Controller\ScriptController::editAction
     *
     * @return void
     */
    public function testEditActionWithInvalidId()
    {
        $this->dispatch('/admin/development/script/edit/99999');
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('scriptEdit');
    }

    /**
     * Test
     *
     * @covers Development\Controller\ScriptController::editAction
     *
     * @return void
     */
    public function testEditAction()
    {
        $script_model = ScriptModel::fromArray(
            array(
                'name' => 'ScriptName',
                'identifier' => 'ScriptIdentifier'
            )
        );
        $script_model->save();

        $this->dispatch('/admin/development/script/edit/' . $script_model->getId());
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('scriptEdit');

        $script_model->delete();
    }

    /**
     * Test
     *
     * @covers Development\Controller\ScriptController::editAction
     *
     * @return void
     */
    public function testEditActionWithInvalidPostData()
    {
        $script_model = ScriptModel::fromArray(
            array(
                'name' => 'ScriptName',
                'identifier' => 'ScriptIdentifier'
            )
        );
        $script_model->save();

        $this->dispatch(
            '/admin/development/script/edit/' . $script_model->getId(),
            'POST',
            array(
            )
        );
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('scriptEdit');

        $script_model->delete();
    }

    /**
     * Test
     *
     * @covers Development\Controller\ScriptController::editAction
     *
     * @return void
     */
    public function testEditActionWithPostData()
    {
        $script_model = ScriptModel::fromArray(
            array(
                'name' => 'ScriptName',
                'identifier' => 'ScriptIdentifier'
            )
        );
        $script_model->save();

        $this->dispatch(
            '/admin/development/script/edit/' . $script_model->getId(),
            'POST',
            array(
                'name' => 'ScriptName',
                'identifier' => 'Identifier',
                'description' => 'Description',
            )
        );
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('scriptEdit');

        $script_model->delete();
    }

    /**
     * Test
     *
     * @covers Development\Controller\ScriptController::deleteAction
     *
     * @return void
     */
    public function testDeleteAction()
    {
        $script_model = ScriptModel::fromArray(
            array(
                'name' => 'ScriptName',
                'identifier' => 'ScriptIdentifier'
            )
        );
        $script_model->save();

        $this->dispatch('/admin/development/script/delete/' . $script_model->getId());
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('scriptDelete');

        $script_model->delete();
    }

    /**
     * Test
     *
     * @covers Development\Controller\ScriptController::deleteAction
     *
     * @return void
     */
    public function testDeleteActionWithInvalidId()
    {
        $this->dispatch('/admin/development/script/delete/9999');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('scriptDelete');
    }

    /**
     * Test
     *
     * @covers Development\Controller\ScriptController::uploadAction
     *
     * @return void
     */
    public function testUploadAction()
    {
        $_FILES = array(
            'upload' => array(
                'name' => __DIR__ . '/_files/upload.phtml',
                'type' => 'plain/text',
                'size' => 8,
                'tmp_name' => __DIR__ . '/_files/upload.phtml',
                'error' => 0,
            )
        );

        $script_model = ScriptModel::fromArray(
            array(
                'name' => 'ScriptName',
                'identifier' => 'ScriptIdentifier'
            )
        );
        $script_model->save();

        $this->dispatch('/admin/development/script/upload/' . $script_model->getId());
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('scriptUpload');

        $script_model->delete();
    }

    /**
     * Test
     *
     * @covers Development\Controller\ScriptController::uploadAction
     *
     * @return void
     */
    public function testUploadActionWithoutId()
    {
        $_FILES = array(
            'upload' => array(
                'name' => array(
                    'upload.phtml',
                    'test.phtml',
                    'test2.phtml',
                ),
                'type' => array(
                    'plain/text',
                    'plain/text',
                    'plain/text',
                ),
                'size' => array(
                    8,
                    8,
                    8,
                ),
                'tmp_name' => array(
                    __DIR__ . '/_files/upload.phtml',
                    __DIR__ . '/_files/test.phtml',
                    __DIR__ . '/_files/test.phtml',
                ),
                'error' => array(
                    UPLOAD_ERR_OK,
                    UPLOAD_ERR_OK,
                    UPLOAD_ERR_NO_FILE,
                ),
            ),
        );

        $script_model = ScriptModel::fromArray(
            array(
                'name' => 'ScriptName',
                'identifier' => 'upload'
            )
        );
        $script_model->save();

        $this->dispatch('/admin/development/script/upload');
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('scriptUpload');

        $script_model->delete();
    }

    /**
     * Test
     *
     * @covers Development\Controller\ScriptController::uploadAction
     *
     * @return void
     */
    public function testUploadActionWithEmptyFilesData()
    {
        $_FILES = array('upload' => array());
        $this->dispatch('/admin/development/script/upload');
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('scriptUpload');
    }

    /**
     * Test
     *
     * @covers Development\Controller\ScriptController::uploadAction
     *
     * @return void
     */
    public function testUploadActionWithInvalidId()
    {
        $this->dispatch('/admin/development/script/upload/9999');
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('scriptUpload');
    }

    /**
     * Test
     *
     * @covers Development\Controller\ScriptController::downloadAction
     *
     * @return void
     */
    public function testDownloadAction()
    {
        $script_model = ScriptModel::fromArray(
            array(
                'name' => 'ScriptName',
                'identifier' => 'ScriptIdentifier',
                'content' => 'Test',
            )
        );
        $script_model->save();

        $this->dispatch('/admin/development/script/download/' . $script_model->getId());
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('scriptDownload');

        $script_model->delete();
    }

    /**
     * Test
     *
     * @covers Development\Controller\ScriptController::downloadAction
     *
     * @return void
     */
    public function testDownloadActionWithEmptyContent()
    {
        $script_model = ScriptModel::fromArray(
            array(
                'name' => 'ScriptName',
                'identifier' => 'ScriptIdentifier',
            )
        );
        $script_model->save();

        $this->dispatch('/admin/development/script/download/' . $script_model->getId());
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('scriptDownload');

        $script_model->delete();
    }

    /**
     * Test
     *
     * @covers Development\Controller\ScriptController::downloadAction
     *
     * @return void
     */
    public function testDownloadActionWithInvalidId()
    {
        $this->dispatch('/admin/development/script/download/9999');
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('scriptDownload');
    }

    /**
     * Test
     *
     * @covers Development\Controller\ScriptController::downloadAction
     *
     * @return void
     */
    public function testDownloadActionWithoutId()
    {
        $script_model = ScriptModel::fromArray(
            array(
                'name' => 'ScriptName',
                'identifier' => 'ScriptIdentifier',
                'content' => 'Content',
            )
        );
        $script_model->save();

        $this->dispatch('/admin/development/script/download');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('scriptDownload');

        $script_model->delete();
    }
}
