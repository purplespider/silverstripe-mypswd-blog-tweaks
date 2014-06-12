<?php

class CommentAdminExtension extends DataExtension {

	public function updateEditForm(&$form) {
		$commentsGrid = $form->Fields()->dataFieldByName("Comments");
		$gridConfig = $commentsGrid->getConfig();
		$bulkManger = $gridConfig->getComponentByType("GridFieldBulkManager");
		$gridConfig->removeComponent($bulkManger);
		// $bulkManger->removeBulkAction("markAsSpam");

		$manager = new GridFieldBulkManager(null,false);
		$manager->addBulkAction(
			'markasmoderated', "Mark as Moderated", 'CommentsGridFieldBulkAction_MarkAsModerated', 
			array(
				'isAjax' => true,
				'icon' => '',
				'isDestructive' => false 
			)
		);
		$manager->addBulkAction(
			'delete', _t('GRIDFIELD_BULK_MANAGER.DELETE_SELECT_LABEL', 'Delete'), 'GridFieldBulkActionDeleteHandler', 
			array(
				'isAjax' => true,
				'icon' => 'delete',
				'isDestructive' => true
			)
		);
		
		$gridConfig->addComponent($manager);
	}

}