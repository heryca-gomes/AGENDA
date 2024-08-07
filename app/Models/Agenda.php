<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    
    /**
     * determina os atributos dessa mondel, necessário para edição via ORM
     *
     * @var array
     */
    protected $fillable = [
        'servidor_id',
        'aluno_id',
        'data',
        'horario',
        'status'
    ];
    
    /**
     * determina o relacionamento entre Agenda e Aluno
     * Aqui é dito o grau de relacionamento 
     * belongsTo = pertence. Uma AGENDA (horário, agendamento...) pertence a um Aluno
     * Relação de 1 : 1
     * @return void
     */
    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'aluno_id');
    }
    
    /**
     * determina o relacionamento entre Agenda e Servidor
     * Aqui é dito o grau de relacionamento 
     * belongsTo = pertence. Uma AGENDA (horário, agendamento...) pertence a um Servidor
     * Relação de 1 : 1
     * @return void
     */
    public function servidor()
    {
        return $this->belongsTo(Servidor::class, 'servidor_id');
    }
    
    /**
     * define a forma como um determinado atributo vai ser retornado ao ser consultado
     *
     * @return void
     */
    public function getDataAttribute()
    {
        return date('d/m', strtotime($this->attributes['data']));
    }
    
    /**
     * define a forma como um determinado atributo vai ser retornado ao ser consultado
     *
     * @return void
     */
    public function getHorarioAttribute()
    {
        return date('H:i', strtotime($this->attributes['horario']));
    }
}
