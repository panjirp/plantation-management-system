<?php namespace App\Controllers;
use App\Models\HarvestingModel;

class Dashboard extends BaseController
{
	public function index()
	{
		$HarvestingModel = new HarvestingModel();
        $harv = $HarvestingModel->getAllActiveData();
		$data = array(
			'harv' => $harv->getResult()
		);
		return view('dashboard',$data);
	}

	//--------------------------------------------------------------------

}
