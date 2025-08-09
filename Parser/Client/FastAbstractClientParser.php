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


abstract class FastAbstractClientParser extends AbstractClientParser
{
    public function parse(): ?array
    {
        $result = null;

        if ($this->preMatchOverall()) {
            foreach ($this->regexList as $regex) {
                $matches = $this->matchUserAgent($regex['regex']);

                if ($matches) {
                    $result = [
                        'type'    => $this->parserName,
                        'name'    => $this->buildByMatch($regex['name'], $matches),
                        'version' => $this->buildVersion((string) $regex['version'], $matches),
                    ];

                    break;
                }
            }
        }

        return $result;
    }

    protected function preMatchOverall(): ?array
    {
        return $this->matchUserAgent($this->overAllMatch);
    }
}
