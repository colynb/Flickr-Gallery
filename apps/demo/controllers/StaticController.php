<?php

namespace app\controllers;

use lithium\analysis\Debugger;
use \lithium\action\Response;
use lithium\net\http\Media;
use lithium\core\Libraries;
use Imagine;

class StaticController extends \lithium\action\Controller {

	public function index() {
		return $this->render(array('layout' => false));
	}

	public function to_string() {
		return "Hello World";
	}

	public function to_json() {
		return $this->render(array('json' => 'Hello World'));
	}

	public function flickr() {

		$flickr_url = 'http://farm{:farm}.staticflickr.com/{:server}/{:id}_{:secret}.{:type}';

		// Render the static flickr URL from params
		foreach ( $this->request->params as $key => $value ) {
			$flickr_url = str_replace("{:$key}", (string) $value, $flickr_url);
		}

		// Get image content
		$img_content = file_get_contents($flickr_url);

		// Prep content for output

		$imagine = new Imagine\Gd\Imagine();
		$wid = (isset($this->request->query['w'])) ? $this->request->query['w'] : 100;
		$hei = (isset($this->request->query['w'])) ? $this->request->query['h'] : 100;
		$size = new Imagine\Image\Box($wid, $hei);

		$mode = Imagine\Image\ImageInterface::THUMBNAIL_OUTBOUND;
		return $this->render(array($this->request->params['type'] => (string) $imagine->load($img_content)->thumbnail($size, $mode)));

	}

	public function file() {
		$media = Media::type($this->request->params['type']);
		$path = LITHIUM_APP_PATH . DIRECTORY_SEPARATOR . 'static' . DIRECTORY_SEPARATOR . $this->request->params['path'] . '.' . $this->request->params['type'];
		return $this->render(array($this->request->params['type'] => file_get_contents($path)));
	}

}

?>