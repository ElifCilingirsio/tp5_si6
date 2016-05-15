<?php

   /*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Articles
 *
 * @author Elif
 */
class Articles extends CI_Controller {
    /**
     * Dans le constructeur nous appelons le modèle que nous avons créer soit articles_modele
     */
    public function __construct(){
        parent::__construct();
        $this->load->model('articles_modele');
        $this->load->library('session');
        
    }
    /**
     * Nous avons une fonction index qui fait appelle au fonction get_theme() et 
     * get_utilisateurs() qui se trouve dans articles_modele
     * puis nous faisons appelle a la vue
     */
    public function index(){
        $data['theme'] = $this->articles_modele->get_theme();
        $data['utilisateurs'] = $this->articles_modele->get_utilisateurs();
        $data['nom'] = 'Liste des articles';
        $this->load->view('articles/index', $data);
    }
    /**
     * 
     * @param int $fk_theme qui recupère l'id du theme 
     * on fais appel a la fonction get_selctiontheme qui se trouve dans articles_modele
     * puis on appel la vue articles/view
     * 
     */
    public function view($fk_theme)
{
         $data['articles'] = $this->articles_modele->get_selectiontheme($fk_theme);
        if (empty($data['articles']))
        {
                show_404();
        }
        $this->load->view('articles/view', $data);
}
/**
 * 
 * @param int $fk_utilisateur qui récupère l'id de l'auteur
 * on fais appel a la fonction get_selctionutilisateur qui se trouve dans articles_modele
 * puis on appel la vue articles/view
 */
        public function vue($fk_utilisateur){
        $data['articles'] = $this->articles_modele->get_selectionutilisateur($fk_utilisateur);
        if (empty($data['articles']))
        {
                show_404();
        }
        $this->load->view('articles/view', $data);
        }
        public  function  create () 
{ 
    $this -> load -> helper ( 'form' ); 
    $this -> load -> library ( 'form_validation' ); 

    $data [ 'titre' ]  =  'Create une nouvelle item' ; 

    $this -> form_validation -> set_rules ( 'titre' ,  'Titre' ,  'required' ); 
    $this -> form_validation -> set_rules ( 'texte_libre' ,  'Texte_libre' ,  'required' ); 
    $this -> form_validation -> set_rules ( 'date' ,  'Date' ,  'required' );
    $this -> form_validation -> set_rules ( 'fk_utilisateur' ,  'Fk_utilisateur' ,  'required' );
    $this -> form_validation -> set_rules ( 'slug' ,  'Slug' ,  'required' );
    $this -> form_validation -> set_rules ( 'fk_theme' ,  'Fk_theme' ,  'required' );

    if  ( $this -> form_validation -> run ()  ===  FALSE ) 
    { 
        $this -> load -> view ( 'articles/create' );  

    } 
    else 
    { 
        $this -> articles_modele -> set_articles (); 
        $this -> load -> view ( 'articles/sucess' ); 
    } 
}
public function inscription(){
        	$this->load->helper('form');
        	$this->load->library('form_validation');       	 
        	$this->form_validation->set_rules('nom', 'nom', 'required');
        	$this->form_validation->set_rules('prenom', 'prenom', 'required');
        	$this->form_validation->set_rules('login', 'login', 'required');
        	$this->form_validation->set_rules('mdp', 'mdp', 'required');
        	//$this->form_validation->set_rules('mdp2', 'mdp2', 'required');
                   	 
        	if ($this->form_validation->run() === FALSE){
            	$this->load->view('articles/inscription');
           	 
        	}
        	else{
   	 $this->articles_modele->set_inscription();
   	 $this->load->view('articles/success_inscription');
        	}
}
public function connexion(){
        	$this->load->helper('form');
        	$this->load->library('form_validation');  
                $login=$this->input->post('login');
                $mdp=$this->input->post('mdp');
        	$this->form_validation->set_rules('login', 'login', 'required');
        	$this->form_validation->set_rules('mdp', 'mdp', 'required');
        	$result=$this->articles_modele->connexionUtilisateur($login,$mdp);
                   	 
        	if ($this->form_validation->run() === FALSE){
            	$this->load->view('articles/connexion');
        	}
                elseif($this->form_validation->run() == true && empty($result)){
                    $this->session->set_flashdata('noconnect', 'Aucun compte ne correspond a vos identifiants');
                    $this->load->view('articles/connexion');
                }else{
                    $this->session->set_userdata('id_utilisateur',$login);
                    $this->load->view('articles/success_conn');
                }
                  //  $this->load->view('articles/success_conn');
                                     
       //         }
   	
           
        }
        private function sessionUtilisateur(){
            if(!$this->session->userdata(id_utilisateur)){
                $this->load->view('connexion');
            }
        }
        
        public function logout(){
            $this->session->sess_destroy();
           // echo '<a href=index/> retour a la page daccueil</a>';
            header('Location:http://localhost/tp5si6/index.php/articles/');
            
        }
    /*   public function redirection(){
            $this->load->helper('url');
            redirect('/articles');
            
        }*/
        
}

