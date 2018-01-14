<?php
$https
    = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
      || $_SERVER['SERVER_PORT'] == 443
      || \OC::$server->getConfig()->getSystemValue('overwriteprotocol', '') == 'https'
      || \OC::$server->getConfig()->getSystemValue('forcessl', '')
      || substr(\OC::$server->getConfig()->getSystemValue('overwrite.cli.url', 'http:'), 0, 5) == 'https'
      || \OC::$server->getConfig()->getAppValue('passwords', 'https_check', 'true') == 'false';

?>
<div class="passwords-legacy" style="background: #E85752; border: 1px solid #E20800; margin: -5px;padding: 5px; color: #323232;line-height: initial;">
    <b style="font-size: large">IMPORTANT: PASSWORDS LEGACY END OF LIFE ANNOUNCEMENT</b><br>
    This version of passwords is no longer supported.
    We recommend you to read migrate to the new passwords app.
    The migration guide can be found
    <a href="https://git.mdns.eu/nextcloud/passwords/wikis/Administrators/Legacy-Migration" target="_blank" style="text-decoration: underline">
        &#128279; here
    </a>.

    <br><br><b>System Requirements</b><br>
    You can check below if your system fulfills the minimum platform requirements for the migration.
    <br><br>
    <table>
        <tr style="height: auto !important;">
            <th></th>
            <th>&nbsp; &nbsp;Your server</th>
            <th>&nbsp; &nbsp; &nbsp;Required</th>
        </tr>
        <tr style="height: auto !important;">
            <td>OS</td>
            <td style="text-align: right"><?=php_uname('s')?></td>
            <td style="text-align: right">Linux</td>
        </tr>
        <tr style="height: auto !important;">
            <td>PHP</td>
            <td style="text-align: right"><?=PHP_VERSION?></td>
            <td style="text-align: right">7.1.0</td>
        </tr>
        <tr style="height: auto !important;">
            <td>Nextcloud</td>
            <td style="text-align: right"><?=$_SERVER['NEXTCLOUD_VERSION']?></td>
            <td style="text-align: right">12.0.0</td>
        </tr>
        <tr style="height: auto !important;">
            <td>HTTPS</td>
            <td style="text-align: right"><?=$https ? 'On':'Off'?></td>
            <td style="text-align: right">On</td>
        </tr>
    </table>
</div>