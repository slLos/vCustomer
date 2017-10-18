<?php namespace biblioteca;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model {

    protected $table = 'recurso';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['ISBN','titulo','resumen','totalPaginas','tipoLibro','revista','monografia','codEditorial'];

}
