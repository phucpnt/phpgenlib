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

class PJsIterator implements Iterator {

    protected $jsListTmpl = NULL;
    protected $jsList     = array();
    private $valid = FALSE;

    public function current() {
        return current($this->jsList);
    }

    public function key() {
        return key($this->jsList);
    }

    public function next() {
        $this->valid = (next($this->jsList) === FALSE) ? FALSE : TRUE;
    }

    public function rewind() {
        $this->valid = (rewind($this->jsList) === FALSE) ? FALSE : TRUE;
    }

    public function valid() {
        return $this->valid;
    }

    public function add($js) {
        $this->jsList[] = $js;
    }

    public function isExists($js) {
        return in_array($js, $this->jsList);
    }

    public function setTmpl(&$tmpl) {
        $this->jsListTmpl = & $tmpl;
        $this->jsListTmpl->jsList = & $this->jsList;
    }

    public function render() {
        return $this->jsListTmpl->output();
    }

}