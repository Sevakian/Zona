export interface LabelValue {
  label: string;
  value: string;
}

export interface KeyValue<T> {
  [key: string]: T;
}

export type HasTimestamps = {
  createdAt: string;
  updatedAt: string;
};
