<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $table = 'sis_medico';
    public $timestamps = false;

     
    protected $primaryKey = 'Sis_funcionario_matricula';
    
    protected $fillable = array('Sis_funcionario_matricula','crm');

    public function especialidade(){

      return  $this->belongsToMany("App\Models\Especialidade", 'sis_medico_tem_especialidade','Sis_medico_funcionario_matricula', 'Sis_especialidade_id');
    }


    public function funcionario(){

        return $this->belongsTo("App\Models\Funcionario", 'Sis_funcionario_matricula', 'matricula');

    }


    public function planos(){

        return  $this->belongsToMany("App\Models\Plano", 'sis_medico_tem_plano','medico_id', 'plano_id')->withPivot('status');
    }

    public function updateMedico($Funcionario, $request){

            $especialidade1 = $especialidade2 = true;
            $Funcionario->medico->update($request->only('crm'));
            $especialidade1 = $especialidade2 = true;
            $Funcionario->medico->update($request->only('crm'));
            $request->only('especialidade1')['especialidade1'] != null ? $especialidade[] = $request->only('especialidade1')['especialidade1'] : $especialidade1 = null;
            $request->only('especialidade2')['especialidade2'] != null ? $especialidade[] = $request->only('especialidade2')['especialidade2'] : $especialidade2 = null;

            $especialidade1 == null && $especialidade2 == null ? $Funcionario->medico->especialidade()->detach() : $Funcionario->medico->especialidade()->sync($especialidade);

    }



    public function createMedico($matricula, $request){

                $this->crm = $request->all('crm')['crm'];
                $this->Sis_funcionario_matricula = $matricula;
                $this->save();
                $medico = Medico::find($matricula);
                $request->only('especialidade1')['especialidade1'] != null ? $especialidade[] = $request->only('especialidade1')['especialidade1'] : '';
                $request->only('especialidade2')['especialidade2'] != null ? $especialidade[] = $request->only('especialidade2')['especialidade2'] : '';
                if(!empty(  $especialidade))
                    $medico->especialidade()->attach($especialidade);
                    $planos = $request->only('$p');
                foreach ($planos as $id) {
                    $plano[] = $id[0];

                }
                if(!empty( $planos))
                  $medico->planos()->attach($plano);



    }

    function getHorarios(){
        $horarios = [
            '08:00',
            '08:30',
            '09:00',
            '09:30',
            '10:00',
            '10:30',
            '11:00',
            '11:30',
            '12:00',
            '12:30',
            '13:00',
            '13:30',
            '14:00',
            '14:30',
            '15:00',
            '15:30',
            '16:00',
            '16:30',
            '17:00',
            '17:30',
            '18:00',
        ];
    }

}
