<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Articles_modele
 *
 * @author Elif
 */
class Articles_modele extends CI_Model {
    protected $table='utilisateurs';
    /**
     * Constructeur dans lequel nous faisons appel a la base de donnée
     */
    public function __construct(){
        $this->load->database();
      
    }
    
    /**
     * 
     * @param String $slug 
     * @return String 
     * recupère les articles ou le slug est le même que celle récupéré en parametre
     */
    public function get_articles($slug = FALSE){
        if ($slug === FALSE){
            //Pour récupérer tous les articles
            $query = $this->db->get('articles');
            return $query->result_array();
        }
    $query = $this->db->get_where('articles', array('slug' => $slug));
    return $query->row_array();
    }
    /**
     * 
     * @param int $idTheme
     * @return int
     * recupère l'id des themes de la table theme qui le même que celle en paramètre
     */
    public function get_theme($idTheme =FALSE){
        if($idTheme === FALSE){
            $query = $this->db->get('theme');
            return $query->result_array();
        }
        $query = $this->db->get_where('theme',array('idTheme' => $idTheme));
        return $query->row_array(); 
    }
    /**
     * 
     * @param int $id_utilisateur
     * @return int
     * recupère l'id des utilisateurs de la table utilisateurs qui le même que celle en paramètre
     */
    public function get_utilisateurs($id_utilisateur =FALSE){
        if($id_utilisateur === FALSE){
            $query = $this->db->get('utilisateurs');
            return $query->result_array();
        }
        $query = $this->db->get_where('utilisateurs',array('id_utilisateur' => $id_utilisateur));
        return $query->row_array(); 
    }
    /**
     * 
     * @param int $fk_theme
     * @return int
     * recupère les articles où l'id du theme dans la table articles est le même que celle récupéré en parametre
     */
    public function get_selectiontheme($fk_theme=FALSE){
        if($fk_theme === FALSE){
            $query = $this->db->get('articles');
            return $query->result_array();
        }
        $query = $this->db->get_where('articles',array('fk_theme' => $fk_theme));
        return $query->result_array();
    }
    /**
     * @param int $fk_utilisateur
     * @return int
     * recupère les articles où l'id de l'utilisateur est le même que celle récupéré
     */
    public function get_selectionutilisateur($fk_utilisateur){
        if($fk_utilisateur === FALSE){
            $query = $this->db->get('articles');
            return $query->result_array();
        }
        $query = $this->db->get_where('articles',array('fk_utilisateur' => $fk_utilisateur));
        return $query->result_array();
    }
    public function set_articles()
{
    $this->load->helper('url');
    $slug = url_title($this->input->post('titre'), 'dash', TRUE);
    $data = array(
        'titre' => $this->input->post('titre'),
        'date' => $this->input->post('date'),
        'texte_libre' => $this->input->post('texte_libre'),
        'fk_utilisateur' => $this->input->post('fk_utilisateur'),
        'slug' => $slug,
        'fk_theme' => $this->input->post('fk_theme')
    );
    return $this->db->insert('articles', $data);
}
public function set_inscription(){
    $this->load->helper('url');
    $slug = url_title($this->input->post('titre'), 'dash', TRUE);
    $data = array(
            	'nom' => $this->input->post('nom'),
            	'prenom' => $this->input->post('prenom'),
   		'login' => $this->input->post('login'),
            	'mdp' => $this->input->post('mdp'),
            	//'mdp2' => $this->input->post('mdp2')
           	 
    );
    return $this->db->insert('utilisateurs', $data);
}
public function connexionUtilisateur($login,$mdp){
    return $this->db->select('login,mdp')
            ->from($this->table)
            ->where('login',$login)
            ->where('mdp',$mdp)
            ->get()
            ->result();
}

}
