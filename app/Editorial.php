<?php namespace biblioteca;

use Illuminate\Database\Eloquent\Model;

class Editorial extends Model {

    protected $table = 'editorial';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo','nombreEditorial'];

}
