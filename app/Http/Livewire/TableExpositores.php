<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\student;
use App\Models\User;

class TableExpositores extends Component
{
    public $expositores;
    public $pag = 0;
    public $inicio = 0;
    public $fin = 20;

    public function render()
    {
        $this->expositores = User::where('rol', 'expositor')
        ->join('students', 'users.key', '=', 'students.enrollment')
        ->skip($this->inicio)
        ->take(20)
        ->get();
        
        return view('livewire.table-expositores');
    }

    public function pagination($pagcont)
    {       
        if (is_numeric($pagcont)) {
            if (strpos($pagcont, '.') !== false) {
                $pagcont = intval($pagcont);
            }
            if($pagcont < 0)
            { 
                
            }
            else
            {
                if($pagcont-1 >= 0)
                {
                    $this->emit('unlock-btn');
                }
                $this->inicio = $pagcont * 20;
                $this->fin = $pagcont * 20 + 20;
                    if(count($this->expositores) < 20)
                    {
                        $this->emit('lock-btn');
                    }                                  
                $this->pag = $pagcont;
            }
        } else {
            echo error;
        }  
        
    }
}
