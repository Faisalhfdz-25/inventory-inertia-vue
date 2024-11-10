<script setup>
import { Button } from "@/components/ui/button";
import { Head } from "@inertiajs/vue3";
import Layout from "../../Layout/App.vue";

import { Checkbox } from "@/components/ui/checkbox";

import Badge from "@/components/ui/badge/Badge.vue";
import {
    DropdownMenu,
    DropdownMenuCheckboxItem,
    DropdownMenuContent,
    DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu";
import { Input } from "@/components/ui/input";
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from "@/components/ui/table";
import { valueUpdater } from "@/lib/utils";
import {
    FlexRender,
    getCoreRowModel,
    getExpandedRowModel,
    getFilteredRowModel,
    getPaginationRowModel,
    getSortedRowModel,
    useVueTable,
} from "@tanstack/vue-table";
import { ArrowUpDown, ChevronDown, Plus } from "lucide-vue-next";
import { h, ref } from "vue";
import DropdownAction from "./DataTable.vue";

import {
    Dialog,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
} from "@/components/ui/dialog";

const props = defineProps({
    data: Array,
});

const data = props.data;

const columns = [
    {
        id: "select",
        header: ({ table }) =>
            h(Checkbox, {
                checked:
                    table.getIsAllPageRowsSelected() ||
                    (table.getIsSomePageRowsSelected() && "indeterminate"),
                "onUpdate:checked": (value) =>
                    table.toggleAllPageRowsSelected(!!value),
                ariaLabel: "Select all",
            }),
        cell: ({ row }) =>
            h(Checkbox, {
                checked: row.getIsSelected(),
                "onUpdate:checked": (value) => row.toggleSelected(!!value),
                ariaLabel: "Select row",
            }),
        enableSorting: false,
        enableHiding: false,
    },
    {
        accessorKey: "category_name", // Menggunakan relasi `category` untuk menampilkan `name`
        header: "Category",
        cell: ({ row }) =>
            h("div", {}, row.getValue("category_name") || "No Category"),
    },
    {
        accessorKey: "name",
        header: ({ column }) => {
            return h(
                Button,
                {
                    variant: "ghost",
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === "asc"),
                },
                () => ["Name", h(ArrowUpDown, { class: "ml-2 h-4 w-4" })]
            );
        },
        cell: ({ row }) =>
            h("div", { class: "lowercase" }, row.getValue("name")),
    },
    {
        accessorKey: "description",
        header: "Description",
        cell: ({ row }) =>
            h("div", { class: "truncate w-48" }, row.getValue("description")),
    },
    {
        accessorKey: "stock",
        header: () => h("div", {}, "Stock"),
        cell: ({ row }) =>
            h("div", { class: "text-right" }, row.getValue("stock")),
    },
    {
        accessorKey: "price",
        header: () => h("div", { class: "text-right" }, "Price"),
        cell: ({ row }) => {
            const price = Number.parseFloat(row.getValue("price"));

            const formatted = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
            }).format(price);

            return h("div", { class: "text-right font-medium" }, formatted);
        },
    },
    {
        accessorKey: "is_active",
        header: "Status",
        cell: ({ row }) => {
            const status = row.getValue("is_active");

            if (status) {
                return h("div", h(Badge, "Active"));
            } else {
                return h("div", h(Badge, { variant: "outline" }, "Inactive"));
            }
        },
    },
    {
        id: "actions",
        enableHiding: false,
        cell: ({ row }) => {
            const payment = row.original;

            return h(
                "div",
                { class: "relative" },
                h(DropdownAction, {
                    payment,
                    onExpand: row.toggleExpanded,
                })
            );
        },
    },
];

const sorting = ref([]);
const columnFilters = ref([]);
const columnVisibility = ref({});
const rowSelection = ref({});
const expanded = ref({});

const table = useVueTable({
    data,
    columns,
    getCoreRowModel: getCoreRowModel(),
    getPaginationRowModel: getPaginationRowModel(),
    getSortedRowModel: getSortedRowModel(),
    getFilteredRowModel: getFilteredRowModel(),
    getExpandedRowModel: getExpandedRowModel(),
    onSortingChange: (updaterOrValue) => valueUpdater(updaterOrValue, sorting),
    onColumnFiltersChange: (updaterOrValue) =>
        valueUpdater(updaterOrValue, columnFilters),
    onColumnVisibilityChange: (updaterOrValue) =>
        valueUpdater(updaterOrValue, columnVisibility),
    onRowSelectionChange: (updaterOrValue) =>
        valueUpdater(updaterOrValue, rowSelection),
    onExpandedChange: (updaterOrValue) =>
        valueUpdater(updaterOrValue, expanded),
    state: {
        get sorting() {
            return sorting.value;
        },
        get columnFilters() {
            return columnFilters.value;
        },
        get columnVisibility() {
            return columnVisibility.value;
        },
        get rowSelection() {
            return rowSelection.value;
        },
        get expanded() {
            return expanded.value;
        },
    },
});

