<?php
namespace Cake\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Exception;

class GridsComponent extends Component {
	protected $_columns = array();
    protected $_buttons = array();
    protected $_buttonPost = null;
    protected $_html;
    protected $_confs = array(
        'title' => 'Custom grid',
        'subtitle' => 'Custom grid subtitle list',
        'msgVazio' => 'Nenhum registro encontrado',
    );

    public function __construct($data = array()) {
        $this->_html = $this->render($data);

        
    }

    public function setData($data) {
        $this->_html = $this->render($data);
    }

    public function toString() {
        return $this->_html;
    }


    private function render($data) {
        $html = '';
        $html .= '
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="custom">
                        <div style="width: 70%; display: inline-block;">
                            <h4 class="title">' . $this->_confs["title"] . '</h4>
                            <p class="category">' . $this->_confs["subtitle"] . '</p>
                        </div>';

                        if($this->_buttonPost):
                            $html .= '
                            <div class="icon-groupR">
                                ' . $this->addLink() . '
                            </div>';
                        endif;

                    $html .= '</div>';

                    if(count($data) > 0):
                        $html .= '
                        <div class="card-content table-responsive">
                            <table class="table">
                                <thead class="text-primary">';

                                $html .= $this->buildColumns();

                                $html .= '
                                </thead>
                                <tbody class=""> ' . $this->populate() . ' </tbody>
                            </table>

                        </div>';
                    else:
                        $html .= '<center> '. $this->_confs['msgVazio'] . ' </center>';

                    endif;

                    $html .= '
                    <div class="box-footer clearfix"><br>
                      ' . $this->paginate() . '
                    </div>
                </div>
            </div>
        </div>';

        return $html;
    }

    /* Cria as colunas do grid */
    private function buildColumns() {
        $html = '';
        foreach ($this->_columns as $key => $column) {
            $html .= '<th id="'.$key.'" style="width:'.$column['size'].'; align:'.$column['align'].';">'.$column['label'].'</th>';
        }

        foreach ($this->_buttons as $key => $button) {
            $html .= '<th style="min-width:10%; align:center;"><center><i class="material-icons">settings</i></center></th>';
        }

        return $html;
    }

    /* Adiciona botão link */
    private function addLink() {
        return '';
    }

    /* Popula as linhas do grid */
    private function populate() {
        return '';
    }

    /* Cria paginação do grid */
    private function paginate() {
        return '';
    }
}