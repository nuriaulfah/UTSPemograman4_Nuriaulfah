<?php 
namespace App\Controllers;
use App\Models\StaffModel;

class Staff extends BaseController
{
    /**
     * index function
     */
    public function index()
    {
        //model initialize
        $Staffs = new StaffModel();
		$pager = \Config\Services::pager();

        $data = array(
            'staffs' => $Staffs->paginate(2, 'staff'),
            'pager' => $Staffs->pager
        );
	
		
        return view('staff', $data);

      
      
    }
        public function update($id)
        {
            $model = new StaffModel();   
            $data['staff'] = $model->getStaffById($id)->getRow();
            echo view('view_editstaff', $data);
        }

        public function edit()
        {
            $model = new StaffModel();
            $id = $this->request->getPost('id_staff');
            $data = array (
                'nidn'  => $this->request->getPost('nidn'),
                'nama' => $this->request->getPost('nama'),
                'tugas' => $this->request->getPost('tugas'),
                'alamat' => $this->request->getPost('alamat'),
            );
            $model->updateStaff($data, $id);
            return redirect()->to('/Ulfahstaff');

        }

        public function delete($id)
        {
            $model = new StaffModel();
            $model->deleteStaff($id);
            return redirect()->to('/Ulfahstaff');
        }

        public function input()
        {
            echo view('view_inputstaff');
        }

        public function insert()
        {
            $model = new StaffModel();
            //$id = $this->request->getPost('id');
            $data = array (
                'nidn'  => $this->request->getPost('nidn'),
                'nama' => $this->request->getPost('nama'),
                'tugas' => $this->request->getPost('tugas'),
                'alamat' => $this->request->getPost('alamat'),
            );
            $model->insertStaff($data);
            return redirect()->to('/Ulfahstaff');   
        }

}
    

?>
