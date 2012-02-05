<?php

namespace app\controllers;

use app\models\Post;
use Imagine;


class PostsController extends \lithium\action\Controller {

	public function index() {
		$posts = Post::all();
		return compact('posts');
	}

	public function add() {
		$success = false;

		if ( $this->request->data ) {
			$post = Post::create($this->request->data);
			$success = $post->save();
		}

		$imagine = new Imagine\Gd\Imagine();
		$image = $imagine->open('/path/to/image.jpg');
		//$grid = Post::getGridFS();					// Initialize GridFS
		//$name = $_FILES['Filedata']['name'];		// Get Uploaded file name
		//$type = $_FILES['Filedata']['type'];		// Try to get file extension
		//$id = $grid->storeUpload('Filedata', $name);	// Store uploaded file to GridFS


		return compact('success');
	}

}