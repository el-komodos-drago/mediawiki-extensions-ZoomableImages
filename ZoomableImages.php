<?php

/**
 * @extension ZoomableImages
 * @author Michael Bonert (AKA: Nephron)
 * @copyright © 2016 Michael Bonert
 * @licence GNU General Public Licence Version 2.0+
 * @description allow use of deep zoom images (DZI) via OpenSeadragon
 */

// Extension credits that will show up on Special:Version
$wgExtensionCredits['tag'][] = array(
        'name' => "ZoomableImages",
        'author' => "Michael Bonert",
        'description' => "Allows using zoomable images with the OpenSeadragon viewer",
        'url' => 'https://www.mediawiki.org/wiki/Extension:ZoomableImages',
        'version' => "0.17",
        'license-name' => "GPL-2.0+",
);

$wgAutoloadClasses['ZoomableImages'] = $IP . '/extensions/ZoomableImages/ZoomableImages_body.php';
$wgHooks['ParserFirstCallInit'][] = 'ZoomableImages::onParserInit';
