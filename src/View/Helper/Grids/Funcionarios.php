<?php

namespace App\View\Helper;

use App\View\Helper\GridsHelper;

class FuncionariosHelper extends GridsHelper {
	protected $_columns = array();
	protected $_buttons = array();
	protected $_buttonPost = null;
	protected $_confs = array(
		'title' => 'Custom grid',
		'subtitle' => 'Custom grid subtitle list',
		'msgVazio' => 'Nenhum registro encontrado',
	);

	public function __construct($data = array()) {
		parent::__construct();
	}
}