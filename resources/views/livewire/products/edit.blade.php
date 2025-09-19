<?php

use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;
use Masmerise\Toaster\Toastable;

new class extends Component {
    use WithFileUploads, Toastable;

    public $product;
    public $category_id;
    public $name;
    public $image;
    public $price;
    public $description;

    public function mount(\App\Models\Product $product)
    {
//        dd($product);

        $this->product = $product;
        $this->category_id = $product->category_id;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->description = $product->description;
    }

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
            'image' => 'nullable|image|max:1024', // 1MB Max
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
        ]);

        $path = $this->product->image;

        if ($this->image) {
            // Delete old image if exists
            if ($this->product->image && Storage::disk('public')->exists($this->product->image)) {
                Storage::disk('public')->delete($this->product->image);
            }

            // Store new image
            $path = $this->image->store('products', 'public');
            $this->product->image = $path;
        }

        // Create the category
        $this->product->update([
            'category_id' => $this->category_id,
            'name' => $this->name,
            'image' => $path,
            'price' => $this->price,
            'description' => $this->description,
        ]);

        // Reset form fields
        $this->reset();

        Toaster::success('Product updated!');
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
                        <select wire:model="category_id" name="category_id" class="form-select" id="validationCustom04"
                                required>
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
                                quill.root.innerHTML = @js($description);
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
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                        <span wire:loading wire:target="update" class="text-blue-600 mt-2">
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
