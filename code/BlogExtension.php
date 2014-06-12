<?php

class BlogExtension extends DataExtension {

	private static $description = "Displays listings of blog entries";
	private static $icon = "mypswd-blog-tweaks/images/blogholder-file.png";

	public function canCreate($members = null) {
		return !DataObject::get_one($this->owner->ClassName);
	}

	public function updateCMSFields(FieldList $fields) {
		$fields->insertBefore(new Tab('Blog Posts'), 'Main');
   }

}