<?php

use Livewire\Volt\Component;

new class extends Component {

    public $category;

    public function delete() {
        $this->category->delete();

        return redirect()->route('admin.categories.all');
    }

    public function mount(\App\Models\Category $category) {
        $this->category = $category;
    }
}; ?>

<div>
    <form method="POST" wire:submit.prevent="delete">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
</div>
