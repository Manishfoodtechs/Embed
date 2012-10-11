<?php
namespace Embed\Services;

use Embed\Url;
use Embed\Providers\Provider;
use Embed\Providers\OpenGraph;

class Jsfiddle extends Service {
	static public function create (Url $Url) {
		if (!$Url->match('http://jsfiddle.net/*')) {
			return false;
		}

		return new static(new OpenGraph($Url->getUrl().'/'));
	}

	public function __construct (Provider $Provider) {
		parent::__construct($Provider);

		//Fix embed code
		if (!$this->Provider->isEmpty()) {
			$this->Provider->setParameter('html', '<iframe style="width: 100%; height: 300px" src="'.$this->getUrl().'embedded/" allowfullscreen="allowfullscreen" frameborder="0"></iframe>');
		}
	}
}
