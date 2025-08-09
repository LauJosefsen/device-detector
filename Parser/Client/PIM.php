<?php

/**
 * Device Detector - The Universal Device Detection library for parsing User Agents
 *
 * @link https://matomo.org
 *
 * @license http://www.gnu.org/licenses/lgpl.html LGPL v3 or later
 */

declare(strict_types=1);

namespace DeviceDetector\Parser\Client;

/**
 * Class PIM
 *
 * Client parser for pim (personal information manager) detection
 */
class PIM extends AbstractClientParser
{
    protected $overAllMatch = \DeviceDetector\Parser\PrecompiledYaml::PRECOMPILED_DEVICEDETECTOR_PARSER_CLIENT_PIM_OVERALL_MATCH;
    protected $regexList = \DeviceDetector\Parser\PrecompiledYaml::PRECOMPILED_DEVICEDETECTOR_PARSER_CLIENT_PIM_REGEXES;

    /**
     * @var string
     */
    protected $fixtureFile = 'regexes/client/pim.yml';

    /**
     * @var string
     */
    protected $parserName = 'pim';
}
