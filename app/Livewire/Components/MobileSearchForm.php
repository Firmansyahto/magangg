<?php

namespace App\Livewire\Components;

use Livewire\Component;

class MobileSearchForm extends Component
{
  public $search;

  public function render()
  {
    return view('livewire.components.mobile-search-form');
  }

  function searchNow()
  {
    if(empty($this->search)) {
      return redirect()->route('home');
    }
    return redirect()->route('search-result', ['keyword' => $this->search]);
  }
}
