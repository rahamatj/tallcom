<?php

use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;
use Masmerise\Toaster\Toastable;

new class extends Component {
    use WithFileUploads, Toastable;

    public $category_id;
    public $name;
    public $image;
    public $price;
    public $description;
    public $is_trending;
    public $you_may_like;

    public function with()
    {
        return [
            'categories' => \App\Models\Category::all(),
        ];
    }

    public function update()
    {
        $this->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'image' => 'required|image|max:1024', // 1MB Max
            'price' => 'required|numeric|min:0',
            'description' => [
                'required',
                function ($attribute, $value, $fail) {
                    // Remove tags & whitespace
                    $text = trim(strip_tags($value));
                    if (empty($text)) {
                        $fail('The description field is required.');
                    }
                },
            ],
            'is_trending' => 'boolean',
            'you_may_like' => 'boolean',
        ]);

        // Handle file upload if image is provided
        if ($this->image) {
            $imagePath = $this->image->store('products', 'public');
        } else {
            $imagePath = null;
        }

        // Create the category
        \App\Models\Product::create([
            'category_id' => $this->category_id,
            'name' => $this->name,
            'image' => $imagePath,
            'price' => $this->price,
            'description' => $this->description,
            'is_trending' => $this->is_trending,
            'you_may_like' => $this->you_may_like,
        ]);

        // Reset form fields
        $this->reset();

        Toaster::success('Product created!');
    }
}; ?>

<div>
    <div class="mt-5">
        <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <div class="card-title">Create Product</div>
            </div>
            <!--end::Header-->
            <!--begin::Form-->
            <form method="POST" enctype="multipart/form-data" wire:submit.prevent="update">
                <!--begin::Body-->
                <div class="card-body">
                    <div>
                        <label for="validationCustom04" class="form-label">Category</label>
                        <select wire:model="category_id" name="category_id" class="form-select" id="validationCustom04" required>
                            <option selected disabled value="">Choose...</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        @error('$category_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="name" class="form-label">Product Name</label>
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
                        <input name="image" type="file" class="form-control" id="image" alt="category image"
                               wire:model="image"/>
                        <label class="input-group-text" for="image">Upload Image</label>
                    </div>

                    <div class="mb-3">
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="price" class="form-label">Price</label>
                        <input
                            type="number"
                            class="form-control"
                            id="price"
                            wire:model="price"
                            name="price"
                            step="0.01"
                            min="0"
                        />
                    </div>

                    <div class="mb-3">
                        @error('price')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div wire:ignore>
                        <div
                            x-data
                            x-init="
                                const quill = new Quill($refs.editor, { theme: 'snow' });
                                quill.on('text-change', () => {
                                    @this.set('description', quill.root.innerHTML);
                                });
                            "
                            x-ref="editor"
                            style="min-height:200px;"
                        ></div>
                    </div>

                    <div class="mb-3">
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_trending" name="is_trending" wire:model="is_trending" />
                        <label class="form-check-label" for="is_trending">
                            Is Trending?
                        </label>
                    </div>

                    <div class="mb-3">
                        @error('is_trending')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="you_may_like" name="you_may_like" wire:model="you_may_like" />
                        <label class="form-check-label" for="you_may_like">
                            You May Like?
                        </label>
                    </div>

                    <div class="mb-3">
                        @error('you_may_like')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
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
                </div>
                    <!--end::Footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
