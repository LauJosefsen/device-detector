<?php

/**
 * Device Detector - The Universal Device Detection library for parsing User Agents
 *
 * @link https://matomo.org
 *
 * @license http://www.gnu.org/licenses/lgpl.html LGPL v3 or later
 */

declare(strict_types=1);

namespace DeviceDetector\Parser\Device;

/**
 * Class CarBrowser
 *
 * Device parser for car browser detection
 */
class CarBrowser extends AbstractDeviceParser
{
    protected $overAllMatch = \DeviceDetector\Parser\PrecompiledYaml::PRECOMPILED_DEVICEDETECTOR_PARSER_DEVICE_CARBROWSER_OVERALL_MATCH;
    protected $regexList = \DeviceDetector\Parser\PrecompiledYaml::PRECOMPILED_DEVICEDETECTOR_PARSER_DEVICE_CARBROWSER_REGEXES;

    /**
     * @var string
     */
    protected $fixtureFile = 'regexes/device/car_browsers.yml';

    /**
     * @var string
     */
    protected $parserName = 'car browser';

    /**
     * @inheritdoc
     */
    public function parse(): ?array
    {
        if (!$this->preMatchOverall()) {
            return null;
        }

        return parent::parse();
    }
}
