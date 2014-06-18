<?php

class BlogControllerExtension extends DataExtension {

	public function onAfterInit() {

		if(Config::inst()->get("Blog", 'include_default_css')) {

			if(Director::fileExists(project() . "/css/blog.css")) {
				Requirements::css(project() . "/css/blog.css");
			}else{
				Requirements::css("mypswd-blog-tweaks/css/blog.css");
			}

		}
	}

}