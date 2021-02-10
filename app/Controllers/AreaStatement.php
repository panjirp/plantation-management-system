<?php namespace App\Controllers;
use App\Models\AreaStatementModel;

class AreaStatement extends BaseController
{
	public function getPlantingYear()
	{
        $afdelingId = $this->request->getPost('afdelingId');
        $AreaStatementModel = new AreaStatementModel();
        $afdeling = $AreaStatementModel->getAllActivePyByAfdelingId($afdelingId);
		echo json_encode($afdeling->getResult());
	}

    public function getBlock()
	{
        $tahunTanamId = $this->request->getPost('tahunTanamId');
        $AreaStatementModel = new AreaStatementModel();
        $block = $AreaStatementModel->getAllActiveBlockByPyId($tahunTanamId);
		echo json_encode($block->getResult());
	}

    public function getTph()
	{
        $blockId = $this->request->getPost('blockId');
        $AreaStatementModel = new AreaStatementModel();
        $tph = $AreaStatementModel->getAllActiveTphByBlockId($blockId);
		echo json_encode($tph->getResult());
	}

}
