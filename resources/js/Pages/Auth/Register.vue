<script setup>
import { Button } from "@/components/ui/button";
import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from "@/components/ui/card";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});

const errors = ref({});

const submit = () => {
    form.post('/register', {
        onError: (error) => {
            errors.value = error;
        },
    });
};
</script>

<template>
    <Head title="Register" />
    <Card class="mx-auto max-w-sm mt-20 mb-20">
        <CardHeader>
            <CardTitle class="text-2xl">Register</CardTitle>
            <CardDescription>
                Enter your email below to register to your account
            </CardDescription>
        </CardHeader>
        <CardContent>
            <form @submit.prevent="submit">
                <div class="grid gap-4">
                    <div class="grid gap-2">
                        <Label for="name">Full Name</Label>
                        <Input
                            id="name"
                            v-model="form.name"
                            :class="{ 'is-invalid': errors.name }"
                            type="text"
                            placeholder="John Doe"
                            required
                            autocomplete="off"
                            autofocus
                        />
                        <span v-if="errors.name" class="text-sm text-red-500">{{ errors.name }}</span>
                    </div>
                    <div class="grid gap-2">
                        <Label for="email">Email</Label>
                        <Input
                            id="email"
                            v-model="form.email"
                            :class="{ 'is-invalid': errors.email }"
                            type="email"
                            placeholder="m@example.com"
                            required
                            autocomplete="off"
                            autofocus
                        />
                        <span v-if="errors.email" class="text-sm text-red-500">{{ errors.email }}</span>
                    </div>
                    <div class="grid gap-2">
                        <Label for="password">Password</Label>
                        <Input
                            id="password"
                            v-model="form.password"
                            :class="{ 'is-invalid': errors.password }"
                            type="password"
                            required
                            autocomplete="off"
                            autofocus
                        />
                        <span v-if="errors.password" class="text-sm text-red-500">{{ errors.password }}</span>
                    </div>
                    <div class="grid gap-2">
                        <Label for="password_confirmation">Confirm Password</Label>
                        <Input
                            id="password_confirmation"
                            v-model="form.password_confirmation"
                            :class="{ 'is-invalid': errors.password_confirmation }"
                            type="password"
                            required
                            autocomplete="off"
                            autofocus
                        />
                        <span v-if="errors.password_confirmation" class="text-sm text-red-500">{{ errors.password_confirmation }}</span>
                    </div>
                    <Button type="submit" class="w-full">Register</Button>
                    <Button variant="outline" class="w-full" disabled>
                        Register with Google
                    </Button>
                </div>
            </form>
            <div class="mt-4 text-center text-sm">
                Have an account?
                <Link href="/login" class="underline">Login</Link>
            </div>
        </CardContent>
    </Card>
</template>
