<?php 
namespace App\Controllers;
use App\Models\DosenModel;

class Dosen extends BaseController
{
    /**
     * index function
     */
    public function index()
    {
        //model initialize
        $Dosens = new DosenModel();
		$pager = \Config\Services::pager();

        $data = array(
            'dosens' => $Dosens->paginate(2, 'dosen'),
            'pager' => $Dosens->pager
        );
	
		
        return view('dosen', $data);

      
      
    }
        public function update($id)
        {
            $model = new DosenModel();   
            $data['dosen'] = $model->getDosenById($id)->getRow();
            echo view('view_editdosen', $data);
        }

        public function edit()
        {
            $model = new DosenModel();
            $id = $this->request->getPost('id_dosen');
            $data = array (
                'nidn'  => $this->request->getPost('nidn'),
                'nama' => $this->request->getPost('nama'),
                'matkul' => $this->request->getPost('matkul'),
                'alamat' => $this->request->getPost('alamat'),
            );
            $model->updateDosen($data, $id);
            return redirect()->to('/Ulfahdosen');

        }

        public function delete($id)
        {
            $model = new DosenModel();
            $model->deleteDosen($id);
            return redirect()->to('/Ulfahdosen');
        }

        public function input()
        {
            echo view('view_inputdosen');
        }

        public function insert()
        {
            $model = new DosenModel();
            //$id = $this->request->getPost('id');
            $data = array (
                'nidn'  => $this->request->getPost('nidn'),
                'nama' => $this->request->getPost('nama'),
                'matkul' => $this->request->getPost('matkul'),
                'alamat' => $this->request->getPost('alamat'),
            );
            $model->insertDosen($data);
            return redirect()->to('/Ulfahdosen');   
        }

}
    

?>
