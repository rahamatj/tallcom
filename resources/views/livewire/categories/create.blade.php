<?php

use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;
use Masmerise\Toaster\Toastable;

new class extends Component {
    use WithFileUploads, Toastable;

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

        Toaster::success('Category created!');
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
                        <label for="name" class="form-label">Category Name</label>
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
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                    <span wire:loading wire:target="create" class="text-blue-600 mt-2">
                        Saving... ⏳
                    </span>
                </div>
                <!--end::Footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
