﻿<?php
class inspection extends Controller {

    private $route  = 'inspection';
    public $uploadLocation = "D:/mvc/public/webcam/str/"; 
	function __construct() {
	   parent::__construct();
	}
	function index() 
	{
	$this->view->title = 'inspection';
	// $this->view->userListview = $this->model->lstructure() ;
	$this->view->render($this->route.'/index');    
	}
	
	function inspecteur() 
	{
	$this->view->title = 'inspection';
	$this->view->Listview = $this->model->Listview() ;
	$this->view->render($this->route.'/inspecteur');    
	}
	public function editinspecteur($id) 
	{
        $this->view->title = 'editinspecteur';
		$this->view->user = $this->model->userSingleinspecteur($id);
		$this->view->render($this->route.'/editinspecteur');
	}
		public function editinspecteurx ($id)
	{
		$data = array();//$id
		$data['id']        = $id;
		$data['DATE']         = $_POST['DATE'];
		$data['REF']          = $_POST['REF'];
		$data['PJ']         = $_POST['PJ'];
		$data['Commanditaire']         = $_POST['Commanditaire'];
		//echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->editinspecteurx($data);
		header('location: ' . URL . $this->route.'/inspecteur/');
	}
	
   //***searchdeces***/
	function search()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'Search structure';
	    $this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word  
		$this->view->userListviewp =$url1[2]; // parametre 2 page                     limit 2,3
		$this->view->userListviewl =10     ; // parametre 3 nombre de ligne par page  limit 2,3 
		$this->view->userListviewb =15       ; // parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearch($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearch1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render($this->route.'/index');
	}
	function nstructure() 
	{
	$this->view->title = 'nstructure';
	// $this->view->userListview = $this->model->lstructure() ;
	$this->view->render($this->route.'/nstructure');    
	}
	public function createstructure() 
	{
		$data = array();
		$data['DATE']         = $_POST['DATE'];
		$data['STRUCTURE']    = $_POST['STRUCTURE'];
		$data['NATURE']       = $_POST['NATURE'];
		$data['NOM']          = $_POST['NOM'];   
		$data['NOMAR']        = $_POST['NOMAR'];
		$data['PRENOM']       = $_POST['PRENOM'];
		$data['PRENOMAR']     = $_POST['PRENOMAR'];
		$data['SEXE']         = $_POST['SEXE'];
		$data['WILAYA']       = $_POST['WILAYA'];
		$data['COMMUNE']      = $_POST['COMMUNE'];
		$data['ADRESSE']      = $_POST['ADRESSE'];
		$data['ADRESSEAR']    = $_POST['ADRESSEAR'];
		$data['PROPRIETAIRE'] = $_POST['PROPRIETAIRE'];
		$data['DEBUTCONTRAT'] = $_POST['DEBUTCONTRAT'];
		$data['FINCONTRAT']   = $_POST['FINCONTRAT'];
		$data['REALISATION']  = $_POST['REALISATION'];
		$data['NREALISATION'] = $_POST['NREALISATION'];
		$data['OUVERTURE']    = $_POST['OUVERTURE'];
		$data['NOUVERTURE']   = $_POST['NOUVERTURE'];
		$data['Mobile']   = $_POST['Mobile'];
		$data['Fixe']     = $_POST['Fixe'];
		$data['Email']   = $_POST['Email'];
		//echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->createstructure($data);
		header('location: ' . URL .$this->route. '/');	
	} 
	public function view($id) 
	{
        $this->view->title = 'editstructure';
		$this->view->user = $this->model->userSinglestructure($id);
		$this->view->render($this->route.'/view');
	}
	public function editstructure($id) 
	{
        $this->view->title = 'editstructure';
		$this->view->user = $this->model->userSinglestructure($id);
		$this->view->render($this->route.'/editstructure');
	}
	public function editSavestructure($id)
	{
		$data = array();//$id
		$data['id']        = $id;
		$data['DATE']         = $_POST['DATE'];
		$data['STRUCTURE']    = $_POST['STRUCTURE'];
		$data['NATURE']       = $_POST['NATURE'];
		$data['NOM']          = $_POST['NOM'];   
		$data['NOMAR']        = $_POST['NOMAR'];
		$data['PRENOM']       = $_POST['PRENOM'];
		$data['PRENOMAR']     = $_POST['PRENOMAR'];
		$data['SEXE']         = $_POST['SEXE'];
		$data['WILAYA']       = $_POST['WILAYA'];
		$data['COMMUNE']      = $_POST['COMMUNE'];
		$data['ADRESSE']      = $_POST['ADRESSE'];
		$data['ADRESSEAR']    = $_POST['ADRESSEAR'];
		$data['PROPRIETAIRE'] = $_POST['PROPRIETAIRE'];
		$data['DEBUTCONTRAT'] = $_POST['DEBUTCONTRAT'];
		$data['FINCONTRAT']   = $_POST['FINCONTRAT'];
		$data['REALISATION']  = $_POST['REALISATION'];
		$data['NREALISATION'] = $_POST['NREALISATION'];
		$data['OUVERTURE']    = $_POST['OUVERTURE'];
		$data['NOUVERTURE']   = $_POST['NOUVERTURE'];
		$data['Mobile']       = $_POST['Mobile'];
		$data['Fixe']         = $_POST['Fixe'];
		$data['Email']       = $_POST['Email'];
		echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->editSavestructure($data);//search/0/10?o=STRUCTURE&q=$data['STRUCTURE']
		header('location: ' . URL . $this->route.'/search/0/10?o=id&q='.$data['id']);
	}
	public function editetatstr($id)
	{
	    $url1 = explode('/',$_GET['url']);
		$data = array();
		$data['id']           = $id;
		$data['ETAT']         = $url1[3];
		//echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->editSavesstr($data);
		header('location: ' . URL . $this->route.'/search/0/10?o=id&q='.$data['id']);
	}
	public function deletestructure($id)
	{
	$this->model->deletestructure($id); 
	header('location: ' . URL .$this->route. '/');
	}
	function ALGERIE() 
	{	
	    $this->view->title = 'ALGERIE';
		$this->view->render($this->route.'/evadjelfacom');
	}
	function ALGERIE1() 
	{	
	    $this->view->title = 'ALGERIE';
		// $id='17000';
	    // $this->view->userListview = $this->model->dnrcommune($id) ;
		//$this->view->render('dnr/ALGERIE');
		$this->view->render($this->route.'/djelfacom');
	}
	function evaluation() 
	{	
	    $this->view->title = 'evaluation';
		$this->view->render($this->route.'/evaluation');
	}
	function imp() 
	{
	$this->view->title = 'Search deces';
	$this->view->render($this->route.'/imp');    
	}
	//***inspection ***//
	public function insp($id) //id = id structure
	{
        $this->view->title = 'insp';
		$this->view->user = $this->model->userSinglestructure($id);
		$this->view->userListview = $this->model->autoSingleinsp($id);
		$this->view->render($this->route.'/insp');   
	}
	public function createinsp($id) 
	{
		$data = array();
		$data['DATE']      = $_POST['DATE'];
		$data['REF']       = $_POST['REF'];
		$data['PJ']        = $_POST['PJ'];
		$data['STRUCTURE'] = $_POST['STRUCTURE'];
		$data['Commanditaire'] = $_POST['Commanditaire'];
		$data['id']        = $id;
		// echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->createinsp($data);
		header('location: ' . URL .$this->route. '/insp/'.$id);	
	} 
	public function deleteInspection($id)
	{
	$url1 = explode('/',$_GET['url']);	
	$this->model->deleteInspection($id); 
	header('location: ' . URL .$this->route. '/insp/'.$url1[3]);
	}
	public function anomalie($id) // id = id inspection   
	{
		$this->view->title = 'anomalie';
		$this->view->user = $this->model->userSingleinsp($id);
		$this->view->userListview = $this->model->listeanomalie($id);
		$this->view->render($this->route.'/anomalie');   
	}
	
	public function createanomalie($id) 
	{
		$data = array();
		$data['DATE']        = $_POST['DATE'];
		if ($_POST['ANOMALIE']=='') {
		$data['ANOMALIE']    = $_POST['ANOMALIEX'];
		} else {
		$data['ANOMALIE']    = $_POST['ANOMALIE'];
		}
		$data['id']          = $id;
		$data['ids']         = $_POST['ids']; //id structure
		$data['STRUCTURE']   = $_POST['STRUCTURE'];
		// echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->createanomalie($data);
		header('location: ' . URL .$this->route. '/anomalie/'.$id.'/'.$data['ids']);	
	} 
	public function editAnomaliesetat($id)
	{
	    $url1 = explode('/',$_GET['url']);
		$data = array();
		$data['id']           = $id;
		$data['ids']          = $url1[3];
		$data['ETAT']         = $url1[4];
		//echo '<pre>';print_r ($data);echo '<pre>';
	    $this->model->editSavesAnomalieetat($data);
		header('location: ' . URL . $this->route.'/anomalie/'.$url1[5].'/'.$data['ids'].'');
	}
	public function editAnomalies($id)
	{
	    $url1 = explode('/',$_GET['url']);
		$data = array();
		$data['id']           = $id;
		$data['ids']          = $url1[3];
		$data['ETAT']         = $url1[4];
		echo '<pre>';print_r ($data);echo '<pre>';
	    // $this->model->editSavesAnomalieetat($data);
		header('location: ' . URL . $this->route.'/anomalie/'.$url1[4].'/'.$data[3].'');
	}
	public function deleteAnomalies($id)
	{
	$url1 = explode('/',$_GET['url']);	
	$this->model->deleteAnomalies($id); 
	header('location: ' . URL .$this->route. '/anomalie/'.$url1[4].'/'.$data[3].'');
	}
	
	function MesurePrise($id) 
	{
	$this->view->title = 'MesurePrise';
	$this->view->user = $this->model->userSingleinsp($id);
	$this->view->render($this->route.'/MesurePrise');    
	}
	function createMesurePrise($id) 
	{
	$this->view->title = 'MesurePrise';
	$url1 = explode('/',$_GET['url']);
	$data = array();
	$data['MP']          = $_POST['MP'];
	$data['ids']         = $_POST['ids'];
	$data['id']          = $id;
	$this->model->editSavesMesurePrise($data);
	header('location: ' . URL . $this->route.'/insp/'.$data['ids']);   
	}
	//***inspection fin ***//
	function inspstructure($id) 
	{
	$this->view->title = 'inspstructure';
	$this->view->user = $this->model->userSinglestructure($id);
	$this->view->render($this->route.'/inspstructure');    
	}
	
	
	public function inspection($id) 
	{
        $this->view->title = 'editdeces';
		$this->view->user = $this->model->userSinglestructure($id);
		$this->view->userListview = $this->model->autoSingleinspection($id);
		$this->view->render($this->route.'/inspection');   
	}
	
	public function createinspection($id) 
	{
		$data = array();
		$data['DATE']         = $_POST['DATE'];
		$data['ANOMALIE']    = $_POST['ANOMALIE'];
		$data['id']        = $id;
		// echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->createinspection($data);
		header('location: ' . URL .$this->route. '/inspection/'.$id);	
	} 
	
	
	
	
	
	
	
	
	