const showDialog = ref(false);

const showDialogCreate = () => {
    showDialog.value = true;
};
</script>

<template>
    <Head title="Products" />
    <Layout>
        <div class="flex items-center">
            <h1 class="text-lg font-semibold md:text-2xl">Products</h1>
        </div>
        <div class="w-full">
            <div class="flex gap-2 items-center py-4">
                <Input
                    class="w-60"
                    placeholder="Filter Name..."
                    :model-value="table.getColumn('name')?.getFilterValue()"
                    @update:model-value="
                        table.getColumn('name')?.setFilterValue($event)
                    "
                />

                <Button variant="outline" @click="showDialogCreate">
                    <Plus class="mr-2"></Plus>
                    Create Product
                </Button>

                <DropdownMenu>
                    <DropdownMenuTrigger as-child>
                        <Button variant="outline" class="ml-auto">
                            Columns <ChevronDown class="ml-2 h-4 w-4" />
                        </Button>
                    </DropdownMenuTrigger>
                    <DropdownMenuContent align="end">
                        <DropdownMenuCheckboxItem
                            v-for="column in table
                                .getAllColumns()
                                .filter((column) => column.getCanHide())"
                            :key="column.id"
                            class="capitalize"
                            :checked="column.getIsVisible()"
                            @update:checked="
                                (value) => {
                                    column.toggleVisibility(!!value);
                                }
                            "
                        >
                            {{ column.id }}
                        </DropdownMenuCheckboxItem>
                    </DropdownMenuContent>
                </DropdownMenu>
            </div>
            <div class="rounded-md border">
                <Table>
                    <TableHeader>
                        <TableRow
                            v-for="headerGroup in table.getHeaderGroups()"
                            :key="headerGroup.id"
                        >
                            <TableHead
                                v-for="header in headerGroup.headers"
                                :key="header.id"
                            >
                                <FlexRender
                                    v-if="!header.isPlaceholder"
                                    :render="header.column.columnDef.header"
                                    :props="header.getContext()"
                                />
                            </TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <template v-if="table.getRowModel().rows?.length">
                            <template
                                v-for="row in table.getRowModel().rows"
                                :key="row.id"
                            >
                                <TableRow
                                    :data-state="
                                        row.getIsSelected() && 'selected'
                                    "
                                >
                                    <TableCell
                                        v-for="cell in row.getVisibleCells()"
                                        :key="cell.id"
                                    >
                                        <FlexRender
                                            :render="cell.column.columnDef.cell"
                                            :props="cell.getContext()"
                                        />
                                    </TableCell>
                                </TableRow>
                                <TableRow v-if="row.getIsExpanded()">
                                    <TableCell
                                        :colspan="row.getAllCells().length"
                                    >
                                        {{ JSON.stringify(row.original) }}
                                    </TableCell>
                                </TableRow>
                            </template>
                        </template>

                        <TableRow v-else>
                            <TableCell
                                :colspan="columns.length"
                                class="h-24 text-center"
                            >
                                No results.
                            </TableCell>
                        </TableRow>
                    </TableBody>
                </Table>
            </div>

            <div class="flex items-center justify-end space-x-2 py-4">
                <div class="flex-1 text-sm text-muted-foreground">
                    {{ table.getFilteredSelectedRowModel().rows.length }} of
                    {{ table.getFilteredRowModel().rows.length }} row(s)
                    selected.
                </div>
                <div class="space-x-2">
                    <Button
                        variant="outline"
                        size="sm"
                        :disabled="!table.getCanPreviousPage()"
                        @click="table.previousPage()"
                    >
                        Previous
                    </Button>
                    <Button
                        variant="outline"
                        size="sm"
                        :disabled="!table.getCanNextPage()"
                        @click="table.nextPage()"
                    >
                        Next
                    </Button>
                </div>
            </div>

            <Dialog v-model:open="showDialog">
                <DialogContent class="sm:max-w-[425px]">
                    <DialogHeader>
                        <DialogTitle>Create Product</DialogTitle>
                        <DialogDescription>
                            Make changes to your profile here. Click save when
                            you're done.
                        </DialogDescription>
                    </DialogHeader>
                    <div class="grid gap-y-2">
                        <div class="grid gap-2">
                            <Label for="name"> Name </Label>
                            <Input id="name" />
                        </div>
                        <div class="grid gap-2">
                            <Label for="description"> Description </Label>
                            <Input id="description"  />
                        </div>
                    </div>
                    <DialogFooter>
                        <Button type="submit"> Save changes </Button>
                    </DialogFooter>
                </DialogContent>
            </Dialog>
        </div>
    </Layout>
</template>
