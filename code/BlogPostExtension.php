<?php

class BlogPostExtension extends DataExtension {

	private static $icon = "mypswd-blog-tweaks/images/blogpage-file.png";
	private static $description = "An individual blog post, to be created under an existing Blog page";

	public function updateCMSFields(FieldList $fields) {
		$fields->removeFieldFromTab("Root.Main","MenuTitle");
		$fields->addFieldToTab('Root.Main',
			new LiteralField("manage","<a style='margin-bottom:15px' class='backlink ss-ui-button cms-panel-link ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary ui-state-hover ui-state-active' data-icon='back' href='".Director::absoluteBaseURL()."admin/pages/edit/show/".$this->owner->Parent()->ID."' role='button' aria-disabled='false'><span class='ui-button-icon-primary ui-icon btn-icon-back'></span><span style='padding-left:5px' >
			Manage Posts
		</span></a>"),'Title');

		$image = $fields->dataFieldByName("FeaturedImage");
		$image->setFolderName('Managed/BlogPosts/Featured');
		$image->setCanPreviewFolder(false);

		// Get config options for using tags / categories
		$use_categories = Config::inst()->get("Blog", 'use_categories');
		$use_tags = Config::inst()->get("Blog", 'use_tags');
		$use_featured_image = Config::inst()->get("Blog", 'use_featured_image');

		// Adds message below tags/categories fields if none exist telling user where to create them
		if(!$this->owner->Parent()->Categories()->count() && $use_categories) {
			$cats = $fields->dataFieldByName("Categories");
			$cats->setRightTitle("You must first add categories via the <strong>Blog Options</strong> tab on the <a href='admin/pages/edit/show/".$this->owner->Parent()->ID."'>main Blog page</a>.");
		}
		if(!$this->owner->Parent()->Tags()->count() && $use_tags) {
			$cats = $fields->dataFieldByName("Tags");
			$cats->setRightTitle("You must first add tags via the <strong>Blog Options</strong> tab on the <a href='admin/pages/edit/show/".$this->owner->Parent()->ID."'>main Blog page</a>.");
		}

		// Hide tags/categories fields if turned off in config
		if(!$use_categories) $fields->removeFieldFromTab("Root.Main","Categories");
		if(!$use_tags) $fields->removeFieldFromTab("Root.Main","Tags");
		if(!$use_featured_image && !$this->owner->FeaturedImage()->exists()) $fields->removeFieldFromTab("Root.Main","FeaturedImage");
		
	}

	public function updateSettingsFields(FieldList $fields) {
		$fields->removeFieldFromTab("Root.Settings","Visibility");
	}

	public function wordCount() {
		$content = trim(Convert::xml2raw($this->owner->Content));
		$noWords = count(explode(' ', $content));
		return $noWords;
	}

	public function isLong() {
		return ($this->owner->wordCount() > 150) ? true : false;
	}

	public function summary() {
		if ($this->owner->isLong()) {
			return $this->owner->obj('Content')->FirstParagraph('html');
		} else {
			return $this->owner->Content;
		}
	}


}