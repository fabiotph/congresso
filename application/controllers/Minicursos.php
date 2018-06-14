<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'controllers/Admin.php');

/**
 * Classe responsável por gerenciar as ações de um administrador
 */
class Minicursos extends Admin {
	public function __construct(){
        parent::__construct();
        $this->load->helper('frontend_helper'); 
        $this->load->helper('modalform_helper'); 
        $this->load->model('Minicurso_model', 'minicurso_model');
    }
    public function adicionar(){
    	$this->load->view('html-header-admin');
        $this->load->view('header-admin');
        $this->load->view('minicursoAdicionar');
        $this->load->view('footer-admin');
    }

	public function listar(){
		
	}

	public function Inserir(){
		$data['nome'] = $this->input->post('nome');
		$data['dia'] = $this->input->post('dia');
		$data['horario_inicio'] = $this->input->post('horario_ini');
		$data['horario_fim'] = $this->input->post('horario_enc');
		$data['limite_vagas'] = $this->input->post('vagas_norm');
		$data['limite_vagas_seduc'] = $this->input->post('vagas_seduc');
		$data['descricao'] = $this->input->post('descricao');
		$data['convidado'] = $this->input->post('palestrante');

		$this->minicurso_model->adicionarMinicurso($data);

		redirect(base_url('Minicursos/adicionar'));
	}
}