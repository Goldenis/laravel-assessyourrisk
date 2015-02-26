<?php
class Count extends Eloquent
{
	protected $table = 'count';
	
	protected $visible = array('lifestyle', 'knowing', 'family');
	protected $fillable = array('lifestyle', 'knowing', 'family');
	
}