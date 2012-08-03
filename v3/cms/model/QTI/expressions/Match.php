<?php

/*
  Concerto Platform - Online Adaptive Testing Platform
  Copyright (C) 2011-2012, The Psychometrics Centre, Cambridge University

  This program is free software; you can redistribute it and/or
  modify it under the terms of the GNU General Public License
  as published by the Free Software Foundation; version 2
  of the License, and not any of the later versions.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

class Match extends AExpression {

    //children
    public $expression = array();
    public static $name = "match";
    public static $possible_attributes = array();
    public static $required_attributes = array();
    public static $possible_children = array(
        "expression"
    );
    public static $required_children = array(
        "expression"
    );

    public function __construct($node, $parent) {
        parent::__construct($node, $parent);
        self::$possible_attributes = array_merge(parent::$possible_attributes, self::$possible_attributes);
        self::$required_attributes = array_merge(parent::$required_attributes, self::$required_attributes);
        self::$possible_children = array_merge(parent::$possible_children, self::$possible_children);
        self::$required_children = array_merge(parent::$required_children, self::$required_children);
    }

    public function get_R_code() {
        if (count($this->expression) != 2)
            return "NULL";
        $ex1 = $this->expression[0]->get_R_code();
        $ex2 = $this->expression[1]->get_R_code();
        if ($ex1 == "NULL" || $ex2 == "NULL")
            return "NULL";
        return $ex1 . "==" . $ex2;
    }

}

?>