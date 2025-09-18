<?php

use Livewire\Volt\Component;
use Livewire\WithFileUploads;

new class extends Component {
    use WithFileUploads;

    public $name;
    public $image;

    public function create() {
        $this->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|max:1024', // 1MB Max
        ]);

        // Handle file upload if image is provided
        if ($this->image) {
            $imagePath = $this->image->store('categories', 'public');
        } else {
            $imagePath = null;
        }

        // Create the category
        \App\Models\Category::create([
            'name' => $this->name,
            'image' => $imagePath,
        ]);

        // Reset form fields
        $this->reset(['name', 'image']);

        // Optionally, you can emit an event or redirect
        session()->flash('success', 'Category created successfully.');
    }
}; ?>

<div>
    <div class="mt-5">
        <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header"><div class="card-title">Create Category</div></div>
            <!--end::Header-->
            <!--begin::Form-->
            <form method="POST" enctype="multipart/form-data" wire:submit.prevent="create">
                <!--begin::Body-->
                <div class="card-body">
                    <div>
                        <label for="name" class="form-label">Create Category</label>
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            wire:model="name"
                            name="name"
                        />
                    </div>

                    <div class="mb-3">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-group">
                        <input name="image" type="file" class="form-control" id="image" alt="category image" wire:model="image" />
                        <label class="input-group-text" for="image">Upload Image</label>
                    </div>

                    <div class="mb-3">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!--end::Body-->
                <!--begin::Footer-->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <!--end::Footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
