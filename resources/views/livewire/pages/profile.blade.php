<?php

use Livewire\Volt\Component;
use Mary\Traits\Toast;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;

new 
#[Layout('components.layouts.empty')]
class extends Component {
    use Toast, WithFileUploads;

    #[Rule('required|email')]
    public string $email = '';
   
    #[Rule('required')]
    public string $name = '';

    public ?string $password = null;
    public $photo;
    public ?string $bio = null;

    public function mount()
    {
        $user = auth()->user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->bio = $user->bio;
    }

    public function save()
    {
        $data = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'bio' => 'nullable',
        ]);

        if ($this->password) {
            $data['password'] = Hash::make($this->password);
        }

        if ($this->photo) {
            $data['avatar'] = "/storage/" . $this->photo->store('users', 'public');
        }

        auth()->user()->update($data);
        $this->success('user profile updated successfully.');
        redirect()->route('home');
    }
};


?>

<div>
<div class="mb-10">
        <x-app-brand />
    </div>
    <x-header title="My Profile" separator />

    <x-form wire:submit="save">
        <x-file label="Avatar" wire:model="photo" accept="image/png, image/jpeg" />
        <x-input label="Name" wire:model="name" />
        <x-input label="Email" wire:model="email" />
        <x-input label="New Password" type="password" wire:model="password" />
        <x-editor wire:model="bio" label="Biography" />

        <x-slot:actions>
            <x-button type="submit" label="Save" icon="o-paper-airplane" class="btn-primary" spinner />
        </x-slot:actions>
    </x-form>
</div>
