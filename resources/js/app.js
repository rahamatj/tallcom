import './bootstrap';
import '../../vendor/masmerise/livewire-toaster/resources/js';

import { ref, computed } from 'vue';

export default {
    name: 'Counter',
    setup() {
        // Reactive state
        const count = ref(0);

        // Methods
        const increment = () => {
            count.value++;
        };

        const decrement = () => {
            count.value--;
        };

        // Computed property
        const double = computed(() => count.value * 2);

        return {
            count,
            increment,
            decrement,
            double
        };
    }
};
