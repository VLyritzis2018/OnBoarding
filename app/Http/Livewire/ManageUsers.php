<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;

class ManageUsers extends Component
{
    public string $name = '';
    public string $email = '';
    public $userId;
    public $updateMode = false;

    protected $rules = [
        'name' => 'required|min:6|max:255',
        'email' => 'required|email',
    ];
    protected $listeners = ['destroy'];
    public function updated($propertyName)
    {
        $this->validateOnly(
            $propertyName,
            [
                'name' => ['required'],
                'email' => ['required', 'email'],
            ],
        );
    }

    public function store()
    {
        $this->validate();

        try {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ]);
            $this->dispatchBrowserEvent('store', [
                'type' => 'success',
                'title' => 'Data Saved.',
                'icon' => 'success',
                'iconColor' => 'green',
            ]);
            session()->flash('success');
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('error', [
                'title' => 'Something Went Wrong.',
                'icon' => 'error',
                'iconColor' => 'red',
            ]);
        }
    }
    public function resetFields()
    {
        $this->name = '';
        $this->email = '';
    }
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetFields();
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->updateMode = true;
    }
    public function update()
    {
        $this->validate();
        try {
            User::find($this->userId)->fill([
                'name' => $this->name,
                'email' => $this->email,

            ])->save();
            $this->dispatchBrowserEvent('update', [
                'type' => 'success',
                'title' => 'Data Updated.',
                'icon' => 'success',
                'iconColor' => 'green',
            ]);
            $this->cancel();
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('error', [
                'title' => 'Something Went Wrong.',
                'icon' => 'error',
                'iconColor' => 'red',
            ]);
            $this->cancel();
        }
    }
    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('delete', [
            'title' => 'Are you sure?',
            'text' => "You won't be able to revert this!",
            'icon' => 'warning',
            'id' => $id,
        ]);
    }
    public function destroy($id)
    {
        User::find($id)->delete();
        $this->dispatchBrowserEvent('deleted', [
            'type' => 'success',
            'title' => 'Record Deleted.',
            'icon' => 'success',
            'iconColor' => 'green',
        ]);
    }
    public function render()
    {
        return view('livewire.manage-users', [
            'users' => User::select(['id', 'name', 'email'])->paginate(10),
        ]);
    }
}
