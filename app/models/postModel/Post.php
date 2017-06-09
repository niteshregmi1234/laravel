<?php
/**
 * Created by PhpStorm.
 * User: nregmi
 * Date: 6/9/17
 * Time: 5:09 PM
 */
use Illuminate\Database\Eloquent\Model;

class Post extends Model{

    protected $table = 'post';
    protected $fillable=array("category","title","slug","description","author");
}