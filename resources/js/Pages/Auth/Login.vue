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
    email: "",
    password: "",
});

const errors = ref({});

const submit = () => {
    form.post('/login', {
        onSuccess: () => {
            // Redirect to /dashboard on successful login
            window.location.href = "/dashboard";
        },
        onError: (error) => {
            errors.value = error;
        },
    });
};
</script>

<template>
    <Head title="Login" />
    <Card class="mx-auto max-w-sm mt-20">
        <CardHeader>
            <CardTitle class="text-2xl">Login</CardTitle>
            <CardDescription>
                Enter your email below to login to your account
            </CardDescription>
        </CardHeader>
        <CardContent>
            <form @submit.prevent="submit">
                <div class="grid gap-4">
                    <div class="grid gap-2">
                        <Label for="email">Email</Label>
                        <Input
                            id="email"
                            v-model="form.email"
                            :class="{ 'is-invalid': errors.email }"
                            type="email"
                            placeholder="m@example.com"
                            required
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
                        />
                        <span v-if="errors.password" class="text-sm text-red-500">{{
                            errors.password
                        }}</span>
                    </div>
                    <Button type="submit" class="w-full">Login</Button>
                    <Button variant="outline" class="w-full" disabled>
                        Login with Google
                    </Button>
                </div>
            </form>
            <div class="mt-4 text-center text-sm">
                Don't have an account?
                <Link href="/register" class="underline">Register</Link>
            </div>
        </CardContent>
    </Card>
</template>
