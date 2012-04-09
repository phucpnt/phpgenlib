<?php

/*
  Copyright 2012  Phuc PN.Truong  (email : pn.truongphuc@exto.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

require_once 'jstmpl.php';
require_once 'js-iterator.php';

class PJsFactory {

    const TMPL_URL    = 'url';
    const TMPL_SCRIPT = 'script';

    private $supportJsList = array(
        self::TMPL_SCRIPT => NULL,
        self::TMPL_URL    => NULL,
    );

    public function addJs($js, $type) {
        if (!isset($this->supportJsList[$type])) {
            $this->supportJsList[$type] = new PJsIterator();
            switch ($type) {
                case self::TMPL_SCRIPT:
                    break;
                case self::TMPL_URL:
                    $this->supportJsList[$type]->setTmpl(new PJsTmplUrl());
                    break;
            }
        }
        $this->supportJsList[$type]->addJs($js);
    }

    public function output() {
        $output = '';
        /* @var $tmpl PJsTmpl */
        foreach ($this->supportJsList as $jsList) {
            if ($jsList !== NULL) {
                $output .= $jsList->render();
            }
        }
        return $output;
    }

    public function startCapture(){
        ob_start();
    }

    public function endCapture(){
        $script = ob_get_clean();
        $this->addJs($script, self::TMPL_SCRIPT);
    }

}