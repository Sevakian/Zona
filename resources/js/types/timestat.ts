import type { HasTimestamps } from './resources';

export interface Timestat extends HasTimestamps {
  id: number;
  name: string;
  timestat_dates?: TimestatDate[];
}

export interface TimestatDate extends HasTimestamps {
  id: number;
  date: string;
  text?: string;
  timestat_id: number;
}
