/* eslint-disable no-undef */
import axios from "axios";

// create a new axios instance
const instance = axios.create({
    baseURL: `/api/v1/`
});

// before a request is made start the nprogress
instance.interceptors.request.use(config => {
    // use here to set userToken if available
    return config;
});

export default () => instance;