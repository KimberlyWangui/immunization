<script setup>
import Input from '@/components/Input.vue'
import GreenButton from '@/components/GreenButton.vue'
import { reactive } from 'vue'
import { useAuthStore } from '@/stores/auth';
import Error from '@/components/Error.vue';
import { storeToRefs } from 'pinia';

const { errors } = storeToRefs(useAuthStore())
const { authenticate } = useAuthStore()

const formData = reactive({
    name: '',
    email: '',
    password: '',
    confirm_password: '',
})

</script>

<template>
    <main>
        <div class="flex h-screen my-25 justify-center items-center">
            <div class="flex mx-12 flex-col gap-5 border border-slate-200 rounded-sm p-5 md:flex-row">
                <div class="w-70 md:w-100">
                    <img src="@/assets/images/logo.png" alt="">
                </div>
                <div class="flex flex-col justify-center">
                    <div class="mb-2 flex justify-center bg-black-100 text-xl font-bold md:text-4xl md:mb-5">Sign up
                    </div>
                    <form @submit.prevent="authenticate('register', formData)">
                        <Input v-model="formData.name" type="name" label="Name" name="name"
                            placeholder="Enter your name" />
                        <Error v-if="errors.name">{{ errors.name[0] }}</Error>
                        <Input v-model="formData.email" type="email" label="Email Address" name="email"
                            placeholder="Enter your email" />
                        <Error v-if="errors.email">{{ errors.email[0] }}</Error>
                        <Input v-model="formData.password" type="password" label="Password" name="password"
                            placeholder="Enter your password" />
                        <Error v-if="errors.password">{{ errors.password[0] }}</Error>
                        <Input v-model="formData.confirm_password" type="password" label="Confirm Password"
                            name="confirm_password" placeholder="Confirm your password" />
                        <div class="flex justify-center">
                            <GreenButton name="Sign Up" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</template>
