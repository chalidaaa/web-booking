<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserCrud extends Component
{
    use WithPagination;

    public $name, $email, $no_hp, $role, $password, $userId;
    public $isUpdate = false;

    protected $rules = [
        'name' => 'required|string|min:3',
        'email' => 'required|email|unique:users,email',
        'no_hp' => 'required|string|max:15',
        'role' => 'required|string',
        'password' => 'required|string|min:6',
    ];

    public function resetFields()
    {
        $this->name = '';
        $this->email = '';
        $this->no_hp = '';
        $this->role = '';
        $this->password = '';
        $this->userId = '';
        $this->isUpdate = false;
    }

    public function store()
    {
        $validatedData = $this->validate();
        $validatedData['password'] = bcrypt($this->password);

        User::create($validatedData);

        session()->flash('message', 'User created successfully.');

        $this->resetFields();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->no_hp = $user->no_hp;
        $this->role = $user->role;
        $this->isUpdate = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'no_hp' => 'required|string|max:15',
            'role' => 'required|string',
        ]);

        $user = User::find($this->userId);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'no_hp' => $this->no_hp,
            'role' => $this->role,
        ]);

        session()->flash('message', 'User updated successfully.');

        $this->resetFields();
    }

    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('message', 'User deleted successfully.');
    }

    public function render()
    {
        return view('livewire.user-crud', [
            'users' => User::paginate(5)
        ])->layout('layouts.app');;
    }
}

