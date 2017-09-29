<?php
/**
 * Asset Packagist.
 *
 * @link      https://github.com/hiqdev/asset-packagist
 * @package   asset-packagist
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2016-2017, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\assetpackagist\commands;

use hiqdev\assetpackagist\models\AssetPackage;
use hiqdev\assetpackagist\repositories\PackageRepository;
use Yii;
use yii\base\Component;
use yii\queue\Job;

abstract class AbstractPackageCommand extends Component implements Job
{
    const EVENT_BEFORE_RUN = 'beforeRun';
    const EVENT_AFTER_RUN = 'afterRun';

    /**
     * @var string
     */
    protected $fullName;

    /**
     * @var AssetPackage
     */
    protected $package;

    /**
     * @var PackageRepository
     */
    protected $packageRepository;

    /**
     * Triggers event before run.
     */
    public function beforeRun()
    {
        $this->trigger(self::EVENT_BEFORE_RUN);
    }

    /**
     * Triggers event after run.
     */
    public function afterRun()
    {
        $this->trigger(self::EVENT_AFTER_RUN);
    }

    /**
     * CollectDependenciesCommand constructor.
     * @param AssetPackage $package
     * @param PackageRepository $packageRepository
     * @param array $config
     */
    public function __construct(AssetPackage $package, PackageRepository $packageRepository, $config = [])
    {
        parent::__construct($config);

        $this->fullName = $package->getFullName();
        $this->package = $package;
        $this->packageRepository = $packageRepository;
    }

    /**
     * Serialize only the name of package for more performance.
     *
     * @void
     */
    public function __sleep()
    {
        return ['fullName'];
    }

    /**
     * Reloads package on wake up to ensure it is up to date.
     *
     * @void
     */
    public function __wakeup()
    {
        if ($this->fullName) {
            $this->package = AssetPackage::fromFullName($this->fullName);
        }
        $this->package->load();
        $this->packageRepository = Yii::createObject(PackageRepository::class);
    }

    /**
     * @return AssetPackage
     */
    public function getPackage()
    {
        return $this->package;
    }
}
