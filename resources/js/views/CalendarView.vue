<template>
  <div>{{ calendars }}</div>
  <div>{{ calendarDates }}</div>
</template>

<script setup lang="ts">
import type { Calendar } from '@/types/calendar';
import type { Show, List } from '@/types/response';
import { apiUrl, useFetch } from '@/utils/useFetch';
import { onBeforeMount, ref } from 'vue';

const calendars = ref<Show<Calendar[]> | null>(null);
const calendarDates = ref<Show<Calendar> | null>(null);
const error = ref<string | unknown>();
const fetchData = async (): Promise<void> => {
  try {
    calendars.value = await useFetch<List<Calendar>>(apiUrl('calendar'));
    calendarDates.value = await useFetch<Show<Calendar>>(
      apiUrl('calendar/1?include=calendarDates')
    );
  } catch (e) {
    error.value = e;
  }
};

onBeforeMount(async () => {
  await fetchData();
});
</script>
