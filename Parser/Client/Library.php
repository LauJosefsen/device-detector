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
 * Class Library
 *
 * Client parser for tool & software detection
 */
class Library extends AbstractClientParser
{
    protected $overAllMatch = \DeviceDetector\Parser\PrecompiledYaml::PRECOMPILED_DEVICEDETECTOR_PARSER_CLIENT_LIBRARY_OVERALL_MATCH;
    protected $regexList = \DeviceDetector\Parser\PrecompiledYaml::PRECOMPILED_DEVICEDETECTOR_PARSER_CLIENT_LIBRARY_REGEXES;

    /**
     * @var string
     */
    protected $fixtureFile = 'regexes/client/libraries.yml';

    /**
     * @var string
     */
    protected $parserName = 'library';
}
