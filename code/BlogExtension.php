<?php

class BlogExtension extends DataExtension {

	private static $description = "Displays listings of blog entries";
	private static $icon = "mypswd-blog-tweaks/images/blogholder-file.png";

	public function canCreate($members = null) {
		return !DataObject::get_one($this->owner->ClassName);
	}

	public function updateCMSFields(FieldList $fields) {

		// Get config options for using tags / categories
		$use_categories = Config::inst()->get("Blog", 'use_categories');
		$use_tags = Config::inst()->get("Blog", 'use_tags');

		// Hide tags/categories fields if turned off in config
		if(!$use_categories) $fields->removeFieldFromTab("Root.BlogOptions","Categories");
		if(!$use_tags) $fields->removeFieldFromTab("Root.BlogOptions","Tags");

		if(!$use_categories && !$use_tags) $fields->removeFieldFromTab("Root","BlogOptions");
   }

}