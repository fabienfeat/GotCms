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
 * @package  Library
 * @author   Pierre Rambaud (GoT) <pierre.rambaud86@gmail.com>
 * @license  GNU/LGPL http://www.gnu.org/licenses/lgpl-3.0.html
 * @link     http://www.got-cms.com
 */

namespace Gc\Datatype;

use Gc\Datatype\Model as DatatypeModel;
use Gc\Registry;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2012-10-17 at 20:40:10.
 *
 * @group Gc
 * @category Gc_Tests
 * @package  Library
 */
class AbstractDatatypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AbstractDatatype
     */
    protected $object;

    /**
     * @var DatatypeModel
     */
    protected $datatype;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     *
     * @return void
     */
    protected function setUp()
    {
        $this->datatype = DatatypeModel::fromArray(
            array(
                'name' => 'AbstractDatatype',
                'prevalue_value' => 's:16:"AbstractDatatype";',
                'model' => 'AbstractDatatype',
            )
        );
        $this->datatype->save();

        $this->object = $this->getMockForAbstractClass('Gc\Datatype\AbstractDatatype');
        $application  = Registry::get('Application');
        $this->object->setRequest($application->getServiceManager()->get('Request'));
        $this->object->setRouter($application->getServiceManager()->get('Router'));
        $this->object->setHelperManager($application->getServiceManager()->get('viewhelpermanager'));
        $this->object->load($this->datatype, 1);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     *
     * @return void
     */
    protected function tearDown()
    {
        $this->datatype->delete();
        unset($this->datatype);
        unset($this->object);
    }

    /**
     * Test
     *
     * @return void
     */
    public function testGetInfos()
    {
        $this->assertFalse($this->object->getInfos());
    }

    /**
     * Test
     *
     * @return void
     */
    public function testLoad()
    {
        $this->assertEquals(1, $this->object->getDocumentId());
        $this->assertInstanceOf('Gc\Datatype\Model', $this->object->getDatatypeModel());
    }

    /**
     * Test
     *
     * @return void
     */
    public function testLoadWithEmptyDatatype()
    {
        $this->assertFalse($this->object->load(null, null));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testGetConfig()
    {
        $this->assertEquals('AbstractDatatype', $this->object->getConfig());
    }

    /**
     * Test
     *
     * @return void
     */
    public function testGetConfigWithNotSerializeValue()
    {
        $this->object->setConfig(array());
        $this->assertInternalType('array', $this->object->getConfig());
    }

    /**
     * Test
     *
     * @return void
     */
    public function testSetConfig()
    {
        $this->object->setConfig(serialize('NewValue'));
        $this->assertEquals('NewValue', $this->object->getConfig());
    }

    /**
     * Test
     *
     * @return void
     */
    public function testGetUploadUrl()
    {
        $this->assertEquals('/admin/content/media/upload/document/1/property/1', $this->object->getUploadUrl(1));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testGetHelper()
    {
        $this->assertInstanceOf('Gc\View\Helper\Partial', $this->object->getHelper('partial'));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testGetProperty()
    {
        $this->assertNull($this->object->getProperty());
    }

    /**
     * Test
     *
     * @return void
     */
    public function testSetProperty()
    {
        $this->object->setProperty('test');
        $this->assertEquals('test', $this->object->getProperty());
    }

    /**
     * Test
     *
     * @return void
     */
    public function testGetName()
    {
        $this->assertEquals('datatype', $this->object->getName());
    }

    /**
     * Test
     *
     * @return void
     */
    public function testAddPath()
    {
        $this->assertInstanceOf('Gc\Datatype\AbstractDatatype', $this->object->addPath(__DIR__));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testRender()
    {
        $this->object->addPath(__DIR__);
        $this->assertEquals('String' . PHP_EOL, $this->object->render('_files/template.phtml'));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testGetDocument()
    {
        $this->assertFalse($this->object->getDocument());
    }
}
