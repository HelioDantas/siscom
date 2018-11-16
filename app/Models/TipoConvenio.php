<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoConvenio extends Model
{
    //
    protected $table = "sis_tipo_convenio";
    public $timestamps = false;

    protected $primaryKey = 'matricula';

    protected $fillable = array(
        'convenio_id',
        'status',
       );
}
