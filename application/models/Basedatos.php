<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Basedatos extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->database();
  }

  function guardar($tabla, $contenido)
  {
    $id=$contenido['id'];
    unset($contenido['id']);
    if($id==0){
      $this->db->insert($tabla, $contenido);
    }else{
      $this->db->where("id=",$id);
      $this->db->update($tabla, $contenido);
    }
  }

  function seleccionar($tabla)
  {
    return $this->db->get($tabla)->result();
  }

  function seleccionarUno($tabla, $id)
  {
    $r= new stdclass();
    $this->db->where("id=", $id);
    $registro = $this->db->get($tabla)->result();
    if(count($registro)>0){
      $r=$registro[0];
    }
    return $r;
  }

  function borrar($tabla, $id)
  {
    $this->db->where("id=", $id);
    $registro = $this->db->delete($tabla);
  }

}
