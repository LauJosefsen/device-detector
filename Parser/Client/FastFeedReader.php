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
 * Class FeedReader
 *
 * Client parser for feed reader detection
 */
class FastFeedReader extends FastAbstractClientParser
{
    protected $regexList = [
        [
            'regex'   => 'Akregator(?:/(\\d+[.\\d]+))?',
            'name'    => 'Akregator',
            'version' => '$1',
            'url'     => 'http://userbase.kde.org/Akregator',
        ],
        [
            'regex'   => 'Apple-PubSub(?:/(\\d+[.\\d]+))?',
            'name'    => 'Apple PubSub',
            'version' => '$1',
            'url'     => 'https://developer.apple.com/library/mac/documentation/Darwin/Reference/ManPages/man1/pubsub.1.html',
        ],
        [
            'regex'   => 'BashPodder',
            'name'    => 'BashPodder',
            'version' => '',
            'url'     => 'http://lincgeek.org/bashpodder/',
        ],
        [
            'regex'   => 'Breaker/v?([\\d.]+)',
            'name'    => 'Breaker',
            'version' => '$1',
            'url'     => 'https://www.breaker.audio/',
        ],
        [
            'regex'   => 'FeedDemon(?:/(\\d+[.\\d]+))?',
            'name'    => 'FeedDemon',
            'version' => '$1',
            'url'     => 'http://www.feeddemon.com/',
        ],
        [
            'regex'   => 'Feeddler(?:RSS|PRO)(?:[/ ](\\d+[.\\d]+))?',
            'name'    => 'Feeddler RSS Reader',
            'version' => '$1',
            'url'     => 'http://www.chebinliu.com/projects/iphone/feeddler-rss-reader/',
        ],
        [
            'regex'   => 'QuiteRSS(?:[/ ](\\d+[.\\d]+))?',
            'name'    => 'QuiteRSS',
            'version' => '$1',
            'url'     => 'https://quiterss.org',
        ],
        [
            'regex'   => 'gPodder/([\\d.]+)',
            'name'    => 'gPodder',
            'version' => '$1',
            'url'     => 'http://gpodder.org/',
        ],
        [
            'regex'   => 'JetBrains Omea Reader(?:[/ ](\\d+[.\\d]+))?',
            'name'    => 'JetBrains Omea Reader',
            'version' => '$1',
            'url'     => 'http://www.jetbrains.com/omea/reader/',
        ],
        [
            'regex'   => 'Liferea(?:[/ ](\\d+[.\\d]+))?',
            'name'    => 'Liferea',
            'version' => '$1',
            'url'     => 'http://liferea.sf.net/',
        ],
        [
            'regex'   => '(?:NetNewsWire|Evergreen.+MacOS)(?:[/ ](\\d+[.\\d]+))?',
            'name'    => 'NetNewsWire',
            'version' => '$1',
            'url'     => 'http://netnewswireapp.com/',
        ],
        [
            'regex'   => 'NewsBlur (?:iPhone|iPad) App(?: v(\\d+[.\\d]+))?',
            'name'    => 'NewsBlur Mobile App',
            'version' => '$1',
            'url'     => 'http://www.newsblur.com',
        ],
        [
            'regex'   => 'NewsBlur(?:/(\\d+[.\\d]+))',
            'name'    => 'NewsBlur',
            'version' => '$1',
            'url'     => 'http://www.newsblur.com',
        ],
        [
            'regex'   => 'newsbeuter(?:[/ ](\\d+[.\\d]+))?',
            'name'    => 'Newsbeuter',
            'version' => '$1',
            'url'     => 'http://www.newsbeuter.org/',
        ],
        [
            'regex'   => 'PritTorrent/([\\d.]+)',
            'name'    => 'PritTorrent',
            'version' => '$1',
            'url'     => 'http://bitlove.org',
        ],
        [
            'regex'   => 'Pulp[/ ](\\d+[.\\d]+)',
            'name'    => 'Pulp',
            'version' => '$1',
            'url'     => 'http://www.acrylicapps.com/pulp/',
        ],
        [
            'regex'   => 'ReadKit(?:[/ ](\\d+[.\\d]+))?',
            'name'    => 'ReadKit',
            'version' => '$1',
            'url'     => 'http://readkitapp.com/',
        ],
        [
            'regex'   => 'Reeder[/ ](\\d+[.\\d]+)',
            'name'    => 'Reeder',
            'version' => '$1',
            'url'     => 'http://reederapp.com/',
        ],
        [
            'regex'   => 'RSSBandit(?:[/ ](\\d+[.\\d]+))?',
            'name'    => 'RSS Bandit',
            'version' => '$1',
            'url'     => 'http://www.rssbandit.org)',
        ],
        [
            'regex'   => 'RSS Junkie(?:[/ ](\\d+[.\\d]+))?',
            'name'    => 'RSS Junkie',
            'version' => '$1',
            'url'     => 'https://play.google.com/store/apps/details?id=com.bitpowder.rssjunkie',
        ],
        [
            'regex'   => 'RSSOwl(?:[/ ](\\d+[.\\d]+))?',
            'name'    => 'RSSOwl',
            'version' => '$1',
            'url'     => 'https://www.rssowl.org/',
        ],
        [
            'regex'   => 'Stringer',
            'name'    => 'Stringer',
            'version' => '',
            'url'     => 'https://github.com/swanson/stringer',
        ],
        [
            'regex'   => '^castero (\\d+\\.[.\\d]+)',
            'name'    => 'castero',
            'version' => '$1',
            'url'     => 'https://github.com/xgi/castero',
        ],
        [
            'regex'   => '^castget (\\d+\\.[.\\d]+)',
            'name'    => 'castget',
            'version' => '$1',
            'url'     => 'https://castget.johndal.com/',
        ],
        [
            'regex'   => '^Newsboat/([a-z\\d\\.]+)',
            'name'    => 'Newsboat',
            'version' => '$1',
            'url'     => 'https://newsboat.org/index.html',
        ],
        [
            'regex'   => '^Playapod(?: Lite)?/(\\d+\\.[.\\d]+)',
            'name'    => 'Playapod',
            'version' => '$1',
            'url'     => 'https://playapod.com/',
        ],
        [
            'regex'   => 'PodPuppy (\\d+\\.[.\\d]+)',
            'name'    => 'PodPuppy',
            'version' => '$1',
            'url'     => 'https://github.com/felixwatts/PodPuppy',
        ],
        [
            'regex'   => '^Reeder/([\\d.]+)',
            'name'    => 'Reeder',
            'version' => '$1',
            'url'     => 'https://reederapp.com/',
        ],
    ];
    protected $overAllMatch = '^Reeder/([\d.]+)|PodPuppy (\d+\.[.\d]+)|^Playapod(?: Lite)?/(\d+\.[.\d]+)|^Newsboat/([a-z\d\.]+)|^castget (\d+\.[.\d]+)|^castero (\d+\.[.\d]+)|Stringer|RSSOwl(?:[/ ](\d+[.\d]+))?|RSS Junkie(?:[/ ](\d+[.\d]+))?|RSSBandit(?:[/ ](\d+[.\d]+))?|Reeder[/ ](\d+[.\d]+)|ReadKit(?:[/ ](\d+[.\d]+))?|Pulp[/ ](\d+[.\d]+)|PritTorrent/([\d.]+)|newsbeuter(?:[/ ](\d+[.\d]+))?|NewsBlur(?:/(\d+[.\d]+))|NewsBlur (?:iPhone|iPad) App(?: v(\d+[.\d]+))?|(?:NetNewsWire|Evergreen.+MacOS)(?:[/ ](\d+[.\d]+))?|Liferea(?:[/ ](\d+[.\d]+))?|JetBrains Omea Reader(?:[/ ](\d+[.\d]+))?|gPodder/([\d.]+)|QuiteRSS(?:[/ ](\d+[.\d]+))?|Feeddler(?:RSS|PRO)(?:[/ ](\d+[.\d]+))?|FeedDemon(?:/(\d+[.\d]+))?|Breaker/v?([\d.]+)|BashPodder|Apple-PubSub(?:/(\d+[.\d]+))?|Akregator(?:/(\d+[.\d]+))?';

    /**
     * @var string
     */
    protected $fixtureFile = 'regexes/client/feed_readers.yml';

    /**
     * @var string
     */
    protected $parserName = 'feed reader';
}
