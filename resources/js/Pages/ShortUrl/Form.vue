<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    slug: '',
    destination_url: '',
    terms: false,
});

const submit = () => {
    form.post(route('short_url.store'), {
        onFinish: () => form.reset('slug', 'destination_url'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="slug" value="Slug" />
                <TextInput id="slug" type="text" class="mt-1 block w-full" v-model="form.slug" required autofocus autocomplete="slug" />
                <InputError class="mt-2" :message="form.errors.slug" />
            </div>

            <div class="mt-4">
                <InputLabel for="destination_url" value="Destination Url" />
                <TextInput id="destination_url" type="text" class="mt-1 block w-full" v-model="form.destination_url" required autocomplete="destination-url" />
                <InputError class="mt-2" :message="form.errors.destination_url" />
            </div>


            <div class="flex items-center justify-end mt-4">


                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                   Create new short url
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
