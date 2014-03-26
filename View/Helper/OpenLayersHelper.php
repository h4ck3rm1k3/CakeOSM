<?php

/*
 * CakeMap -- a openlayers integrated application built on CakePHP framework.
 * Dic 30, 2011  Geekia S.L.L.
 *
 * @author      javiermaties <javier@geekia.es>
 * @version     1.0
 * @license     OPPL
 *
 */

App::uses('Helper', 'View');

class OpenLayersHelper extends Helper {

  var $helpers = array('Html');

  public $scriptpuntos = '';

  function map($default) {
      echo $this->Html->script('jquery/dist/jquery'); 
      echo $this->Html->script('openlayers/OpenLayers.js');
      echo $this->Html->css('openlayers');

      $out = "<div id=\"mapaopen\"></div>";

      $out .= '<script type="text/javascript">
		//<![CDATA[';
      $out .= '
function init() {
map = new OpenLayers.Map("mapaopen");
';
      $out .= 'var newl = new OpenLayers.Layer.Markers("");';
      $out .= 'map.addLayer(newl);';
      $out .= '
var size = new OpenLayers.Size(21,25);
var offset = new OpenLayers.Pixel(-(size.w/2), -size.h);
var icon = new OpenLayers.Icon(\'/js/openlayers/img/marker.png\', size, offset);
var marker = 0;
var ll = 0;
var proj = new OpenLayers.Projection("EPSG:4326");
';


      $out .= '
map.addControl( new OpenLayers.Control.LayerSwitcher);
var layMapnik = new OpenLayers.Layer.OSM();
map.addLayer(layMapnik);
var center = new OpenLayers.LonLat(' . $default['long'] . ',' . $default['lat'] . ');
var centerOSM = center.transform(proj, map.getProjectionObject());
';


      foreach ($default['markers'] as $data ) {
          $out .= '
ll = new OpenLayers.LonLat(\''. $data['long'] . '\',\'' . $data['lat'] . '\');
ll = ll.transform( proj ,map.getProjectionObject());
marker = new OpenLayers.Marker(ll, icon.clone() );
marker.events.register(\'mousedown\', marker, function(evt) { alert("'. $data['title'] . '"); OpenLayers.Event.stop(evt); });
newl.addMarker(marker);
';
      }

      $out .= '
ext = newl.getDataExtent();
map.zoomToExtent(ext);

}';

$out .='
jQuery(window).load(init());

//]]>
</script>';

      return $out;
  }

};

?>
