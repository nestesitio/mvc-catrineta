<?php

/*
 * Copyright (C) 2017 Luis Pinto <luis.nestesitio@gmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Model\forms;

use \Model\models\UserGroup;

/**
 * Description of UserGroupForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2018-01-19 18:03
 * Updated @Updated @2018-01-19 18:03 with columns id, name, description *
 */
class UserGroupForm extends \Catrineta\form\Form {

    /**
     * 
     * @param boolean $declare
     * @return \Model\forms\UserGroupForm
     */
    public static function initialize($declare = true){
        $form = new UserGroupForm();
        if($declare == true){
            $form->declareInputs();
        }
        return $form;
    }
    
    /**
     * Initialize all inputs
     * @return $this
     */
    public function declareInputs(){
        $this->models[UserGroup::TABLE] = new UserGroup();
        
        $this->setIdInput();
        $this->setNameInput();
        $this->setDescriptionInput();
        return $this;
    }
    
    public function validate(){
        
        $this->validateIdInput();
        $this->validateNameInput();
        $this->validateDescriptionInput();
        
        return $this;
    }
    
    
    
    
    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\HiddenInput;
    */
    public function setIdInput($input = null) {
        if($input == null){
            $input = \Catrineta\form\inputs\HiddenInput::create(UserGroup::FIELD_USER_GROUP_ID);
        }else{
            $input->setElementId(UserGroup::FIELD_USER_GROUP_ID); 
        }
        
        $this->setFieldInput(UserGroup::FIELD_USER_GROUP_ID, $input);
        
        return $input;
    }
    
    public function setIdDefault($value) {
        $this->setDefault(UserGroup::TABLE, UserGroup::FIELD_USER_GROUP_ID, $value);
    }
    
    public function unsetIdInput() {
        $this->unsetFieldInput(UserGroup::FIELD_USER_GROUP_ID);
    }
    
    /**
    * @return \lib\form\input\HiddenInput;
    */
    public function getIdInput(){
        return $this->forminputs[UserGroup::FIELD_USER_GROUP_ID];
    }
    
    public function getIdValue(){
        return $this->getInputValue(UserGroup::FIELD_USER_GROUP_ID);
    }
    
    public function validateIdInput() {
        $input = $this->getIdInput();
        return $input->validate();
    }
    
    
    
    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setNameInput($input = null) {
        if($input == null){
            $input = \Catrineta\form\inputs\InputText::create(UserGroup::FIELD_USER_GROUP_NAME)->setMaxlength('50');
        }else{
            $input->setElementId(UserGroup::FIELD_USER_GROUP_NAME); 
        }
        
        $this->setFieldInput(UserGroup::FIELD_USER_GROUP_NAME, $input);
        
        return $input;
    }
    
    public function setNameDefault($value) {
        $this->setDefault(UserGroup::TABLE, UserGroup::FIELD_USER_GROUP_NAME, $value);
    }
    
    public function unsetNameInput() {
        $this->unsetFieldInput(UserGroup::FIELD_USER_GROUP_NAME);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getNameInput(){
        return $this->forminputs[UserGroup::FIELD_USER_GROUP_NAME];
    }
    
    public function getNameValue(){
        return $this->getInputValue(UserGroup::FIELD_USER_GROUP_NAME);
    }
    
    public function validateNameInput() {
        $input = $this->getNameInput();
        return $input->validate();
    }
    
    
    
    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setDescriptionInput($input = null) {
        if($input == null){
            $input = \Catrineta\form\inputs\InputText::create(UserGroup::FIELD_USER_GROUP_DESCRIPTION)->setMaxlength('100');
        }else{
            $input->setElementId(UserGroup::FIELD_USER_GROUP_DESCRIPTION); 
        }
        
        $this->setFieldInput(UserGroup::FIELD_USER_GROUP_DESCRIPTION, $input);
        
        return $input;
    }
    
    public function setDescriptionDefault($value) {
        $this->setDefault(UserGroup::TABLE, UserGroup::FIELD_USER_GROUP_DESCRIPTION, $value);
    }
    
    public function unsetDescriptionInput() {
        $this->unsetFieldInput(UserGroup::FIELD_USER_GROUP_DESCRIPTION);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getDescriptionInput(){
        return $this->forminputs[UserGroup::FIELD_USER_GROUP_DESCRIPTION];
    }
    
    public function getDescriptionValue(){
        return $this->getInputValue(UserGroup::FIELD_USER_GROUP_DESCRIPTION);
    }
    
    public function validateDescriptionInput() {
        $input = $this->getDescriptionInput();
        return $input->validate();
    }
    
    
    
    
    
    

}
