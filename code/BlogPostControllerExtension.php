<?php

class BlogPostControllerExtension extends DataExtension {

	public function onAfterInit() {
		if(Director::fileExists(project() . "/css/comments.css")) {
			Requirements::css(project() . "/css/comments.css");
		}else{
			Requirements::css("mypswd-blog-tweaks/css/comments.css");
		}
	}

}