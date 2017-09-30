<?php
/**
 * Created by PhpStorm.
 * User: marius
 * Date: 16.09.17
 * Time: 22:56
 */

namespace OCA\Passwords\Helper;

use DOMDocument;
use OC;

/**
 * Class UpdateCheckHelper
 *
 * @package OCA\Passwords\Helper
 */
class UpdateCheckHelper {

    /**
     * @var string
     */
    protected $localVersion;

    /**
     * @var string
     */
    protected $githubVersion;

    /**
     * @return bool
     */
    public function hasUpdate() {

        return version_compare($this->getLocalVersion(), $this->getGitHubVersion()) == -1;
    }

    /**
     * @return string
     */
    public function getGitHubVersion() {
        if($this->githubVersion == null) {
            try {
                $doc = new DOMDocument();
                $doc->load('https://raw.githubusercontent.com/marius-wieschollek/passwords-legacy/stable/appinfo/info.xml');
                if(!$doc->hasChildNodes()) return null;
                $this->githubVersion = $doc->getElementsByTagName("info")
                                           ->item(0)
                                           ->getElementsByTagName("version")
                                           ->item(0)->nodeValue;
            } catch (\Throwable $e) {
                return null;
            }
        }

        return $this->githubVersion;
    }

    /**
     * @return string
     */
    public function getLocalVersion() {
        if($this->localVersion == null) {
            $this->localVersion = OC::$server->getConfig()->getAppValue('passwords', 'installed_version', '');
        }

        return $this->localVersion;
    }

    /**
     * @return bool
     */
    public function nextGenerationReady() {
        return PHP_VERSION_ID >= 70000;
    }
}