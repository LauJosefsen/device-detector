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
 * Class Camera
 *
 * Device parser for camera detection
 */
class Camera extends AbstractDeviceParser
{
    protected $overAllMatch = \DeviceDetector\Parser\PrecompiledYaml::PRECOMPILED_DEVICEDETECTOR_PARSER_DEVICE_CAMERA_OVERALL_MATCH;
    protected $regexList = \DeviceDetector\Parser\PrecompiledYaml::PRECOMPILED_DEVICEDETECTOR_PARSER_DEVICE_CAMERA_REGEXES;

    /**
     * @var string
     */
    protected $fixtureFile = 'regexes/device/cameras.yml';

    /**
     * @var string
     */
    protected $parserName = 'camera';

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
