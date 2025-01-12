import axios from 'axios';

type FetchMethods = 'GET' | 'POST' | 'PUT' | 'DELETE';

export const apiUrl = (path: string): string => {
  return `http://localhost:8080/api/${path}`;
};

export const useFetch = async <T>(url: string, method: FetchMethods = 'GET'): Promise<T> => {
  return axios<T>({
    method: method,
    url: url,
  }).then((res) => res.data);
};
