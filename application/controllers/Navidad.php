<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Navidad extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model("basedatos");
  }

  function index()
  {
    $this->navidad();
  }

  function navidad()
  {
    $data= array();
    if(isset($_GET['id'])){
      $data['edit']= $this->basedatos->seleccionarUno('registro', $_GET['id']);
    }
    $data['registro']= $this->basedatos->seleccionar('registro');
    $this->load->view("navidad/index", $data);
  }

  function guardar()
  {
    if($_POST){
      $this->basedatos->guardar('registro', $_POST);
      $this->navidad();
    }
  }

  function borrar()
  {
    if(isset($_GET['id'])){
      $this->basedatos->borrar("registro", $_GET['id']);
    }
    $this->navidad();
  }

}
