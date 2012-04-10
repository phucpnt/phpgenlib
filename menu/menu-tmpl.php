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

abstract class PMenuTmpl{
    protected $menuItem;
    protected $tmplFile;

    public function setItem($item){
        $this->menuItem = $item;
    }

    public function setFile($phpTmplFile){
        $this->tmplFile = $phpTmplFile;
    }

    public function output(){
        $menuItem = $this->menuItem;
        ob_start();
        include($this->tmplFile);
        $output = ob_get_clean();
        return $output;
    }
}