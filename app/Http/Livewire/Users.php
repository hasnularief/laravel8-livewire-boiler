<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $confirmDeleteId = null;    
    public $showForm = false;
    public $form = ['id', 'name', 'email', 'password', 'password_confirmation'];
    public $model = null;

    public function mount()
    {
        $form = [];
        foreach($this->form as $obj)
        {
            $form[$obj] = null;
        }
        $this->form = $form;
    }

    public function rules()
    {
        return [
            'form.name' => 'required',
            'form.email' => 'required|unique:users,email,' . $this->form['id'],
            'form.password' => 'required',
            'form.password_confirmation' => 'required'
        ];
    }

    public function confirmDelete($id)
    {
        $this->confirmDeleteId = $id;
    }

    public function form($id = null)
    {
        $this->model = $id ? User::find($id) : new User();
        if($this->model) {
            foreach($this->form as $key => $value)
            {
                $this->form[$key] = $this->model->{$key};
            }
            $this->form['password'] = null;
        }
        $this->resetValidation();
        $this->showForm = true;
    }

    public function deleteData()
    {
        User::where('id', $this->confirmDeleteId)->delete();
        $this->confirmDeleteId = null;
    }

    public function writeData()
    {
        $this->validate();
        $this->model->name = $this->form['name'];
        $this->model->email = $this->form['email'];
        $this->model->password = bcrypt($this->form['password']);
        $this->model->save();
        $this->showForm = null;        
    }

    public function render()
    {
        $data = User::paginate(10);
        return view('livewire.users', compact('data'));
    }
}
