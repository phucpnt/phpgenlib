<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
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
require_once dirname(__FILE__) . '/../seo/pseo.php';

class PSeoImpl extends PSEO {

    protected $metaList = array();

    public function addMeta($key, $value) {
        $this->metaList[$key] = $value;
    }

    public function getMeta($key) {
        return $this->metaList[$key];
    }

    public function isAddedJs($js) {
        return $this->jsFactory->checkJsExist($js);
    }

    public function addJs($js, $type){
        $this->getJsFactory();
        $this->jsFactory->addJs($js, $type);
    }

    public function echoMeta() {
        $output = '';
        foreach ($this->metaList as $key => $content) {
            $output .= '<meta name="' . $key . '" content="' . $content . '"/>';
        }
        return $output;
    }

}
