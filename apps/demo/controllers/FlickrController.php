<?php


namespace app\controllers;

use Flickr\Flickr;

class FlickrController extends \lithium\action\Controller {

	public function gallery($count = 30, $tag = 'face') {
		$api_key = "6c9db9cfdc710d6d35e87032131a78a0";
		$api_secret = "88082dcf64d55811";
		$f = new Flickr($api_key);

		$results = $f->search(array(
			'tags' => $tag,
			'per_page' => $count
		));
		$urls = array();
		foreach ( $results['photo'] as $params ) {

			$url = '/flickr/photo/{:farm}/{:server}/{:id}_{:secret}.jpg?w=150&h=150';

			foreach ( $params as $key => $value ) {
				$url = str_replace("{:$key}", (string) $value, $url);
			}

			$urls[] = $url;
		}
		return compact('urls');
	}

	public function photo() {

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

}