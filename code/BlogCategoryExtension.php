<?php

class BlogCategoryExtension extends DataExtension {

	function canCreate($members = null) {
		return true;
	}
	
	function canEdit($members = null) {
		return true;
	}
	
	function canDelete($members = null) {
		return true;
	}
	
	function canView($members = null) {
		return true;
	}

}