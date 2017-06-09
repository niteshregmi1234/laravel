<?php
/**
 * Created by PhpStorm.
 * User: nregmi
 * Date: 6/6/17
 * Time: 5:06 PM
 */
use Illuminate\Database\Eloquent\Model;

class Category extends Model{
    protected $table = 'category';
    protected $fillable=array("category");

}