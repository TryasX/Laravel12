<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use App\Models\InPatientList;

#[Layout('layouts.app')]
class InpatientTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $patients = InPatientList::select([
                'NoMR',
                'NamaPasien',
                'Ruang',
                'NamaDokter',
            ])
            ->when($this->search !== '', function ($q) {
                $q->where(function ($qq) {
                    $qq->where('NamaPasien', 'like', "%{$this->search}%")
                       ->orWhere('NoMR', 'like', "%{$this->search}%");
                });
            })
            ->orderBy('NamaPasien')
            ->simplePaginate(10);

        return view('livewire.inpatient-table', compact('patients'));
    }
}

