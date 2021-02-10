<?php
namespace App\Models;
use CodeIgniter\Model;

class WorkerModel extends Model {

    function getAllActiveWorker(){
        $builder = $this->db->table('master_worker');
        $where = array(
          'status' => 'Active'
        );
        $query = $builder->getWhere($where);
        return $query;
    }

    function getAllActiveGroup(){
        $builder = $this->db->table('master_worker_group');
        $where = array(
          'status' => 'Active'
        );
        $query = $builder->getWhere($where);
        return $query;
    }

    function getAllActiveGroupByAfdelingId($afdelingId){
        $builder = $this->db->table('master_worker_group');
        $where = array(
            'status' => 'Active',
            'afdeling_id' => $afdelingId
        );
        $query = $builder->getWhere($where);
        return $query;
    }

    function getAllActiveMandoreByGroupId($groupId){
        $builder = $this->db->table('master_worker');
        $builder->select('master_worker.*');
        $builder->join('master_worker_in_group', 'master_worker_in_group.master_worker_id = master_worker.id');         
        $builder->where('master_worker_in_group.master_worker_group_id', $groupId);
        $builder->where('master_worker_in_group.master_worker_role_id', 1);
        $builder->where('master_worker_in_group.status', 'Active');
        $builder->where('master_worker.status', 'Active');
        $query = $builder->get();
        //$sql = $builder->getCompiledSelect();
        //var_dump($sql);
        return $query;
    }

}