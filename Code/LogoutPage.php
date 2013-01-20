<?php
class LogoutPage extends SiteTree {
	function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->removeFieldFromTab("Root.Main","Content");
		$fields->removeFieldFromTab("Root", "Metadata");
		return $fields;
	}
}

class LogoutPage_Controller extends ContentController {
	
}