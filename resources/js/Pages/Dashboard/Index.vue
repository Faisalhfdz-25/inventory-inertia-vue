<script setup>
import { Avatar, AvatarFallback, AvatarImage } from "@/components/ui/avatar";
import { Badge } from "@/components/ui/badge";
import { Button } from "@/components/ui/button";
import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from "@/components/ui/card";
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from "@/components/ui/table";
import { Head } from "@inertiajs/vue3";
import {
    Activity,
    ArrowUpRight,
    ChartColumnStacked,
    DollarSign,
    PackageSearch
} from "lucide-vue-next";
import Layout from "../../Layout/App.vue";



defineProps({
    totalProduct: Number,
    totalCategory: Number,
})

</script>

<template>
    <Head title="Dashboard" />
    <Layout>
        <div class="grid gap-4 md:grid-cols-2 md:gap-8 lg:grid-cols-4">
            <Card>
                <CardHeader
                    class="flex flex-row items-center justify-between space-y-0 pb-2"
                >
                    <CardTitle class="text-sm font-medium">
                        Total Revenue
                    </CardTitle>
                    <DollarSign class="h-4 w-4 text-muted-foreground" />
                </CardHeader>
                <CardContent>
                    <div class="text-2xl font-bold">Rp 45,231.89</div>
                    <p class="text-xs text-muted-foreground">
                        +20.1% from last month
                    </p>
                </CardContent>
            </Card>
            <Card>
                <CardHeader
                    class="flex flex-row items-center justify-between space-y-0 pb-2"
                >
                    <CardTitle class="text-sm font-medium">
                        Total Products
                    </CardTitle>
                    <PackageSearch class="h-4 w-4 text-muted-foreground" />
                </CardHeader>
                <CardContent>
                    <div class="text-2xl font-bold">{{ totalProduct }}</div>
                    <p class="text-xs text-muted-foreground">
                        +180.1% from last month
                    </p>
                </CardContent>
            </Card>
            <Card>
                <CardHeader
                    class="flex flex-row items-center justify-between space-y-0 pb-2"
                >
                    <CardTitle class="text-sm font-medium"> Total Category </CardTitle>
                    <ChartColumnStacked class="h-4 w-4 text-muted-foreground" />
                </CardHeader>
                <CardContent>
                    <div class="text-2xl font-bold">{{ totalCategory }}</div>
                    <p class="text-xs text-muted-foreground">
                        +19% from last month
                    </p>
                </CardContent>
            </Card>
            <Card>
                <CardHeader
                    class="flex flex-row items-center justify-between space-y-0 pb-2"
                >
                    <CardTitle class="text-sm font-medium">
                        Active Now
                    </CardTitle>
                    <Activity class="h-4 w-4 text-muted-foreground" />
                </CardHeader>
                <CardContent>
                    <div class="text-2xl font-bold">+573</div>
                    <p class="text-xs text-muted-foreground">
                        +201 since last hour
                    </p>
                </CardContent>
            </Card>
        </div>
        <div class="grid gap-4 md:gap-8 lg:grid-cols-2 xl:grid-cols-3">
            <Card class="xl:col-span-2">
                <CardHeader class="flex flex-row items-center">
                    <div class="grid gap-2">
                        <CardTitle>Transactions</CardTitle>
                        <CardDescription>
                            Recent transactions from your store.
                        </CardDescription>
                    </div>
                    <Button as-child size="sm" class="ml-auto gap-1">
                        <a href="#">
                            View All
                            <ArrowUpRight class="h-4 w-4" />
                        </a>
                    </Button>
                </CardHeader>
                <CardContent>
                    <Table>
                        <TableHeader>
                            <TableRow>
                                <TableHead>Customer</TableHead>
                                <TableHead class="hidden xl:table-column">
                                    Type
                                </TableHead>
                                <TableHead class="hidden xl:table-column">
                                    Status
                                </TableHead>
                                <TableHead class="hidden xl:table-column">
                                    Date
                                </TableHead>
                                <TableHead class="text-right">
                                    Amount
                                </TableHead>
                            </TableRow>
                        </TableHeader>
                        <TableBody>
                            <TableRow>
                                <TableCell>
                                    <div class="font-medium">Liam Johnson</div>
                                    <div
                                        class="hidden text-sm text-muted-foreground md:inline"
                                    >
                                        liam@example.com
                                    </div>
                                </TableCell>
                                <TableCell class="hidden xl:table-column">
                                    Sale
                                </TableCell>
                                <TableCell class="hidden xl:table-column">
                                    <Badge class="text-xs" variant="outline">
                                        Approved
                                    </Badge>
                                </TableCell>
                                <TableCell
                                    class="hidden md:table-cell lg:hidden xl:table-column"
                                >
                                    2023-06-23
                                </TableCell>
                                <TableCell class="text-right">
                                    $250.00
                                </TableCell>
                            </TableRow>
                            <TableRow>
                                <TableCell>
                                    <div class="font-medium">Olivia Smith</div>
                                    <div
                                        class="hidden text-sm text-muted-foreground md:inline"
                                    >
                                        olivia@example.com
                                    </div>
                                </TableCell>
                                <TableCell class="hidden xl:table-column">
                                    Refund
                                </TableCell>
                                <TableCell class="hidden xl:table-column">
                                    <Badge class="text-xs" variant="outline">
                                        Declined
                                    </Badge>
                                </TableCell>
                                <TableCell
                                    class="hidden md:table-cell lg:hidden xl:table-column"
                                >
                                    2023-06-24
                                </TableCell>
                                <TableCell class="text-right">
                                    $150.00
                                </TableCell>
                            </TableRow>
                            <TableRow>
                                <TableCell>
                                    <div class="font-medium">Noah Williams</div>
                                    <div
                                        class="hidden text-sm text-muted-foreground md:inline"
                                    >
                                        noah@example.com
                                    </div>
                                </TableCell>
                                <TableCell class="hidden xl:table-column">
                                    Subscription
                                </TableCell>
                                <TableCell class="hidden xl:table-column">
                                    <Badge class="text-xs" variant="outline">
                                        Approved
                                    </Badge>
                                </TableCell>
                                <TableCell
                                    class="hidden md:table-cell lg:hidden xl:table-column"
                                >
                                    2023-06-25
                                </TableCell>
                                <TableCell class="text-right">
                                    $350.00
                                </TableCell>
                            </TableRow>
                            <TableRow>
                                <TableCell>
                                    <div class="font-medium">Emma Brown</div>
                                    <div
                                        class="hidden text-sm text-muted-foreground md:inline"
                                    >
                                        emma@example.com
                                    </div>
                                </TableCell>
                                <TableCell class="hidden xl:table-column">
                                    Sale
                                </TableCell>
                                <TableCell class="hidden xl:table-column">
                                    <Badge class="text-xs" variant="outline">
                                        Approved
                                    </Badge>
                                </TableCell>
                                <TableCell
                                    class="hidden md:table-cell lg:hidden xl:table-column"
                                >
                                    2023-06-26
                                </TableCell>
                                <TableCell class="text-right">
                                    $450.00
                                </TableCell>
                            </TableRow>
                            <TableRow>
                                <TableCell>
                                    <div class="font-medium">Liam Johnson</div>
                                    <div
                                        class="hidden text-sm text-muted-foreground md:inline"
                                    >
                                        liam@example.com
                                    </div>
                                </TableCell>
                                <TableCell class="hidden xl:table-column">
                                    Sale
                                </TableCell>
                                <TableCell class="hidden xl:table-column">
                                    <Badge class="text-xs" variant="outline">
                                        Approved
                                    </Badge>
                                </TableCell>
                                <TableCell
                                    class="hidden md:table-cell lg:hidden xl:table-column"
                                >
                                    2023-06-27
                                </TableCell>
                                <TableCell class="text-right">
                                    $550.00
                                </TableCell>
                            </TableRow>
                        </TableBody>
                    </Table>
                </CardContent>
            </Card>
            <Card>
                <CardHeader>
                    <CardTitle>Recent Sales</CardTitle>
                </CardHeader>
                <CardContent class="space-y-4 p-4">
                    <div class="flex items-center gap-4">
                        <Avatar class="h-10 w-10">
                            <AvatarImage
                                src="https://www.shadcn-vue.com/avatars/01.png"
                                alt="Avatar"
                            />
                            <AvatarFallback>OM</AvatarFallback>
                        </Avatar>
                        <div class="flex-1">
                            <p class="text-sm font-medium leading-none">
                                Olivia Martin
                            </p>
                            <p class="text-xs text-gray-500">
                                olivia.martin@email.com
                            </p>
                        </div>
                        <div class="text-sm font-medium text-green-600">
                            +$1,999.00
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <Avatar class="h-10 w-10">
                            <AvatarImage src="https://www.shadcn-vue.com/avatars/02.png" alt="Avatar" />
                            <AvatarFallback>JL</AvatarFallback>
                        </Avatar>
                        <div class="flex-1">
                            <p class="text-sm font-medium leading-none">
                                Jackson Lee
                            </p>
                            <p class="text-xs text-gray-500">
                                jackson.lee@email.com
                            </p>
                        </div>
                        <div class="text-sm font-medium text-green-600">
                            +$39.00
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <Avatar class="h-10 w-10">
                            <AvatarImage src="https://www.shadcn-vue.com/avatars/03.png" alt="Avatar" />
                            <AvatarFallback>IN</AvatarFallback>
                        </Avatar>
                        <div class="flex-1">
                            <p class="text-sm font-medium leading-none">
                                Isabella Nguyen
                            </p>
                            <p class="text-xs text-gray-500">
                                isabella.nguyen@email.com
                            </p>
                        </div>
                        <div class="text-sm font-medium text-green-600">
                            +$299.00
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <Avatar class="h-10 w-10">
                            <AvatarImage src="https://www.shadcn-vue.com/avatars/04.png" alt="Avatar" />
                            <AvatarFallback>WK</AvatarFallback>
                        </Avatar>
                        <div class="flex-1">
                            <p class="text-sm font-medium leading-none">
                                William Kim
                            </p>
                            <p class="text-xs text-gray-500">will@email.com</p>
                        </div>
                        <div class="text-sm font-medium text-green-600">
                            +$99.00
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <Avatar class="h-10 w-10">
                            <AvatarImage src="https://www.shadcn-vue.com/avatars/05.png" alt="Avatar" />
                            <AvatarFallback>SD</AvatarFallback>
                        </Avatar>
                        <div class="flex-1">
                            <p class="text-sm font-medium leading-none">
                                Sofia Davis
                            </p>
                            <p class="text-xs text-gray-500">
                                sofia.davis@email.com
                            </p>
                        </div>
                        <div class="text-sm font-medium text-green-600">
                            +$39.00
                        </div>
                    </div>
                </CardContent>
            </Card>
        </div>
    </Layout>
</template>
