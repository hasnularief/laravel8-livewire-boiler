<?php

namespace App\Http\Livewire;

use App\Models\Page;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class Pages extends Component
{
    use WithPagination;
    
    public $modalFormVisible = false;
    public $modelId;
    public $slug;
    public $title;
    public $content;

    public function updatedTitle($value)
    {
        $this->slug = Str::slug($value, '-');
    }

    public function mount()
    {
        $this->resetPage();
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'slug' => ['required', Rule::unique('pages', 'slug')],
            'content' => 'required'
        ];
    }

    public function create() 
    {
        $this->validate();
        Page::create($this->modelData());
        $this->modalFormVisible = false;
        $this->resetVars();
    }

    public function modelData()
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content
        ];
    }

    public function read()
    {
        return Page::paginate(5);
    }

    public function resetVars()
    {
        $this->modelId = null;
        $this->title = null;
        $this->slug = null;
        $this->content = null;
    }

    public function createShowModal()
    {
        $this->resetValidation();
        $this->resetVars();
        $this->modalFormVisible = true;
    }

    public function updateShowModal($id)
    {
        $this->modelId = $id;
        $this->resetValidation();
        $this->resetVars();
        $this->modalFormVisible = true;
        $this->loadModel();
    }

    public function loadModel()
    {
        $data = Page::find($this->modelId);
        $this->title = $data->title;
        $this->slug = $data->slug;
        $this->content = $data->content;
    }

    public function update()
    {
        $this->validate();
        Page::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
    }

    public function render()
    {
        return view('livewire.pages', [
            'data' => $this->read()
        ]);
    }
}
