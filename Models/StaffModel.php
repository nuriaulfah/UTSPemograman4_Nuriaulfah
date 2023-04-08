<?php namespace App\Models;

use CodeIgniter\Model;

class StaffModel extends Model
{
    //table name
    protected $table = "staff";

    //allowed fields
    protected $allowedFields = 
    [
        'nidn',
        'nama',
        'tugas',
        'alamat'
    ];

    public function getStaff()
    {
        return $this->findAll();
    }
    public function getStaffById($id = false)
    {
        if($id === false)
        {
            return $this->findAll();
        }
        else
        {
            return $this->getWhere(['id_staff' => $id]);
        }   
    }
	
	public function updateStaff($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id_staff' => $id));
        return $query;
    }
	
	public function deleteStaff($id)
    {
        $query = $this->db->table($this->table)->delete(array('id_staff' => $id));
        return $query;
    }

    public function insertStaff($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
}

?>