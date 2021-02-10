<?php namespace App\Controllers;
use App\Models\WorkerModel;

class Worker extends BaseController
{
	public function getWorkerGroup()
	{
        $afdelingId = $this->request->getPost('afdelingId');
        $WorkerModel = new WorkerModel();
        $group = $WorkerModel->getAllActiveGroupByAfdelingId($afdelingId);
		echo json_encode($group->getResult());
	}

	public function getMandore()
	{
        //$groupId = $this->request->getPost('groupId');
        $WorkerModel = new WorkerModel();
        $mandore = $WorkerModel->getAllActiveMandoreByGroupId(1);
		echo json_encode($mandore->getResult());
	}
}