/*auto trasporteu*/	
	
	function auto($id) 
	{
	$this->view->title = 'nstructure';
	$this->view->user = $this->model->userSinglestructure($id);
	$this->view->userListview = $this->model->autoSingleList($id);
	$this->view->render($this->route.'/auto');    
	}
	public function creatauto($id) 
	{
		$data = array();
		$data['Date']         = $_POST['Date'];
		$data['WILAYA']       = $_POST['WILAYA'];
		$data['COMMUNE']      = $_POST['COMMUNE'];
		$data['Categorie']    = $_POST['Categorie'];
		$data['Type']         = $_POST['Type'];
		$data['Serie_Type']   = $_POST['Serie_Type'];
		$data['Marque']       = $_POST['Marque'];
		$data['Immatri']      = $_POST['Immatri'];
		$data['Precedent']    = $_POST['Precedent'];
		$data['Annee']        = $_POST['Annee'];
		$data['NASS']         = $_POST['NASS'];
		$data['DUNASS']       = $_POST['DUNASS'];
		$data['AUNASS']       = $_POST['AUNASS'];
		$data['CTRL']         = $_POST['CTRL'];
		$data['DUCTRL']       = $_POST['DUCTRL'];
		$data['AUCTRL']       = $_POST['AUCTRL'];
		$data['id']           = $id;
		// echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->creatautodb($data);
		header('location: ' . URL .$this->route. '/auto/'.$id);	
	} 
	
	public function deleteauto($id)
	{
	$url1 = explode('/',$_GET['url']);	
	$this->model->deleteauto($id); 
	header('location: ' . URL .$this->route. '/auto/'.$url1[3]);
	}
	
	public function editauto($id) 
	{
	    $url1 = explode('/',$_GET['url']);
        $this->view->title = 'editauto';
		$this->view->user = $this->model->autoSingleList1($url1[2]);
	    $this->view->userListview = $this->model->autoSingleList($url1[3]);
		$this->view->render($this->route.'/editauto');
	}
	
	public function editSavesauto($id)
	{
		$data = array();//$id
		$data['Date']         = $_POST['Date'];
		$data['WILAYA']       = $_POST['WILAYA'];
		$data['COMMUNE']      = $_POST['COMMUNE'];
		$data['Categorie']    = $_POST['Categorie'];
		$data['Type']         = $_POST['Type'];
		$data['Serie_Type']   = $_POST['Serie_Type'];
		$data['Marque']       = $_POST['Marque'];
		$data['Immatri']      = $_POST['Immatri'];
		$data['Precedent']    = $_POST['Precedent'];
	    $data['Annee']        = $_POST['Annee'];
		$data['NASS']         = $_POST['NASS'];
		$data['DUNASS']       = $_POST['DUNASS'];
		$data['AUNASS']       = $_POST['AUNASS'];
		$data['CTRL']         = $_POST['CTRL'];
		$data['DUCTRL']       = $_POST['DUCTRL'];
		$data['AUCTRL']       = $_POST['AUCTRL'];
		$data['id']           = $id;
		$data['idt']          = $_POST['idt'];;
		// echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->editSavesauto($data);
		header('location: ' . URL . $this->route.'/editauto/'.$id.'/'.$data['idt'].'');
	}
	
	
	public function editetat($id)
	{
	    $url1 = explode('/',$_GET['url']);
		$data = array();
		$data['id']           = $id;
		$data['idt']          = $url1[3];
		$data['ETAT']         = $url1[4];
		// echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->editSavesetat($data);
		header('location: ' . URL . $this->route.'/auto/'.$data['idt'].'');
	}
	
	
	
	/*personnel*/	
	
	function pers($id) 
	{
	$this->view->title = 'nstructure';
	$this->view->user = $this->model->userSinglestructure($id);
	$this->view->userListview = $this->model->persSingleList($id);
	$this->view->render($this->route.'/pers');    
	}
	
	public function creatpers($id) 
	{
		$data = array();
		$data['NOMAR']        = $_POST['NOMAR'];
		$data['PRENOMAR']     = $_POST['PRENOMAR'];
	    $data['Categorie']    = $_POST['Categorie'];
		$data['id']           = $id;
		$data['CASNOS']       = $_POST['CASNOS'];
		$data['DEBUTCONTRAT'] = $_POST['DEBUTCONTRAT'];
		$data['FINCONTRAT']   = $_POST['FINCONTRAT'];
		// echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->creatpersdb($data);
		header('location: ' . URL .$this->route. '/pers/'.$id);	
	} 
	
	public function editpers($id) 
	{
	$url1 = explode('/',$_GET['url']);
	$this->view->title = 'nstructure'; 
    $this->view->user = $this->model->userpersSingleList($id);
    $this->view->userListview = $this->model->persSingleList($url1[3]);
	$this->view->render($this->route.'/editpers');   
	}
	
    public function editSavespers($id)
	{
	    $url1 = explode('/',$_GET['url']);
		$data = array();//$id
		$data['NOMAR']        = $_POST['NOMAR'];
		$data['PRENOMAR']     = $_POST['PRENOMAR'];
	    $data['Categorie']    = $_POST['Categorie'];
		$data['id']           = $id;
		$data['idt']          = $url1[3];
		$data['CASNOS']       = $_POST['CASNOS'];
		$data['DEBUTCONTRAT'] = $_POST['DEBUTCONTRAT'];
		$data['FINCONTRAT']   = $_POST['FINCONTRAT'];
		echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->editSavespers($data);
		header('location: ' . URL . $this->route.'/editpers/'.$id.'/'.$data['idt'].'');
	}



	
	public function editetatpers($id)
	{
	    $url1 = explode('/',$_GET['url']);
		$data = array();
		$data['id']           = $id;
		$data['idt']          = $url1[3];
		$data['ETAT']         = $url1[4];
		// echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->editSavesetatpers($data);
		header('location: ' . URL . $this->route.'/pers/'.$data['idt'].'');
	}
	
	
	public function deletepers($id)
	{
	$url1 = explode('/',$_GET['url']);	
	$this->model->deletepers($id); 
	header('location: ' . URL .$this->route. '/pers/'.$url1[3]);
	}
	
	//**CHANGER PHOTOS**//
	function upl() 
	{
	$this->view->title = 'Upload Photos';
	$this->view->render($this->route.'/upl');    
	}
	
	
	function upl1($id) 
	{
		$this->view->title = 'upload';
		if (isset($_POST))
		{
		
			if (isset($_FILES))
			{
		        $target_path = $this->uploadLocation.trim($id).".jpg";      
				if(move_uploaded_file($_FILES['upfile']['tmp_name'], $target_path)) 
				{	
				$this->view->msg ='le fichier :  '.basename( $_FILES['upfile']['name']).'  a été corectement envoyer merci';
				} 
				else
				{
				$this->view->msg ='il ya une erreur d\'envoie du fichier :  '.basename( $_FILES['upfile']['name']).'  veillez recomencer svp';	
				}
			}	
		}
		header('location: ' . URL . $this->route.'/search/0/10?o=id&q='.$id);
	}
	
	
	
	
	
	
}