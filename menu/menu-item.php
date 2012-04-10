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

/**
 * handle menu item with different template
 */

abstract class PMenuItem{
    /**
     * @var PMenuTmpl
     */
    protected $tmpl;
    protected $parent = NULL;
    protected $childs = array();

    public function setTmpl($tmpl){
        $this->tmpl = $tmpl;
        return $this;
    }

    public function output($tmpl){
        $this->tmpl->setItem($this);
        return $this->tmpl->output();
    }

    public function addChild($item){
        $item->parent = $this;
        $this->childs[] = $item;
        return $this;
    }

    public function &getChilds(){
        return $this->childs;
    }

    public function &getParent(){
        return $this->parent;
    }
}