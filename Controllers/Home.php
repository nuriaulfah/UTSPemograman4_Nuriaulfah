<?php 
namespace App\Controllers;
use App\Models\DosenModel;

class Home extends BaseController
{
    /**
     * index function
     */
    public function index()
    {
        echo view('view_home');
    }
       

}
    

?>
