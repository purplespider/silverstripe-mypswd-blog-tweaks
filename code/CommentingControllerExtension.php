<?php

class CommentingControllerExtension extends DataExtension {

	public function alterCommentForm($form) {
		$fields = $form->Fields();
		$fields->removeByName("URL");

		$email = $fields->dataFieldByName("Email");
		$email->setRightTitle("Your e-mail address will not be published.");

   }

}


