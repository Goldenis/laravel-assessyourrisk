<?php

class FacebookUser extends Eloquent
{	
    protected $table = 'users';
    
    protected $visible = array('id', 'lifestyle', 'knowing', 'family', 'name', 'picture');
    protected $appends = array('lifestyle', 'knowing', 'family');
    
    public function getLifestyleAttribute()
    {
    	return (strpos($this->types, 'lifestyle') !== false);
    }
    public function getKnowingAttribute()
    {
    	return (strpos($this->types, 'knowing') !== false);
    }
    public function getFamilyAttribute()
    {
    	return (strpos($this->types, 'family') !== false);
    }
    
    public function hasType($type) {
    	return (strpos($this->types, $type) !== false);
    }
    
    public function addType($type) {
//     	if ($type != 'lifestyle' || $type != 'knowing' || $type != 'family') return;
    	
    	$hasLS =  (strpos($this->types, 'lifestyle') !== false || $type == 'lifestyle') ? ('|lifestyle|') : ('');
    	$hasK =  (strpos($this->types, 'knowing') !== false || $type == 'knowing') ? ('|knowing|') : ('');
    	$hasF =  (strpos($this->types, 'family') !== false || $type == 'family') ? ('|family|') : ('');
    	
    	$this->types = $hasLS . '|' . $hasK . '|' . $hasF;
    }
}