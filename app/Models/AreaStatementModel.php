<?php
namespace App\Models;
use CodeIgniter\Model;

class AreaStatementModel extends Model {

    function getAllActiveAfdeling(){
        $builder = $this->db->table('master_afdeling');
        $where = array(
          'status' => 'Active'
        );
        $query = $builder->getWhere($where);
        return $query;
    }

    function getAllActivePyByAfdelingId($afdelingId){
        $builder = $this->db->table('master_planting_year');
        $where = array(
            'status' => 'Active',
            'afdeling_id' => $afdelingId
        );
        $query = $builder->getWhere($where);
        return $query;
    }

    function getAllActiveBlockByPyId($pyId){
        $builder = $this->db->table('master_block');
        $where = array(
            'status' => 'Active',
            'planting_year_id' => $pyId
        );
        $query = $builder->getWhere($where);
        return $query;
    }

    function getAllActiveTphByBlockId($blockId){
        $builder = $this->db->table('master_tph');
        $where = array(
            'status' => 'Active',
            'block_id' => $blockId
        );
        $query = $builder->getWhere($where);
        return $query;
    }

}