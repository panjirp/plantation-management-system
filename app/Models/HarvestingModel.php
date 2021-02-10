<?php
namespace App\Models;
use CodeIgniter\Model;

class HarvestingModel extends Model {


    function add($data){
        $builder = $this->db->table('harvesting_history');
        $builder->insert($data);
        return $this->db->insertID();
    }    

    function getPieChartData1(){
        $builder = $this->db->table('harvesting_history');
        $builder->select('SUM((tbs_dipanen-mentah-kurang_matang-terlalu_matang-kosong-busuk)) as matang, SUM(mentah) as mentah');
        $builder->where('status', 'Active');
        $query = $builder->get();
        //$sql = $builder->getCompiledSelect();
        //var_dump($sql);
        return $query;
    }

    function getPieChartData2(){
        $builder = $this->db->table('harvesting_history');
        $builder->select('SUM((tbs_dipanen-mentah-kurang_matang-terlalu_matang-kosong-busuk)) as matang, SUM(mentah) as mentah, master_afdeling.name as afdelingName');
        $builder->join('master_afdeling', 'master_afdeling.id = harvesting_history.afdeling_id');   
        $builder->where('harvesting_history.status', 'Active');
        $builder->groupBy('afdeling_id');
        $query = $builder->get();
        return $query;
    }

    function getAllActiveData(){
        $builder = $this->db->table('harvesting_history');
        $builder->select('harvesting_history.*,master_afdeling.name as afdName,master_planting_year.name as pyName,master_block.name as blockName,master_tph.name as tphName,master_worker_group.name as groupName,master_worker.name as workerName');
        $builder->join('master_afdeling', 'master_afdeling.id = harvesting_history.afdeling_id'); 
        $builder->join('master_planting_year', 'master_planting_year.id = harvesting_history.planting_year_id'); 
        $builder->join('master_block', 'master_block.id = harvesting_history.block_id'); 
        $builder->join('master_tph', 'master_tph.id = harvesting_history.tph_id'); 
        $builder->join('master_worker_group', 'master_worker_group.id = harvesting_history.worker_group_id'); 
        $builder->join('master_worker', 'master_worker.id = harvesting_history.mandor_id'); 
        $builder->where('harvesting_history.status', 'Active');
        $query = $builder->get();
        return $query;
    }

}