<script setup>
import { Button } from '@/components/ui/button';
import { DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuLabel, DropdownMenuTrigger } from '@/components/ui/dropdown-menu';
import { MoreHorizontal, SquarePen, Trash2 } from 'lucide-vue-next';

const props = defineProps({
  payment: {
    type: Object,
    required: true,
    default: () => ({
      id: ''
    })
  }
})

function copy(id) {
  navigator.clipboard.writeText(id);
}
</script>

<template>
  <DropdownMenu>
    <DropdownMenuTrigger as-child>
      <Button variant="ghost" class="w-8 h-8 p-0">
        <span class="sr-only">Open menu</span>
        <MoreHorizontal class="w-4 h-4" />
      </Button>
    </DropdownMenuTrigger>
    <DropdownMenuContent align="end">
      <DropdownMenuLabel>Actions</DropdownMenuLabel>
      <DropdownMenuItem> <SquarePen /> Edit</DropdownMenuItem>
      <DropdownMenuItem><Trash2 color="#e23232" /> Delete</DropdownMenuItem>
    </DropdownMenuContent>
  </DropdownMenu>
</template>
