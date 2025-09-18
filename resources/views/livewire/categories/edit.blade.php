<?php

use Livewire\Volt\Component;
use Livewire\WithFileUploads;

new class extends Component {
    use WithFileUploads;

    public $category;
    public $name;
    public $image;

    public function mount(\App\Models\Category $category) {
        $this->category = $category;
        $this->name = $category->name;
    }

    public function update() {
        $this->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:1024', // 1MB Max
        ]);

        $path = $this->category->image;

        if ($this->image) {
            // Delete old image if exists
            if ($this->category->image && Storage::disk('public')->exists($this->category->image)) {
                Storage::disk('public')->delete($this->category->image);
            }

            // Store new image
            $path = $this->image->store('categories', 'public');
            $this->category->image = $path;
        }

        // Create the category
        $this->category->update([
            'name' => $this->name,
            'image' => $path,
        ]);

        // Reset form fields
        $this->reset(['name', 'image']);

        // Optionally, you can emit an event or redirect
        session()->flash('success', 'Category updated successfully.');
    }
}; ?>

<div>
    <div class="mt-5">
        <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header"><div class="card-title">Create Category</div></div>
            <!--end::Header-->
            <!--begin::Form-->
            <form method="POST" enctype="multipart/form-data" wire:submit.prevent="update">
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
