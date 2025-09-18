<div
    x-data="{ toasts: [] }"
    x-on:toast.window="
        toasts.push({ id: Date.now(), type: $event.detail.type ?? 'success', message: $event.detail.message });
        setTimeout(() => toasts.shift(), 3000);
    "
    class="fixed top-5 right-5 space-y-2 z-50"
>
    <template x-for="toast in toasts" :key="toast.id">
        <div
            x-text="toast.message"
            x-bind:class="{
                'bg-green-500': toast.type === 'success',
                'bg-red-500': toast.type === 'error',
                'bg-blue-500': toast.type === 'info',
                'bg-yellow-500': toast.type === 'warning',
            }"
            class="text-white px-4 py-2 rounded shadow"
            x-transition
        ></div>
    </template>
</div>
