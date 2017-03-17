<?php

class BlogPostControllerExtension extends DataExtension
{

    public function onAfterInit()
    {
        if (Config::inst()->get("Blog", 'include_default_css')) {
            if (Director::fileExists(project() . "/css/comments.css")) {
                Requirements::css(project() . "/css/comments.css");
            } else {
                Requirements::css("mypswd-blog-tweaks/css/comments.css");
            }

            if (Director::fileExists(project() . "/css/blogpost.css")) {
                Requirements::css(project() . "/css/blogpost.css");
            } else {
                Requirements::css("mypswd-blog-tweaks/css/blogpost.css");
            }
        }
    }
}
