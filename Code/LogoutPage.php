<?php
/*
 * TODO: only show the Logout-Link when user is logged in
 */

class LogoutPage extends SiteTree {
	function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->removeFieldFromTab("Root.Main","Content");
		$fields->removeFieldFromTab("Root", "Metadata");
		return $fields;
	}
}

class LogoutPage_Controller extends ContentController {
	function init() {
		parent::init();
		
		if ( $member ) $member->logOut();
		$link = RootURLController::get_homepage_link();
		$this->redirect( $link . '/');
		return;
	}
}