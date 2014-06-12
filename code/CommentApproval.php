<?php

class CommentApproval extends CommentingController {

	private static $allowed_actions = array(
		'processComment'
	);

	public function processComment() {
		if($comment = $this->getComment()) {
			$config = SiteConfig::current_site_config();

			if(isset($_GET['token'])) {
				$realtoken = md5($config->SiteTitle.$comment->ID);
				if ($_GET['token'] == $realtoken) {
					if (isset($_GET['delete'])) {
						echo("Comment Deleted.");
						$parent = $comment->getParent();
						$comment->delete();
						$this->redirect($parent->Link());
					} else {
						$comment->Moderated = true;
						$comment->write();
						echo("Comment Approved.");
						$this->redirect($comment->Link());
					}
				} else {
					die("Oh dear: Error 1A");
				}
			} else {
				die("Oh dear: Error 1B");
			}
		} else {
			die("Comment not found. Already deleted?");
		}
	}

}