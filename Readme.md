CakeOSM

Helper to use OpenStreetMap (OSM) with CakePHP

Example use:
http://cakeosm.javiermaties.com/


Its use is very simple, you download the helper and installed in cakephp app is activated, the best way is from the AppController and is called from any view as follows:

```php
  echo $this->OpenLayers->map($default, $style = 'width:100%; height: 100%', $tipo);
```

$default is an array with the following possible values:

* 'Typecloud' -> map style
* 'Zoom' -> map zoom
* 'Lat' => latitude of the map center
* 'Long' -> length of the center of the map 

And $tipo (type) would have these possible values:

* NULL (for use directly openlayers)
* CloudMade
* leaflet 

Also is prepared to receive points of interest (POI), let the "markers" of GoogleMaps:

```php
  echo $this->OpenLayers->addmarkers($marca,null,$tipo);
```

Where $marca (marker) is an array with the point and with these settings:

*lat - latitude of the point
*long - stitch length
*title - the title that appears in infowindow 

($tipo)Type must be the same variable as before, with the same value. 
