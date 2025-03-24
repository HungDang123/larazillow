<script setup>
import { Link, useForm, usePage } from "@inertiajs/vue3";
const form = useForm({
    email: "",
    password: "",
});
const login = () => form.post(route("login"));
</script>

<template>
    <form @submit.prevent="login" method="POST">
        <div class="w-1/2 mx-auto">
            <div class="mb-4">
                <label for="email" class="label">Email (Username)</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    class="input mb-1"
                    value=""
                    v-model="form.email"
                />
                <div class="input-error" v-if="form.errors.email">
                    {{ form.errors.email }}
                </div>
            </div>
            <div class="mb-4">
                <label for="password" class="label">Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="input mb-1"
                    value=""
                    v-model="form.password"
                />
            </div>
            <div class="input-error" v-if="form.errors.password">
                    {{ form.errors.password }}
                </div>
            <div class="mb-4">
                <button type="submit" class="btn btn-primary w-full">Login</button>
                <div class="mt-2 text-center">
                    <Link :href="route('register-form')" class="text-sm text-indigo-500">Need an account? Click here</Link>
                </div>
            </div>
        </div>
    </form>
</template>
<script scope=""></script>
