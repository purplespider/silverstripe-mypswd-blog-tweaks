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
	}

	public function onBeforePublish() {
			if ($this->owner->obj('PublishDate')->InPast()) {
				$this->owner->setCastedField("PublishDate", time());
				$this->owner->write();
			}
	}

	public function updateSettingsFields(FieldList $fields) {
		$fields->removeFieldFromTab("Root.Settings","Visibility");
	}

	public function updateSummaryFields(&$fields) {
		$fields['IsModified'] = '';
		$fields['Created.Nice'] = 'Created';
	}

	public function IsModified() {
		return $this->owner->IsModifiedOnStage ? "MODIFIED" : "";
	}

}