<?php

use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toastable;

new class extends Component {
    use WithFileUploads, Toastable;

    public $category;
    public $name;
    public $image;
    public $is_featured;

    public function mount(\App\Models\Category $category) {
        $this->category = $category;
        $this->name = $category->name;
        $this->image = null; // Image will be uploaded if user selects a new one
        $this->is_featured = (bool) $category->is_featured;
    }

    public function update() {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:1024', // 1MB Max
            'is_featured' => 'boolean',
        ]);

        $path = $this->category->image;

        if ($this->image) {
            // Delete old image if exists
            if ($this->category->image && Storage::disk('public')->exists($this->category->image)) {
                Storage::disk('public')->delete($this->category->image);
            }

            // Store new image
            $path = $this->image->store('categories', 'public');
        }

        // Create the category
        $this->category->update([
            'name' => $this->name,
            'image' => $path,
            'is_featured' => $this->is_featured,
        ]);

        // Optionally, you can emit an event or redirect
        Toaster::success('Category updated!');
    }
}; ?>

<div>
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-2 rounded">
            <ul class="list-disc pl-4">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="mt-5">
        <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header"><div class="card-title">Edit Category</div></div>
            <!--end::Header-->
            <!--begin::Form-->
            <form method="POST" enctype="multipart/form-data" wire:submit.prevent="update">
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

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" wire:model="is_featured" />
                        <label class="form-check-label" for="is_featured">
                            Is featured?
                        </label>
                    </div>

                    <div class="mb-3">
                        @error('is_featured')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <!--end::Body-->
                <!--begin::Footer-->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <span wire:loading wire:target="update" class="text-blue-600 mt-2">
                        Updating... ⏳
                    </span>
                </div>
                <!--end::Footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
