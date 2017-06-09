<?php
/**
 * Created by PhpStorm.
 * User: nregmi
 * Date: 6/7/17
 * Time: 3:28 PM
 */
use Illuminate\Database\Eloquent\Model;

class Userin extends Model{
    protected $table = 'userin';
    protected $fillable=array("username","password","role");
}