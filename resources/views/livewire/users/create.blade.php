<?php

use Livewire\Volt\Component;
use App\Models\User;
use App\Models\Country;
use App\Models\Language;
use Mary\Traits\Toast;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Hash;

new class extends Component {
    use Toast, WithFileUploads;

    #[Rule('required')]
    public string $name = '';

    #[Rule('required|email|unique:users')]
    public string $email = '';

    #[Rule('required|min:6')]
    public string $password = '';

    #[Rule('nullable|image|max:1024')]
    public $photo;

    public ?int $country_id = null;
    public array $my_languages = [];
    public ?string $bio = null;

    public function with(): array
    {
        return [
            'countries' => Country::all(),
            'languages' => Language::all(),
        ];
    }

    public function save()
    {
        $data = $this->validate();
        $data['password'] = Hash::make($this->password);
        $data['avatar'] = $this->photo
            ? "/storage/" . $this->photo->store('users', 'public')
            : '/empty-user.jpg';

        $user = User::create($data);
        $user->languages()->sync($this->my_languages);

        $this->success('User created successfully.', redirectTo: '/users');
    }
};
?>

<div>
    <x-header title="Create User" separator />

    <x-form wire:submit="save">
        <x-file label="Avatar" wire:model="photo" accept="image/png, image/jpeg" />
        <x-input label="Name" wire:model="name" />
        <x-input label="Email" wire:model="email" />
        <x-input label="Password" type="password" wire:model="password" />
        <x-select label="Country" wire:model="country_id" :options="$countries" placeholder="---" />
        <x-choices-offline label="Languages" wire:model="my_languages" :options="$languages" searchable />
        <x-editor wire:model="bio" label="Biography" />

        <x-slot:actions>
            <x-button type="submit" label="Cancel" link="/users" />
            <x-button type="submit" label="Save" icon="o-paper-airplane" class="btn-primary" spinner />
        </x-slot:actions>
    </x-form>
</div>
