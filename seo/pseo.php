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
PHP lib for SEO purpose:
    Meta tag generated.
    Javascript defer loading.
    Etc.
Require:
    Independent platform
    Quickly adapter to native support on usage framework or cms.
 */
require_once 'js/jsfactory.php'; 
abstract class PSEO{
    protected $jsList = array();
    /**
     * @var PJsFactory
     */
    protected $jsFactory = NULL;
    public function getJsFactory(){
        if($this->jsFactory === NULL){
            $this->jsFactory = new PJsFactory;
        }
        return $this->jsFactory;
    }
    abstract public function renderJs();
    abstract public function addJs($js, $type);
    abstract public function addMeta($key, $value);
    abstract public function echoMeta();
}
