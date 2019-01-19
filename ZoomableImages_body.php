<?php
class ZoomableImages {
	static function onParserInit( Parser $parser ) {
		$parser->setHook( 'zoomableimage', array( __CLASS__, 'zoomableimageRender' ) ); 
		return true;
	}
	static function zoomableimageRender( $input, array $args, Parser $parser, PPFrame $frame ) {
		// initialize variables for parameters
		$zimage_width = -1;
		$zimage_height = -1;
		$zimage_viewport = 'false';		// set default - false
		$zimage_showrotctrls = 'false';		// set default - false
		$zimage_initrotate = 0;			// set default - zero degree rotation

		// parse parameters and escape input
		foreach( $args as $name => $value )  {
		  if ( $name == 'name') {
		    $zimage_name= htmlspecialchars( $value ); 
		    }
		  if ( $name == 'width' ) {
		    $zimage_width = htmlspecialchars( $value );
		    }
		  if ( $name == 'height' ) {
		    $zimage_height = htmlspecialchars( $value );
		    }
		  if ( $name == 'viewport' ) {
		    $zimage_viewport = htmlspecialchars( $value );
		    }
		  if ( $name == 'initrotate' ) {
		    $zimage_initrotate = htmlspecialchars( $value );
		    }
		  if ( $name == 'showrotctrls' ) {
		    $zimage_showrotctrls = htmlspecialchars( $value );
		    }
		  }

		// if 'width' and 'height' not defined set default values
		if ( $zimage_width == -1 ) {
		  $zimage_width=400;
		  }
		if ( $zimage_height == -1 ) {
		  $zimage_width=300;
		  }

		// checking input conforms
		// force 'viewport' to 'true' if it isn't 'false'
		if ( $zimage_viewport != "true" ) {
		  $zimage_viewport='false';
		  }		
		// force 'showrotctrls' to 'true' if it isn't 'false'
		if ( $zimage_viewport != "true" ) {
		  $zimage_showrotctrls='false';
		  }	

		// generate html for output
		$ret = '<table>';
		$ret .= '<tr>';
		$ret .= '<!-- OpenSeadragon zoomable image -->';
		$ret .= '<div id="openseadragon1" style="width: ' . $zimage_width . 'px; height:' . $zimage_height . 'px;"></div>';	
		$ret .= '<script src="../extensions/ZoomableImages/openseadragon/openseadragon.min.js"></script>';
		$ret .= '<script type="text/javascript"> var viewer = OpenSeadragon({ id: "openseadragon1", ';
		$ret .= '	prefixUrl: "../extensions/ZoomableImages/openseadragon/images/",';
		$ret .= '	tileSources: "../images/zimages/' . $zimage_name . '",';
		$ret .= '  	showRotationControl: ' . $zimage_showrotctrls . ',';
		if ( $zimage_initrotate != 0 ) {
		  $ret .= '	degrees: ' . $zimage_initrotate . ',';
		  }
		$ret .= '	showNavigator: ' . $zimage_viewport . ' });</script>';
		$ret .= '</tr>';
		$ret .= '</table>';
		return $ret;
	}
}
