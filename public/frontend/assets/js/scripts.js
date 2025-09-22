const { createApp, ref, computed } = Vue;

createApp({
    setup() {
        const message = ref('Hello Vue 3!');

        onMounted(() => {
            console.log('Component is mounted!');
            message.value = 'Mounted!';
        });

        return { message };
    }
}).mount('#products');
