<script setup>
import { useRoute } from 'vue-router';
import addButton from '@/components/User/addButton.vue'; // Import the addButton component
import defaultErrorImage from '@/assets/userI/Goodies-Error1.png';
import ErrorImage from '@/assets/userI/Error2.png';
import topbar from '@/components/User/topbar.vue';

const route = useRoute();
const errorCode = route.params.errorCode || "500";

const errorMessages = {
    500: { // default => registration code error
        title: 'Opps! Something went wrong.',
        image: defaultErrorImage,
        action_text: 'Tap the screen to try again.',
        Link: '/user/login',
    },
    415: { // profile logout code error
        title: 'Opps! Something went wrong.',
        image: defaultErrorImage,
        action_text: 'Tap the screen to try again.',
        Link: '/user/profile',
    },
    413: {
        title: "You don't have any record",
        image: ErrorImage,
        action_text: 'Click on the plus button to add.',
        Link: '/user/home',
        topBarTitle : "Vaccination records",
    },
};

const errorDetails = errorMessages[errorCode];
</script>

<template>
    <div>
        <topbar :move="false" :title="errorDetails.topBarTitle ? errorDetails.topBarTitle : ''" :back-to="errorDetails.Link ? errorDetails.Link : ''" />
        <router-link 
            :to="errorDetails.Link"
            class="flex flex-wrap items-center justify-between h-svh p-6 box-border bg-white"   
        >
            <div class="w-full max-w-md mx-auto mb-8">
                <img 
                    :src="errorDetails.image"
                    alt="error image"
                    class="w-full h-auto object-contain"
                />
                <div class="flex flex-col items-center justify-center text-center">
                    <h3 class="text-[#432C81] text-lg font-semibold">{{ errorDetails.title }}</h3>
                    <p class="text-[#82799D] text-sm">{{ errorDetails.action_text }}</p>
                </div>
            </div>
        </router-link>
        <addButton v-if="errorDetails.Link == ''" :addSomething="() => console.log('Add something')" />
    </div>
</template>