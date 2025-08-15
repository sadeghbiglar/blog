<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use Mary\Traits\Toast;
use Livewire\Attributes\Rule;
use App\Models\ContactMessage;

new
#[Layout('components.layouts.empty')]
class extends Component {
    use Toast;

    #[Rule('required')]
    public string $name = '';

    #[Rule('required|email')]
    public string $email = '';

    #[Rule('required')]
    public string $message = '';

    public function save()
    {
        ContactMessage::create([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);

        $this->reset();
        $this->success('Message sent successfully.');
    }
};
?>

<div>
    <div class="mb-10">
        <x-app-brand />
    </div>
    <x-header title="Contact Us" separator />

    <x-form wire:submit="save">
        <x-input label="Name" wire:model="name" />
        <x-input label="Email" wire:model="email" />
        <x-editor wire:model="message" label="Message" />

        <x-slot:actions>
    <x-button type="submit" label="Send" icon="o-paper-airplane" class="btn-primary" spinner />
        </x-slot:actions>
    </x-form>
</div>
