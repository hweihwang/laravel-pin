<template>
    <div class="flex flex-row items-center justify-center h-screen font-mono">
        <div class="flex flex-col items-center justify-center space-y-4">
            <p class="text-3xl font-semibold mb-4">Enter PIN</p>
            <div class="flex flex-row items-center justify-center space-x-4">
                <input
                    v-for="(digit, index) in digits"
                    :key="index"
                    :ref="inputRef(index)"
                    :value="digit"
                    :type="isSecret ? 'password' : 'text'"
                    :maxlength="1"
                    :disabled="disabled"
                    :readonly="readonly"
                    @input="handleInput(index, $event)"
                    @keydown="handleKeyDown(index, $event)"
                    class="w-12 h-12 text-center rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                />
            </div>
        </div>
    </div>
</template>

<script setup>
import {computed, onMounted, shallowRef} from 'vue'

const props = defineProps({
    length: {
        type: Number,
        default: 4,
    },
    isSecret: {
        type: Boolean,
        default: true,
    },
    disabled: {
        type: Boolean,
        default: false,
    },
    readonly: {
        type: Boolean,
        default: false,
    },
    defaultValue: {
        type: String,
        default: '',
    },
    regex: {
        type: RegExp,
        default: /[0-9]/,
    },
})

const values = shallowRef(Array(props.length).fill(props.defaultValue))
const currentIndex = shallowRef(0)
const inputRefs = shallowRef(Array(props.length).fill(null))

const inputRef = (index) => {
    return (element) => {
        inputRefs.value[index] = element
    }
}

const focusInput = (index) => {
    const inputRef = inputRefs.value[index]
    if (inputRef) {
        inputRef.focus()
    }
    currentIndex.value = index
}

const isFilled = () => {
    return values.value.every((value) => value !== '')
}

const emit = defineEmits(['filled'])

const handleInput = (index, event) => {
    const value = event.target.value

    if (!props.regex.test(value)) {
        event.preventDefault()
        return
    }

    const newValues = [...values.value]
    newValues[index] = value
    values.value = newValues
    if (value !== '' && index < props.length - 1) {
        focusInput(index + 1)
    }
    if (isFilled()) {
        emit('filled', values.value.join(''))
    }
}

const handleKeyDown = (index, event) => {
    if (event.keyCode === 8 && values.value[index] !== '') {
        const newValues = [...values.value]
        newValues[index] = ''
        values.value = newValues
    }
}


const digits = computed({
    get() {
        return values.value
    },
    set(newDigits) {
        values.value = newDigits
    },
})

onMounted(() => {
    focusInput(0)
})
</script>
