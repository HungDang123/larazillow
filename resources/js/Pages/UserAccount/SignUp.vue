<script setup>
import { useForm, usePage } from "@inertiajs/vue3";
const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});
const register = () => form.post(route("register"));
</script>

<template>
    <form @submit.prevent="register" method="POST">
        <div class="w-1/2 mx-auto">
            <div class="mb-4">
                <label for="name" class="label">Name</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="input mb-1"
                    value=""
                    v-model="form.name"
                />
                <div class="input-error" v-if="form.errors.name">
                    {{ form.errors.name }}
                </div>
            </div>
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
                <div class="input-error" v-if="form.errors.password">
                    {{ form.errors.password }}
                </div>
            </div>
            <div class="mb-4">
                <label for="password-comfirmation" class="label"
                    >Password Confirmation</label
                >
                <input
                    type="password"
                    name="password-comfirmation"
                    id="password-comfirmation"
                    class="input mb-1"
                    value=""
                    v-model="form.password_confirmation"
                />
            </div>
            <div class="mb-4">
                <button type="submit" class="btn btn-primary w-full">
                    Register
                </button>
            </div>
        </div>
    </form>
</template>
<script scope=""></script>
