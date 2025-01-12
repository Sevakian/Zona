<template>
  <div>{{ timestats }}</div>
  <div>{{ timestatDates }}</div>
</template>

<script setup lang="ts">
import type { Show, List } from '@/types/response';
import type { Timestat } from '@/types/timestat';
import { apiUrl, useFetch } from '@/utils/useFetch';
import { onBeforeMount, ref } from 'vue';

const timestats = ref<Show<Timestat[]> | null>(null);
const timestatDates = ref<Show<Timestat> | null>(null);
const error = ref<string | unknown>();
const fetchData = async (): Promise<void> => {
  try {
    timestats.value = await useFetch<List<Timestat>>(apiUrl('timestat'));
    timestatDates.value = await useFetch<Show<Timestat>>(
      apiUrl('timestat/1?include=timestatDates')
    );
  } catch (e) {
    error.value = e;
  }
};

onBeforeMount(async () => {
  await fetchData();
});
</script>
