<?php

/*
 * Asset Packagist
 *
 * @link      https://github.com/hiqdev/asset-packagist
 * @package   asset-packagist
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2016, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\assetpackagist\tests\unit\models;

use hiqdev\assetpackagist\models\AssetPackage;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-04-23 at 14:42:40.
 */
class AssetPackageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AssetPackage
     */
    protected $object;

    protected $type = 'bower';
    protected $name = 'jquery';

    protected function setUp()
    {
        $this->object = new AssetPackage($this->type, $this->name);
    }

    protected function tearDown()
    {
    }

    public function testGetFullName()
    {
        $this->assertSame($this->type . '-asset/' . $this->name, $this->object->getFullName());
    }
}
