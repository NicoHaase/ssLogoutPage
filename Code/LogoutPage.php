<?php
class LogoutPage extends SiteTree {
	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->removeFieldFromTab( "Root.Main","Content" );
		$fields->removeFieldFromTab( "Root", "Metadata" );
		return $fields;
	}
	
	public function canView($member = null) {
		$member = Member::currentUser();
		return ( $member instanceof Member );
	}
}

class LogoutPage_Controller extends ContentController {
	public function init() {
		parent::init();
		
		$member = Member::currentUser();
		if ( $member ) {
			$member->logOut();
			$link = RootURLController::get_homepage_link();
			$this->redirect( $link . '/');
		} else {
			$this->redirectBack();
		}
		return;
	}
}