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

interface PJsTmpl {

    public function output();

    public function addScript($script);
}

class PJsTmplUrl implements PJsTmpl {
    public $jsList = array();

    public function output() {
        $jsList = $this->jsList;
        ob_start();
        include 'tmpl/defer-jsurl-tmpl.php'; 
        $output = ob_get_clean();
        return $output;
    }

    public function addScript($url) {
        $this->jsList[] = $url;
    }

}

class PJsTmplText implements PJsTmpl {

    public function addScript($script) {
        
    }

    public function output() {
        
    }

}