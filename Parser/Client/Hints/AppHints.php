<?php

/**
 * Device Detector - The Universal Device Detection library for parsing User Agents
 *
 * @link https://matomo.org
 *
 * @license http://www.gnu.org/licenses/lgpl.html LGPL v3 or later
 */

declare(strict_types=1);

namespace DeviceDetector\Parser\Client\Hints;

use DeviceDetector\Parser\AbstractParser;

class AppHints extends AbstractParser
{
    protected $regexList = \DeviceDetector\Parser\PrecompiledYaml::PRECOMPILED_DEVICEDETECTOR_PARSER_CLIENT_HINTS_APPHINTS_REGEXES;

    /**
     * @var string
     */
    protected $fixtureFile = 'regexes/client/hints/apps.yml';

    /**
     * @var string
     */
    protected $parserName = 'AppHints';

    /**
     * Get application name if is in collection
     *
     * @return array|null
     */
    public function parse(): ?array
    {
        if (null === $this->clientHints) {
            return null;
        }

        $appId = $this->clientHints->getApp();
        $name  = $this->regexList[$appId] ?? null;

        if ('' === (string) $name) {
            return null;
        }

        return [
            'name' => $name,
        ];
    }
}
