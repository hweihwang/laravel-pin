<template>
    <div class="alert alert-success shadow-lg" v-if="state.isHandled && state.isMatch">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>Your PIN is correct! The expected PIN is {{ state.expected }}</span>
        </div>
    </div>
    <div class="alert alert-error shadow-lg" v-else-if="state.isHandled && !state.isMatch">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>Your PIN is incorrect! You entered {{ state.entered }} but the expected PIN is {{
                    state.expected
                }}</span>
        </div>
    </div>
    <PinInput
        :length="length"
        :isSecret="isSecret"
        :disabled="disabled"
        :readonly="readonly"
        :defaultValue="defaultValue"
        :regex="new RegExp(regex)"
        @filled="handleFilled"
    />
</template>

<script setup>
import PinInput from '@/Modules/PIN/Components/Pin.vue'
import axios from "axios"
import {reactive} from "vue";

const state = reactive({
    isHandled: false,
    isMatch: false,
    entered: "",
    expected: "",
});


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
        type: String,
        default: '[0-9]',
    },
    modelDuration: {
        type: Number,
        default: 1500,
    },
});

const handleFilled = async (pinValue) => {
    const {data: {isMatch, entered, expected}} = await axios.post('/verify', {
        pin: pinValue,
    })

    state.isHandled = true
    state.isMatch = isMatch
    state.entered = entered
    state.expected = expected

    setTimeout(() => {
        state.isHandled = false
    }, props.modelDuration)
}
</script>
