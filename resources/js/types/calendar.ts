import type { HasTimestamps } from './resources';

export interface Calendar extends HasTimestamps {
  id: number;
  name: string;
  calendar_dates?: CalendarDate[];
}

export interface CalendarUsage extends HasTimestamps {
  id: number;
  name: string;
  color: string;
}

export interface CalendarDate extends HasTimestamps {
  id: number;
  date: string;
  title?: string;
  text?: string;
  calendar: number;
  calendar_usage?: number;
}
