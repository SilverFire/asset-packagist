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

use hiqdev\assetpackagist\models\Storage;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-04-23 at 14:46:14.
 */
class StorageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Storage
     */
    protected $object;

    protected function setUp()
    {
        $this->object = Storage::getInstance();
    }

    protected function tearDown()
    {
    }

    public function testInstance()
    {
        $this->assertInstanceOf(Storage::class, $this->object);
        $this->assertSame($this->object, Storage::getInstance());
    }
}
