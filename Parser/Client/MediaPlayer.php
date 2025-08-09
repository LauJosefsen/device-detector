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
 * Class MediaPlayer
 *
 * Client parser for mediaplayer detection
 */
class MediaPlayer extends AbstractClientParser
{
    protected $overAllMatch = \DeviceDetector\Parser\PrecompiledYaml::PRECOMPILED_DEVICEDETECTOR_PARSER_CLIENT_MEDIAPLAYER_OVERALL_MATCH;
    protected $regexList = \DeviceDetector\Parser\PrecompiledYaml::PRECOMPILED_DEVICEDETECTOR_PARSER_CLIENT_MEDIAPLAYER_REGEXES;

    /**
     * @var string
     */
    protected $fixtureFile = 'regexes/client/mediaplayers.yml';

    /**
     * @var string
     */
    protected $parserName = 'mediaplayer';
}
