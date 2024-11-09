<script setup>
import { Button } from "@/components/ui/button";
import { Head } from "@inertiajs/vue3";
import Layout from "../../Layout/App.vue";
</script>

<template>
    <Head title="Categories" />
    <Layout>
        <div class="flex items-center">
            <h1 class="text-lg font-semibold md:text-2xl">Categories</h1>
        </div>
        <div
            class="flex flex-1 items-center justify-center rounded-lg border border-dashed shadow-sm"
        >
            <div class="flex flex-col items-center gap-1 text-center">
                <h3 class="text-2xl font-bold tracking-tight">
                    You have no categories
                </h3>
                <p class="text-sm text-muted-foreground">
                    You can start selling as soon as you add a categories.
                </p>
                <Button class="mt-4"> Add Category </Button>
            </div>
        </div>
    </Layout>
</template>
