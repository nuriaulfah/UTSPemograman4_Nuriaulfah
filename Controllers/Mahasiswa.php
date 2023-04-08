<?php 
namespace App\Controllers;
use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    /**
     * index function
     */
    public function index()
    {
        //model initialize
        $Mahasiswas = new MahasiswaModel();
		$pager = \Config\Services::pager();

        $data = array(
            'mahasiswas' => $Mahasiswas->paginate(2, 'mahasiswa'),
            'pager' => $Mahasiswas->pager
        );
	
		
        return view('mahasiswa', $data);

      
      
    }
        public function update($id)
        {
            $model = new MahasiswaModel();   
            $data['mahasiswa'] = $model->getMahasiswaById($id)->getRow();
            echo view('view_editMahasiswa', $data);
        }

        public function edit()
        {
            $model = new MahasiswaModel();
            $id = $this->request->getPost('id_mahasiswa');
            $data = array (
                'nim'  => $this->request->getPost('nim'),
                'nama' => $this->request->getPost('nama'),
                'prodi' => $this->request->getPost('prodi'),
                'alamat' => $this->request->getPost('alamat'),
            );
            $model->updateMahasiswa($data, $id);
            return redirect()->to('/Ulfahmahasiswa');

        }

        public function delete($id)
        {
            $model = new MahasiswaModel();
            $model->deleteMahasiswa($id);
            return redirect()->to('/Ulfahmahasiswa');
        }

        public function input()
        {
            echo view('view_inputmahasiswa');
        }

        public function insert()
        {
            $model = new MahasiswaModel();
            //$id = $this->request->getPost('id');
            $data = array (
                'nim'  => $this->request->getPost('nim'),
                'nama' => $this->request->getPost('nama'),
                'prodi' => $this->request->getPost('prodi'),
                'alamat' => $this->request->getPost('alamat'),
            );
            $model->insertMahasiswa($data);
            return redirect()->to('/Ulfahmahasiswa');   
        }

}
    

?>
