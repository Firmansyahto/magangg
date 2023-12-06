<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;

use Livewire\WithFileUploads;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Event;

class UserProfile extends Component
{
    use WithFileUploads;
    public $slug;
    public $profile; 
    public $name;
    public $editing;

    // Fungsi untuk memperbarui nama pengguna
    public function updateName()
    {
      try {
        $this->validate([
          'name' => 'required|min:2',
        ]);

        $user = User::where('slug', $this->slug)->first();

        $user->update([
          'name' => $this->name,
        ]);

        $this->editing = false;

        session()->flash('name_message', 'Name updated successfully.');
      } catch (\Exception $e) {
        session()->flash('name_message', 'There was an error updating the name: ' . $e->getMessage());
      }
    }

  public function ToggleEditing()
  {
    if($this->editing == false) {
      $this->editing = true;
    } else {
      $this->editing = false;
    }
  }
    

  // Fungsi ini dipanggil saat komponen ini dipasang
  public function mount($slug)
  {
    $this->slug = $slug;
    $this->name = User::where('slug', $this->slug)->first()->name;
  }

    // Fungsi ini dipanggil saat properti 'profile' diperbarui
  public function updatedProfile()
  {
    try {
      $this->validate([
        'profile' => 'image|max:1024', // 520kb Max
      ]);

      $user = User::where('slug', $this->slug)->first();

      $path = 'foto/staf';
      
      $imageName = preg_replace("/[^a-z0-9\_\-\.]/i", '', $this->profile->getClientOriginalName());
      // $imageName = 'foto_' . $user->slug . '.' . $this->profile->extension();
      Storage::putFileAs(
        'public/'.$path, $this->profile, $imageName
      );

      
      $user->update([
        'path' => $path,
        'foto' => $imageName
      ]);
      
      session()->flash('image_message', 'Profile picture updated successfully.');

    } catch (\Exception $e) {
      // Handle the error
      session()->flash('image_message', 'There was an error uploading the file: ' . $e->getMessage());
    }
  }


  // Fungsi untuk merender view
  public function render()
  {
    $user = User::where('slug', $this->slug)->first();
    return view('livewire.user.user-profile', compact('user'))->layout('layouts.app');
  }
}
