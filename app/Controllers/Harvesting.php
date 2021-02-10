<?php namespace App\Controllers;
use App\Models\AreaStatementModel;
use App\Models\HarvestingModel;
use App\Models\WorkerModel;

class Harvesting extends BaseController
{
	public function index()
	{
        $AreaStatementModel = new AreaStatementModel();
        $WorkerModel = new WorkerModel();
        $afdeling = $AreaStatementModel->getAllActiveAfdeling();
        $worker = $WorkerModel->getAllActiveWorker();
		$data = array(
			'afdeling' => $afdeling->getResult(),
			'worker' => $worker->getResult(),
		);
		return view('harvesting_new',$data);
	}

    public function getPieChartData1()
	{
        $HarvestingModel = new HarvestingModel();
        $harvesting = $HarvestingModel->getPieChartData1();
		echo json_encode($harvesting->getResult());
	}

    public function getPieChartData2()
	{
        $HarvestingModel = new HarvestingModel();
        $harvesting = $HarvestingModel->getPieChartData2();
		echo json_encode($harvesting->getResult());
	}

    function input_process(){
        $HarvestingModel = new HarvestingModel();
		$data = array(
            'harvesting_date' => $this->request->getPost('harvDate'),
            'afdeling_id' => $this->request->getPost('afdelingId'),
            'planting_year_id' => $this->request->getPost('tahunTanamId'),
            'block_id' => $this->request->getPost('blockId'),
            'tph_id' => $this->request->getPost('tphId'),
            'worker_group_id' => $this->request->getPost('groupId'),
            'mandor_id' => $this->request->getPost('mandorId'),
            'pemanen_id' => $this->request->getPost('pemanenId'),
            'pembrondol_id' => $this->request->getPost('pembrondolId'),
            'tbs_dipanen' => $this->request->getPost('tbsDipanen'),
            'mentah' => $this->request->getPost('mentah'),
            'kurang_matang' => $this->request->getPost('kurangMatang'),
            'terlalu_matang' => $this->request->getPost('terlaluMatang'),
            'kosong' => $this->request->getPost('kosong'),
            'busuk' => $this->request->getPost('busuk'),
            'brondolan' => $this->request->getPost('brondolan'),
            'catatan' => $this->request->getPost('catatan'),
            'status' => 'Active',
            // 'created_by' => session()->get('userId'),
            'created_by' => 1,
            'date_time_created' => date('Y-m-d H:i:s')
        );
		$insert = $HarvestingModel->add($data);
		if($insert){
            return redirect()->to(base_url()); 
		}
    }
}
