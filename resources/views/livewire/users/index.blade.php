<?php

use App\Models\User;
use App\Models\Role;
use Livewire\Volt\Component;
use Mary\Traits\Toast;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator; 
use Livewire\WithPagination; 
use App\Models\Country;  

new class extends Component {
    use Toast, WithPagination; 

    public string $search = '';
    public bool $roleDrawer = false;
    public bool $drawer = false;
    public int $country_id = 0; 
    public array $selected_roles = [];
    public int $user_id = 0;
    public array $sortBy = ['column' => 'name', 'direction' => 'asc'];

    public function mount(): void
    {
        if (!Gate::allows('admins')) {
            $this->error('You are not authorized to access this page.', position: 'toast-bottom');
            redirect()->route('dashboard');
        }
    }

    public function updated($property): void
    {
        if (!is_array($property) && $property != "") {
            $this->resetPage();
        }
    }

    public function clear(): void
    {
        $this->reset();
        $this->resetPage(); 
        $this->success('Filters cleared.', position: 'toast-bottom');
    }

    public function showRoleForm($user_id): void
    {
        $this->user_id = $user_id;
        $user = User::findOrFail($user_id);

        // بررسی دسترسی برای تغییر نقش‌ها
        $this->authorize('updateRoles', $user);

        $this->selected_roles = $user->roles->pluck('id')->toArray();
        $this->roleDrawer = true;
    }

    public function saveRoles(): void
    {
        $user = User::findOrFail($this->user_id);

        try {
            $this->authorize('updateRoles', $user);

            // جلوگیری از اینکه admin نقش admin بده
            if (auth()->user()->hasRole('admin')) {
                $this->selected_roles = array_filter($this->selected_roles, function ($roleId) {
                    $role = Role::find($roleId);
                    return $role && $role->name !== 'admin';
                });
            }

            $user->roles()->sync($this->selected_roles);

            $this->success('Roles updated.', position: 'toast-bottom');
            $this->roleDrawer = false;
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            $this->error('You are not authorized to update roles for this user.', position: 'toast-bottom');
        }
    }

    public function delete(User $user): void
    {
        try {
            $this->authorize('delete', $user);

            $user->delete();
            $this->warning("$user->name deleted", 'Good bye!', position: 'toast-bottom');
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            $this->error('You are not authorized to delete this user.', position: 'toast-bottom');
        }
    }

    public function headers(): array
    {
        return [
            ['key' => 'avatar', 'label' => '', 'class' => 'w-1'], 
            ['key' => 'id', 'label' => '#', 'class' => 'w-1'],
            ['key' => 'name', 'label' => 'Name', 'class' => 'w-64'],
            ['key' => 'country_name', 'label' => 'Country', 'class' => 'hidden lg:table-cell'], 
            ['key' => 'email', 'label' => 'E-mail', 'sortable' => false],
            ['key' => 'roles', 'label' => 'Roles', 'class' => 'hidden lg:table-cell'],
        ];
    }

    public function users(): LengthAwarePaginator 
    {
        return User::query()
            ->withAggregate('country', 'name') 
            ->with('roles')
            ->when($this->search, fn(Builder $q) => $q->where('name', 'like', "%$this->search%"))
            ->when($this->country_id, fn(Builder $q) => $q->where('country_id', $this->country_id)) 
            ->orderBy(...array_values($this->sortBy))
            ->paginate(5);
    }

    public function with(): array
    {
        return [
            'users' => $this->users(),
            'headers' => $this->headers(),
            'countries' => Country::all(), 
            'roles' => Role::query()
                ->when(auth()->user()->hasRole('admin'), fn($q) => $q->whereNotIn('name', ['super_admin', 'admin']))
                ->when(auth()->user()->hasRole('super_admin'), fn($q) => $q->where('name', '!=', 'super_admin'))
                ->get(),
        ];
    }
};
?>

<div>
    <x-header title="لیست کاربران" separator progress-indicator>
        <x-slot:middle class="!justify-end">
            <x-input placeholder="Search..." wire:model.live.debounce="search" clearable icon="o-magnifying-glass" />
        </x-slot:middle>
        <x-slot:actions>
            <x-button label="Filters" @click="$wire.drawer = true" responsive icon="o-funnel" />
            <x-button label="Create" link="/users/create" responsive icon="o-plus" class="btn-primary" />   
        </x-slot:actions>
    </x-header>

    <x-card shadow>
       <x-table :headers="$headers" :rows="$users" :sort-by="$sortBy" with-pagination>
            @scope('cell_avatar', $user)                                                    
                <x-avatar image="{{ $user->avatar ?? '/empty-user.jpg' }}" class="!w-10" />
            @endscope
            @scope('cell_roles', $user)
                <div class="flex gap-2">
                    @foreach ($user->roles as $role)
                        <x-badge :value="$role->name" class="badge-primary badge-soft" />
                    @endforeach
                </div>
            @endscope
            @scope('actions', $user)
                @can('update', $user)
                    <x-button icon="o-pencil" link="users/{{ $user->id }}/edit?name={{ $user->name }}" class="btn-ghost btn-sm" />
                @endcan

                @can('updateRoles', $user)
                    <x-button icon="o-user" wire:click="showRoleForm({{ $user->id }})" class="btn-ghost btn-sm" />
                @endcan

                @can('delete', $user)
                    <x-button 
                        icon="o-trash" 
                        wire:click="delete({{ $user['id'] }})" 
                        wire:confirm="Are you sure?" 
                        spinner 
                        class="btn-ghost btn-sm text-error" 
                    />
                @endcan
            @endscope
        </x-table>
    </x-card>

    <x-drawer wire:model="drawer" title="Filters" right separator with-close-button class="lg:w-1/3">
        <x-input placeholder="Search..." wire:model.live.debounce="search" icon="o-magnifying-glass" @keydown.enter="$wire.drawer = false" />
        <x-select placeholder="Country" wire:model.live="country_id" :options="$countries" icon="o-flag" placeholder-value="0" /> 

        <x-slot:actions>
            <x-button label="Reset" icon="o-x-mark" wire:click="clear" spinner />
            <x-button label="Done" icon="o-check" class="btn-primary" @click="$wire.drawer = false" />
        </x-slot:actions>
    </x-drawer>

    <x-drawer wire:model="roleDrawer" title="Assign Roles" right separator with-close-button class="lg:w-1/3">
        <x-choices
            label="Roles"
            wire:model="selected_roles"
            :options="$roles"
            option-value="id"
            option-label="name"
            icon="o-user"
            hint="Select roles for the user"
            multiple
        />
        <x-slot:actions>
            <x-button label="Cancel" @click="$wire.roleDrawer = false" />
            <x-button label="Save" wire:click="saveRoles" class="btn-primary" spinner />
        </x-slot:actions>
    </x-drawer>
</div>
