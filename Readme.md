CakeOSM

Helper to use OpenStreetMap (OSM) with CakePHP

## Installation
* Clone/Copy the files in this directory into `app/Plugin/DebugKit`
```
git submodule add https://github.com/h4ck3rm1k3/CakeOSM.git app/Plugin/CakeOSM
``
* Ensure the plugin is loaded in `app/Config/bootstrap.php` 
```php
/*
  OSM plugin:
*/
CakePlugin::load('CakeOSM');

```

* Include the helper in your `app/Controller/SomeController.php`:
```php
class SomeController extends Controller {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('CakeOSM.OpenLayers');

}
```

Example use: 
Following was translated from http://cakeosm.javiermaties.com/

Its use is very simple, you download the helper and installed in cakephp app is activated, the best way is from the AppController and is called from any view as follows:

```php
  echo $this->OpenLayers->map($default, $style = 'width:100%; height: 100%', $map_type);
```

$default is an array with the following possible values:

* 'Typecloud' -> map style
* 'Zoom' -> map zoom
* 'Lat' => latitude of the map center
* 'Long' -> length of the center of the map 

And $map_type (type) would have these possible values:

* NULL (for use directly openlayers)
* CloudMade
* leaflet 

Also is prepared to receive points of interest (POI), let the "markers" of GoogleMaps:

```php
  echo $this->OpenLayers->addmarkers($marker,null,$map_type);
```

Where $marker is an array with the point and with these settings:

* lat - latitude of the point
* long - longitude length
* title - the title that appears in infowindow 

($map_type)Type must be the same variable as before, with the same value. 
