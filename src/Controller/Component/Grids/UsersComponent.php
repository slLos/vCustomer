<?php

namespace Cake\Controller\Component;

use App\Controller\Component\GridsComponent;

class UsersComponent extends GridsComponent {
	protected $_columns = array();
	protected $_buttons = array();
	protected $_buttonPost = null;
	protected $_confs = array(
		'title' => 'Funcionários',
		'subtitle' => 'Lista de funcionários',
		'msgVazio' => 'Nenhum registro encontrado',
	);

	public function __construct($data = array()) {
		parent::__construct();
	}
}