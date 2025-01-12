export interface Store<T> {
  data: T;
}

export interface Update<T> {
  data: T;
}

export interface Show<T> {
  data: T;
}

export interface List<T> {
  data: Array<T>;
}
